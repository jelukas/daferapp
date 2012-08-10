<?php

class OtrosrepuestosController extends AppController {

    var $name = 'Otrosrepuestos';
    var $helpers = array('Form', 'Ajax', 'Js', 'Autocomplete');
    var $components = array('RequestHandler', 'Session');

    function index() {
        $this->Otrosrepuesto->recursive = 0;
        $this->set('otrosrepuestos', $this->paginate());
    }

    function view($id = null) {
        if (!$id) {
            $this->flashWarnings(__('Invalid otrosrepuesto', true));
            $this->redirect($this->referer());
        }
        $this->set('otrosrepuesto', $this->Otrosrepuesto->read(null, $id));
    }

    function add($maquina_id = null) {
        if (!empty($this->data)) {
            $this->Otrosrepuesto->create();
            if ($this->Otrosrepuesto->save($this->data)) {
                $this->Session->setFlash(__('The otrosrepuesto has been saved', true));
                $this->redirect($this->referer());
            } else {
                $this->flashWarnings(__('The otrosrepuesto could not be saved. Please, try again.', true));
                $this->redirect($this->referer());
            }
        }
        $this->set(compact('maquina_id'));
    }
    function add_ajax($maquina_id = null) {
        if (!empty($this->data)) {
            $this->Otrosrepuesto->create();
            if ($this->Otrosrepuesto->save($this->data)) {
                $this->Session->setFlash(__('The otrosrepuesto has been saved', true));
            } else {
                $this->flashWarnings(__('The otrosrepuesto could not be saved. Please, try again.', true));
            }
        }
        $this->set(compact('maquina_id'));
        $this->render('add');
    }

    function edit($id = null) {
        if (!$id && empty($this->data)) {
            $this->flashWarnings(__('Invalid otrosrepuesto', true));
            $this->redirect($this->referer());
        }
        if (!empty($this->data)) {
            if ($this->Otrosrepuesto->save($this->data)) {
                $this->Session->setFlash(__('The otrosrepuesto has been saved', true));
                $this->redirect($this->referer());
            } else {
                $this->flashWarnings(__('The otrosrepuesto could not be saved. Please, try again.', true));
            }
        }
        if (empty($this->data)) {
            $this->data = $this->Otrosrepuesto->read(null, $id);
        }
        $articulos = $this->Otrosrepuesto->Articulo->find('list');
        $maquinas = $this->Otrosrepuesto->Maquina->find('list');
        $this->set(compact('articulos', 'maquinas'));
    }

    function delete($id = null) {
        if (!$id) {
            $this->flashWarnings(__('Invalid id for otrosrepuesto', true));
            $this->redirect($this->referer());
        }
        if ($this->Otrosrepuesto->delete($id)) {
            $this->Session->setFlash(__('Otrosrepuesto deleted', true));
            $this->redirect($this->referer());
        }
        $this->flashWarnings(__('Otrosrepuesto was not deleted', true));
        $this->redirect($this->referer());
    }

}

?>