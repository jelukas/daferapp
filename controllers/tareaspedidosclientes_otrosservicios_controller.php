<?php

class TareaspedidosclientesOtrosserviciosController extends AppController {

    var $name = 'TareaspedidosclientesOtrosservicios';

    function index() {
        $this->TareaspedidosclientesOtrosservicio->recursive = 0;
        $this->set('tareaspedidosclientesOtrosservicios', $this->paginate());
    }

    function view($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Invalid tareaspedidosclientes otrosservicio', true));
            $this->redirect(array('action' => 'index'));
        }
        $this->set('tareaspedidosclientesOtrosservicio', $this->TareaspedidosclientesOtrosservicio->read(null, $id));
    }

    function add($tarea_id = null) {
        if (!empty($this->data)) {
            $this->TareaspedidosclientesOtrosservicio->create();
            if ($this->TareaspedidosclientesOtrosservicio->save($this->data)) {
                $this->Session->setFlash(__('Se han guardado correctamente otros conceptos', true));
                $this->redirect($this->referer());
            } else {
                $this->flashWarnings(__('No se han podido guardar correctamente otros conceptos', true));
            }
        }
        $tarea = $this->TareaspedidosclientesOtrosservicio->Tareaspedidoscliente->find('first', array('contain' => array('Pedidoscliente' => array('Presupuestoscliente' => array('Centrostrabajo', 'Cliente'))), 'conditions' => array('Tareaspedidoscliente.id' => $tarea_id)));
        if (!empty($tarea['Pedidoscliente']['Presupuestoscliente']['centrostrabajo_id'])) {
            $this->set('centrostrabajo', $tarea['Pedidoscliente']['Presupuestoscliente']['Centrostrabajo']);
        }
        $this->set(compact('tarea_id'));
    }

    function edit($id = null) {
        if (!$id && empty($this->data)) {
            $this->Session->setFlash(__('Invalid tareaspedidosclientes otrosservicio', true));
            $this->redirect($this->referer());
        }
        if (!empty($this->data)) {
            if ($this->TareaspedidosclientesOtrosservicio->save($this->data)) {
                $this->Session->setFlash(__('The tareaspedidosclientes otrosservicio has been saved', true));
                $this->redirect($this->referer());
            } else {
                $this->Session->setFlash(__('The tareaspedidosclientes otrosservicio could not be saved. Please, try again.', true));
                $this->redirect($this->referer());
            }
        }
        if (empty($this->data)) {
            $this->data = $this->TareaspedidosclientesOtrosservicio->read(null, $id);
        }
        $tareaspedidosclientes = $this->TareaspedidosclientesOtrosservicio->Tareaspedidoscliente->find('list');
        $this->set(compact('tareaspedidosclientes'));
    }

    function delete($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Invalid id for tareaspedidosclientes otrosservicio', true));
        }
        if ($this->TareaspedidosclientesOtrosservicio->delete($id)) {
            $this->Session->setFlash(__('Tareaspedidosclientes otrosservicio deleted', true));
        }
        $this->Session->setFlash(__('Tareaspedidosclientes otrosservicio was not deleted', true));
        $this->redirect($this->referer());
    }

}

?>