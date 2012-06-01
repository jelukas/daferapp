<?php
class EstadosavisosController extends AppController {

	var $name = 'Estadosavisos';

	function index() {
		$this->Estadosaviso->recursive = 0;
		$this->set('estadosavisos', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid estadosaviso', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('estadosaviso', $this->Estadosaviso->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Estadosaviso->create();
			if ($this->Estadosaviso->save($this->data)) {
				$this->Session->setFlash(__('The estadosaviso has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The estadosaviso could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid estadosaviso', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Estadosaviso->save($this->data)) {
				$this->Session->setFlash(__('The estadosaviso has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The estadosaviso could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Estadosaviso->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for estadosaviso', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Estadosaviso->delete($id)) {
			$this->Session->setFlash(__('Estadosaviso deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Estadosaviso was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>