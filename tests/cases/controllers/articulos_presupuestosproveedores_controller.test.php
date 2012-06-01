<?php
/* ArticulosPresupuestosproveedores Test cases generated on: 2012-02-10 09:02:03 : 1328861463*/
App::import('Controller', 'ArticulosPresupuestosproveedores');

class TestArticulosPresupuestosproveedoresController extends ArticulosPresupuestosproveedoresController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class ArticulosPresupuestosproveedoresControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.articulos_presupuestosproveedore');

	function startTest() {
		$this->ArticulosPresupuestosproveedores =& new TestArticulosPresupuestosproveedoresController();
		$this->ArticulosPresupuestosproveedores->constructClasses();
	}

	function endTest() {
		unset($this->ArticulosPresupuestosproveedores);
		ClassRegistry::flush();
	}

}
?>