<?php

class TareasAlbaranesclientesreparacionesPartesController extends AppController {

    var $name = 'TareasAlbaranesclientesreparacionesPartes';
    var $components = array('RequestHandler', 'FileUpload', 'Session');

    function beforeFilter() {
        parent::beforeFilter();
        if ($this->params['action'] == 'edit' || $this->params['action'] == 'add') {
            $this->FileUpload->fileModel = 'TareasAlbaranesclientesreparacionesParte';
            $this->FileUpload->uploadDir = 'files/parte';
            $this->FileUpload->fields = array('name' => 'file_name', 'type' => 'file_type', 'size' => 'file_size');
        }
    }

    function add($tareas_albaranesclientesreparacione_id = null) {
        if (!empty($this->data)) {
            $this->TareasAlbaranesclientesreparacionesParte->create();
            if ($this->TareasAlbaranesclientesreparacionesParte->save($this->data)) {
                /* Guarda fichero */
                if ($this->FileUpload->finalFile != null) {
                    $this->TareasAlbaranesclientesreparacionesParte->saveField('parteescaneado', $this->FileUpload->finalFile);
                }
                /* Fin de Guardar Fichero */
                $this->Session->setFlash(__('El nuevo Parte en Centro de Trabajo ha sido añadido correctamente' . true));
                $this->redirect($this->referer());
            } else {
                $this->flashWarnings(__('El Parte en Centro de Trabajo No ha podido ser añadido. Vuelva a intentarlo' . true));
                $this->redirect($this->referer());
            }
        }
        $tarea = $this->TareasAlbaranesclientesreparacionesParte->TareasAlbaranesclientesreparacione->find('first', array('contain' => array('Albaranesclientesreparacione' => array('Centrostrabajo')), 'conditions' => array('TareasAlbaranesclientesreparacione.id' => $tareas_albaranesclientesreparacione_id)));
        $mecanicos = $this->TareasAlbaranesclientesreparacionesParte->Mecanico->find('list');
        $this->set(compact('mecanicos', 'tareas_albaranesclientesreparacione_id', 'tarea'));
    }

    function edit($id = null) {
        if (!$id && empty($this->data)) {
            $this->flashWarnings(__('Parte de Centro de Trabajo Inválido', true));
            $this->redirect($this->referer());
        }
        if (!empty($this->data)) {
            if ($this->TareasAlbaranesclientesreparacionesParte->save($this->data)) {
                $id = $this->TareasAlbaranesclientesreparacionesParte->id;
                $upload = $this->TareasAlbaranesclientesreparacionesParte->findById($id);
                if (!empty($this->data['TareasAlbaranesclientesreparacionesParte']['remove_file'])) {
                    $this->FileUpload->RemoveFile($upload['TareasAlbaranesclientesreparacionesParte']['parteescaneado']);
                    $this->TareasAlbaranesclientesreparacionesParte->saveField('parteescaneado', null);
                }
                if ($this->FileUpload->finalFile != null) {
                    $this->FileUpload->RemoveFile($upload['TareasAlbaranesclientesreparacionesParte']['parteescaneado']);
                    $this->TareasAlbaranesclientesreparacionesParte->saveField('parteescaneado', $this->FileUpload->finalFile);
                }
                $this->Session->setFlash(__('El nuevo Parte de Centro de Trabajo ha sido creado correctamente', true));
                $this->redirect($this->referer());
            } else {
                $this->flashWarnings(__('El Parte de Centro de Trabajo No ha podido ser creado. Vuelva a intentarlo', true));
                $this->redirect($this->referer());
            }
        } else {
            $this->data = $this->TareasAlbaranesclientesreparacionesParte->read(null, $id);
        }
        $tarea = $this->TareasAlbaranesclientesreparacionesParte->TareasAlbaranesclientesreparacione->find('first', array('contain' => array('Albaranesclientesreparacione' => array('Centrostrabajo')), 'conditions' => array('TareasAlbaranesclientesreparacione.id' => $this->data['TareasAlbaranesclientesreparacionesParte']['tareas_albaranesclientesreparacione_id'])));
        $mecanicos = $this->TareasAlbaranesclientesreparacionesParte->Mecanico->find('list');
        $this->set(compact('mecanicos'));
    }

    function delete($id = null) {
        if (!$id) {
            $this->flashWarnings(__('Id No válida para el Parte de Centro de Trabajo', true));
            $this->redirect($this->referer());
        }
        if ($this->TareasAlbaranesclientesreparacionesParte->delete($id)) {
            $this->Session->setFlash(__('El Parte de Centro de Trabajo ha sido borrado', true));
            $this->redirect($this->referer());
        }
        $this->flashWarnings(__('El Parte de Centro de Trabajo No pudo ser borrado', true));
        $this->redirect($this->referer());
    }

}

?>