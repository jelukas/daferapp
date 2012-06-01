<?php

class FormapagosController extends AppController {

    var $name = 'Formapagos';

    function index() {
        $this->Formapago->recursive = 0;
        $this->set('formapagos', $this->paginate());
    }

    function view($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Forma de pago inválida', true));
            $this->redirect(array('action' => 'index'));
        }
        $this->set('formapago', $this->Formapago->read(null, $id));
    }

    function add() {
        if (!empty($this->data)) {
            $this->Formapago->create();
            if ($this->Formapago->save($this->data)) {
                $this->Session->setFlash(__('La forma de pago ha sido salvada correctamente.', true));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('La forma de pago no ha podido ser salvada. Por favor, inténtelo de nuevo.', true));
            }
        }
    }

    function edit($id = null) {
        if (!$id && empty($this->data)) {
            $this->Session->setFlash(__('Forma de pago inválida.', true));
            $this->redirect(array('action' => 'index'));
        }
        if (!empty($this->data)) {
            if ($this->Formapago->save($this->data)) {
                $this->Session->setFlash(__('La forma de pago ha sido salvada correctamente', true));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('La forma de pago no ha podido ser salvada. Por favor, inténtelo de nuevo.', true));
            }
        }
        if (empty($this->data)) {
            $this->data = $this->Formapago->read(null, $id);
        }
    }

    function delete($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Id de forma de pago inválida', true));
            $this->redirect(array('action' => 'index'));
        }
        if ($this->Formapago->delete($id)) {
            $this->Session->setFlash(__('Forma de pago eliminada', true));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('La forma de pago no ha podido ser eliminada.', true));
        $this->redirect(array('action' => 'index'));
    }

  
    function search() {
        $this->autoRender = false;
        $search = $this->data[$this->modelClass]['Buscar'];
        $search = explode(' ', $search);
        $cond = "";
        $i = 0;
        foreach ($this->{$this->modelClass}->_schema as $field => $value) {
            //debug($field);
            if ($i > 0) {
                $cond = $cond . " OR ";
            }
            $n = 0;
            foreach ($search as $word) {
                if ($n > 0) {
                    $cond = $cond . " AND ";
                }
                $cond = $cond . " " . $this->modelClass . "." . $field . " LIKE '%" . $word . "%' ";
                $n++;
            }
            $i++;
        }
        $conditions = array('limit' => 500, 'conditions' => $cond);
        $this->paginate = $conditions;
        $_SESSION["last_search"] = $conditions;
        array_shift($_SESSION["last_search"]);
        $this->set(strtolower($this->name), $this->paginate());
        $this->render('index');
    }

    function beforeFilter() {
        $this->checkPermissions('Formapago', $this->params['action']);
    }

}

?>
