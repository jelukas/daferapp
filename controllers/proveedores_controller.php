<?php

class ProveedoresController extends AppController {

    var $name = 'Proveedores';
    var $helpers = array('Autocomplete');

    function index() {
        $this->Proveedore->recursive = 0;
        $this->set('proveedores', $this->paginate());
    }

    function view($id = null) {
        if (!$id) {
            $this->flashWarnings(__('Proveedor inválido', true));
            $this->redirect($this->referer());
        }
        $this->set('proveedore', $this->Proveedore->read(null, $id));
    }

    function add() {
        if (!empty($this->data)) {
            $this->Proveedore->create();
            if ($this->Proveedore->saveAll($this->data)) {
                $this->Session->setFlash(__('El proveedor ha sido salvado correctamente.', true));
                $this->redirect(array('action'=>'view',$this->Proveedore->id));
            } else {
                $this->flashWarnings(__('El proveedor no ha podido ser salvado. Por favor, inténtelo de nuevo.', true));
            }
        }
        $tiposivas = $this->Proveedore->Tiposiva->find('list');
        $this->set(compact('tiposivas'));
    }

    function edit($id = null) {
        if (!$id && empty($this->data)) {
            $this->flashWarnings(__('Proveedor inválido', true));
            $this->redirect($this->referer());
        }
        if (!empty($this->data)) {
            if ($this->Proveedore->saveAll($this->data)) {
                $this->Session->setFlash(__('El proveedor ha sido salvado correctamente.', true));
                $this->redirect($this->referer());
            } else {
                $msg = 'El proveedor no ha podido ser salvado. Por favor, inténtelo de nuevo.';
                $errors = $this->Proveedore->invalidFields();
                if(!empty($errors['Cuentasbancaria']))
                    $msg .= '<br/>Revisa los datos de la cuenta bancaria. Rellena todos los campos obligatorios';
                $this->flashWarnings(__($msg, true));
                $this->redirect($this->referer());
            }
        }
        if (empty($this->data)) {
            $this->data = $this->Proveedore->read(null, $id);
            $tiposivas = $this->Proveedore->Tiposiva->find('list');
            $this->set(compact('tiposivas'));
        }
    }

    function delete($id = null) {
        if (!$id) {
            $this->flashWarnings(__('Invalid id for proveedore', true));
            $this->redirect($this->referer());
        }
        if ($this->Proveedore->delete($id)) {
            $this->Session->setFlash(__('Proveedor eliminado', true));
            $this->redirect(array('action' => 'index'));
        }
        $this->flashWarnings(__('El proveedor no ha podido ser eliminado.', true));
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
        $this->set('proveedores', $this->paginate());
        $this->render();
    }

    function beforeFilter() {
        $this->checkPermissions('Proveedore', $this->params['action']);
    }

}

?>
