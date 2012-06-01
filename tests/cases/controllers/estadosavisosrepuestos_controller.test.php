<?php
/* Estadosavisosrepuestos Test cases generated on: 2011-11-21 18:11:41 : 1321896941*/
App::import('Controller', 'Estadosavisosrepuestos');

class TestEstadosavisosrepuestosController extends EstadosavisosrepuestosController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class EstadosavisosrepuestosControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.estadosavisosrepuesto');

	function startTest() {
		$this->Estadosavisosrepuestos =& new TestEstadosavisosrepuestosController();
		$this->Estadosavisosrepuestos->constructClasses();
	}

	function endTest() {
		unset($this->Estadosavisosrepuestos);
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