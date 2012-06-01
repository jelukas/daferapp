<?php
class MecanicosPartesController extends AppController {

	var $name = 'MecanicosPartes';

	function index() {
		$this->MecanicosParte->recursive = 0;
		$this->set('mecanicosPartes', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid mecanicos parte', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('mecanicosParte', $this->MecanicosParte->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->MecanicosParte->create();
			if ($this->MecanicosParte->save($this->data)) {
				$this->Session->setFlash(__('The mecanicos parte has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The mecanicos parte could not be saved. Please, try again.', true));
			}
		}
		$mecanicos = $this->MecanicosParte->Mecanico->find('list');
		$partes = $this->MecanicosParte->Parte->find('list');
		$this->set(compact('mecanicos', 'partes'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid mecanicos parte', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->MecanicosParte->save($this->data)) {
				$this->Session->setFlash(__('The mecanicos parte has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The mecanicos parte could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->MecanicosParte->read(null, $id);
		}
		$mecanicos = $this->MecanicosParte->Mecanico->find('list');
		$partes = $this->MecanicosParte->Parte->find('list');
		$this->set(compact('mecanicos', 'partes'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for mecanicos parte', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->MecanicosParte->delete($id)) {
			$this->Session->setFlash(__('Mecanicos parte deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Mecanicos parte was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>