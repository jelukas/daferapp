<?php

class ArticulosPedidosproveedoresController extends AppController {

    var $name = 'ArticulosPedidosproveedores';
    var $helpers = array('Autocomplete','Ajax','Javascript'); 
    var $components = array('Session','RequestHandler' );
    
    function index() {
        $this->ArticulosPedidosproveedore->recursive = 0;
        $this->set('articulosPedidosproveedores', $this->paginate());
    }

    function view($id = null) {
        if (!$id) {
            $this->flashWarningsh(__('Invalid articulos pedidosproveedore', true));
            $this->redirect(array('action' => 'index'));
        }
        $this->set('articulosPedidosproveedore', $this->ArticulosPedidosproveedore->read(null, $id));
    }

    function add($pedidosproveedore_id = null) {
        $this->layout = 'ajax';
        if (!empty($this->data)) {
            $this->ArticulosPedidosproveedore->create();
            if ($this->ArticulosPedidosproveedore->save($this->data)) {
                $this->Session->setFlash(__('The articulos pedidosproveedore has been saved', true));
                $this->redirect($this->referer());
            } else {
                $this->flashWarnings(__('The articulos pedidosproveedore could not be saved. Please, try again.', true));
            }
        }
        $pedidosproveedore = $this->ArticulosPedidosproveedore->Pedidosproveedore->find('first',array('contain' => 'Presupuestosproveedore','conditions' => array('Pedidosproveedore.id' => $pedidosproveedore_id)));
        $this->set(compact('pedidosproveedore_id','pedidosproveedore'));
    }

    function add_ajax($pedidosproveedore_id = null) {
        $this->layout = 'ajax';
        if (!empty($this->data)) {
            $this->ArticulosPedidosproveedore->create();
            if ($this->ArticulosPedidosproveedore->save($this->data)) {
                $this->Session->setFlash(__('The articulos pedidosproveedore has been saved', true));
            } else {
                $this->flashWarnings(__('The articulos pedidosproveedore could not be saved. Please, try again.', true));
            }
        }
        $pedidosproveedore = $this->ArticulosPedidosproveedore->Pedidosproveedore->find('first',array('contain' => 'Presupuestosproveedore','conditions' => array('Pedidosproveedore.id' => $pedidosproveedore_id)));
        $this->set(compact('pedidosproveedore_id','pedidosproveedore'));
        $this->render('/articulos_pedidosproveedores/add');
    }      
    
    function edit($id = null) {
        if (!$id && empty($this->data)) {
            $this->flashWarnings(__('Invalid articulos pedidosproveedore', true));
            $this->redirect(array('action' => 'index'));
        }
        if (!empty($this->data)) {
            if ($this->ArticulosPedidosproveedore->save($this->data)) {
                $this->Session->setFlash(__('The articulos pedidosproveedore has been saved', true));
                $this->redirect($this->referer());
            } else {
                $this->flashWarnings(__('The articulos pedidosproveedore could not be saved. Please, try again.', true));
            }
        }
        if (empty($this->data)) {
            $this->data = $this->ArticulosPedidosproveedore->read(null, $id);
        }
        $articulo = $this->ArticulosPedidosproveedore->read(null, $id);
        $this->set(compact('articulo'));
    }

    function delete($id = null) {
        if (!$id) {
            $this->flashWarnings(__('Invalid id for articulos pedidosproveedore', true));
            $this->redirect($this->referer());
        }
        if ($this->ArticulosPedidosproveedore->delete($id)) {
            $this->Session->setFlash(__('Articulos pedidosproveedore deleted', true));
            $this->redirect($this->referer());
        }
        $this->flashWarnings(__('Articulos pedidosproveedore was not deleted', true));
        $this->redirect(array('action' => 'index'));
    }

}

?>