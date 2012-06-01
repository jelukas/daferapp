<?php
/* ArticulosReferenciasintercambiables Test cases generated on: 2011-10-04 10:10:11 : 1317715931*/
App::import('Controller', 'ArticulosReferenciasintercambiables');

class TestArticulosReferenciasintercambiablesController extends ArticulosReferenciasintercambiablesController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class ArticulosReferenciasintercambiablesControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.articulos_referenciasintercambiable', 'app.articulo', 'app.familia', 'app.almacene', 'app.proveedore', 'app.referenciasintercambiable', 'app.avisostallere', 'app.cliente', 'app.comerciale', 'app.formapago', 'app.centrostrabajo', 'app.maquina', 'app.articulos_avisostallere');

	function startTest() {
		$this->ArticulosReferenciasintercambiables =& new TestArticulosReferenciasintercambiablesController();
		$this->ArticulosReferenciasintercambiables->constructClasses();
	}

	function endTest() {
		unset($this->ArticulosReferenciasintercambiables);
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