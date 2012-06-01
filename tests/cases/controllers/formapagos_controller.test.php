<?php
/* Formapagos Test cases generated on: 2011-09-08 20:09:26 : 1315506926*/
App::import('Controller', 'Formapagos');

class TestFormapagosController extends FormapagosController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class FormapagosControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.formapago', 'app.cliente', 'app.comerciale');

	function startTest() {
		$this->Formapagos =& new TestFormapagosController();
		$this->Formapagos->constructClasses();
	}

	function endTest() {
		unset($this->Formapagos);
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