<?php

class PartesController extends AppController {

    var $name = 'Partes';
    var $components = array('RequestHandler', 'FileUpload', 'Session');

    function beforeFilter() {
        parent::beforeFilter();
        if ($this->params['action'] == 'edit' || $this->params['action'] == 'add') {
            $this->FileUpload->fileModel = 'Parte';
            $this->FileUpload->uploadDir = 'files/parte';
            $this->FileUpload->fields = array('name' => 'file_name', 'type' => 'file_type', 'size' => 'file_size');
        }
    }

    function index() {
        $this->Parte->recursive = 0;
        $this->set('partes', $this->paginate());
    }

    function view($id = null) {
        $this->Parte->recursive = 2;
        if (!$id) {
            $this->flashWarnings(__('Parte de Centro de Trabajo Inválido', true));
            $this->redirect(array('action' => 'index'));
        }
        $this->set('parte', $this->Parte->read(null, $id));
    }

    function add($tarea_id = null) {
        if (!empty($this->data)) {
            $this->Parte->create();
            if ($this->Parte->save($this->data)) {
                /* Guarda fichero */
                if ($this->FileUpload->finalFile != null) {
                    $this->Parte->saveField('parteescaneado', $this->FileUpload->finalFile);
                }
                $this->Session->setFlash(__('El nuevo Parte en Centro de Trabajo ha sido añadido correctamente' . true));
                $this->redirect($this->referer());
            } else {
                $this->flashWarnings(__('El Parte en Centro de Trabajo No ha podido ser añadido. Vuelva a intentarlo' . true));
                $this->redirect($this->referer());
            }
        }
        $tarea = $this->Parte->Tarea->find('first', array('contain' => array('Ordene' => array('Avisostallere' => 'Centrostrabajo')), 'conditions' => array('Tarea.id' => $tarea_id)));
        $mecanicos = $this->Parte->Mecanico->find('list');
        $this->set(compact('mecanicos', 'tarea_id','tarea'));
    }

    function edit($id = null) {
        if (!$id && empty($this->data)) {
            $this->flashWarnings(__('Parte de Centro de Trabajo Inválido', true));
            $this->redirect($this->referer());
        }
        if (!empty($this->data)) {
            if ($this->Parte->save($this->data)) {
                $id = $this->Parte->id;
                $upload = $this->Parte->findById($id);
                if (!empty($this->data['Parte']['remove_file'])) {
                    $this->FileUpload->RemoveFile($upload['Parte']['parteescaneado']);
                    $this->Parte->saveField('parteescaneado', null);
                }
                if ($this->FileUpload->finalFile != null) {
                    $this->FileUpload->RemoveFile($upload['Parte']['parteescaneado']);
                    $this->Parte->saveField('parteescaneado', $this->FileUpload->finalFile);
                }
                $this->Session->setFlash(__('El nuevo Parte de Centro de Trabajo ha sido creado correctamente', true));
                $this->redirect($this->referer());
            } else {
                $this->flashWarnings(__('El Parte de Centro de Trabajo No ha podido ser creado. Vuelva a intentarlo', true));
                $this->redirect($this->referer());
            }
        } else {
            $this->data = $this->Parte->read(null, $id);
        }
        $tarea = $this->Parte->Tarea->find('first', array('contain' => array('Ordene' => array('Avisostallere' => 'Centrostrabajo')), 'conditions' => array('Tarea.id' => $this->data['Parte']['tarea_id'])));
        $mecanicos = $this->Parte->Mecanico->find('list');
        $this->set(compact('mecanicos'));
    }

    function delete($id = null) {
        if (!$id) {
            $this->flashWarnings(__('Id No válida para el Parte de Centro de Trabajo', true));
            $this->redirect($this->referer());
        }
        if ($this->Parte->delete($id)) {
            $this->Session->setFlash(__('El Parte de Centro de Trabajo ha sido borrado', true));
            $this->redirect($this->referer());
        }
        $this->flashWarnings(__('El Parte de Centro de Trabajo No pudo ser borrado', true));
        $this->redirect($this->referer());
    }

    function pdf($id = null) {
        if ($id != null) {
            $this->Parte->recursive = 2;
            $this->layout = 'pdf';
            $parte = $this->Parte->read(null, $id);
            $this->set('parte', $parte);
            $this->render();
        }
    }

}

?>