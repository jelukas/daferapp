<?php

class FamiliasController extends AppController {

    var $name = 'Familias';

    function index() {
        $this->Familia->recursive = 0;
        $this->set('familias', $this->paginate());
    }

    function view($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Familia inválida', true));
            $this->redirect(array('action' => 'index'));
        }
        $this->set('familia', $this->Familia->read(null, $id));
    }

    function add() {
        if (!empty($this->data)) {
            $this->Familia->create();
            if ($this->Familia->save($this->data)) {
                $this->Session->setFlash(__('La familia ha sido salvada correctamente.', true));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('La familia no ha podido ser salvada. Por favor, inténtelo de nuevo.', true));
            }
        }
    }

    function edit($id = null) {
        if (!$id && empty($this->data)) {
            $this->Session->setFlash(__('Familia inválida', true));
            $this->redirect(array('action' => 'index'));
        }
        if (!empty($this->data)) {
            if ($this->Familia->save($this->data)) {
                $this->Session->setFlash(__('La familia ha sido salvada correctamente', true));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('La familia no ha podido ser salvada. Por favor, inténtelo de nuevo.', true));
            }
        }
        if (empty($this->data)) {
            $this->data = $this->Familia->read(null, $id);
        }
    }

    function delete($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('ID de familia inválida', true));
            $this->redirect(array('action' => 'index'));
        }
        if ($this->Familia->delete($id)) {
            $this->Session->setFlash(__('Familia eliminada', true));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('La familia no ha podido ser eliminada.', true));
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
        $this->checkPermissions('Familia', $this->params['action']);
    }

}

?>
