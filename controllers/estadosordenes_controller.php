<?php
class EstadosordenesController extends AppController {

	var $name = 'Estadosordenes';

	function index() {
		$this->Estadosordene->recursive = 0;
		$this->set('estadosordenes', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid estadosordene', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('estadosordene', $this->Estadosordene->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Estadosordene->create();
			if ($this->Estadosordene->save($this->data)) {
				$this->Session->setFlash(__('The estadosordene has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The estadosordene could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid estadosordene', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Estadosordene->save($this->data)) {
				$this->Session->setFlash(__('The estadosordene has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The estadosordene could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Estadosordene->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for estadosordene', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Estadosordene->delete($id)) {
			$this->Session->setFlash(__('Estadosordene deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Estadosordene was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>