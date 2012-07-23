<?php
class ArticulosTareasAlbaranesclientesreparacionesController extends AppController {

	var $name = 'ArticulosTareasAlbaranesclientesreparaciones';

	function index() {
		$this->ArticulosTareasAlbaranesclientesreparacione->recursive = 0;
		$this->set('articulosTareasAlbaranesclientesreparaciones', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid articulos tareas albaranesclientesreparacione', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('articulosTareasAlbaranesclientesreparacione', $this->ArticulosTareasAlbaranesclientesreparacione->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->ArticulosTareasAlbaranesclientesreparacione->create();
			if ($this->ArticulosTareasAlbaranesclientesreparacione->save($this->data)) {
				$this->Session->setFlash(__('The articulos tareas albaranesclientesreparacione has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The articulos tareas albaranesclientesreparacione could not be saved. Please, try again.', true));
			}
		}
		$articulos = $this->ArticulosTareasAlbaranesclientesreparacione->Articulo->find('list');
		$articulosTareas = $this->ArticulosTareasAlbaranesclientesreparacione->ArticulosTarea->find('list');
		$tareasAlbaranesclientesreparaciones = $this->ArticulosTareasAlbaranesclientesreparacione->TareasAlbaranesclientesreparacione->find('list');
		$this->set(compact('articulos', 'articulosTareas', 'tareasAlbaranesclientesreparaciones'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid articulos tareas albaranesclientesreparacione', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->ArticulosTareasAlbaranesclientesreparacione->save($this->data)) {
				$this->Session->setFlash(__('The articulos tareas albaranesclientesreparacione has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The articulos tareas albaranesclientesreparacione could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->ArticulosTareasAlbaranesclientesreparacione->read(null, $id);
		}
		$articulos = $this->ArticulosTareasAlbaranesclientesreparacione->Articulo->find('list');
		$articulosTareas = $this->ArticulosTareasAlbaranesclientesreparacione->ArticulosTarea->find('list');
		$tareasAlbaranesclientesreparaciones = $this->ArticulosTareasAlbaranesclientesreparacione->TareasAlbaranesclientesreparacione->find('list');
		$this->set(compact('articulos', 'articulosTareas', 'tareasAlbaranesclientesreparaciones'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for articulos tareas albaranesclientesreparacione', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->ArticulosTareasAlbaranesclientesreparacione->delete($id)) {
			$this->Session->setFlash(__('Articulos tareas albaranesclientesreparacione deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Articulos tareas albaranesclientesreparacione was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>