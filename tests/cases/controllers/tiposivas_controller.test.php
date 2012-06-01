<?php
/* Tiposivas Test cases generated on: 2011-10-16 19:10:37 : 1318786477*/
App::import('Controller', 'Tiposivas');

class TestTiposivasController extends TiposivasController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class TiposivasControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.tiposiva');

	function startTest() {
		$this->Tiposivas =& new TestTiposivasController();
		$this->Tiposivas->constructClasses();
	}

	function endTest() {
		unset($this->Tiposivas);
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