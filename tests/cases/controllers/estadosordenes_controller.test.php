<?php
/* Estadosordenes Test cases generated on: 2011-11-14 00:11:08 : 1321225328*/
App::import('Controller', 'Estadosordenes');

class TestEstadosordenesController extends EstadosordenesController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class EstadosordenesControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.estadosordene');

	function startTest() {
		$this->Estadosordenes =& new TestEstadosordenesController();
		$this->Estadosordenes->constructClasses();
	}

	function endTest() {
		unset($this->Estadosordenes);
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