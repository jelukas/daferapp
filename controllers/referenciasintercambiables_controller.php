<?php
class ReferenciasintercambiablesController extends AppController {

	var $name = 'Referenciasintercambiables';

	function index() {
		$this->Referenciasintercambiable->recursive = 0;
		$this->set('referenciasintercambiables', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid referenciasintercambiable', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('referenciasintercambiable', $this->Referenciasintercambiable->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Referenciasintercambiable->create();
			if ($this->Referenciasintercambiable->save($this->data)) {
				$this->Session->setFlash(__('The referenciasintercambiable has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The referenciasintercambiable could not be saved. Please, try again.', true));
			}
		}
		$articulos = $this->Referenciasintercambiable->Articulo->find('list');
		$this->set(compact('articulos', 'articulos'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid referenciasintercambiable', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Referenciasintercambiable->save($this->data)) {
				$this->Session->setFlash(__('The referenciasintercambiable has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The referenciasintercambiable could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Referenciasintercambiable->read(null, $id);
		}
		$articulos = $this->Referenciasintercambiable->Articulo->find('list');
		$this->set(compact('articulos', 'articulos'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for referenciasintercambiable', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Referenciasintercambiable->delete($id)) {
			$this->Session->setFlash(__('Referenciasintercambiable deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Referenciasintercambiable was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}

	    function autoComplete() {
    //Partial strings will come from the autocomplete field as
    //$this->data['Post']['subject']
    $this->set('referenciasintercambiables', $this->Referenciaintercambiable->find('all', array(
    'conditions' => array(
    'Articulo.nombre LIKE' => $this->data['Articulo']['nombre'].'%'
    ),
    'fields' => array('ref','nombre')
    )));
    $this->layout = 'ajax';
    }
	function beforeFilter()
	{	
		$this->checkPermissions('Referenciasintercambiable',$this->params['action']);
	}

}
?>
