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
                $this->Session->setFlash(__('Se han guardado correctamente otros conceptos', true));
                $this->redirect($this->referer());
            } else {
                $this->flashWarnings(__('No se han podido guardar correctamente otros conceptos', true));
            }
        }
        $tarea = $this->TareasalbaranesclientesOtrosservicio->Tareasalbaranescliente->find('first', array('contain' => array('Albaranescliente' => array('Centrostrabajo')), 'conditions' => array('Tareasalbaranescliente.id' => $tarea_id)));
        if (!empty($tarea['Albaranescliente']['centrostrabajo_id'])) {
            $this->set('centrostrabajo', $tarea['Albaranescliente']['Centrostrabajo']);
        }
        $this->set(compact('tarea_id'));
    }

    function edit($id = null) {
        if (!$id && empty($this->data)) {
            $this->Session->setFlash(__('Invalid tareasalbaranesclientes otrosservicio', true));
            $this->redirect($this->referer());
        }
        if (!empty($this->data)) {
            if ($this->TareasalbaranesclientesOtrosservicio->save($this->data)) {
                $this->Session->setFlash(__('The tareasalbaranesclientes otrosservicio has been saved', true));
                $this->redirect($this->referer());
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
            $this->redirect($this->referer());
        }
        if ($this->TareasalbaranesclientesOtrosservicio->delete($id)) {
            $this->Session->setFlash(__('Tareasalbaranesclientes otrosservicio deleted', true));
            $this->redirect($this->referer());
        }
        $this->Session->setFlash(__('Tareasalbaranesclientes otrosservicio was not deleted', true));
        $this->redirect($this->referer());
    }

}

?>