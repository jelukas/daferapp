<?php

class ArticulosReferenciasintercambiablesController extends AppController {

    var $name = 'ArticulosReferenciasintercambiables';

    function index() {
        $this->ArticulosReferenciasintercambiable->recursive = 0;
        $this->set('articulosReferenciasintercambiables', $this->paginate());
    }

    function view($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Invalid articulos referenciasintercambiable', true));
            $this->redirect(array('action' => 'index'));
        }
        $this->set('articulosReferenciasintercambiable', $this->ArticulosReferenciasintercambiable->read(null, $id));
    }

    function add() {
        if (!empty($this->data)) {
            $this->ArticulosReferenciasintercambiable->create();
            if ($this->ArticulosReferenciasintercambiable->save($this->data)) {
                $this->Session->setFlash(__('The articulos referenciasintercambiable has been saved', true));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The articulos referenciasintercambiable could not be saved. Please, try again.', true));
            }
        }
        $articulos = $this->ArticulosReferenciasintercambiable->Articulo->find('list');
        $referenciasintercambiables = $this->ArticulosReferenciasintercambiable->Referenciasintercambiable->find('list');
        $this->set(compact('articulos', 'referenciasintercambiables'));
    }

    function edit($id = null) {
        if (!$id && empty($this->data)) {
            $this->Session->setFlash(__('Invalid articulos referenciasintercambiable', true));
            $this->redirect(array('action' => 'index'));
        }
        if (!empty($this->data)) {
            if ($this->ArticulosReferenciasintercambiable->save($this->data)) {
                $this->Session->setFlash(__('The articulos referenciasintercambiable has been saved', true));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The articulos referenciasintercambiable could not be saved. Please, try again.', true));
            }
        }
        if (empty($this->data)) {
            $this->data = $this->ArticulosReferenciasintercambiable->read(null, $id);
        }
        $articulos = $this->ArticulosReferenciasintercambiable->Articulo->find('list');
        $referenciasintercambiables = $this->ArticulosReferenciasintercambiable->Referenciasintercambiable->find('list');
        $this->set(compact('articulos', 'referenciasintercambiables'));
    }

    function delete($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Invalid id for articulos referenciasintercambiable', true));
            $this->redirect(array('action' => 'index'));
        }
        if ($this->ArticulosReferenciasintercambiable->delete($id)) {
            $this->Session->setFlash(__('Articulos referenciasintercambiable deleted', true));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Articulos referenciasintercambiable was not deleted', true));
        $this->redirect(array('action' => 'index'));
    }

    function beforeFilter() {
        $this->checkPermissions('ArticulosReferenciasintercambiable', $this->params['action']);
    }

}

?>
