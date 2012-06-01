<?php

class ManodeobrasController extends AppController {

    var $name = 'Manodeobras';

    function index() {
        $this->Manodeobra->recursive = 0;
        $this->set('manodeobras', $this->paginate());
    }

    function view($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Invalid manodeobra', true));
            $this->redirect(array('action' => 'index'));
        }
        $this->set('manodeobra', $this->Manodeobra->read(null, $id));
    }

    function add($tareaspresupuestocliente_id) {
        $this->layout = 'ajax';
        if (!empty($this->data)) {
            $this->Manodeobra->create();
            if ($this->Manodeobra->save($this->data)) {
                $this->Session->setFlash(__('La Mano de Obra ha sido Añadida'), true);
                $this->redirect($this->referer());
            } else {
                $this->flashWarnings(__('No se puedo añadir la mano de obra a la Tarea. Inténtalo de nuevo.', true));
            }
        }
        $this->set(compact('tareaspresupuestocliente_id'));
    }

    function edit($id = null) {
        if (!$id && empty($this->data)) {
            $this->Session->setFlash(__('Invalid manodeobra', true));
            $this->redirect(array('action' => 'index'));
        }
        if (!empty($this->data)) {
            if ($this->Manodeobra->save($this->data)) {
                $this->Session->setFlash(__('The manodeobra has been saved', true));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The manodeobra could not be saved. Please, try again.', true));
            }
        }
        if (empty($this->data)) {
            $this->data = $this->Manodeobra->read(null, $id);
        }
        $tareaspresupuestoclientes = $this->Manodeobra->Tareaspresupuestocliente->find('list');
        $this->set(compact('tareaspresupuestoclientes'));
    }

    function delete($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Id inválido para la Mano de Obra para la Tarea', true));
            $this->redirect(array('action' => 'index'));
        }
        if ($this->Manodeobra->delete($id)) {
            $this->Session->setFlash(__('Mano de obra  para la Tarea borrada correctamente', true));
            $this->redirect($this->referer());
        }
        $this->Session->setFlash(__('No se pudo borrar la Mano de Obra para la Tarea', true));
        $this->redirect(array('action' => 'index'));
    }

}

?>