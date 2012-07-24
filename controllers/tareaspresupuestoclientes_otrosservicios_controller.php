<?php

class TareaspresupuestoclientesOtrosserviciosController extends AppController {

    var $name = 'TareaspresupuestoclientesOtrosservicios';

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
        $tarea = $this->TareaspresupuestoclientesOtrosservicio->Tareaspresupuestocliente->find('first', array('contain' => array('Presupuestoscliente' => array('Centrostrabajo','Cliente')), 'conditions' => array('Tareaspresupuestocliente.id' => $tarea_id)));
        if (!empty($tarea['Presupuestoscliente']['centrostrabajo_id'])) {
            $this->set('centrostrabajo',$tarea['Presupuestoscliente']['Centrostrabajo']);
        } 
        $this->set(compact('tarea_id'));
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