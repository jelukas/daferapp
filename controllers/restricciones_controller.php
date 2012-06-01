<?php
class RestriccionesController extends AppController {

	var $name = 'Restricciones';

	function index() {
		$this->Restriccione->recursive = 0;
		$this->set('restricciones', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid restriccione', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('restriccione', $this->Restriccione->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Restriccione->create();
			if ($this->Restriccione->save($this->data)) {
				$this->Session->setFlash(__('The restriccione has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The restriccione could not be saved. Please, try again.', true));
			}
		}
		$roles = $this->Restriccione->Role->find('list');
		$this->set(compact('roles'));
		$modelos=App::objects('model');
		$this->set('modelos',$modelos);
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid restriccione', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Restriccione->save($this->data)) {
				$this->Session->setFlash(__('The restriccione has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The restriccione could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Restriccione->read(null, $id);
		}
		$roles = $this->Restriccione->Role->find('list');
		$this->set(compact('roles'));
		$modelos=App::objects('model');
		$this->set('modelos',$modelos);
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for restriccione', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Restriccione->delete($id)) {
			$this->Session->setFlash(__('Restriccione deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Restriccione was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	function beforeFilter()
	{	
		$this->checkPermissions('Restriccione',$this->params['action']);
	}
}
?>
