<?php
class TareasAlbaranesclientesreparacionesPartesController extends AppController {

	var $name = 'TareasAlbaranesclientesreparacionesPartes';

	function index() {
		$this->TareasAlbaranesclientesreparacionesParte->recursive = 0;
		$this->set('tareasAlbaranesclientesreparacionesPartes', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid tareas albaranesclientesreparaciones parte', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('tareasAlbaranesclientesreparacionesParte', $this->TareasAlbaranesclientesreparacionesParte->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->TareasAlbaranesclientesreparacionesParte->create();
			if ($this->TareasAlbaranesclientesreparacionesParte->save($this->data)) {
				$this->Session->setFlash(__('The tareas albaranesclientesreparaciones parte has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The tareas albaranesclientesreparaciones parte could not be saved. Please, try again.', true));
			}
		}
		$tareasAlbaranesclientesreparaciones = $this->TareasAlbaranesclientesreparacionesParte->TareasAlbaranesclientesreparacione->find('list');
		$partes = $this->TareasAlbaranesclientesreparacionesParte->Parte->find('list');
		$mecanicos = $this->TareasAlbaranesclientesreparacionesParte->Mecanico->find('list');
		$this->set(compact('tareasAlbaranesclientesreparaciones', 'partes', 'mecanicos'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid tareas albaranesclientesreparaciones parte', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->TareasAlbaranesclientesreparacionesParte->save($this->data)) {
				$this->Session->setFlash(__('The tareas albaranesclientesreparaciones parte has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The tareas albaranesclientesreparaciones parte could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->TareasAlbaranesclientesreparacionesParte->read(null, $id);
		}
		$tareasAlbaranesclientesreparaciones = $this->TareasAlbaranesclientesreparacionesParte->TareasAlbaranesclientesreparacione->find('list');
		$partes = $this->TareasAlbaranesclientesreparacionesParte->Parte->find('list');
		$mecanicos = $this->TareasAlbaranesclientesreparacionesParte->Mecanico->find('list');
		$this->set(compact('tareasAlbaranesclientesreparaciones', 'partes', 'mecanicos'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for tareas albaranesclientesreparaciones parte', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->TareasAlbaranesclientesreparacionesParte->delete($id)) {
			$this->Session->setFlash(__('Tareas albaranesclientesreparaciones parte deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Tareas albaranesclientesreparaciones parte was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>