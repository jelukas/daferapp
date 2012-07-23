<?php
class TareasAlbaranesclientesreparacionesPartestalleresController extends AppController {

	var $name = 'TareasAlbaranesclientesreparacionesPartestalleres';

	function index() {
		$this->TareasAlbaranesclientesreparacionesPartestallere->recursive = 0;
		$this->set('tareasAlbaranesclientesreparacionesPartestalleres', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid tareas albaranesclientesreparaciones partestallere', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('tareasAlbaranesclientesreparacionesPartestallere', $this->TareasAlbaranesclientesreparacionesPartestallere->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->TareasAlbaranesclientesreparacionesPartestallere->create();
			if ($this->TareasAlbaranesclientesreparacionesPartestallere->save($this->data)) {
				$this->Session->setFlash(__('The tareas albaranesclientesreparaciones partestallere has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The tareas albaranesclientesreparaciones partestallere could not be saved. Please, try again.', true));
			}
		}
		$tareasAlbaranesclientesreparaciones = $this->TareasAlbaranesclientesreparacionesPartestallere->TareasAlbaranesclientesreparacione->find('list');
		$partestalleres = $this->TareasAlbaranesclientesreparacionesPartestallere->Partestallere->find('list');
		$mecanicos = $this->TareasAlbaranesclientesreparacionesPartestallere->Mecanico->find('list');
		$this->set(compact('tareasAlbaranesclientesreparaciones', 'partestalleres', 'mecanicos'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid tareas albaranesclientesreparaciones partestallere', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->TareasAlbaranesclientesreparacionesPartestallere->save($this->data)) {
				$this->Session->setFlash(__('The tareas albaranesclientesreparaciones partestallere has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The tareas albaranesclientesreparaciones partestallere could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->TareasAlbaranesclientesreparacionesPartestallere->read(null, $id);
		}
		$tareasAlbaranesclientesreparaciones = $this->TareasAlbaranesclientesreparacionesPartestallere->TareasAlbaranesclientesreparacione->find('list');
		$partestalleres = $this->TareasAlbaranesclientesreparacionesPartestallere->Partestallere->find('list');
		$mecanicos = $this->TareasAlbaranesclientesreparacionesPartestallere->Mecanico->find('list');
		$this->set(compact('tareasAlbaranesclientesreparaciones', 'partestalleres', 'mecanicos'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for tareas albaranesclientesreparaciones partestallere', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->TareasAlbaranesclientesreparacionesPartestallere->delete($id)) {
			$this->Session->setFlash(__('Tareas albaranesclientesreparaciones partestallere deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Tareas albaranesclientesreparaciones partestallere was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>