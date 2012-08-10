<?php

class ArticulosAvisosrepuestosController extends AppController {

    var $name = 'ArticulosAvisosrepuestos';
    var $helpers = array('Autocomplete','Ajax','Javascript'); 
    var $components = array('Session','RequestHandler' );
    
    function index() {
        $this->ArticulosAvisosrepuesto->recursive = 0;
        $this->set('articulosAvisosrepuestos', $this->paginate());
    }

    function view($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Invalid articulos avisosrepuesto', true));
            $this->redirect(array('action' => 'index'));
        }
        $this->set('articulosAvisosrepuesto', $this->ArticulosAvisosrepuesto->read(null, $id));
    }

    function add() {
        if (!empty($this->data)) {
            $this->ArticulosAvisosrepuesto->create();
            if ($this->ArticulosAvisosrepuesto->save($this->data)) {
                $this->Session->setFlash(__('The articulos avisosrepuesto has been saved', true));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The articulos avisosrepuesto could not be saved. Please, try again.', true));
            }
        }
        $articulos = $this->ArticulosAvisosrepuesto->Articulo->find('list');
        $avisosrepuestos = $this->ArticulosAvisosrepuesto->Avisosrepuesto->find('list');
        $this->set(compact('articulos', 'avisosrepuestos'));
    }
 

    function edit($id = null) {
        if (!$id && empty($this->data)) {
            $this->Session->setFlash(__('Invalid articulos avisosrepuesto', true));
            $this->redirect(array('action' => 'index'));
        }
        if (!empty($this->data)) {
            if ($this->ArticulosAvisosrepuesto->save($this->data)) {
                $this->Session->setFlash(__('The articulos avisosrepuesto has been saved', true));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The articulos avisosrepuesto could not be saved. Please, try again.', true));
            }
        }
        if (empty($this->data)) {
            $this->data = $this->ArticulosAvisosrepuesto->read(null, $id);
        }
        $articulos = $this->ArticulosAvisosrepuesto->Articulo->find('list');
        $avisosrepuestos = $this->ArticulosAvisosrepuesto->Avisosrepuesto->find('list');
        $this->set(compact('articulos', 'avisosrepuestos'));
    }

    function delete($id = null, $avisosrepuesto_id = null) {
        if (!$id) {
            $this->flashWarnings(__('Invalid id for articulos avisosrepuesto', true));
            $this->redirect($this->referer());
        }
        if ($this->ArticulosAvisosrepuesto->delete($id)) {
            $this->Session->setFlash(__('Articulos avisosrepuesto deleted', true));
            if (empty($avisosrepuesto_id))
                $this->redirect($this->referer());
            else
                $this->redirect($this->referer());
        }
        $this->flashWarnings(__('Articulos avisosrepuesto was not deleted', true));
        $this->redirect($this->referer());
    }
    function add_popup($avisosrepuesto_id = null) {
        $this->layout = 'ajax';
        $this->ArticulosAvisosrepuesto->recursive = 1;
        if (!empty($this->data)) {
            $this->ArticulosAvisosrepuesto->create();
            if ($this->ArticulosAvisosrepuesto->save($this->data)) {
                $this->Session->setFlash(__('El Articulo para el Aviso de Repuestos '.$this->data['ArticulosAvisosrepuesto']['avisosrepuesto_id'].' a sido guardado', true));
                $this->redirect(array('controller' => 'avisosrepuestos','action'=>'view',$this->data['ArticulosAvisosrepuesto']['avisosrepuesto_id']));
            } else {
                $this->flashWarnings(__('El artículo para el Aviso de Repuestos No ha podido ser guardado.', true));
            }
        }
        $avisosrepuesto = $this->ArticulosAvisosrepuesto->Avisosrepuesto->find('first',array('conditions' => array('Avisosrepuesto.id' => $avisosrepuesto_id)));
        $this->set(compact('avisosrepuesto_id', 'avisosrepuesto'));
    }
    function add_ajax($avisosrepuesto_id = null) {
        $this->layout = 'ajax';
        $this->ArticulosAvisosrepuesto->recursive = 1;
        if (!empty($this->data)) {
            $this->ArticulosAvisosrepuesto->create();
            if ($this->ArticulosAvisosrepuesto->save($this->data)) {
                $this->Session->setFlash(__('El Articulo para el Aviso de Repuestos '.$this->data['ArticulosAvisosrepuesto']['avisosrepuesto_id'].' a sido guardado', true));
            } else {
                $this->flashWarnings(__('El artículo para el Aviso de Repuestos No ha podido ser guardado.', true));
            }
        }
        $avisosrepuesto = $this->ArticulosAvisosrepuesto->Avisosrepuesto->find('first',array('conditions' => array('Avisosrepuesto.id' => $avisosrepuesto_id)));
        $this->set(compact('avisosrepuesto_id', 'avisosrepuesto'));
        $this->render('/articulos_avisosrepuestos/add_popup');
    }

}

?>
