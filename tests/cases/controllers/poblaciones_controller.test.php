<?php
/* Poblaciones Test cases generated on: 2011-09-08 20:09:23 : 1315507223*/
App::import('Controller', 'Poblaciones');

class TestPoblacionesController extends PoblacionesController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class PoblacionesControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.poblacione', 'app.provincia', 'app.proveedore', 'app.codigospostale');

	function startTest() {
		$this->Poblaciones =& new TestPoblacionesController();
		$this->Poblaciones->constructClasses();
	}

	function endTest() {
		unset($this->Poblaciones);
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