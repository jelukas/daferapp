<?php

class ArticulosTareasController extends AppController {

    var $name = 'ArticulosTareas';
    var $helpers = array('Form', 'Ajax', 'Js', 'Autocomplete');
    var $components = array('RequestHandler', 'Session');

    function index() {
        $this->ArticulosTarea->recursive = 0;
        $this->set('articulosTareas', $this->paginate());
    }

    function view($id = null) {
        if (!$id) {
            $this->flashWarnings(__('Invalid articulos tarea', true));
            $this->redirect(array('action' => 'index'));
        }
        $this->set('articulosTarea', $this->ArticulosTarea->read(null, $id));
    }

    function add($tarea_id) {
        $this->ArticulosTarea->recursive = 1;
        if (!empty($this->data)) {
            $this->ArticulosTarea->create();
            if ($this->ArticulosTarea->save($this->data)) {
                $this->Session->setFlash(__('The articulos tarea has been saved', true));
                $this->redirect($this->referer());
            } else {
                $this->flashWarnings(__('The articulos tarea could not be saved. Please, try again.', true));
                $this->redirect($this->referer());
            }
        }
        $tarea = $this->ArticulosTarea->Tarea->find('first', array('contain' => array('Ordene' => array('Avisostallere' => 'Centrostrabajo')), 'conditions' => array('Tarea.id' => $tarea_id)));
        if (!empty($tarea['Ordene']['Avisostallere']['Centrostrabajo']['descuentomaterial']))
            $descuento = $tarea['Ordene']['Avisostallere']['Centrostrabajo']['descuentomaterial'];
        else
            $descuento = 0;
        $this->set(compact('tarea_id', 'tarea', 'descuento'));
    }

    function edit($id = null) {
        $this->ArticulosTarea->recursive = 1;
        if (!$id && empty($this->data)) {
            $this->flashWarnings(__('Invalid articulos tarea', true));
            $this->redirect($this->referer());
        }
        if (!empty($this->data)) {
            if ($this->ArticulosTarea->save($this->data)) {
                $this->Session->setFlash(__('The articulos tarea has been saved', true));
                $this->redirect($this->referer());
            } else {
                $this->flashWarnings(__('The articulos tarea could not be saved. Please, try again.', true));
                $this->redirect($this->referer());
            }
        }
        if (empty($this->data)) {
            $this->data = $this->ArticulosTarea->read(null, $id);
        }
        $tareas = $this->ArticulosTarea->Tarea->find('list');
        $this->set(compact('articulos', 'tareas'));
    }

    function delete($id = null, $tarea_id = null) {
        if (!$id) {
            $this->flashWarnings(__('Invalid id for articulos tarea', true));
        }
        if ($this->ArticulosTarea->delete($id)) {
            $this->Session->setFlash(__('Articulos tarea deleted', true));
        } else {
            $this->flashWarnings(__('Articulos tarea was not deleted', true));
        }
        if ($tarea_id != null)
            $this->redirect($this->referer());
        else
            $this->redirect($this->referer());
    }

    function add_popup($tarea_id = null) {
        $this->layout = 'ajax';
        $this->ArticulosTarea->recursive = 1;
        if (!empty($this->data)) {
            $this->ArticulosTarea->create();
            if ($this->ArticulosTarea->save($this->data)) {
                $this->Session->setFlash(__('El Articulo para la Tarea ' . $this->data['ArticulosTarea']['tarea_id'] . ' a sido guardado', true));
                $this->redirect(array('controller' => 'tareas', 'action' => 'view', $this->data['ArticulosTarea']['tarea_id']));
            } else {
                $this->flashWarnings(__('El artículo para la Tarea No ha podido ser guardado.', true));
            }
        }
        $this->set('tarea_id', $tarea_id);
    }

}

?>