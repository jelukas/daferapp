<?php

class MaterialesTareasalbaranesclientesController extends AppController {

    var $name = 'MaterialesTareasalbaranesclientes';
    var $layout = 'ajax';

    function index() {
        $this->MaterialesTareasalbaranescliente->recursive = 0;
        $this->set('materialesTareasalbaranesclientes', $this->paginate());
    }

    function view($id = null) {
        if (!$id) {
            $this->flashWarnings(__('Invalid materiales tareasalbaranescliente', true));
            $this->redirect($this->referer());
        }
        $this->set('materialesTareasalbaranescliente', $this->MaterialesTareasalbaranescliente->read(null, $id));
    }

    function add($tareasalbaranescliente_id = null) {
        if (!empty($this->data)) {
            $this->MaterialesTareasalbaranescliente->create();
            if ($this->MaterialesTareasalbaranescliente->save($this->data)) {
                $this->Session->setFlash(__('The materiales tareasalbaranescliente has been saved', true));
                $this->redirect($this->referer());
            } else {
                $this->flashWarnings(__('The materiales tareasalbaranescliente could not be saved. Please, try again.', true));
                $this->redirect($this->referer());
            }
        }
        $tareasalbaranescliente = $this->MaterialesTareasalbaranescliente->Tareasalbaranescliente->find('first', array('contain' => array('Albaranescliente' => array('Pedidoscliente' => 'Presupuestoscliente')), 'conditions' => array('Tareasalbaranescliente.id' => $tareasalbaranescliente_id)));
        $this->set(compact('tareasalbaranescliente_id', 'tareasalbaranescliente'));
    }

    function edit($id = null) {
        if (!$id && empty($this->data)) {
            $this->flashWarnings(__('Invalid materiales tareasalbaranescliente', true));
            $this->redirect($this->referer());
        }
        if (!empty($this->data)) {
            if ($this->MaterialesTareasalbaranescliente->save($this->data)) {
                $this->Session->setFlash(__('The materiales tareasalbaranescliente has been saved', true));
                $this->redirect($this->referer());
            } else {
                $this->flashWarnings(__('The materiales tareasalbaranescliente could not be saved. Please, try again.', true));
                $this->redirect($this->referer());
            }
        }
        if (empty($this->data)) {
            $this->data = $this->MaterialesTareasalbaranescliente->read(null, $id);
        }
    }

    function delete($id = null) {
        if (!$id) {
            $this->flashWarnings(__('Invalid id for materiales tareasalbaranescliente', true));
        }
        if ($this->MaterialesTareasalbaranescliente->delete($id)) {
            $this->Session->setFlash(__('Materiales tareasalbaranescliente deleted', true));
        } else {
            $this->flashWarnings(__('Materiales tareasalbaranescliente was not deleted', true));
        }
        $this->redirect($this->referer());
    }

}

?>