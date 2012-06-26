<?php

class CentrosdecostesController extends AppController {

    var $name = 'Centrosdecostes';

    function index() {
        $this->Centrosdecoste->recursive = 0;
        $this->set('centrosdecostes', $this->paginate());
    }

    function view($id = null) {
        if (!$id) {
            $this->flashWarnings(__('Invalid centrosdecoste', true));
            $this->redirect($this->referer());
        }
        $this->set('centrosdecoste', $this->Centrosdecoste->read(null, $id));
    }

    function add() {
        if (!empty($this->data)) {
            $this->Centrosdecoste->create();
            if ($this->Centrosdecoste->save($this->data)) {
                $this->Session->setFlash(__('The centrosdecoste has been saved', true));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->flashWarnings(__('The centrosdecoste could not be saved. Please, try again.', true));
                $this->redirect($this->referer());
            }
        }
    }

    function edit($id = null) {
        if (!$id && empty($this->data)) {
            $this->flashWarnings(__('Invalid centrosdecoste', true));
            $this->redirect($this->referer());
        }
        if (!empty($this->data)) {
            if ($this->Centrosdecoste->save($this->data)) {
                $this->Session->setFlash(__('The centrosdecoste has been saved', true));
                $this->redirect(array('action' => 'view', $this->Centrosdecoste->id));
            } else {
                $this->flashWarnings(__('The centrosdecoste could not be saved. Please, try again.', true));
                $this->redirect($this->referer());
            }
        }
        if (empty($this->data)) {
            $this->data = $this->Centrosdecoste->read(null, $id);
        }
    }

    function delete($id = null) {
        if (!$id) {
            $this->flashWarnings(__('Invalid id for centrosdecoste', true));
            $this->redirect($this->referer());
        }
        if ($this->Centrosdecoste->delete($id)) {
            $this->Session->setFlash(__('Centrosdecoste deleted', true));
            $this->redirect(array('action' => 'index'));
        }
        $this->flashWarnings(__('Centrosdecoste was not deleted', true));
        $this->redirect($this->referer());
    }

}

?>