<?php
class ProvinciasController extends AppController {

	var $name = 'Provincias';

	function index() {
		$this->Provincia->recursive = 0;
		$this->set('provincias', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Provincia inválida', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('provincia', $this->Provincia->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Provincia->create();
			if ($this->Provincia->save($this->data)) {
				$this->Session->setFlash(__('La provincia ha sido salvada correctamente.', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('La provincia no ha podido ser salvada. Por favor, inténtelo de nuevo.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Provincia inválida', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Provincia->save($this->data)) {
				$this->Session->setFlash(__('La provincia ha sido salvada correctamente.', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('La provincia no ha podido ser salvada. Por favor, inténtelo de nuevo.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Provincia->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Id de provincia inválida', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Provincia->delete($id)) {
			$this->Session->setFlash(__('Provincia eliminada', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('La provincia no ha podido ser eliminada.', true));
		$this->redirect(array('action' => 'index'));
	}
	function beforeFilter()
	{	
		$this->checkPermissions('Provincia',$this->params['action']);
	}
}
?>
