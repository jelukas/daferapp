<?php
/* Ordenes Test cases generated on: 2011-10-11 10:10:52 : 1318322272*/
App::import('Controller', 'Ordenes');

class TestOrdenesController extends OrdenesController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class OrdenesControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.ordene', 'app.avisostallere', 'app.cliente', 'app.comerciale', 'app.formapago', 'app.centrostrabajo', 'app.maquina', 'app.articulo', 'app.familia', 'app.almacene', 'app.proveedore', 'app.referenciasintercambiable', 'app.articulos_referenciasintercambiable', 'app.articulos_avisostallere', 'app.presupuestos_cliente');

	function startTest() {
		$this->Ordenes =& new TestOrdenesController();
		$this->Ordenes->constructClasses();
	}

	function endTest() {
		unset($this->Ordenes);
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