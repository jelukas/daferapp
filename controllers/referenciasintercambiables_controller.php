<?php

class ReferenciasintercambiablesController extends AppController {

    var $name = 'Referenciasintercambiables';
    var $helpers = array('Autocomplete', 'Ajax', 'Javascript');
    var $components = array('RequestHandler');

    function index() {
        $this->Referenciasintercambiable->recursive = 0;
        $this->set('referenciasintercambiables', $this->paginate());
    }

    function view($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Invalid referenciasintercambiable', true));
            $this->redirect(array('action' => 'index'));
        }
        $this->set('referenciasintercambiable', $this->Referenciasintercambiable->read(null, $id));
    }

    function add($articulo_id = null) {
        if (!empty($this->data)) {
            $this->Referenciasintercambiable->create();
            if ($this->Referenciasintercambiable->save($this->data)) {
                $this->Session->setFlash(__('The referenciasintercambiable has been saved', true));
                $this->redirect($this->referer());
            } else {
                $this->Session->setFlash(__('The referenciasintercambiable could not be saved. Please, try again.', true));
                $this->redirect($this->referer());
            }
        }
        $this->set(compact('articulo_id'));
    }

    function edit($id = null) {
        if (!$id && empty($this->data)) {
            $this->Session->setFlash(__('Invalid referenciasintercambiable', true));
            $this->redirect(array('action' => 'index'));
        }
        if (!empty($this->data)) {
            if ($this->Referenciasintercambiable->save($this->data)) {
                $this->Session->setFlash(__('The referenciasintercambiable has been saved', true));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The referenciasintercambiable could not be saved. Please, try again.', true));
            }
        }
        if (empty($this->data)) {
            $this->data = $this->Referenciasintercambiable->read(null, $id);
        }
        $articulos = $this->Referenciasintercambiable->Articulo->find('list');
        $articulorefs = $this->Referenciasintercambiable->Articuloref->find('list');
        $this->set(compact('articulos', 'articulorefs'));
    }

    function delete($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Invalid id for referenciasintercambiable', true));
            $this->redirect($this->referer());
        }
        if ($this->Referenciasintercambiable->delete($id)) {
            $this->Session->setFlash(__('Referenciasintercambiable deleted', true));
            $this->redirect($this->referer());
        }
        $this->Session->setFlash(__('Referenciasintercambiable was not deleted', true));
        $this->redirect($this->referer());
    }

}

?>