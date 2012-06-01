<?php

class MaterialesController extends AppController {

    var $name = 'Materiales';
    var $helpers = array('Autocomplete','Ajax','Javascript'); 
    var $components = array('Session','RequestHandler' );
    
    function index() {
        $this->Materiale->recursive = 0;
        $this->set('materiales', $this->paginate());
    }

    function view($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Invalid materiale', true));
            $this->redirect(array('action' => 'index'));
        }
        $this->set('materiale', $this->Materiale->read(null, $id));
    }

    /**
     * Debe venir de una tarea siempre
     * @param type $tareaspresupuestocliente_id
     */
    function add($tareaspresupuestocliente_id) {
        $this->layout = 'ajax';
        if (!empty($this->data)) {
            $this->Materiale->create();
            if ($this->Materiale->save($this->data)) {
                $this->Session->setFlash(__('El material ha sido añadido', true));
                $this->redirect($this->referer());
            } else {
                $this->flashWarnings(__('El material no se pudo añadir. Prueba de nuevo.', true));
            }
        }
        $tareaspresupuestocliente = $this->Materiale->Tareaspresupuestocliente->find('first',array('contain' => 'Presupuestoscliente','conditions' => array('Tareaspresupuestocliente.id' => $tareaspresupuestocliente_id)));
        $this->set(compact('tareaspresupuestocliente_id','tareaspresupuestocliente'));
    }

    function edit($id = null) {
        if (!$id && empty($this->data)) {
            $this->Session->setFlash(__('Invalid materiale', true));
            $this->redirect(array('action' => 'index'));
        }
        if (!empty($this->data)) {
            if ($this->Materiale->save($this->data)) {
                $this->Session->setFlash(__('The materiale has been saved', true));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The materiale could not be saved. Please, try again.', true));
            }
        }
        if (empty($this->data)) {
            $this->data = $this->Materiale->read(null, $id);
        }
        $tareaspresupuestoclientes = $this->Materiale->Tareaspresupuestocliente->find('list');
        $articulos = $this->Materiale->Articulo->find('list');
        $this->layout = 'ajax';
        $this->set(compact('tareaspresupuestoclientes', 'articulos'));
    }

    /**
     * Ajax
     * @param int $id 
     */
    function ajax_edit($id = null) {
        $this->Materiale->id = $this->data['Materiale']['id'];
        $this->Materiale->saveField('cantidad_pedir', $this->data['Materiale']['cantidad_pedir']);
        $this->layout = 'ajax';
        $this->set('materiale_id', $this->Materiale->id);
    }

    function delete($id = null) {
        if (!$id) {
            $this->flashWarnings(__('Id no válido para el material', true));
            $this->redirect(array('action' => 'index'));
        }
        if ($this->Materiale->delete($id)) {
            $this->Session->setFlash(__('Material  para la Tarea eliminado', true));
            $this->redirect($this->referer());
        }
        $this->flashWarnings(__('No se pudo eliminar el Material para la Tarea', true));
        $this->redirect(array('action' => 'index'));
    }

}

?>