<?php
/* Avisostalleres Test cases generated on: 2011-10-04 10:10:02 : 1317716282*/
App::import('Controller', 'Avisostalleres');

class TestAvisostalleresController extends AvisostalleresController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class AvisostalleresControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.avisostallere', 'app.cliente', 'app.comerciale', 'app.formapago', 'app.centrostrabajo', 'app.maquina', 'app.articulo', 'app.familia', 'app.almacene', 'app.proveedore', 'app.referenciasintercambiable', 'app.articulos_referenciasintercambiable', 'app.articulos_avisostallere');

	function startTest() {
		$this->Avisostalleres =& new TestAvisostalleresController();
		$this->Avisostalleres->constructClasses();
	}

	function endTest() {
		unset($this->Avisostalleres);
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