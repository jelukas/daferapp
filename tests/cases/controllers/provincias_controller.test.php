<?php
/* Provincias Test cases generated on: 2011-09-08 20:09:29 : 1315507229*/
App::import('Controller', 'Provincias');

class TestProvinciasController extends ProvinciasController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class ProvinciasControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.provincia', 'app.poblacione', 'app.codigospostale', 'app.proveedore');

	function startTest() {
		$this->Provincias =& new TestProvinciasController();
		$this->Provincias->constructClasses();
	}

	function endTest() {
		unset($this->Provincias);
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