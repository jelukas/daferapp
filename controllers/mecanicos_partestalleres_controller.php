<?php
class MecanicosPartestalleresController extends AppController {

	var $name = 'MecanicosPartestalleres';

	function index() {
		$this->MecanicosPartestallere->recursive = 0;
		$this->set('mecanicosPartestalleres', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid mecanicos partestallere', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('mecanicosPartestallere', $this->MecanicosPartestallere->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->MecanicosPartestallere->create();
			if ($this->MecanicosPartestallere->save($this->data)) {
				$this->Session->setFlash(__('The mecanicos partestallere has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The mecanicos partestallere could not be saved. Please, try again.', true));
			}
		}
		$mecanicos = $this->MecanicosPartestallere->Mecanico->find('list');
		$partestalleres = $this->MecanicosPartestallere->Partestallere->find('list');
		$this->set(compact('mecanicos', 'partestalleres'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid mecanicos partestallere', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->MecanicosPartestallere->save($this->data)) {
				$this->Session->setFlash(__('The mecanicos partestallere has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The mecanicos partestallere could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->MecanicosPartestallere->read(null, $id);
		}
		$mecanicos = $this->MecanicosPartestallere->Mecanico->find('list');
		$partestalleres = $this->MecanicosPartestallere->Partestallere->find('list');
		$this->set(compact('mecanicos', 'partestalleres'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for mecanicos partestallere', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->MecanicosPartestallere->delete($id)) {
			$this->Session->setFlash(__('Mecanicos partestallere deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Mecanicos partestallere was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>