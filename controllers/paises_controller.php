<?php
class PaisesController extends AppController {

	var $name = 'Paises';

	function index() {
		$this->Paise->recursive = 0;
		$this->set('paises', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('País inválido', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('paise', $this->Paise->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Paise->create();
			if ($this->Paise->save($this->data)) {
				$this->Session->setFlash(__('El país ha sido salvado correctamente.', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El país no ha podido ser salvado. Por favor, inténtelo de nuevo.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('País inválido', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Paise->save($this->data)) {
				$this->Session->setFlash(__('El país ha sido salvado correctamente.', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El país no ha podido ser salvado. Por favor, inténtelo de nuevo.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Paise->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Id de país inválida', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Paise->delete($id)) {
			$this->Session->setFlash(__('País eliminado', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('El país no ha podido ser eliminado.', true));
		$this->redirect(array('action' => 'index'));
	}
	function beforeFilter()
	{	
		$this->checkPermissions('Paise',$this->params['action']);
	}
}
?>
