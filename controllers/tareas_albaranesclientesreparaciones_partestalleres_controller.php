<?php

class TareasAlbaranesclientesreparacionesPartestalleresController extends AppController {

    var $name = 'TareasAlbaranesclientesreparacionesPartestalleres';
    var $helpers = array('Form', 'Ajax', 'Js');
    var $components = array('RequestHandler', 'FileUpload', 'Session');

    function beforeFilter() {
        parent::beforeFilter();
        if ($this->params['action'] == 'edit' || $this->params['action'] == 'add') {
            $this->FileUpload->fileModel = 'TareasAlbaranesclientesreparacionesPartestallere';
            $this->FileUpload->uploadDir = 'files/partestallere';
            $this->FileUpload->fields = array('name' => 'file_name', 'type' => 'file_type', 'size' => 'file_size');
        }
    }

    function add($tareas_albaranesclientesreparacione_id = null) {
        if (!empty($this->data)) {
            $this->TareasAlbaranesclientesreparacionesPartestallere->create();
            if ($this->TareasAlbaranesclientesreparacionesPartestallere->save($this->data)) {
                $id = $this->TareasAlbaranesclientesreparacionesPartestallere->id;
                /* Guarda fichero */
                if ($this->FileUpload->finalFile != null) {
                    $this->TareasAlbaranesclientesreparacionesPartestallere->saveField('parteescaneado', $this->FileUpload->finalFile);
                }
                /* FIn Guardar Fichero */
                $this->Session->setFlash(__('El nuevo Parte de Taller de la Tarea del Albarán ha sido creado correctamente', true));
                $this->redirect($this->referer());
            } else {
                $this->flashWarnings(__('El Parte de Taller de la Tarea de Albarán NO ha podido ser creado', true));
                $this->redirect($this->referer());
            }
        }
        $mecanicos = $this->TareasAlbaranesclientesreparacionesPartestallere->Mecanico->find('list');
        $this->set(compact('mecanicos', 'tareas_albaranesclientesreparacione_id'));
    }

    function edit($id = null) {

        if (!$id && empty($this->data)) {
            $this->flashWarnings(__('Parte de Taller No Válido', true));
            $this->redirect($this->referer());
        }
        if (!empty($this->data)) {
            if ($this->TareasAlbaranesclientesreparacionesPartestallere->save($this->data)) {
                $id = $this->TareasAlbaranesclientesreparacionesPartestallere->id;
                $upload = $this->TareasAlbaranesclientesreparacionesPartestallere->findById($id);
                if (!empty($this->data['TareasAlbaranesclientesreparacionesPartestallere']['remove_file'])) {
                    $this->FileUpload->RemoveFile($upload['TareasAlbaranesclientesreparacionesPartestallere']['parteescaneado']);
                    $this->TareasAlbaranesclientesreparacionesPartestallere->saveField('parteescaneado', null);
                }
                if ($this->FileUpload->finalFile != null) {
                    $this->FileUpload->RemoveFile($upload['TareasAlbaranesclientesreparacionesPartestallere']['parteescaneado']);
                    $this->TareasAlbaranesclientesreparacionesPartestallere->saveField('parteescaneado', $this->FileUpload->finalFile);
                }
                $this->Session->setFlash(__('El parte de taller ha sido guardado correctamente', true));
                $this->redirect($this->referer());
            } else {
                $this->Session->setFlash(__('El parte de taller No podido ser guardado', true));
                $this->redirect($this->referer());
            }
        } else {
            $this->data = $this->TareasAlbaranesclientesreparacionesPartestallere->read(null, $id);
        }

        $mecanicos = $this->TareasAlbaranesclientesreparacionesPartestallere->Mecanico->find('list');
        $this->set(compact('mecanicos'));
    }

    function delete($id = null) {
        if (!$id) {
            $this->flashWarnings(__('Id Inválida para el Parte de Taller de la Tarea de Albarán', true));
            $this->redirect($this->referer());
        }
        $id = $this->TareasAlbaranesclientesreparacionesPartestallere->id;
        $upload = $this->TareasAlbaranesclientesreparacionesPartestallere->findById($id);
        $this->FileUpload->RemoveFile($upload['TareasAlbaranesclientesreparacionesPartestallere']['parteescaneado']);
        if ($this->TareasAlbaranesclientesreparacionesPartestallere->delete($id)) {
            $this->Session->setFlash(__('Parte de Taller de la Tarea del Albarán Borrado Correctamente', true));
            $this->redirect($this->referer());
        }

        $this->flashWarnings(__('El Parte de Taller de la Tarea del Albarán NO pudo ser Borrado', true));
        $this->redirect($this->referer());
    }

}

?>