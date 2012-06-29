<?php

class ComercialesController extends AppController {

    var $name = 'Comerciales';

    function index() {
        $this->Comerciale->recursive = 0;
        $this->set('comerciales', $this->paginate());
    }

    function view($id = null) {
        if (!$id) {
            $this->flashWarnings(__('Comercial inválido', true));
            $this->redirect($this->referer());
        }
        $this->set('comerciale', $this->Comerciale->read(null, $id));
    }

    function add() {
        if (!empty($this->data)) {
            $this->Comerciale->create();
            if ($this->Comerciale->save($this->data)) {
                $this->Session->setFlash(__('El comercial ha sido salvado correctamente', true));
                $this->redirect(array('action' => 'view',$this->Comerciale->id));
            } else {
                $this->flashWarnings(__('El comercial no ha podido ser salvado. Por favor, inténtelo de nuevo.', true));
            }
        }
    }

    function edit($id = null) {
        if (!$id && empty($this->data)) {
            $this->flashWarnings(__('comercial inválido', true));
            $this->redirect($this->referer());
        }
        if (!empty($this->data)) {
            if ($this->Comerciale->save($this->data)) {
                $this->Session->setFlash(__('El comercial ha sido salvado correctamente', true));
                $this->redirect($this->referer());
            } else {
                $this->flashWarnings(__('El comercial no ha podido ser salvado. Por favor, inténtelo de nuevo.', true));
            }
        }
        if (empty($this->data)) {
            $this->data = $this->Comerciale->read(null, $id);
        }
    }

    function delete($id = null) {
        if (!$id) {
            $this->flashWarnings(__('Id de comercial no válida', true));
            $this->redirect($this->referer());
        }
        if ($this->Comerciale->delete($id)) {
            $this->Session->setFlash(__('Comercial eliminado', true));
            $this->redirect(array('action' => 'index'));
        }
        $this->flashWarnings(__('El comercial no ha podido ser eliminado.', true));
        $this->redirect($this->referer());
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
        $this->set('comerciales', $this->paginate());
        $this->render();
    }

    function beforeFilter() {
        $this->checkPermissions('Comerciale', $this->params['action']);
    }

}

?>
