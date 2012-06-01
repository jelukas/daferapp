<?php

class CodigospostalesController extends AppController {

    var $name = 'Codigospostales';

    function index() {
        $this->Codigospostale->recursive = 0;
        $this->set('codigospostales', $this->paginate());
    }

    function view($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('código postal inválido', true));
            $this->redirect(array('action' => 'index'));
        }
        $this->set('codigospostale', $this->Codigospostale->read(null, $id));
    }

    function add() {
        if (!empty($this->data)) {
            $this->Codigospostale->create();
            if ($this->Codigospostale->save($this->data)) {
                $this->Session->setFlash(__('El código postal ha sido salvado correctamente', true));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('El código postal no ha podido ser salvado. Por favor, inténtelo de nuevo.', true));
            }
        }
    }

    function edit($id = null) {
        if (!$id && empty($this->data)) {
            $this->Session->setFlash(__('código postal inválido', true));
            $this->redirect(array('action' => 'index'));
        }
        if (!empty($this->data)) {
            if ($this->Codigospostale->save($this->data)) {
                $this->Session->setFlash(__('El código postal ha sido salvado correctamente', true));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('El código postal no ha podido ser salvado. Por favor, inténtelo de nuevo.', true));
            }
        }
        if (empty($this->data)) {
            $this->data = $this->Codigospostale->read(null, $id);
        }
    }

    function delete($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Id de código postal no válida', true));
            $this->redirect(array('action' => 'index'));
        }
        if ($this->Codigospostale->delete($id)) {
            $this->Session->setFlash(__('Código postal eliminado', true));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('El código postal no ha podido ser eliminado.', true));
        $this->redirect(array('action' => 'index'));
    }

    function beforeFilter() {
        $this->checkPermissions('Codigospostale', $this->params['action']);
    }

}

?>
