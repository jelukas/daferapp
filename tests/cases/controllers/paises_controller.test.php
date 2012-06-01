<?php
/* Paises Test cases generated on: 2011-09-08 20:09:13 : 1315507213*/
App::import('Controller', 'Paises');

class TestPaisesController extends PaisesController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class PaisesControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.paise', 'app.proveedore', 'app.provincia', 'app.poblacione', 'app.codigospostale');

	function startTest() {
		$this->Paises =& new TestPaisesController();
		$this->Paises->constructClasses();
	}

	function endTest() {
		unset($this->Paises);
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