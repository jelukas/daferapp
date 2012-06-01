<?php

class TareasalbaranesclientesOtrosserviciosController extends AppController {

    var $name = 'TareasalbaranesclientesOtrosservicios';

    function index() {
        $this->TareasalbaranesclientesOtrosservicio->recursive = 0;
        $this->set('tareasalbaranesclientesOtrosservicios', $this->paginate());
    }

    function view($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Invalid tareasalbaranesclientes otrosservicio', true));
            $this->redirect($this->referer());
        }
        $this->set('tareasalbaranesclientesOtrosservicio', $this->TareasalbaranesclientesOtrosservicio->read(null, $id));
    }

    function add($tarea_id = null) {
        if (!empty($this->data)) {
            $this->TareasalbaranesclientesOtrosservicio->create();
            if ($this->TareasalbaranesclientesOtrosservicio->save($this->data)) {
                $this->Session->setFlash(__('The tareasalbaranesclientes otrosservicio has been saved', true));
                $this->redirect($this->referer());
            } else {
                $this->Session->setFlash(__('The tareasalbaranesclientes otrosservicio could not be saved. Please, try again.', true));
            }
        }
        $tarea = $this->TareasalbaranesclientesOtrosservicio->Tareasalbaranescliente->find('first', array('contain' => array('Albaranescliente' => array('Pedidoscliente' => array('Presupuestoscliente' => array('Avisosrepuesto' => 'Centrostrabajo', 'Ordene' => array('Avisostallere' => 'Centrostrabajo'), 'Avisostallere' => 'Centrostrabajo')))), 'conditions' => array('Tareasalbaranescliente.id' => $tarea_id)));
        $otrosservicios = array();
        debug($tarea);

        $otrosservicios['desplazamiento'] = 0;
        $otrosservicios['manoobradesplazamiento'] = 0;
        $otrosservicios['kilometraje'] = 0;
        $otrosservicios['dietas'] = 0;
        if (!empty($tarea['Albaranescliente']['Pedidoscliente']['Presupuestoscliente']['Avisosrepuesto']['Centrostrabajo']['id'])) {
            $otrosservicios['desplazamiento'] = $tarea['Albaranescliente']['Pedidoscliente']['Presupuestoscliente']['Avisosrepuesto']['Centrostrabajo']['preciodesplazamiento'];
            $otrosservicios['manoobradesplazamiento'] = $tarea['Albaranescliente']['Pedidoscliente']['Presupuestoscliente']['Avisosrepuesto']['Centrostrabajo']['preciomanoobra'];
            $otrosservicios['kilometraje'] = $tarea['Albaranescliente']['Pedidoscliente']['Presupuestoscliente']['Avisosrepuesto']['Centrostrabajo']['kilometraje'];
            $otrosservicios['dietas'] = $tarea['Albaranescliente']['Pedidoscliente']['Presupuestoscliente']['Avisosrepuesto']['Centrostrabajo']['dietas'];
        } elseif (!empty($tarea['Albaranescliente']['Pedidoscliente']['Presupuestoscliente']['Avisostallere']['Centrostrabajo']['id'])) {
            $otrosservicios['desplazamiento'] = $tarea['Albaranescliente']['Pedidoscliente']['Presupuestoscliente']['Avisostallere']['Centrostrabajo']['preciodesplazamiento'];
            $otrosservicios['manoobradesplazamiento'] = $tarea['Albaranescliente']['Pedidoscliente']['Presupuestoscliente']['Avisostallere']['Centrostrabajo']['preciomanoobra'];
            $otrosservicios['kilometraje'] = $tarea['Albaranescliente']['Pedidoscliente']['Presupuestoscliente']['Avisostallere']['Centrostrabajo']['kilometraje'];
            $otrosservicios['dietas'] = $tarea['Albaranescliente']['Pedidoscliente']['Presupuestoscliente']['Avisostallere']['Centrostrabajo']['dietas'];
        } elseif (!empty($tarea['Albaranescliente']['Pedidoscliente']['Presupuestoscliente']['Ordene']['Avisostallere']['Centrostrabajo']['id'])) {
            $otrosservicios['desplazamiento'] = $tarea['Albaranescliente']['Pedidoscliente']['Presupuestoscliente']['Ordene']['Avisostallere']['Centrostrabajo']['preciodesplazamiento'];
            $otrosservicios['manoobradesplazamiento'] = $tarea['Albaranescliente']['Pedidoscliente']['Presupuestoscliente']['Ordene']['Avisostallere']['Centrostrabajo']['preciomanoobra'];
            $otrosservicios['kilometraje'] = $tarea['Albaranescliente']['Pedidoscliente']['Presupuestoscliente']['Ordene']['Avisostallere']['Centrostrabajo']['kilometraje'];
            $otrosservicios['dietas'] = $tarea['Albaranescliente']['Pedidoscliente']['Presupuestoscliente']['Ordene']['Avisostallere']['Centrostrabajo']['dietas'];
        }
        $otrosservicios['total'] = $otrosservicios['desplazamiento'] + $otrosservicios['manoobradesplazamiento'] + $otrosservicios['kilometraje'] + $otrosservicios['dietas'];
        $this->set(compact('tarea_id', 'otrosservicios'));
    }

    function edit($id = null) {
        if (!$id && empty($this->data)) {
            $this->Session->setFlash(__('Invalid tareasalbaranesclientes otrosservicio', true));
            $this->redirect(array('action' => 'index'));
        }
        if (!empty($this->data)) {
            if ($this->TareasalbaranesclientesOtrosservicio->save($this->data)) {
                $this->Session->setFlash(__('The tareasalbaranesclientes otrosservicio has been saved', true));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The tareasalbaranesclientes otrosservicio could not be saved. Please, try again.', true));
            }
        }
        if (empty($this->data)) {
            $this->data = $this->TareasalbaranesclientesOtrosservicio->read(null, $id);
        }
        $tareasalbaranesclientes = $this->TareasalbaranesclientesOtrosservicio->Tareasalbaranescliente->find('list');
        $this->set(compact('tareasalbaranesclientes'));
    }

    function delete($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Invalid id for tareasalbaranesclientes otrosservicio', true));
            $this->redirect(array('action' => 'index'));
        }
        if ($this->TareasalbaranesclientesOtrosservicio->delete($id)) {
            $this->Session->setFlash(__('Tareasalbaranesclientes otrosservicio deleted', true));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Tareasalbaranesclientes otrosservicio was not deleted', true));
        $this->redirect(array('action' => 'index'));
    }

}

?>