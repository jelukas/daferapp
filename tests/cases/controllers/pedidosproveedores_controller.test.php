<?php
/* Pedidosproveedores Test cases generated on: 2011-10-16 19:10:04 : 1318785124*/
App::import('Controller', 'Pedidosproveedores');

class TestPedidosproveedoresController extends PedidosproveedoresController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class PedidosproveedoresControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.pedidosproveedore', 'app.proveedore', 'app.articulo', 'app.familia', 'app.almacene', 'app.referenciasintercambiable', 'app.articulos_referenciasintercambiable', 'app.avisostallere', 'app.cliente', 'app.comerciale', 'app.formapago', 'app.centrostrabajo', 'app.maquina', 'app.articulos_avisostallere', 'app.facturas_cliente', 'app.articulos_facturas_cliente');

	function startTest() {
		$this->Pedidosproveedores =& new TestPedidosproveedoresController();
		$this->Pedidosproveedores->constructClasses();
	}

	function endTest() {
		unset($this->Pedidosproveedores);
		ClassRegistry::flush();
	}

	function testIndex() {

	}

	function testView() {

	}

	function testAdd() {

	}

	function testEdit() {

	}

	function testDelete() {

	}

}
?>