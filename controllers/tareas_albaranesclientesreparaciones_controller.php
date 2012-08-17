<?php

class TareasAlbaranesclientesreparacionesController extends AppController {

    var $name = 'TareasAlbaranesclientesreparaciones';

    function add($albaranesclientesreparacione_id = null ) {
        if (!empty($this->data)) {
            $this->TareasAlbaranesclientesreparacione->create();
            if ($this->TareasAlbaranesclientesreparacione->save($this->data)) {
                $id = $this->TareasAlbaranesclientesreparacione->id;
                $this->Session->setFlash(__('La Tarea del Albarán de Reparación ha sido guardada', true));
                $this->redirect($this->referer());
            } else {
                $this->flashWarnings(__('La Tarea del Albarán de Reparación no ha podido ser guardada. Vuelva a intentarlo', true));
                $this->redirect($this->referer());
            }
        }
        $this->set(compact('albaranesclientesreparacione_id'));
    }

    function edit($id = null) {
        if (!$id && empty($this->data)) {
            $this->flashWarnings(__('Tarea del Albarán de Reparación inválida', true));
            $this->redirect(array('action' => 'index'));
        }
        if (!empty($this->data)) {
            if ($this->TareasAlbaranesclientesreparacione->saveAll($this->data)) {
                $this->Session->setFlash(__('La Tarea del Albarán de Reparación ha sido guardada', true));
                $this->redirect($this->referer());
            } else {
                $this->flashWarnings(__('La Tarea del Albarán de Reparación no ha podido ser guardada. Intentalo de nuevo.', true));
                $this->redirect($this->referer());
            }
        }
        if (empty($this->data)) {
            if (!$this->data = $this->TareasAlbaranesclientesreparacione->read(null, $id)) {
                $this->flashWarnings(__('Tarea del Albarán de Reparación inválida', true));
                $this->redirect(array('action' => 'index'));
            };
        }
    }

    function delete($id = null) {
        if (!$id) {
            $this->flashWarnings(__('Id incorrecta de Tarea de Albarán de Reparación', true));
            $this->redirect($this->referer());
        }
        if ($this->TareasAlbaranesclientesreparacione->delete($id)) {
            $this->Session->setFlash(__('Tarea del Albarán de Reparación borrada correctamente', true));
            $this->redirect($this->referer());
        }
        $this->flashWarnings(__('La Tarea del Albarán de Reparación no puedo ser borrada' . pr($this->TareasAlbaranesclientesreparacione->invalidFields()), true));
        $this->redirect($this->referer());
    }

}

?>