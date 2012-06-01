<?php

class TareaspresupuestoclientesOtrosserviciosController extends AppController {

    var $name = 'TareaspresupuestoclientesOtrosservicios';

    function index() {
        $this->TareaspresupuestoclientesOtrosservicio->recursive = 0;
        $this->set('tareaspresupuestoclientesOtrosservicios', $this->paginate());
    }

    function view($id = null) {
        if (!$id) {
            $this->flashWarnings(__('Otros Servicios Inválido', true));
            $this->redirect(array('action' => 'index'));
        }
        $this->set('tareaspresupuestoclientesOtrosservicio', $this->TareaspresupuestoclientesOtrosservicio->read(null, $id));
    }

    function add($tarea_id) {
        if (!empty($this->data)) {
            $this->TareaspresupuestoclientesOtrosservicio->create();
            if ($this->TareaspresupuestoclientesOtrosservicio->save($this->data)) {
                $this->Session->setFlash(__('The tareaspresupuestoclientes otrosservicio has been saved', true));
                $this->redirect($this->referer());
            } else {
                $this->flashWarnings(__('The tareaspresupuestoclientes otrosservicio could not be saved. Please, try again.', true));
            }
        }
        $tarea = $this->TareaspresupuestoclientesOtrosservicio->Tareaspresupuestocliente->find('first', array('contain' => array('Presupuestoscliente' => array('Avisosrepuesto' => 'Centrostrabajo', 'Ordene' => array('Avisostallere' => 'Centrostrabajo'), 'Avisostallere' => 'Centrostrabajo')), 'conditions' => array('Tareaspresupuestocliente.id' => $tarea_id)));
        $otrosservicios = array();
        $otrosservicios['desplazamiento'] = 0;
        $otrosservicios['manoobradesplazamiento'] = 0;
        $otrosservicios['kilometraje'] = 0;
        $otrosservicios['dietas'] = 0;
        if (!empty($tarea['Presupuestoscliente']['Avisosrepuesto']['Centrostrabajo']['id'])) {
            $otrosservicios['desplazamiento'] = $tarea['Presupuestoscliente']['Avisosrepuesto']['Centrostrabajo']['preciodesplazamiento'];
            $otrosservicios['manoobradesplazamiento'] = $tarea['Presupuestoscliente']['Avisosrepuesto']['Centrostrabajo']['preciomanoobra'];
            $otrosservicios['kilometraje'] = $tarea['Presupuestoscliente']['Avisosrepuesto']['Centrostrabajo']['kilometraje'];
            $otrosservicios['dietas'] = $tarea['Presupuestoscliente']['Avisosrepuesto']['Centrostrabajo']['dietas'];
        } elseif (!empty($tarea['Presupuestoscliente']['Avisostallere']['Centrostrabajo']['id'])) {
            $otrosservicios['desplazamiento'] = $tarea['Presupuestoscliente']['Avisostallere']['Centrostrabajo']['preciodesplazamiento'];
            $otrosservicios['manoobradesplazamiento'] = $tarea['Presupuestoscliente']['Avisostallere']['Centrostrabajo']['preciomanoobra'];
            $otrosservicios['kilometraje'] = $tarea['Presupuestoscliente']['Avisostallere']['Centrostrabajo']['kilometraje'];
            $otrosservicios['dietas'] = $tarea['Presupuestoscliente']['Avisostallere']['Centrostrabajo']['dietas'];
        } elseif (!empty($tarea['Presupuestoscliente']['Ordene']['Avisostallere']['Centrostrabajo']['id'])) {
            $otrosservicios['desplazamiento'] = $tarea['Presupuestoscliente']['Ordene']['Avisostallere']['Centrostrabajo']['preciodesplazamiento'];
            $otrosservicios['manoobradesplazamiento'] = $tarea['Presupuestoscliente']['Ordene']['Avisostallere']['Centrostrabajo']['preciomanoobra'];
            $otrosservicios['kilometraje'] = $tarea['Presupuestoscliente']['Ordene']['Avisostallere']['Centrostrabajo']['kilometraje'];
            $otrosservicios['dietas'] = $tarea['Presupuestoscliente']['Ordene']['Avisostallere']['Centrostrabajo']['dietas'];
        }
        $otrosservicios['total'] = $otrosservicios['desplazamiento'] + $otrosservicios['manoobradesplazamiento'] + $otrosservicios['kilometraje'] + $otrosservicios['dietas'];
        $this->set(compact('tarea_id', 'otrosservicios'));
    }

    function edit($id = null) {
        if (!$id && empty($this->data)) {
            $this->flashWarnings(__('Invalid tareaspresupuestoclientes otrosservicio', true));
            $this->redirect($this->referer());
        }
        if (!empty($this->data)) {
            if ($this->TareaspresupuestoclientesOtrosservicio->save($this->data)) {
                $this->Session->setFlash(__('The tareaspresupuestoclientes otrosservicio has been saved', true));
                $this->redirect($this->referer());
            } else {
                $this->flashWarnings(__('The tareaspresupuestoclientes otrosservicio could not be saved. Please, try again.', true));
            }
        }
        if (empty($this->data)) {
            $this->data = $this->TareaspresupuestoclientesOtrosservicio->read(null, $id);
        }
        $tareaspresupuestoclientes = $this->TareaspresupuestoclientesOtrosservicio->Tareaspresupuestocliente->find('list');
        $this->set(compact('tareaspresupuestoclientes'));
    }

    function delete($id = null) {
        if (!$id) {
            $this->flashWarnings(__('Invalid id for tareaspresupuestoclientes otrosservicio', true));
            $this->redirect($this->referer());
        }
        if ($this->TareaspresupuestoclientesOtrosservicio->delete($id)) {
            $this->Session->setFlash(__('Tareaspresupuestoclientes otrosservicio deleted', true));
            $this->redirect($this->referer());
        }
        $this->flashWarnings(__('Tareaspresupuestoclientes otrosservicio was not deleted', true));
        $this->redirect($this->referer());
    }

}

?>