<?php

class AlbaranesclientesreparacionesController extends AppController {

    var $name = 'Albaranesclientesreparaciones';
    var $components = array('RequestHandler', 'Session', 'FileUpload');
    var $helpers = array('Form', 'Autocomplete', 'Ajax', 'Js');

    function beforeFilter() {
        parent::beforeFilter();
        if ($this->params['action'] == 'edit' || $this->params['action'] == 'add' || $this->params['action'] == 'devolucion') {
            $this->FileUpload->fileModel = 'Albaranesclientesreparacione';
            $this->FileUpload->uploadDir = 'files/albaranesclientesreparacione';
            $this->FileUpload->fields = array('name' => 'file_name', 'type' => 'file_type', 'size' => 'file_size');
        }
    }

    function index() {
        $this->Albaranesclientesreparacione->recursive = 0;
        $this->set('albaranesclientesreparaciones', $this->paginate());
    }

    function view($id = null) {
        if (!$id) {
            $this->flashWarnings(__('Albarán de Reparación Inválido', true));
            $this->redirect($this->referer());
        }
        $this->set('albaranesclientesreparacione', $this->Albaranesclientesreparacione->find('first', array('contain' => array('TareasAlbaranesclientereparacione' => array('PartesTareasAlbaranesclientereparacione','PartestallereTareasAlbaranesclientesreparacione','ArticulosTareasAlbaranesclientesreparacione'),'Ordene', 'Centrosdecoste', 'Comerciale', 'Almacene', 'Maquina', 'Cliente', 'Centrostrabajo', 'Tiposiva'), 'conditions' => array('Albaranesclientesreparacione.id' => $id))));
    }

    function add($ordene_id = null) {
        if (!empty($this->data)) {
            $this->Albaranesclientesreparacione->create();
            if ($this->Albaranesclientesreparacione->save($this->data)) {
                /* Guardar fichero */
                if ($this->FileUpload->finalFile != null) {
                    $this->Albaranesclientesreparacione->saveField('albaranescaneado', $this->FileUpload->finalFile);
                }
                /* Fin de Guardar Fichero */
                /* Pasamos las Tareas de la Orden Validadas */
                if (!empty($this->data['Tarea'])) {
                    foreach ($this->data['Tarea'] as $tarea_validada) {
                        $this->Albaranesclientesreparacione->TareasAlbaranesclientesreparacione->create();
                        $this->Albaranesclientesreparacione->TareasAlbaranesclientesreparacione->crear_desde_tarea_de_orden($tarea_validada['id'], $this->Albaranesclientesreparacione->id);
                    }
                }
                /* Fin de Pasar las Tareas de la Orden Validadas */
                $this->Session->setFlash(__('El Albarán de Reparación ha sido guardado correctamente', true));
                $this->redirect(array('action' => 'view', $this->Albaranesclientesreparacione->id));
            } else {
                $this->flashWarnings(__('El Albarán de Reparación no ha podiso se guardado. Por favor, intenéntalo de nuevo.', true));
            }
        }
        $numero = $this->Albaranesclientesreparacione->dime_siguiente_numero();
        $tiposivas = $this->Albaranesclientesreparacione->Tiposiva->find('list');
        $almacenes = $this->Albaranesclientesreparacione->Almacene->find('list');
        $comerciales = $this->Albaranesclientesreparacione->Comerciale->find('list');
        $centrosdecostes = $this->Albaranesclientesreparacione->Centrosdecoste->find('list');
        $this->set(compact('tiposivas', 'almacenes', 'comerciales', 'centrosdecostes', 'numero'));
        if (!empty($ordene_id)) {
            $ordene = $this->Albaranesclientesreparacione->Ordene->find('first', array('contain' => array('Almacene', 'Tarea' => array('ArticulosTarea' => 'Articulo', 'Parte' => array('Mecanico'), 'Partestallere' => array('Mecanico')), 'Avisostallere' => array('Cliente', 'Centrostrabajo', 'Maquina')), 'conditions' => array('Ordene.id' => $ordene_id)));
            $this->set('ordene', $ordene);
            $this->render('add_from_ordene');
        } else {
            $this->render('add');
        }
    }

    function edit($id = null) {
        if (!$id && empty($this->data)) {
            $this->flashWarnings(__('Invalid albaranesclientesreparacione', true));
            $this->redirect(array('action' => 'index'));
        }
        if (!empty($this->data)) {
            if ($this->Albaranesclientesreparacione->save($this->data)) {
                $upload = $this->Albaranesclientesreparacione->findById($id);
                if (!empty($this->data['Albaranesclientesreparacione']['remove_file'])) {
                    $this->FileUpload->RemoveFile($upload['Albaranesclientesreparacione']['albaranescaneado']);
                    $this->Albaranesclientesreparacione->saveField('albaranescaneado', null);
                }
                if ($this->FileUpload->finalFile != null) {
                    $this->FileUpload->RemoveFile($upload['Albaranesclientesreparacione']['albaranescaneado']);
                    $this->Albaranesclientesreparacione->saveField('albaranescaneado', $this->FileUpload->finalFile);
                }
                $this->Session->setFlash(__('The albaranesclientesreparacione has been saved', true));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->flashWarnings(__('The albaranesclientesreparacione could not be saved. Please, try again.', true));
            }
        }
        if (empty($this->data)) {
            $this->data = $this->Albaranesclientesreparacione->find('first', array('contain' => array('Ordene', 'Centrosdecoste', 'Comerciale', 'Almacene', 'Maquina', 'Cliente', 'Centrostrabajo', 'Tiposiva'), 'conditions' => array('Albaranesclientesreparacione.id' => $id)));
        }
        $tiposivas = $this->Albaranesclientesreparacione->Tiposiva->find('list');
        $almacenes = $this->Albaranesclientesreparacione->Almacene->find('list');
        $comerciales = $this->Albaranesclientesreparacione->Comerciale->find('list');
        $centrosdecostes = $this->Albaranesclientesreparacione->Centrosdecoste->find('list');
        $this->set(compact('tiposivas', 'almacenes', 'comerciales', 'centrosdecostes'));
    }

    function delete($id = null) {
        if (!$id) {
            $this->flashWarnings(__('Invalid id for albaranesclientesreparacione', true));
            $this->redirect(array('action' => 'index'));
        }
        $id = $this->Albaranesclientesreparacione->id;
        $upload = $this->Albaranesclientesreparacione->findById($id);
        $this->FileUpload->RemoveFile($upload['Albaranesclientesreparacione']['albaranescaneado']);
        if ($this->Albaranesclientesreparacione->delete($id)) {
            $this->Session->setFlash(__('Albaran de Reparación borrado', true));
            $this->redirect(array('action' => 'index'));
        }
        $this->flashWarnings(__('Albaranesclientesreparacione was not deleted', true));
        $this->redirect(array('action' => 'index'));
    }

}

?>