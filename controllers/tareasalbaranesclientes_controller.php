<?php
class TareasalbaranesclientesController extends AppController {

	var $name = 'Tareasalbaranesclientes';

	function index() {
		$this->Tareasalbaranescliente->recursive = 0;
		$this->set('tareasalbaranesclientes', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->flashWarnings(__('Invalid tareasalbaranescliente', true));
			$this->redirect($this->referer());
		}
		$this->set('tareasalbaranescliente', $this->Tareasalbaranescliente->read(null, $id));
	}

	function add($albaranescliente_id = null) {
		if (!empty($this->data)) {
			$this->Tareasalbaranescliente->create();
			if ($this->Tareasalbaranescliente->save($this->data)) {
				$this->Session->setFlash(__('The tareasalbaranescliente has been saved', true));
				$this->redirect($this->referer());
			} else {
				$this->flashWarnings(__('The tareasalbaranescliente could not be saved. Please, try again.', true));
                                $this->redirect($this->referer());
			}
		}
		$this->set(compact('albaranescliente_id'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->flashWarnings(__('Invalid tareasalbaranescliente', true));
			$this->redirect($this->referer());
		}
		if (!empty($this->data)) {
			if ($this->Tareasalbaranescliente->save($this->data)) {
				$this->Session->setFlash(__('The tareasalbaranescliente has been saved', true));
				$this->redirect($this->referer());
			} else {
				$this->flashWarnings(__('The tareasalbaranescliente could not be saved. Please, try again.', true));
                                $this->redirect($this->referer());
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Tareasalbaranescliente->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->flashWarnings(__('Invalid id for tareasalbaranescliente', true));
			$this->redirect($this->referer());
		}
		if ($this->Tareasalbaranescliente->delete($id)) {
			$this->Session->setFlash(__('Tareasalbaranescliente deleted', true));
			$this->redirect($this->referer());
		}
		$this->flashWarnings(__('Tareasalbaranescliente was not deleted', true));
		$this->redirect($this->referer());
	}
}
?>