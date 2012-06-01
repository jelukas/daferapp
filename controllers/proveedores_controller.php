<?php

class ProveedoresController extends AppController {

    var $name = 'Proveedores';

    function index() {
        $this->Proveedore->recursive = 0;
        $this->set('proveedores', $this->paginate());
    }

    function view($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Proveedor inválido', true));
            $this->redirect(array('action' => 'index'));
        }
        $this->set('proveedore', $this->Proveedore->read(null, $id));
    }

    function add() {
        if (!empty($this->data)) {
            $this->Proveedore->create();
            if ($this->Proveedore->save($this->data)) {
                $this->Session->setFlash(__('El proveedor ha sido salvado correctamente.', true));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('El proveedor no ha podido ser salvado. Por favor, inténtelo de nuevo.', true));
            }
        }
    }

    function edit($id = null) {
        if (!$id && empty($this->data)) {
            $this->Session->setFlash(__('Proveedor inválido', true));
            $this->redirect(array('action' => 'index'));
        }
        if (!empty($this->data)) {
            if ($this->Proveedore->save($this->data)) {
                $this->Session->setFlash(__('El proveedor ha sido salvado correctamente.', true));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('El proveedor no ha podido ser salvado. Por favor, inténtelo de nuevo.', true));
            }
        }
        if (empty($this->data)) {
            $this->data = $this->Proveedore->read(null, $id);
        }
    }

    function delete($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Invalid id for proveedore', true));
            $this->redirect(array('action' => 'index'));
        }
        if ($this->Proveedore->delete($id)) {
            $this->Session->setFlash(__('Proveedor eliminado', true));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('El proveedor no ha podido ser eliminado.', true));
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
        $this->set('proveedores', $this->paginate());
        $this->render();
    }

    function beforeFilter() {
        $this->checkPermissions('Proveedore', $this->params['action']);
    }

//    function autocomplete() {
//        $proveedores = $this->Proveedore->find('all', array(
//            'conditions' => array(
//                'OR' => array(
//                    'Proveedore.nombre LIKE' => $this->params['url']['term'] . '%',
//                    'Proveedore.id LIKE' => $this->params['url']['term'] . '%'
//                )
//            ),
//            'fields' => array('nombre', 'id'),
//            'recursive' => -1,
//                ));
//        $proveedores_array = array();
//        foreach ($proveedores as $proveedore) {
//            $proveedores_array[] = array("id" => $proveedore["Proveedore"]["id"], "value" => $proveedore["Proveedore"]["nombre"]);
//        }
//
//        $this->set('proveedores', $proveedores_array);
//        $this->layout = 'ajax';
//    }

}

?>
