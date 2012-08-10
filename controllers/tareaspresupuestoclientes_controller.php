<?php

class TareaspresupuestoclientesController extends AppController {

    var $name = 'Tareaspresupuestoclientes';

    function index() {
        $this->Tareaspresupuestocliente->recursive = 0;
        $this->set('tareaspresupuestoclientes', $this->paginate());
    }

    function view($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Invalid tareaspresupuestocliente', true));
            $this->redirect(array('action' => 'index'));
        }
        $this->set('tareaspresupuestocliente', $this->Tareaspresupuestocliente->read(null, $id));
    }

    function add($presupuestoscliente_id) {
        $this->layout = 'ajax';
        if (!empty($this->data)) {
            $this->Tareaspresupuestocliente->create();
            if ($this->Tareaspresupuestocliente->save($this->data)) {
                $this->Session->setFlash(__('The tareaspresupuestocliente has been saved', true));
                $this->redirect($this->referer());
            } else {
                $this->flashWarnings(__('The tareaspresupuestocliente could not be saved. Please, try again.', true));
            }
        }
        $this->set(compact('presupuestoscliente_id'));
    }

    function edit($id = null) {
        if (!$id && empty($this->data)) {
            $this->flashWarnings(__('Invalid tareaspresupuestocliente', true));
            $this->redirect(array('action' => 'index'));
        }
        if (!empty($this->data)) {
            if ($this->Tareaspresupuestocliente->save($this->data)) {
                $this->Session->setFlash(__('La Tarea Presupuestada ha sido Guardada', true));
                $this->redirect(array('controller'=>'presupuestosclientes','action' => 'view',$this->data['Tareaspresupuestocliente']['presupuestoscliente_id']));
            } else {
                $this->flashWarnings(__('La Tarea Presupuestada no ha podido ser guardada. Por favor, inténtalo de nuevo.', true));
                $this->redirect($this->referer());
            }
        }
        if (empty($this->data)) {
            $this->data = $this->Tareaspresupuestocliente->read(null, $id);
        }
        $presupuestosclientes = $this->Tareaspresupuestocliente->Presupuestoscliente->find('list');
        $this->set(compact('presupuestosclientes'));
    }

    function delete($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Invalid id for tareaspresupuestocliente', true));
            $this->redirect(array('action' => 'index'));
        }
        if ($this->Tareaspresupuestocliente->delete($id)) {
            $this->Session->setFlash(__('Tareaspresupuestocliente deleted', true));
            $this->redirect($this->referer());
        }
        $this->Session->setFlash(__('Tareaspresupuestocliente was not deleted', true));
        $this->redirect(array('action' => 'index'));
    }

}

?>