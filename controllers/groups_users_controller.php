<?php
class GroupsUsersController extends AppController {

	var $name = 'GroupsUsers';

	function index() {
		$this->GroupsUser->recursive = 0;
		$this->set('groupsUsers', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid groups user', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('groupsUser', $this->GroupsUser->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->GroupsUser->create();
			if ($this->GroupsUser->save($this->data)) {
				$this->Session->setFlash(__('The groups user has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The groups user could not be saved. Please, try again.', true));
			}
		}
		$groups = $this->GroupsUser->Group->find('list');
		$users = $this->GroupsUser->User->find('list');
		$this->set(compact('groups', 'users'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid groups user', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->GroupsUser->save($this->data)) {
				$this->Session->setFlash(__('The groups user has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The groups user could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->GroupsUser->read(null, $id);
		}
		$groups = $this->GroupsUser->Group->find('list');
		$users = $this->GroupsUser->User->find('list');
		$this->set(compact('groups', 'users'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for groups user', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->GroupsUser->delete($id)) {
			$this->Session->setFlash(__('Groups user deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Groups user was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>