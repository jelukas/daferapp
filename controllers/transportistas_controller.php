<?php
class TransportistasController extends AppController {

	var $name = 'Transportistas';

	function index() {
		$this->Transportista->recursive = 1;
		$this->set('transportistas', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Transportista inválido', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('transportista', $this->Transportista->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Transportista->create();
			if ($this->Transportista->save($this->data)) {
				$this->Session->setFlash(__('El transportista ha sido salvado correctamente.', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El transportista no ha podido ser salvado. Por favor, inténtelo de nuevo.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Transportista inválido', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Transportista->save($this->data)) {
				$this->Session->setFlash(__('El transportista ha sido salvado correctamente.', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El transportista no ha podido ser salvado. Por favor, inténtelo de nuevo.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Transportista->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Id de transportista inválida', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Transportista->delete($id)) {
			$this->Session->setFlash(__('Transportista eliminado', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('El transportista no ha podido ser eliminado.', true));
		$this->redirect(array('action' => 'index'));
	}
	function pdf()
	{
      		Configure::write('debug',0);
      		$this->layout = 'pdf'; //this will use the pdf.ctp layout
      		// Operaciones que deseamos realizar y variables que pasaremos a la vista.
		$this->set('transportistas', $this->paginate());
      		$this->render();
	}
	function beforeFilter()
	{	
		$this->checkPermissions('Transportista',$this->params['action']);
	}
}
?>
