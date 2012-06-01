<?php

class ArticulosFacturasproveedoresController extends AppController {

    var $name = 'ArticulosFacturasproveedores';
    var $helpers = array('Autocomplete','Ajax','Javascript'); 
    var $components = array('Session','RequestHandler' );
    
    function index() {
        $this->ArticulosFacturasproveedore->recursive = 0;
        $this->set('articulosFacturasproveedores', $this->paginate());
    }

    function view($id = null) {
        if (!$id) {
            $this->flashWarnings(__('Invalid articulos facturasproveedore', true));
            $this->redirect(array('action' => 'index'));
        }
        $this->set('articulosFacturasproveedore', $this->ArticulosFacturasproveedore->read(null, $id));
    }

    function add($facturasproveedores_id = null) {
        $this->layout = 'ajax';
        if (!empty($this->data)) {
            $this->ArticulosFacturasproveedore->create();
            if ($this->ArticulosFacturasproveedore->save($this->data)) {
                $this->Session->setFlash(__('The articulos facturasproveedore has been saved', true));
                $this->redirect($this->referer());
            } else {
                $this->flashWarnings(__('The articulos facturasproveedore could not be saved. Please, try again.', true));
            }
        }
        $facturasproveedore = $this->ArticulosFacturasproveedore->Facturasproveedore->find('first',array('contain' => array('Albaranesproveedore' => array('Pedidosproveedore' =>'Presupuestosproveedore')),'conditions' => array('Facturasproveedore.id' => $facturasproveedores_id)));
        $this->set(compact('facturasproveedores_id','facturasproveedore'));
    }

    function add_ajax($facturasproveedores_id = null) {
        $this->layout = 'ajax';
        if (!empty($this->data)) {
            $this->ArticulosFacturasproveedore->create();
            if ($this->ArticulosFacturasproveedore->save($this->data)) {
                $this->Session->setFlash(__('The articulos facturasproveedore has been saved', true));
            } else {
                $this->flashWarnings(__('The articulos facturasproveedore could not be saved. Please, try again.', true));
            }
        }
        $facturasproveedore = $this->ArticulosFacturasproveedore->Facturasproveedore->find('first',array('contain' => array('Albaranesproveedore' => array('Pedidosproveedore' =>'Presupuestosproveedore')),'conditions' => array('Facturasproveedore.id' => $facturasproveedores_id)));
        $this->set(compact('facturasproveedores_id','facturasproveedore'));
        $this->render('/articulos_facturasproveedores/add');
    }      
        
    
    function edit($id = null) {
        $this->layout = 'ajax';
        if (!$id && empty($this->data)) {
            $this->flashWarnings(__('Invalid articulos facturasproveedore', true));
            $this->redirect($this->referer());
        }
        if (!empty($this->data)) {
            if ($this->ArticulosFacturasproveedore->save($this->data)) {
                $this->Session->setFlash(__('The articulos facturasproveedore has been saved', true));
                $this->redirect($this->referer());
            } else {
                $this->flashWarnings(__('The articulos facturasproveedore could not be saved. Please, try again.', true));
            }
        }
        if (empty($this->data)) {
            $this->data = $this->ArticulosFacturasproveedore->read(null, $id);
        }
        $articulo = $this->ArticulosFacturasproveedore->read(null, $id);
        $this->set(compact('articulo'));
    }

    function delete($id = null) {
        if (!$id) {
            $this->flashWarnings(__('Invalid id for articulos facturasproveedore', true));
            $this->redirect($this->referer());
        }
        if ($this->ArticulosFacturasproveedore->delete($id)) {
            $this->Session->setFlash(__('Articulos facturasproveedore deleted', true));
            $this->redirect($this->referer());
        }
        $this->flashWarnings(__('Articulos facturasproveedore was not deleted', true));
        $this->redirect($this->referer());
    }

}

?>