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
                $this->Session->setFlash(__('Los Servicios para la tarea del Pedido de Venta han sido guardados', true));
                $this->redirect($this->referer());
            } else {
                $this->flashWarnings(__('Los Servicios para la tarea del Pedido de Venta No han sido guardados. Por favor, prueba de nuevo.', true));
            }
        }
        $tarea = $this->TareaspedidosclientesOtrosservicio->Tareaspedidoscliente->find('first', array('contain' => array('Pedidoscliente' => array('Presupuestoscliente' => array('Avisosrepuesto' => 'Centrostrabajo', 'Ordene' => array('Avisostallere' => 'Centrostrabajo'), 'Avisostallere' => 'Centrostrabajo'))), 'conditions' => array('Tareaspedidoscliente.id' => $tarea_id)));
        $otrosservicios = array();
                debug($tarea);

        $otrosservicios['desplazamiento'] = 0;
        $otrosservicios['manoobradesplazamiento'] = 0;
        $otrosservicios['kilometraje'] = 0;
        $otrosservicios['dietas'] = 0;
        if (!empty($tarea['Pedidoscliente']['Presupuestoscliente']['Avisosrepuesto']['Centrostrabajo']['id'])) {
            $otrosservicios['desplazamiento'] = $tarea['Pedidoscliente']['Presupuestoscliente']['Avisosrepuesto']['Centrostrabajo']['preciodesplazamiento'];
            $otrosservicios['manoobradesplazamiento'] = $tarea['Pedidoscliente']['Presupuestoscliente']['Avisosrepuesto']['Centrostrabajo']['preciomanoobra'];
            $otrosservicios['kilometraje'] = $tarea['Pedidoscliente']['Presupuestoscliente']['Avisosrepuesto']['Centrostrabajo']['kilometraje'];
            $otrosservicios['dietas'] = $tarea['Pedidoscliente']['Presupuestoscliente']['Avisosrepuesto']['Centrostrabajo']['dietas'];
        } elseif (!empty($tarea['Pedidoscliente']['Presupuestoscliente']['Avisostallere']['Centrostrabajo']['id'])) {
            $otrosservicios['desplazamiento'] = $tarea['Pedidoscliente']['Presupuestoscliente']['Avisostallere']['Centrostrabajo']['preciodesplazamiento'];
            $otrosservicios['manoobradesplazamiento'] = $tarea['Pedidoscliente']['Presupuestoscliente']['Avisostallere']['Centrostrabajo']['preciomanoobra'];
            $otrosservicios['kilometraje'] = $tarea['Pedidoscliente']['Presupuestoscliente']['Avisostallere']['Centrostrabajo']['kilometraje'];
            $otrosservicios['dietas'] = $tarea['Pedidoscliente']['Presupuestoscliente']['Avisostallere']['Centrostrabajo']['dietas'];
        } elseif (!empty($tarea['Pedidoscliente']['Presupuestoscliente']['Ordene']['Avisostallere']['Centrostrabajo']['id'])) {
            $otrosservicios['desplazamiento'] = $tarea['Pedidoscliente']['Presupuestoscliente']['Ordene']['Avisostallere']['Centrostrabajo']['preciodesplazamiento'];
            $otrosservicios['manoobradesplazamiento'] = $tarea['Pedidoscliente']['Presupuestoscliente']['Ordene']['Avisostallere']['Centrostrabajo']['preciomanoobra'];
            $otrosservicios['kilometraje'] = $tarea['Pedidoscliente']['Presupuestoscliente']['Ordene']['Avisostallere']['Centrostrabajo']['kilometraje'];
            $otrosservicios['dietas'] = $tarea['Pedidoscliente']['Presupuestoscliente']['Ordene']['Avisostallere']['Centrostrabajo']['dietas'];
        }
        $otrosservicios['total'] = $otrosservicios['desplazamiento'] + $otrosservicios['manoobradesplazamiento'] + $otrosservicios['kilometraje'] + $otrosservicios['dietas'];
        $this->set(compact('tarea_id', 'otrosservicios'));
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