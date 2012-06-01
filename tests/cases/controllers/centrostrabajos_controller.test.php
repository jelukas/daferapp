<?php
/* Centrostrabajos Test cases generated on: 2011-09-19 19:09:38 : 1316453738*/
App::import('Controller', 'Centrostrabajos');

class TestCentrostrabajosController extends CentrostrabajosController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class CentrostrabajosControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.centrostrabajo', 'app.cliente', 'app.comerciale', 'app.formapago');

	function startTest() {
		$this->Centrostrabajos =& new TestCentrostrabajosController();
		$this->Centrostrabajos->constructClasses();
	}

	function endTest() {
		unset($this->Centrostrabajos);
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