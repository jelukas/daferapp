<?php
/* Estadosavisostalleres Test cases generated on: 2011-11-21 19:11:36 : 1321899036*/
App::import('Controller', 'Estadosavisostalleres');

class TestEstadosavisostalleresController extends EstadosavisostalleresController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class EstadosavisostalleresControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.estadosavisostallere');

	function startTest() {
		$this->Estadosavisostalleres =& new TestEstadosavisostalleresController();
		$this->Estadosavisostalleres->constructClasses();
	}

	function endTest() {
		unset($this->Estadosavisostalleres);
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