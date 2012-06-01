<?php

class ArticulosController extends AppController {

    var $name = 'Articulos';
    var $helpers = array('Html', 'Ajax', 'Javascript');

    function index() {
        $this->Articulo->recursive = 0;
        $this->set('articulos', $this->paginate());
    }

    function view($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Artículo no válido', true));
            $this->redirect(array('action' => 'index'));
        }
        $this->set('articulo', $this->Articulo->read(null, $id));
    }

    function add() {
        if (!empty($this->data)) {
            $this->Articulo->create();
            if ($this->Articulo->save($this->data)) {
                $this->Session->setFlash(__('The articulo has been saved', true));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The articulo could not be saved. Please, try again.', true));
            }
        }
        $familias = $this->Articulo->Familia->find('list');
        $this->set(compact('familias'));
        $almacenes = $this->Articulo->Almacene->find('list');
        $this->set(compact('almacenes'));
        $proveedores = $this->Articulo->Proveedore->find('list');
        $this->set(compact('proveedores'));
        $referenciasintercambiables = $this->Articulo->Referenciasintercambiable->find('list');
        $this->set(compact('referenciasintercambiables'));
    }

    function edit($id = null) {
        if (!$id && empty($this->data)) {
            $this->Session->setFlash(__('Invalid articulo', true));
            $this->redirect(array('action' => 'index'));
        }
        if (!empty($this->data)) {
            if ($this->Articulo->save($this->data)) {
                $this->Session->setFlash(__('The articulo has been saved', true));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The articulo could not be saved. Please, try again.', true));
            }
        }
        if (empty($this->data)) {
            $this->data = $this->Articulo->read(null, $id);
        }
        $familias = $this->Articulo->Familia->find('list');
        $this->set(compact('familias'));
        $almacenes = $this->Articulo->Almacene->find('list');
        $this->set(compact('almacenes'));
        $proveedores = $this->Articulo->Proveedore->find('list');
        $this->set(compact('proveedores'));
        $referenciasintercambiables = $this->Articulo->Referenciasintercambiable->find('list');
        $this->set(compact('referenciasintercambiables'));
    }

    function delete($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('ID no válida', true));
            $this->redirect(array('action' => 'index'));
        }
        if ($this->Articulo->delete($id)) {
            $this->Session->setFlash(__('Artículo borrado', true));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('El artículo no ha podido ser eliminado', true));
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
        if (isset($_SESSION["last_search"])) {
            $this->set('articulos', $this->Articulo->find('all', $_SESSION["last_search"]));
        } else {
            $this->set('articulos', $this->Articulo->find('all', array('limit' => 200)));
        }
        unset($_SESSION["last_search"]);
        $this->render();
    }

    function beforeFilter() {
        $this->checkPermissions('Articulo', $this->params['action']);
    }

    function auto_complete() {
        if (!empty($this->params['pass'][0])) {
            $articulos = $this->Articulo->find('all', array(
                'conditions' => array(
                    'Articulo.almacene_id' => $this->params['pass'][0],
                    'OR' => array(
                        'Articulo.nombre LIKE' => $this->params['url']['term'] . '%',
                        'Articulo.ref LIKE' => $this->params['url']['term'] . '%'
                    ),
                ),
                'fields' => array('nombre', 'ref', 'id', 'precio_sin_iva'),
                'recursive' => -1,
                    ));
        } else {
            $articulos = $this->Articulo->find('all', array(
                'conditions' => array(
                    'OR' => array(
                        'Articulo.nombre LIKE' => $this->params['url']['term'] . '%',
                        'Articulo.ref LIKE' => $this->params['url']['term'] . '%'
                    ),
                ),
                'fields' => array('nombre', 'ref', 'id', 'precio_sin_iva'),
                'recursive' => -1,
                    ));
        }
        $articulos_array = array();
        foreach ($articulos as $articulo) {
            $articulos_array[] = array("id" => $articulo["Articulo"]["id"], "value" => $articulo["Articulo"]["nombre"], "ref" => $articulo["Articulo"]["ref"], "precio_sin_iva" => $articulo["Articulo"]["precio_sin_iva"]);
        }

        $this->set('articulos', $articulos_array);
        $this->layout = 'ajax';
    }

}

?>
