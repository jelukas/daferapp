<?php
/* ComercialesProveedores Test cases generated on: 2011-09-08 20:09:41 : 1315507061*/
App::import('Controller', 'ComercialesProveedores');

class TestComercialesProveedoresController extends ComercialesProveedoresController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class ComercialesProveedoresControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.comerciales_proveedore', 'app.proveedore', 'app.provincia', 'app.poblacione', 'app.codigospostale');

	function startTest() {
		$this->ComercialesProveedores =& new TestComercialesProveedoresController();
		$this->ComercialesProveedores->constructClasses();
	}

	function endTest() {
		unset($this->ComercialesProveedores);
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