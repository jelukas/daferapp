<?php

class TiposivasController extends AppController {

    var $name = 'Tiposivas';

    function index() {
        $this->Tiposiva->recursive = 0;
        $this->set('tiposivas', $this->paginate());
    }

    function view($id = null) {
        if (!$id) {
            $this->flashWarnings(__('Invalid tiposiva', true));
            $this->redirect($this->referer());
        }
        $this->set('tiposiva', $this->Tiposiva->read(null, $id));
    }

    function add() {
        if (!empty($this->data)) {
            $this->Tiposiva->create();
            if ($this->Tiposiva->save($this->data)) {
                $this->Session->setFlash(__('The tiposiva has been saved', true));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->flashWarnings(__('The tiposiva could not be saved. Please, try again.', true));
                $this->redirect($this->referer());
            }
        }
    }

    function edit($id = null) {
        if (!$id && empty($this->data)) {
            $this->flashWarnings(__('Invalid tiposiva', true));
            $this->redirect($this->referer());
            ;
        }
        if (!empty($this->data)) {
            if ($this->Tiposiva->save($this->data)) {
                $this->Session->setFlash(__('The tiposiva has been saved', true));
                $this->redirect(array('action' => 'view', $this->Tiposiva->id));
            } else {
                $this->flashWarnings(__('The tiposiva could not be saved. Please, try again.', true));
                $this->redirect($this->referer());
            }
        }
        if (empty($this->data)) {
            $this->data = $this->Tiposiva->read(null, $id);
        }
    }

    function delete($id = null) {
        if (!$id) {
            $this->flashWarnings(__('Invalid id for tiposiva', true));
            $this->redirect($this->referer());
        }
        if ($this->Tiposiva->delete($id)) {
            $this->Session->setFlash(__('Tiposiva deleted', true));
            $this->redirect(array('action' => 'index'));
        }
        $this->flashWarnings(__('Tiposiva was not deleted', true));
        $this->redirect($this->referer());
    }

}

?>