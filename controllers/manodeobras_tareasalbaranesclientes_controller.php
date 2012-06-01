<?php

class ManodeobrasTareasalbaranesclientesController extends AppController {

    var $name = 'ManodeobrasTareasalbaranesclientes';

    function index() {
        $this->ManodeobrasTareasalbaranescliente->recursive = 0;
        $this->set('manodeobrasTareasalbaranesclientes', $this->paginate());
    }

    function view($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Invalid manodeobras tareasalbaranescliente', true));
            $this->redirect($this->referer());
        }
        $this->set('manodeobrasTareasalbaranescliente', $this->ManodeobrasTareasalbaranescliente->read(null, $id));
    }

    function add($tareasalbaranescliente_id = null) {
        if (!empty($this->data)) {
            $this->ManodeobrasTareasalbaranescliente->create();
            if ($this->ManodeobrasTareasalbaranescliente->save($this->data)) {
                $this->Session->setFlash(__('The manodeobras tareasalbaranescliente has been saved', true));
                $this->redirect($this->referer());
            } else {
                $this->Session->setFlash(__('The manodeobras tareasalbaranescliente could not be saved. Please, try again.', true));
                $this->redirect($this->referer());
            }
        }
        $this->set(compact('tareasalbaranescliente_id'));
    }

    function edit($id = null) {
        if (!$id && empty($this->data)) {
            $this->Session->setFlash(__('Invalid manodeobras tareasalbaranescliente', true));
            $this->redirect($this->referer());
        }
        if (!empty($this->data)) {
            if ($this->ManodeobrasTareasalbaranescliente->save($this->data)) {
                $this->Session->setFlash(__('The manodeobras tareasalbaranescliente has been saved', true));
                $this->redirect($this->referer());
            } else {
                $this->Session->setFlash(__('The manodeobras tareasalbaranescliente could not be saved. Please, try again.', true));
                $this->redirect($this->referer());
            }
        }
        if (empty($this->data)) {
            $this->data = $this->ManodeobrasTareasalbaranescliente->read(null, $id);
        }
        $tareasalbaranesclientes = $this->ManodeobrasTareasalbaranescliente->Tareasalbaranescliente->find('list');
        $this->set(compact('tareasalbaranesclientes'));
    }

    function delete($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Invalid id for manodeobras tareasalbaranescliente', true));
        }
        if ($this->ManodeobrasTareasalbaranescliente->delete($id)) {
            $this->Session->setFlash(__('Manodeobras tareasalbaranescliente deleted', true));
        }
        $this->Session->setFlash(__('Manodeobras tareasalbaranescliente was not deleted', true));
        $this->redirect($this->referer());
    }

}

?>