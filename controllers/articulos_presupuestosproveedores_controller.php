<?php

class ArticulosPresupuestosproveedoresController extends AppController {

    var $name = 'ArticulosPresupuestosproveedores';
    var $helpers = array('Autocomplete', 'Ajax', 'Javascript');
    var $components = array('Session', 'RequestHandler');

    function index() {
        $this->ArticulosPresupuestosproveedore->recursive = 0;
        $this->set('articulosPresupuestosproveedores', $this->paginate());
    }

    function view($id = null) {
        if (!$id) {
            $this->flashWarnings(__('Invalid articulos presupuestosproveedore', true));
            $this->redirect(array('action' => 'index'));
        }
        $this->set('articulosPresupuestosproveedore', $this->ArticulosPresupuestosproveedore->read(null, $id));
    }

    function add($presupuestosproveedore_id = null) {
        if (!empty($this->data)) {
            $this->ArticulosPresupuestosproveedore->create();
            if ($this->ArticulosPresupuestosproveedore->save($this->data)) {
                $this->Session->setFlash(__('The articulos presupuestosproveedore has been saved', true));
                if (empty($this->data['ArticulosPresupuestosproveedore']['presupuestosproveedore_id']))
                    $this->redirect(array('action' => 'index'));
                else
                    $this->redirect(array('controller' => 'presupuestosproveedores', 'action' => 'edit', $this->data['ArticulosPresupuestosproveedore']['presupuestosproveedore_id']));
            } else {
                $this->flashWarnings(__('The articulos presupuestosproveedore could not be saved. Please, try again.', true));
            }
        }
        $presupuestosproveedore = $this->ArticulosPresupuestosproveedore->Presupuestosproveedore->find('first', array('contain' => '', 'conditions' => array('Presupuestosproveedore.id' => $presupuestosproveedore_id)));
        if (!empty($presupuestosproveedore['Presupuestosproveedore']['ordene_id'])) {
            $tareas = $this->ArticulosPresupuestosproveedore->Presupuestosproveedore->Ordene->Tarea->find('list', array('conditions' => array('Tarea.ordene_id' => $presupuestosproveedore['Presupuestosproveedore']['ordene_id'])));
            $this->set('tareas', $tareas);
        }

        $this->set(compact('presupuestosproveedore', 'presupuestosproveedore_id'));
    }

    function add_ajax($presupuestosproveedore_id = null) {
        $this->layout = 'ajax';
        if (!empty($this->data)) {
            $this->ArticulosPresupuestosproveedore->create();
            if ($this->ArticulosPresupuestosproveedore->save($this->data)) {
                $this->Session->setFlash(__('The articulos presupuestosproveedore has been saved', true));
            } else {
                $this->flashWarnings(__('The articulos presupuestosproveedore could not be saved. Please, try again.', true));
            }
        }

        $presupuestosproveedore = $this->ArticulosPresupuestosproveedore->Presupuestosproveedore->find('first', array('contain' => '', 'conditions' => array('Presupuestosproveedore.id' => $presupuestosproveedore_id)));
        if (!empty($presupuestosproveedore['Presupuestosproveedore']['ordene_id'])) {
            $tareas = $this->ArticulosPresupuestosproveedore->Presupuestosproveedore->Ordene->Tarea->find('list', array('conditions' => array('Tarea.ordene_id' => $presupuestosproveedore['Presupuestosproveedore']['ordene_id'])));
            $this->set('tareas', $tareas);
        }
        $this->set(compact('presupuestosproveedore_id', 'presupuestosproveedore'));
        $this->render('/articulos_presupuestosproveedores/add');
    }

    function edit($id = null) {
        if (!$id && empty($this->data)) {
            $this->flashWarnings(__('Invalid articulos presupuestosproveedore', true));
            $this->redirect(array('action' => 'index'));
        }
        if (!empty($this->data)) {
            if ($this->ArticulosPresupuestosproveedore->save($this->data)) {
                $this->Session->setFlash(__('The articulos presupuestosproveedore has been saved', true));
                $this->redirect($this->referer());
            } else {
                $this->flashWarnings(__('The articulos presupuestosproveedore could not be saved. Please, try again.', true));
                $this->redirect($this->referer());
            }
        }
        if (empty($this->data)) {
            $this->data = $this->ArticulosPresupuestosproveedore->read(null, $id);
        }
        $presupuestosproveedore = $this->ArticulosPresupuestosproveedore->Presupuestosproveedore->find('first', array('contain' => '', 'conditions' => array('Presupuestosproveedore.id' => $this->data['ArticulosPresupuestosproveedore']['presupuestosproveedore_id'])));
        if (!empty($presupuestosproveedore['Presupuestosproveedore']['ordene_id'])) {
            $tareas = $this->ArticulosPresupuestosproveedore->Presupuestosproveedore->Ordene->Tarea->find('list', array('conditions' => array('Tarea.ordene_id' => $presupuestosproveedore['Presupuestosproveedore']['ordene_id'])));
            $this->set('tareas', $tareas);
        }$articulo = $this->ArticulosPresupuestosproveedore->read(null, $id);
        $this->set(compact('articulo'));
    }

    function delete($id = null, $presupuestosproveedore_id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Invalid id for articulos presupuestosproveedore', true));
            $this->redirect($this->referer());
        }
        if ($this->ArticulosPresupuestosproveedore->delete($id)) {
            $this->Session->setFlash(__('Articulos presupuestosproveedore deleted', true));
            $this->redirect($this->referer());
        }
        $this->flashWarnings(__('Articulos presupuestosproveedore was not deleted', true));
        $this->redirect($this->referer());
    }

}

?>