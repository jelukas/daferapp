<?php

class ManodeobrasTareasalbaranesclientesController extends AppController {

    var $name = 'ManodeobrasTareasalbaranesclientes';

    function index() {
        $this->ManodeobrasTareasalbaranescliente->recursive = 0;
        $this->set('manodeobrasTareasalbaranesclientes', $this->paginate());
    }

    function view($id = null) {
        if (!$id) {
            $this->flashWarnings(__('Invalid manodeobras tareasalbaranescliente', true));
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
                $this->flashWarnings(__('The manodeobras tareasalbaranescliente could not be saved. Please, try again.', true));
                $this->redirect($this->referer());
            }
        }
        $tarea = $this->ManodeobrasTareasalbaranescliente->Tareasalbaranescliente->find('first', array('contain' => array('Albaranescliente' => array('Centrostrabajo', 'Cliente')), 'conditions' => array('Tareasalbaranescliente.id' => $tareasalbaranescliente_id)));
        if (!empty($tarea['Albaranescliente']['Centrostrabajo']))
            $this->set('centrostrabajo', $tarea['Albaranescliente']['Centrostrabajo']);
        $this->set('tareasalbaranescliente', $tarea['Tareasalbaranescliente']);
        $this->set(compact('tareasalbaranescliente_id'));
    }

    function edit($id = null) {
        if (!$id && empty($this->data)) {
            $this->flashWarnings(__('Invalid manodeobras tareasalbaranescliente', true));
            $this->redirect($this->referer());
        }
        if (!empty($this->data)) {
            if ($this->ManodeobrasTareasalbaranescliente->save($this->data)) {
                $this->Session->setFlash(__('The manodeobras tareasalbaranescliente has been saved', true));
                $this->redirect($this->referer());
            } else {
                $this->flashWarnings(__('The manodeobras tareasalbaranescliente could not be saved. Please, try again.', true));
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
            $this->flashWarnings(__('Invalid id for manodeobras tareasalbaranescliente', true));
        }
        if ($this->ManodeobrasTareasalbaranescliente->delete($id)) {
            $this->Session->setFlash(__('Manodeobras tareasalbaranescliente deleted', true));
        }
        $this->flashWarnings(__('Manodeobras tareasalbaranescliente was not deleted', true));
        $this->redirect($this->referer());
    }

}

?>