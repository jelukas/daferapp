<?php
/* Albaranesproveedores Test cases generated on: 2011-10-16 19:10:51 : 1318786491*/
App::import('Controller', 'Albaranesproveedores');

class TestAlbaranesproveedoresController extends AlbaranesproveedoresController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class AlbaranesproveedoresControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.albaranesproveedore', 'app.pedidosproveedore', 'app.proveedore', 'app.articulo', 'app.familia', 'app.almacene', 'app.referenciasintercambiable', 'app.articulos_referenciasintercambiable', 'app.avisostallere', 'app.cliente', 'app.comerciale', 'app.formapago', 'app.centrostrabajo', 'app.maquina', 'app.articulos_avisostallere', 'app.facturas_cliente', 'app.articulos_facturas_cliente', 'app.facturasproveedore');

	function startTest() {
		$this->Albaranesproveedores =& new TestAlbaranesproveedoresController();
		$this->Albaranesproveedores->constructClasses();
	}

	function endTest() {
		unset($this->Albaranesproveedores);
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