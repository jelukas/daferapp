<?php
/* Facturasproveedores Test cases generated on: 2011-10-16 19:10:31 : 1318786771*/
App::import('Controller', 'Facturasproveedores');

class TestFacturasproveedoresController extends FacturasproveedoresController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class FacturasproveedoresControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.facturasproveedore', 'app.proveedore', 'app.articulo', 'app.familia', 'app.almacene', 'app.referenciasintercambiable', 'app.articulos_referenciasintercambiable', 'app.avisostallere', 'app.cliente', 'app.comerciale', 'app.formapago', 'app.centrostrabajo', 'app.maquina', 'app.articulos_avisostallere', 'app.facturas_cliente', 'app.articulos_facturas_cliente', 'app.tiposiva', 'app.albaranesproveedore', 'app.pedidosproveedore');

	function startTest() {
		$this->Facturasproveedores =& new TestFacturasproveedoresController();
		$this->Facturasproveedores->constructClasses();
	}

	function endTest() {
		unset($this->Facturasproveedores);
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