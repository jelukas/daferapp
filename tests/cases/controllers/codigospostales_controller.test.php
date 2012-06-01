<?php
/* Codigospostales Test cases generated on: 2011-09-08 20:09:47 : 1315507247*/
App::import('Controller', 'Codigospostales');

class TestCodigospostalesController extends CodigospostalesController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class CodigospostalesControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.codigospostale', 'app.poblacione', 'app.provincia', 'app.proveedore');

	function startTest() {
		$this->Codigospostales =& new TestCodigospostalesController();
		$this->Codigospostales->constructClasses();
	}

	function endTest() {
		unset($this->Codigospostales);
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