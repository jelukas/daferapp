<?php

class PartestalleresController extends AppController {

    var $name = 'Partestalleres';
    var $helpers = array('Form', 'Ajax', 'Js');
    var $components = array('RequestHandler', 'FileUpload', 'Session');

    function beforeFilter() {
        parent::beforeFilter();
        if ($this->params['action'] == 'edit' || $this->params['action'] == 'add') {
            $this->FileUpload->fileModel = 'Partestallere';
            $this->FileUpload->uploadDir = 'files/partestallere';
            $this->FileUpload->fields = array('name' => 'file_name', 'type' => 'file_type', 'size' => 'file_size');
        }
    }

    function index() {
        $this->Partestallere->recursive = 0;
        $this->set('partestalleres', $this->paginate());
    }

    function view($id = null) {
        if (!$id) {
            $this->flashWarnings(__('Parte de Taller NO Válido', true));
            $this->redirect(array('action' => 'index'));
        }

        $this->Partestallere->recursive = 2;
        $partestallere = $this->Partestallere->read(null, $id);
        $this->set('partestallere', $partestallere);

        $tarea_id = $partestallere['Tarea']['id'];
        $this->set('tarea', $this->Partestallere->Tarea->read(null, $tarea_id));
    }

    function add($tarea_id = null) {
        if (!empty($this->data)) {
            $this->Partestallere->create();
            if ($this->Partestallere->save($this->data)) {
                $id = $this->Partestallere->id;
                /* Guarda fichero */
                if ($this->FileUpload->finalFile != null) {
                    $this->Partestallere->saveField('parteescaneado', $this->FileUpload->finalFile);
                }
                /*FIn Guardar Fichero*/
                $this->Session->setFlash(__('El nuevo Parte de Taller ha sido creado correctamente', true));
                $this->redirect($this->referer());
            } else {
                $this->flashWarnings(__('El Parte de Taller NO ha podido ser creado', true));
                $this->redirect($this->referer());
            }
        }
        $mecanicos = $this->Partestallere->Mecanico->find('list');
        $this->set(compact('mecanicos','tarea_id'));
    }

    function edit($id = null) {

        if (!$id && empty($this->data)) {
            $this->flashWarnings(__('Parte de Taller Inválido', true));
            $this->redirect($this->referer());
        }
        if (!empty($this->data)) {
            if ($this->Partestallere->save($this->data)) {
                $id = $this->Partestallere->id;
                $upload = $this->Partestallere->findById($id);
                if (!empty($this->data['Partestallere']['remove_file'])) {
                    $this->FileUpload->RemoveFile($upload['Partestallere']['parteescaneado']);
                    $this->Partestallere->saveField('parteescaneado', null);
                }
                if ($this->FileUpload->finalFile != null) {
                    $this->FileUpload->RemoveFile($upload['Partestallere']['parteescaneado']);
                    $this->Partestallere->saveField('parteescaneado', $this->FileUpload->finalFile);
                }
                $this->Session->setFlash(__('El parte de taller ha sido guardado correctamente', true));
                $this->redirect($this->referer());
            } else {
                $this->Session->setFlash(__('El parte de taller No podido ser guardado', true));
                $this->redirect($this->referer());
            }
        } else {
            $this->data = $this->Partestallere->read(null, $id);
        }

        $mecanicos = $this->Partestallere->Mecanico->find('list');
        $this->set(compact('mecanicos'));
    }

    function delete($id = null) {
        if (!$id) {
            $this->flashWarnings(__('Id Inválida para el Parte de Taller', true));
            $this->redirect($this->referer());
        }
        $id = $this->Partestallere->id;
        $upload = $this->Partestallere->findById($id);
        $this->FileUpload->RemoveFile($upload['Partestallere']['parteescaneado']);
        if ($this->Partestallere->delete($id)) {
            $this->Session->setFlash(__('Parte de Taller  Borrado Correctamente', true));
            $this->redirect($this->referer());
        }

        $this->flashWarnings(__('El Paarte de Taller NO pudo ser Borrado', true));
        $this->redirect($this->referer());
    }

    function pdf($id = null) {
        if ($id != null) {
            $this->Partestallere->recursive = 2;
            $this->layout = 'pdf';
            $partetaller = $this->Partestallere->read(null, $id);
            $this->Partestallere->Tarea->Ordene->recursive = 2;
            $orden = $this->Partestallere->Tarea->Ordene->read(null, $partetaller['Tarea']['Ordene']['id']);
            $this->set('orden', $orden);
            $this->set('partetaller', $partetaller);
            $this->render();
        }
    }

}

?>