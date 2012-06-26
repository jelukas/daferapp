<?php

class CuentasbancariasController extends AppController {

    var $name = 'Cuentasbancarias';
    var $components = array('Session', 'RequestHandler');

    function index() {
        $this->Cuentasbancaria->recursive = 0;
        $this->set('cuentasbancarias', $this->paginate());
    }

    function view($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Invalid cuentasbancaria', true));
            $this->redirect(array('action' => 'index'));
        }
        $this->set('cuentasbancaria', $this->Cuentasbancaria->read(null, $id));
    }

    function add($cliente_id = null, $proveedore_id = null) {
        if (!empty($this->data)) {
            $this->Cuentasbancaria->create();
            if ($this->Cuentasbancaria->save($this->data)) {
                $this->flashWarnings(__('The cuentasbancaria has been saved', true));
                $this->redirect($this->referer());
            } else {
                $this->flashWarnings(__('The cuentasbancaria could not be saved. Please, try again.', true));
                $this->redirect($this->referer());
            }
        }
        $this->set(compact('cliente_id', 'proveedore_id'));
    }

    function edit($id = null) {
        if (!$id && empty($this->data)) {
            $this->Session->setFlash(__('Invalid cuentasbancaria', true));
            $this->redirect($this->referer());
        }
        if (!empty($this->data)) {
            if ($this->Cuentasbancaria->save($this->data)) {
                $this->Session->setFlash(__('The cuentasbancaria has been saved', true));
                $this->redirect($this->referer());
            } else {
                $this->Session->setFlash(__('The cuentasbancaria could not be saved. Please, try again.', true));
                $this->redirect($this->referer());
            }
        }
        if (empty($this->data)) {
            $this->data = $this->Cuentasbancaria->read(null, $id);
        }
    }

    function delete($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Invalid id for cuentasbancaria', true));
            $this->redirect(array('action' => 'index'));
        }
        if ($this->Cuentasbancaria->delete($id)) {
            $this->Session->setFlash(__('Cuentasbancaria deleted', true));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Cuentasbancaria was not deleted', true));
        $this->redirect(array('action' => 'index'));
    }

}

?>