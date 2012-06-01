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
        $this->Parte->Tarea->Ordene->recursive = 2;
        if (!empty($this->data)) {
            $this->Parte->create();
            if ($this->Parte->save($this->data)) {
                /* Guarda fichero */
                if ($this->FileUpload->finalFile != null) {
                    $this->Parte->saveField('parteescaneado', $this->FileUpload->finalFile);
                }
                $this->Session->setFlash(__('El nuevo Parte de Centro de Trabajo ha sido creado correctamente' . true));
                $this->redirect(array('action' => 'view', $this->Parte->id));
            } else {
                $this->flashWarnings(__('El Parte de Centro de Trabajo No ha podido ser creado. Vuelva a intentarlo' . true));
            }
        }
        if ($tarea_id != null && $tarea_id >= 0) {
            $this->Parte->Tarea->recursive = 2;
            $tarea = $this->Parte->Tarea->read(null, $tarea_id);
            $centrotrabajo = $this->Parte->Tarea->Ordene->Avisostallere->Centrostrabajo->findById($tarea['Ordene']['Avisostallere']['centrostrabajo_id']);
        }

        $mecanicos = $this->Parte->Mecanico->find('list');
        $this->set(compact('mecanicos', 'tarea', 'centrotrabajo'));
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
            }
        } else {
            $this->data = $this->Parte->read(null, $id);
        }
        $tareas = $this->Parte->Tarea->find('list');
        $this->Parte->recursive = 2;
        $parte = $this->Parte->findById($id);
        $mecanicos = $this->Parte->Mecanico->find('list');
        $this->set(compact('tareas', 'parte', 'mecanicos'));
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
        $this->flashWarnings(__('El Parte de Centro de Trabajo No puedo ser borrado', true));
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