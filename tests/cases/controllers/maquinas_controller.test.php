<?php
/* Maquinas Test cases generated on: 2011-09-20 13:09:49 : 1316517049*/
App::import('Controller', 'Maquinas');

class TestMaquinasController extends MaquinasController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class MaquinasControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.maquina', 'app.centrostrabajo', 'app.cliente', 'app.comerciale', 'app.formapago');

	function startTest() {
		$this->Maquinas =& new TestMaquinasController();
		$this->Maquinas->constructClasses();
	}

	function endTest() {
		unset($this->Maquinas);
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