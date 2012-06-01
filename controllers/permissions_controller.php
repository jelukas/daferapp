<?php
class PermissionsController extends AppController {

	var $name = 'Permissions';

	function index() {
		$this->Permission->recursive = 0;
		$this->set('permissions', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid permission', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('permission', $this->Permission->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Permission->create();
			if ($this->Permission->save($this->data)) {
				$this->Session->setFlash(__('The permission has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The permission could not be saved. Please, try again.', true));
			}
		}
		$groups = $this->Permission->Group->find('list');
		$this->set(compact('groups'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid permission', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Permission->save($this->data)) {
				$this->Session->setFlash(__('The permission has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The permission could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Permission->read(null, $id);
		}
		$groups = $this->Permission->Group->find('list');
		$this->set(compact('groups'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for permission', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Permission->delete($id)) {
			$this->Session->setFlash(__('Permission deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Permission was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>