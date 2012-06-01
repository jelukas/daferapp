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
        $this->Partestallere->recursive = 2;
        if (!empty($this->data)) {
            $this->Partestallere->create();
            if ($this->Partestallere->saveAll($this->data)) {
                $id = $this->Partestallere->id;
                /* Guarda fichero */
                if ($this->FileUpload->finalFile != null) {
                    $this->Partestallere->saveField('parteescaneado', $this->FileUpload->finalFile);
                }
                /*FIn Guardar Fichero*/
                $this->Session->setFlash(__('El nuevo Parte de Taller ha sido creado correctamente', true));
                $this->redirect(array('action' => 'view', $id));
            } else {
                $this->flashWarnings(__('El Parte de Taller NO ha podido ser creado', true));
            }
        }
        $tarea = $this->Partestallere->Tarea->read(null, $tarea_id);
        $this->set('tarea', $tarea);
        if ($tarea_id != null && $tarea_id >= 0) {
            $this->loadModel('Tarea');
            $tarea = $this->Tarea->read(null, $tarea_id);
            $this->set('tarea', $tarea);
        }
        $mecanicos = $this->Partestallere->Mecanico->find('list');
        $this->set(compact('mecanicos'));
    }

    function edit($id = null) {

        if (!$id && empty($this->data)) {
            $this->flashWarnings(__('Parte de Taller Inválido', true));
            $this->redirect(array('action' => 'index'));
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
                $this->Session->setFlash(__('El nuevo parte de taller ha sido guardado correctamente', true));
                $this->redirect(array('action' => 'view', $id));
            } else {
                $this->Session->setFlash(__('El nuevo parte de taller No podido ser guardado', true));
            }
        } else {
            $this->data = $this->Partestallere->read(null, $id);
        }

        $tareas = $this->Partestallere->Tarea->find('list');
        $this->Partestallere->recursive = 2;
        $partetaller = $this->Partestallere->findById($id);
        $mecanicos = $this->Partestallere->Mecanico->find('list');
        $this->set(compact('tareas', 'partetaller', 'mecanicos'));
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

    function downloadFile($id = null) {
        if (!$id) {
            $this->flashWarnings(__('Id NO válido para el Parte de Taller', true));
            $this->redirect(array('action' => 'index'));
        } else {
            $id = $this->Partestallere->id;
            $upload = $this->Partestallere->findById($id);
            $name = $upload['Partestallere']['parteescaneado'];
            $ruta = '../webroot/files/' . $name;

            header("Content-disposition: attachment; filename=$name");
            header("Content-type: application/octet-stream");
            readfile($ruta);
        }
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