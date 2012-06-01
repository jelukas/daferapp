<?php

class ComercialesProveedoresController extends AppController {

    var $name = 'ComercialesProveedores';

    function index() {
        $this->ComercialesProveedore->recursive = 0;
        $this->set('comercialesProveedores', $this->paginate());
    }

    function view($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Comercial proveedor inválido', true));
            $this->redirect(array('action' => 'index'));
        }
        $this->set('comercialesProveedore', $this->ComercialesProveedore->read(null, $id));
    }

    function add() {
        if (!empty($this->data)) {
            $this->ComercialesProveedore->create();
            if ($this->ComercialesProveedore->save($this->data)) {
                $this->Session->setFlash(__('El comercial proveedor ha sido salvado correctamente.', true));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('El comercial proveedor no ha podido ser salvado. Por favor, inténtelo de nuevo.', true));
            }
        }
        $proveedores = $this->ComercialesProveedore->Proveedore->find('list');
        $this->set(compact('proveedores'));
    }

    function edit($id = null) {
        if (!$id && empty($this->data)) {
            $this->Session->setFlash(__('Comercial proveedor inválido', true));
            $this->redirect(array('action' => 'index'));
        }
        if (!empty($this->data)) {
            if ($this->ComercialesProveedore->save($this->data)) {
                $this->Session->setFlash(__('El comercial proveedor ha sido salvado correctamente', true));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('El comercial proveedor no ha podido ser salvado. Por favor, inténtelo de nuevo.', true));
            }
        }
        if (empty($this->data)) {
            $this->data = $this->ComercialesProveedore->read(null, $id);
        }
        $proveedores = $this->ComercialesProveedore->Proveedore->find('list');
        $this->set(compact('proveedores'));
    }

    function delete($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Id de comercial proveedor no válida', true));
            $this->redirect(array('action' => 'index'));
        }
        if ($this->ComercialesProveedore->delete($id)) {
            $this->Session->setFlash(__('Comercial proveedor eliminado', true));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('El comercial proveedor no ha podido ser eliminado.', true));
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
        $this->set('comercialesProveedores', $this->paginate());
        $this->render();
    }

    function beforeFilter() {
        $this->checkPermissions('ComercialesProveedore', $this->params['action']);
    }

}

?>
