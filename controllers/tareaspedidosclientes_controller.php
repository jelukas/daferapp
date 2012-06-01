<?php
class TareaspedidosclientesController extends AppController {

	var $name = 'Tareaspedidosclientes';
        var $layout = 'ajax';
        
	function index() {
		$this->Tareaspedidoscliente->recursive = 0;
		$this->set('tareaspedidosclientes', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->flashWarnings(__('Invalid tareaspedidoscliente', true));
			$this->redirect($this->referer());
		}
		$this->set('tareaspedidoscliente', $this->Tareaspedidoscliente->read(null, $id));
	}

	function add($pedidoscliente_id = null) {
		if (!empty($this->data)) {
			$this->Tareaspedidoscliente->create();
			if ($this->Tareaspedidoscliente->save($this->data)) {
				$this->Session->setFlash(__('The tareaspedidoscliente has been saved', true));
				$this->redirect($this->referer());
			} else {
				$this->flashWarnings(__('The tareaspedidoscliente could not be saved. Please, try again.', true));
			}
		}
		$this->set(compact('pedidoscliente_id'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->flashWarnings(__('Invalid tareaspedidoscliente', true));
			$this->redirect($this->referer());
		}
		if (!empty($this->data)) {
			if ($this->Tareaspedidoscliente->save($this->data)) {
				$this->Session->setFlash(__('The tareaspedidoscliente has been saved', true));
				$this->redirect($this->referer());
			} else {
				$this->flashWarnings(__('The tareaspedidoscliente could not be saved. Please, try again.', true));
				$this->redirect($this->referer());
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Tareaspedidoscliente->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->flashWarnings(__('Invalid id for tareaspedidoscliente', true));
			$this->redirect($this->referer());
		}
		if ($this->Tareaspedidoscliente->delete($id)) {
			$this->Session->setFlash(__('Tareaspedidoscliente deleted', true));
			$this->redirect($this->referer());
		}
		$this->flashWarnings(__('Tareaspedidoscliente was not deleted', true));
		$this->redirect($this->referer());
	}
}
?>