<?php
class CuentascontablesController extends AppController {

	var $name = 'Cuentascontables';

	function index() {
		$this->Cuentascontable->recursive = 0;
		$this->set('cuentascontables', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid cuentascontable', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('cuentascontable', $this->Cuentascontable->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Cuentascontable->create();
			if ($this->Cuentascontable->save($this->data)) {
				$this->Session->setFlash(__('The cuentascontable has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The cuentascontable could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid cuentascontable', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Cuentascontable->save($this->data)) {
				$this->Session->setFlash(__('The cuentascontable has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The cuentascontable could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Cuentascontable->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for cuentascontable', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Cuentascontable->delete($id)) {
			$this->Session->setFlash(__('Cuentascontable deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Cuentascontable was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>