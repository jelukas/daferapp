<?php

class MecanicosController extends AppController {

    var $name = 'Mecanicos';

    function index() {
        $this->Mecanico->recursive = 0;
        $this->set('mecanicos', $this->paginate());
    }

    function view($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Invalid mecanico', true));
            $this->redirect(array('action' => 'index'));
        }
        $this->Mecanico->recursive = -1;
        $this->set('mecanico', $this->Mecanico->read(null, $id));
    }

    function add() {
        if (!empty($this->data)) {
            $this->Mecanico->create();
            if ($this->Mecanico->save($this->data)) {
                $this->Session->setFlash(__('The mecanico has been saved', true));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The mecanico could not be saved. Please, try again.', true));
            }
        }
    }

    function edit($id = null) {
        if (!$id && empty($this->data)) {
            $this->Session->setFlash(__('Invalid mecanico', true));
            $this->redirect(array('action' => 'index'));
        }
        if (!empty($this->data)) {
            if ($this->Mecanico->save($this->data)) {
                $this->Session->setFlash(__('The mecanico has been saved', true));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The mecanico could not be saved. Please, try again.', true));
            }
        }
        if (empty($this->data)) {
            $this->Mecanico->recursive = -1;
            $this->data = $this->Mecanico->read(null, $id);
        }
    }

    function delete($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Invalid id for mecanico', true));
            $this->redirect(array('action' => 'index'));
        }
        if ($this->Mecanico->delete($id)) {
            $this->Session->setFlash(__('Mecanico deleted', true));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Mecanico was not deleted', true));
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

    function pdf() {
        Configure::write('debug', 0);
        $this->layout = 'pdf'; //this will use the pdf.ctp layout
        // Operaciones que deseamos realizar y variables que pasaremos a la vista.
        $this->set('mecanicos', $this->paginate());
        $this->render();
    }

    function beforeFilter() {
        $this->checkPermissions('Mecanico', $this->params['action']);
    }

}

?>
