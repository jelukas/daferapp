<?php

class ArticulosAlbaranesproveedoresController extends AppController {

    var $name = 'ArticulosAlbaranesproveedores';
    var $helpers = array('Autocomplete', 'Ajax', 'Javascript');
    var $components = array('RequestHandler');

    function index() {
        $this->ArticulosAlbaranesproveedore->recursive = 0;
        $this->set('articulosAlbaranesproveedores', $this->paginate());
    }

    function view($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Invalid articulos albaranesproveedore', true));
            $this->redirect(array('action' => 'index'));
        }
        $this->set('articulosAlbaranesproveedore', $this->ArticulosAlbaranesproveedore->read(null, $id));
    }

    function add($albaranesproveedore_id = null) {
        $this->layout = 'ajax';
        if (!empty($this->data)) {
            $this->ArticulosAlbaranesproveedore->create();
            if ($this->ArticulosAlbaranesproveedore->save($this->data)) {
                $this->Session->setFlash(__('The articulos albaranesproveedore has been saved', true));
                $this->redirect($this->referer());
            } else {
                $this->flashWarnings(__('The articulos albaranesproveedore could not be saved. Please, try again.', true));
            }
        }
        $albaranesproveedore = $this->ArticulosAlbaranesproveedore->Albaranesproveedore->find('first', array('contain' => array('Pedidosproveedore' => 'Presupuestosproveedore'), 'conditions' => array('Albaranesproveedore.id' => $albaranesproveedore_id)));
        if (!empty($albaranesproveedore['Pedidosproveedore']['Presupuestosproveedore']['ordene_id'])) {
            $tareas = $this->ArticulosAlbaranesproveedore->Albaranesproveedore->Pedidosproveedore->Presupuestosproveedore->Ordene->Tarea->find('list', array('conditions' => array('Tarea.ordene_id' => $albaranesproveedore['Pedidosproveedore']['Presupuestosproveedore']['ordene_id'])));
            $this->set('tareas', $tareas);
        }
        $this->set(compact('albaranesproveedore_id', 'albaranesproveedore'));
    }

    function add_ajax($albaranesproveedore_id = null) {
        $this->layout = 'ajax';
        if (!empty($this->data)) {
            $this->ArticulosAlbaranesproveedore->create();
            if ($this->ArticulosAlbaranesproveedore->save($this->data)) {
                $this->Session->setFlash(__('The articulos albaranesproveedore has been saved', true));
            } else {
                $this->flashWarnings(__('The articulos albaranesproveedore could not be saved. Please, try again.', true));
            }
        }
        $albaranesproveedore = $this->ArticulosAlbaranesproveedore->Albaranesproveedore->find('first', array('contain' => array('Pedidosproveedore' => 'Presupuestosproveedore'), 'conditions' => array('Albaranesproveedore.id' => $albaranesproveedore_id)));
        if (!empty($albaranesproveedore['Pedidosproveedore']['Presupuestosproveedore']['ordene_id'])) {
            $tareas = $this->ArticulosAlbaranesproveedore->Albaranesproveedore->Pedidosproveedore->Presupuestosproveedore->Ordene->Tarea->find('list', array('conditions' => array('Tarea.ordene_id' => $albaranesproveedore['Pedidosproveedore']['Presupuestosproveedore']['ordene_id'])));
            $this->set('tareas', $tareas);
        }
        $this->set(compact('albaranesproveedore_id', 'albaranesproveedore'));
        $this->render('/articulos_albaranesproveedores/add');
    }

    function edit($id = null) {
        $this->layout = 'ajax';
        if (!$id && empty($this->data)) {
            $this->Session->setFlash(__('Invalid articulos albaranesproveedore', true));
            $this->redirect($this->referer());
        }
        if (!empty($this->data)) {
            if ($this->ArticulosAlbaranesproveedore->save($this->data)) {
                $this->Session->setFlash(__('The articulos albaranesproveedore has been saved', true));
                $this->redirect($this->referer());
            } else {
                $this->Session->setFlash(__('The articulos albaranesproveedore could not be saved. Please, try again.', true));
            }
        }
        if (empty($this->data)) {
            $this->data = $this->ArticulosAlbaranesproveedore->read(null, $id);
        }
        $albaranesproveedore = $this->ArticulosAlbaranesproveedore->Albaranesproveedore->find('first', array('contain' => array('Pedidosproveedore' => 'Presupuestosproveedore'), 'conditions' => array('Albaranesproveedore.id' => $this->data['ArticulosAlbaranesproveedore']['albaranesproveedore_id'])));
        if (!empty($albaranesproveedore['Pedidosproveedore']['Presupuestosproveedore']['ordene_id'])) {
            $tareas = $this->ArticulosAlbaranesproveedore->Albaranesproveedore->Pedidosproveedore->Presupuestosproveedore->Ordene->Tarea->find('list', array('conditions' => array('Tarea.ordene_id' => $albaranesproveedore['Pedidosproveedore']['Presupuestosproveedore']['ordene_id'])));
            $this->set('tareas', $tareas);
        }
        $articulo = $this->ArticulosAlbaranesproveedore->read(null, $id);
        $this->set(compact('articulo'));
    }

    function delete($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Invalid id for articulos albaranesproveedore', true));
            $this->redirect($this->referer());
        }
        if ($this->ArticulosAlbaranesproveedore->delete($id)) {
            $this->Session->setFlash(__('Articulos albaranesproveedore deleted', true));
            $this->redirect($this->referer());
        }
        $this->Session->setFlash(__('Articulos albaranesproveedore was not deleted', true));
        $this->redirect($this->referer());
    }

}

?>