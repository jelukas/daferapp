<?php

class MaterialesTareaspedidosclientesController extends AppController {

    var $name = 'MaterialesTareaspedidosclientes';
    var $layout = 'ajax';

    function index() {
        $this->MaterialesTareaspedidoscliente->recursive = 0;
        $this->set('materialesTareaspedidosclientes', $this->paginate());
    }

    function view($id = null) {
        if (!$id) {
            $this->flashWarnings(__('Invalid materiales tareaspedidoscliente', true));
            $this->redirect($this->referer());
        }
        $this->set('materialesTareaspedidoscliente', $this->MaterialesTareaspedidoscliente->read(null, $id));
    }

    function add($tareaspedidoscliente_id) {
        if (!empty($this->data)) {
            $this->MaterialesTareaspedidoscliente->create();
            if ($this->MaterialesTareaspedidoscliente->save($this->data)) {
                $this->Session->setFlash(__('The materiales tareaspedidoscliente has been saved', true));
                $this->redirect($this->referer());
            } else {
                $this->Session->setFlash(__('The materiales tareaspedidoscliente could not be saved. Please, try again.', true));
                $this->redirect($this->referer());
            }
        }
        $tareaspedidoscliente = $this->MaterialesTareaspedidoscliente->Tareaspedidoscliente->find('first',array('contain' =>array('Pedidoscliente' => 'Presupuestoscliente'),'conditions' => array('Tareaspedidoscliente.id' => $tareaspedidoscliente_id)));
        $this->set(compact('tareaspedidoscliente_id','tareaspedidoscliente'));
    }

    function edit($id = null) {
        if (!$id && empty($this->data)) {
            $this->flashWarnings(__('Invalid materiales tareaspedidoscliente', true));
            $this->redirect($this->referer());
        }
        if (!empty($this->data)) {
            if ($this->MaterialesTareaspedidoscliente->save($this->data)) {
                $this->Session->setFlash(__('The materiales tareaspedidoscliente has been saved', true));
                $this->redirect($this->referer());
            } else {
                $this->flashWarnings(__('The materiales tareaspedidoscliente could not be saved. Please, try again.', true));
                $this->redirect($this->referer());
            }
        }
        if (empty($this->data)) {
            $this->data = $this->MaterialesTareaspedidoscliente->read(null, $id);
        }
    }

    function delete($id = null) {
        if (!$id) {
            $this->flashWarnings(__('Invalid id for materiales tareaspedidoscliente', true));
            $this->redirect($this->referer());
        }
        if ($this->MaterialesTareaspedidoscliente->delete($id)) {
            $this->Session->setFlash(__('Materiales tareaspedidoscliente deleted', true));
            $this->redirect($this->referer());$this->redirect($this->referer());
        }
        $this->flashWarnings(__('Materiales tareaspedidoscliente was not deleted', true));
        $this->redirect($this->referer());
    }

}

?>