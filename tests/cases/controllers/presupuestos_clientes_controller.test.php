<?php
/* PresupuestosClientes Test cases generated on: 2011-10-11 11:10:53 : 1318326413*/
App::import('Controller', 'PresupuestosClientes');

class TestPresupuestosClientesController extends PresupuestosClientesController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class PresupuestosClientesControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.presupuestos_cliente', 'app.transportista', 'app.cliente', 'app.comerciale', 'app.formapago', 'app.centrostrabajo', 'app.maquina', 'app.ordene', 'app.avisostallere', 'app.articulo', 'app.familia', 'app.almacene', 'app.proveedore', 'app.referenciasintercambiable', 'app.articulos_referenciasintercambiable', 'app.articulos_avisostallere', 'app.pedidos_cliente');

	function startTest() {
		$this->PresupuestosClientes =& new TestPresupuestosClientesController();
		$this->PresupuestosClientes->constructClasses();
	}

	function endTest() {
		unset($this->PresupuestosClientes);
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