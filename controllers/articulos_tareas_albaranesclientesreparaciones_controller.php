<?php

class ArticulosTareasAlbaranesclientesreparacionesController extends AppController {

    var $name = 'ArticulosTareasAlbaranesclientesreparaciones';
    var $helpers = array('Form', 'Ajax', 'Js', 'Autocomplete');
    var $components = array('RequestHandler', 'Session');
   
    function add($tareas_albaranesclientesreparacione_id = null) {
        $this->ArticulosTareasAlbaranesclientesreparacione->recursive = 1;
        if (!empty($this->data)) {
            $this->ArticulosTareasAlbaranesclientesreparacione->create();
            if ($this->ArticulosTareasAlbaranesclientesreparacione->save($this->data)) {
                $this->Session->setFlash(__('El Artículo se ha añadido a la Tarea del Albarán', true));
                $this->redirect($this->referer());
            } else {
                $this->flashWarnings(__('El Artículo No ha podido ser añadido a la Tarea del Albarán.', true));
                $this->redirect($this->referer());
            }
        }
        $tarea = $this->ArticulosTareasAlbaranesclientesreparacione->TareasAlbaranesclientesreparacione->find('first', array('contain' => array('Albaranesclientesreparacione' => array('Centrostrabajo')), 'conditions' => array('TareasAlbaranesclientesreparacione.id' => $tareas_albaranesclientesreparacione_id)));
        if (!empty($tarea['Albaranesclientesreparacione']['Centrostrabajo']['descuentomaterial']))
            $descuento = $tarea['Albaranesclientesreparacione']['Centrostrabajo']['descuentomaterial'];
        else
            $descuento = 0;
        $this->set(compact('tareas_albaranesclientesreparacione_id', 'tarea', 'descuento'));
    }

    function delete($id = null, $tarea_id = null) {
        if (!$id) {
            $this->flashWarnings(__('Invalid id for articulos tarea', true));
        }
        if ($this->ArticulosTareasAlbaranesclientesreparacione->delete($id)) {
            $this->Session->setFlash(__('Artículo de la Tarea de Albarán Borrado', true));
        } else {
            $this->flashWarnings(__('No se pudo borrar el Artículo de la Tarea de Albarán', true));
        }
        if ($tarea_id != null)
            $this->redirect($this->referer());
        else
            $this->redirect($this->referer());
    }

}

?>