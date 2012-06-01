<?php
class PoblacionesController extends AppController {

	var $name = 'Poblaciones';

	function index() {
		$this->Poblacione->recursive = 0;
		$this->set('poblaciones', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Población inválida', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('poblacione', $this->Poblacione->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Poblacione->create();
			if ($this->Poblacione->save($this->data)) {
				$this->Session->setFlash(__('La población ha sido salvada correctamente.', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('La población no ha podido ser salvada. Por favor, inténtelo de nuevo.', true));
			}
		}
		$provincias = $this->Poblacione->Provincium->find('list');
		$codigospostales = $this->Poblacione->Codigospostale->find('list');
		$this->set(compact('provincias', 'codigospostales'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid poblacione', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Poblacione->save($this->data)) {
				$this->Session->setFlash(__('La población ha sido salvada correctamente.', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('La población no ha podido ser salvada. Por favor, inténtelo de nuevo.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Poblacione->read(null, $id);
		}
		$provincias = $this->Poblacione->Provincium->find('list');
		$codigospostales = $this->Poblacione->Codigospostale->find('list');
		$this->set(compact('provincias', 'codigospostales'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Id de población inválida', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Poblacione->delete($id)) {
			$this->Session->setFlash(__('Población eliminada', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('La población no ha podido ser eliminada.', true));
		$this->redirect(array('action' => 'index'));
	}
	function beforeFilter()
	{	
		$this->checkPermissions('Poblacione',$this->params['action']);
	}
}
?>
