<?php
class EstadosavisostalleresController extends AppController {

	var $name = 'Estadosavisostalleres';

	function index() {
		$this->Estadosavisostallere->recursive = 0;
		$this->set('estadosavisostalleres', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid estadosavisostallere', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('estadosavisostallere', $this->Estadosavisostallere->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Estadosavisostallere->create();
			if ($this->Estadosavisostallere->save($this->data)) {
				$this->Session->setFlash(__('The estadosavisostallere has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The estadosavisostallere could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid estadosavisostallere', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Estadosavisostallere->save($this->data)) {
				$this->Session->setFlash(__('The estadosavisostallere has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The estadosavisostallere could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Estadosavisostallere->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for estadosavisostallere', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Estadosavisostallere->delete($id)) {
			$this->Session->setFlash(__('Estadosavisostallere deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Estadosavisostallere was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>