<?php

class AlbaranesclientesreparacionesController extends AppController {

    var $name = 'Albaranesclientesreparaciones';
    var $components = array('RequestHandler', 'Session', 'FileUpload');
    var $helpers = array('Form', 'Autocomplete', 'Ajax', 'Js', 'Number', 'Time');

    function beforeFilter() {
        parent::beforeFilter();
        if ($this->params['action'] == 'edit' || $this->params['action'] == 'add' || $this->params['action'] == 'devolucion') {
            $this->FileUpload->fileModel = 'Albaranesclientesreparacione';
            $this->FileUpload->uploadDir = 'files/albaranesclientesreparacione';
            $this->FileUpload->fields = array('name' => 'file_name', 'type' => 'file_type', 'size' => 'file_size');
        }
        $this->loadModel('Config');
        $this->set('config', $this->Config->read(null, 1));
    }

    function index() {
        $this->paginate = array(
            'limit' => 20,
            'contain' => array(
                'Estadosalbaranesclientesreparacione',
                'Cliente',
                'Centrostrabajo',
                'Maquina',
                'Ordene' => 'Avisostallere',
                'Tiposiva',
                'Comerciale',
                'FacturasCliente',
                'Centrosdecoste',
            )
        );
        $this->set('albaranesclientesreparaciones', $this->paginate());
    }

    function view($id = null) {
        if (!$id) {
            $this->flashWarnings(__('Albarán de Reparación Inválido', true));
            $this->redirect($this->referer());
        }
        $this->set('albaranesclientesreparacione', $this->Albaranesclientesreparacione->find(
                        'first', array(
                    'contain' => array(
                        'Estadosalbaranesclientesreparacione',
                        'TareasAlbaranesclientesreparacione' => array(
                            'TareasAlbaranesclientesreparacionesParte' => 'Mecanico',
                            'TareasAlbaranesclientesreparacionesPartestallere' => 'Mecanico',
                            'ArticulosTareasAlbaranesclientesreparacione' => 'Articulo'),
                        'Ordene' => array(
                            'Avisostallere' => array('Centrostrabajo', 'Cliente')),
                        'Centrosdecoste',
                        'Comerciale',
                        'Almacene',
                        'Maquina',
                        'FacturasCliente' => 'Cliente',
                        'Cliente' => 'Formapago',
                        'Centrostrabajo',
                        'Tiposiva'
                    ),
                    'conditions' => array('Albaranesclientesreparacione.id' => $id))));
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
                /* Pasamos las Tareas Validadas de la Orden  */
                if (!empty($this->data['Tarea'])) {
                    foreach ($this->data['Tarea'] as $tarea_validada) {
                        $this->Albaranesclientesreparacione->TareasAlbaranesclientesreparacione->create();
                        $this->Albaranesclientesreparacione->TareasAlbaranesclientesreparacione->crear_desde_tarea_de_orden($tarea_validada['id'], $this->Albaranesclientesreparacione->id);
                    }
                }
                /* Fin de Pasar las Tareas Validadas de la Orden  */
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
        $estadosalbaranesclientesreparaciones = $this->Albaranesclientesreparacione->Estadosalbaranesclientesreparacione->find('list');
        $this->set(compact('tiposivas', 'almacenes', 'comerciales', 'centrosdecostes', 'numero', 'estadosalbaranesclientesreparaciones'));
        if (!empty($ordene_id)) {
            $ordene = $this->Albaranesclientesreparacione->Ordene->find('first', array('contain' => array('Almacene', 'Tarea' => array('ArticulosTarea' => 'Articulo', 'Parte' => array('Mecanico'), 'Partestallere' => array('Mecanico')),'Cliente', 'Centrostrabajo', 'Maquina'), 'conditions' => array('Ordene.id' => $ordene_id)));
            $baseimponible = $this->Albaranesclientesreparacione->Ordene->get_baseimponible($ordene_id);
            $totalrepuestos = $this->Albaranesclientesreparacione->Ordene->get_totalrepuestos($ordene_id);
            $totalmanoobra_servicios = $this->Albaranesclientesreparacione->Ordene->get_totalmanoobra_servicios($ordene_id);
            $this->set('totalmanoobra_servicios', $totalmanoobra_servicios);
            $this->set('baseimponible', $baseimponible);
            $this->set('totalrepuestos', $totalrepuestos);
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
            $this->data = $this->Albaranesclientesreparacione->find('first', array('contain' => array('Estadosalbaranesclientesreparacione', 'Ordene', 'Centrosdecoste', 'Comerciale', 'Almacene', 'Maquina', 'Cliente' => 'Formapago', 'Centrostrabajo', 'Tiposiva'), 'conditions' => array('Albaranesclientesreparacione.id' => $id)));
        }
        $estadosalbaranesclientesreparaciones = $this->Albaranesclientesreparacione->Estadosalbaranesclientesreparacione->find('list');
        $tiposivas = $this->Albaranesclientesreparacione->Tiposiva->find('list');
        $almacenes = $this->Albaranesclientesreparacione->Almacene->find('list');
        $comerciales = $this->Albaranesclientesreparacione->Comerciale->find('list');
        $centrosdecostes = $this->Albaranesclientesreparacione->Centrosdecoste->find('list');
        $this->set(compact('tiposivas', 'almacenes', 'comerciales', 'centrosdecostes', 'estadosalbaranesclientesreparaciones'));
    }

    function delete($id = null) {
        if (!$id) {
            $this->flashWarnings(__('Id incorrecta del Albarán de Reparación', true));
            $this->redirect(array('action' => 'index'));
        }
        $id = $this->Albaranesclientesreparacione->id;
        $upload = $this->Albaranesclientesreparacione->findById($id);
        if (!empty($upload['Albaranesclientesreparacione']['albaranescaneado']))
            $this->FileUpload->RemoveFile($upload['Albaranesclientesreparacione']['albaranescaneado']);
        if ($this->Albaranesclientesreparacione->delete($id)) {
            $this->Session->setFlash(__('Albarán de Reparación borrado', true));
            $this->redirect(array('action' => 'index'));
        }
        $this->flashWarnings(__('El Albarán de Reparación no puedo ser borrado', true));
        $this->redirect(array('action' => 'index'));
    }

}

?>