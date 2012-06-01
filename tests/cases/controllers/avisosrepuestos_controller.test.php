<?php
/* Avisosrepuestos Test cases generated on: 2011-10-17 02:10:31 : 1318811371*/
App::import('Controller', 'Avisosrepuestos');

class TestAvisosrepuestosController extends AvisosrepuestosController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class AvisosrepuestosControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.avisosrepuesto', 'app.cliente', 'app.comerciale', 'app.formapago', 'app.centrostrabajo', 'app.maquina', 'app.articulo', 'app.familia', 'app.almacene', 'app.proveedore', 'app.referenciasintercambiable', 'app.articulos_referenciasintercambiable', 'app.avisostallere', 'app.articulos_avisostallere', 'app.facturas_cliente', 'app.articulos_facturas_cliente', 'app.articulos_avisosrepuesto');

	function startTest() {
		$this->Avisosrepuestos =& new TestAvisosrepuestosController();
		$this->Avisosrepuestos->constructClasses();
	}

	function endTest() {
		unset($this->Avisosrepuestos);
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