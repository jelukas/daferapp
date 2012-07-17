<?php
class AlbaranesclientesreparacionesController extends AppController {

	var $name = 'Albaranesclientesreparaciones';

	function index() {
		$this->Albaranesclientesreparacione->recursive = 0;
		$this->set('albaranesclientesreparaciones', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid albaranesclientesreparacione', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('albaranesclientesreparacione', $this->Albaranesclientesreparacione->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Albaranesclientesreparacione->create();
			if ($this->Albaranesclientesreparacione->save($this->data)) {
				$this->Session->setFlash(__('The albaranesclientesreparacione has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The albaranesclientesreparacione could not be saved. Please, try again.', true));
			}
		}
		$tiposivas = $this->Albaranesclientesreparacione->Tiposiva->find('list');
		$ordenes = $this->Albaranesclientesreparacione->Ordene->find('list');
		$clientes = $this->Albaranesclientesreparacione->Cliente->find('list');
		$almacenes = $this->Albaranesclientesreparacione->Almacene->find('list');
		$facturasClientes = $this->Albaranesclientesreparacione->FacturasCliente->find('list');
		$comerciales = $this->Albaranesclientesreparacione->Comerciale->find('list');
		$centrosdecostes = $this->Albaranesclientesreparacione->Centrosdecoste->find('list');
		$this->set(compact('tiposivas', 'ordenes', 'clientes', 'almacenes', 'facturasClientes', 'comerciales', 'centrosdecostes'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid albaranesclientesreparacione', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Albaranesclientesreparacione->save($this->data)) {
				$this->Session->setFlash(__('The albaranesclientesreparacione has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The albaranesclientesreparacione could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Albaranesclientesreparacione->read(null, $id);
		}
		$tiposivas = $this->Albaranesclientesreparacione->Tiposiva->find('list');
		$ordenes = $this->Albaranesclientesreparacione->Ordene->find('list');
		$clientes = $this->Albaranesclientesreparacione->Cliente->find('list');
		$almacenes = $this->Albaranesclientesreparacione->Almacene->find('list');
		$facturasClientes = $this->Albaranesclientesreparacione->FacturasCliente->find('list');
		$comerciales = $this->Albaranesclientesreparacione->Comerciale->find('list');
		$centrosdecostes = $this->Albaranesclientesreparacione->Centrosdecoste->find('list');
		$this->set(compact('tiposivas', 'ordenes', 'clientes', 'almacenes', 'facturasClientes', 'comerciales', 'centrosdecostes'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for albaranesclientesreparacione', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Albaranesclientesreparacione->delete($id)) {
			$this->Session->setFlash(__('Albaranesclientesreparacione deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Albaranesclientesreparacione was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>