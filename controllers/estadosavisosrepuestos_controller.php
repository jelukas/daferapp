<?php
class EstadosavisosrepuestosController extends AppController {

	var $name = 'Estadosavisosrepuestos';

	function index() {
		$this->Estadosavisosrepuesto->recursive = 0;
		$this->set('estadosavisosrepuestos', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid estadosavisosrepuesto', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('estadosavisosrepuesto', $this->Estadosavisosrepuesto->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Estadosavisosrepuesto->create();
			if ($this->Estadosavisosrepuesto->save($this->data)) {
				$this->Session->setFlash(__('The estadosavisosrepuesto has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The estadosavisosrepuesto could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid estadosavisosrepuesto', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Estadosavisosrepuesto->save($this->data)) {
				$this->Session->setFlash(__('The estadosavisosrepuesto has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The estadosavisosrepuesto could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Estadosavisosrepuesto->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for estadosavisosrepuesto', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Estadosavisosrepuesto->delete($id)) {
			$this->Session->setFlash(__('Estadosavisosrepuesto deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Estadosavisosrepuesto was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>