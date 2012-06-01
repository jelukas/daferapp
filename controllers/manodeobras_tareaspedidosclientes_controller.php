<?php
class ManodeobrasTareaspedidosclientesController extends AppController {

	var $name = 'ManodeobrasTareaspedidosclientes';

	function index() {
		$this->ManodeobrasTareaspedidoscliente->recursive = 0;
		$this->set('manodeobrasTareaspedidosclientes', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid manodeobras tareaspedidoscliente', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('manodeobrasTareaspedidoscliente', $this->ManodeobrasTareaspedidoscliente->read(null, $id));
	}

	function add($tareaspedidoscliente_id = null) {
		if (!empty($this->data)) {
			$this->ManodeobrasTareaspedidoscliente->create();
			if ($this->ManodeobrasTareaspedidoscliente->save($this->data)) {
				$this->Session->setFlash(__('The manodeobras tareaspedidoscliente has been saved', true));
				$this->redirect($this->referer());
			} else {
				$this->Session->setFlash(__('The manodeobras tareaspedidoscliente could not be saved. Please, try again.', true));
                                $this->redirect($this->referer());
			}
		}
		$this->set(compact('tareaspedidoscliente_id'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid manodeobras tareaspedidoscliente', true));
			$this->redirect($this->referer());
		}
		if (!empty($this->data)) {
			if ($this->ManodeobrasTareaspedidoscliente->save($this->data)) {
				$this->Session->setFlash(__('The manodeobras tareaspedidoscliente has been saved', true));
				$this->redirect($this->referer());
			} else {
				$this->Session->setFlash(__('The manodeobras tareaspedidoscliente could not be saved. Please, try again.', true));
                                $this->redirect($this->referer());
			}
		}
		if (empty($this->data)) {
			$this->data = $this->ManodeobrasTareaspedidoscliente->read(null, $id);
		}
		$tareaspedidosclientes = $this->ManodeobrasTareaspedidoscliente->Tareaspedidoscliente->find('list');
		$this->set(compact('tareaspedidosclientes'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for manodeobras tareaspedidoscliente', true));
			$this->redirect($this->referer());
		}
		if ($this->ManodeobrasTareaspedidoscliente->delete($id)) {
			$this->Session->setFlash(__('Manodeobras tareaspedidoscliente deleted', true));
			$this->redirect($this->referer());
		}
		$this->Session->setFlash(__('Manodeobras tareaspedidoscliente was not deleted', true));
		$this->redirect($this->referer());
	}
}
?>