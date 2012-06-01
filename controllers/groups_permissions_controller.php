<?php
class GroupsPermissionsController extends AppController {

	var $name = 'GroupsPermissions';

	function index() {
		$this->GroupsPermission->recursive = 0;
		$this->set('groupsPermissions', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid groups permission', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('groupsPermission', $this->GroupsPermission->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->GroupsPermission->create();
			if ($this->GroupsPermission->save($this->data)) {
				$this->Session->setFlash(__('The groups permission has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The groups permission could not be saved. Please, try again.', true));
			}
		}
		$groups = $this->GroupsPermission->Group->find('list');
		$permissions = $this->GroupsPermission->Permission->find('list');
		$this->set(compact('groups', 'permissions'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid groups permission', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->GroupsPermission->save($this->data)) {
				$this->Session->setFlash(__('The groups permission has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The groups permission could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->GroupsPermission->read(null, $id);
		}
		$groups = $this->GroupsPermission->Group->find('list');
		$permissions = $this->GroupsPermission->Permission->find('list');
		$this->set(compact('groups', 'permissions'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for groups permission', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->GroupsPermission->delete($id)) {
			$this->Session->setFlash(__('Groups permission deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Groups permission was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>