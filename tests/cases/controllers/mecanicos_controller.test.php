<?php
/* Mecanicos Test cases generated on: 2011-09-20 16:09:32 : 1316529512*/
App::import('Controller', 'Mecanicos');

class TestMecanicosController extends MecanicosController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class MecanicosControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.mecanico');

	function startTest() {
		$this->Mecanicos =& new TestMecanicosController();
		$this->Mecanicos->constructClasses();
	}

	function endTest() {
		unset($this->Mecanicos);
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