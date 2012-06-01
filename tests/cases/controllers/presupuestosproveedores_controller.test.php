<?php
/* Presupuestosproveedores Test cases generated on: 2011-10-16 19:10:24 : 1318784604*/
App::import('Controller', 'Presupuestosproveedores');

class TestPresupuestosproveedoresController extends PresupuestosproveedoresController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class PresupuestosproveedoresControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.presupuestosproveedore', 'app.proveedore', 'app.articulo', 'app.familia', 'app.almacene', 'app.referenciasintercambiable', 'app.articulos_referenciasintercambiable', 'app.avisostallere', 'app.cliente', 'app.comerciale', 'app.formapago', 'app.centrostrabajo', 'app.maquina', 'app.articulos_avisostallere', 'app.facturas_cliente', 'app.articulos_facturas_cliente');

	function startTest() {
		$this->Presupuestosproveedores =& new TestPresupuestosproveedoresController();
		$this->Presupuestosproveedores->constructClasses();
	}

	function endTest() {
		unset($this->Presupuestosproveedores);
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