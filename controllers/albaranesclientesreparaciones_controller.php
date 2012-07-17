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
        $this->set('albaranesclientesreparacione', $this->Albaranesclientesreparacione->read(null, $id));
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
            $ordene = $this->Albaranesclientesreparacione->Ordene->find('first',array('contain'=>array('Almacene','Tarea' => array('ArticulosTarea' => 'Articulo', 'Parte' => array('Mecanico'), 'Partestallere' => array('Mecanico')),'Avisostallere'=>array('Cliente','Centrostrabajo','Maquina')),'conditions'=>array('Ordene.id' => $ordene_id)));
            $this->set('ordene',$ordene);
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
                $this->Session->setFlash(__('The albaranesclientesreparacione has been saved', true));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->flashWarnings(__('The albaranesclientesreparacione could not be saved. Please, try again.', true));
            }
        }
        if (empty($this->data)) {
            $this->data = $this->Albaranesclientesreparacione->read(null, $id);
        }
        $tiposivas = $this->Albaranesclientesreparacione->Tiposiva->find('list');
        $ordenes = $this->Albaranesclientesreparacione->Ordene->find('list');
        $clientes = $this->Albaranesclientesreparacione->Cliente->find('list');
        $almacenes = $this->Albaranesclientesreparacione->Almacene->find('list');
        $facturasClientes = $this->Albaranesclientesreparacione->FacturasCliente->find('list');
        $comerciales = $this->Albaranesclientesreparacione->Comerciale->find('list');
        $centrosdecostes = $this->Albaranesclientesreparacione->Centrosdecoste->find('list');
        $this->set(compact('tiposivas', 'ordenes', 'clientes', 'almacenes', 'facturasClientes', 'comerciales', 'centrosdecostes'));
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