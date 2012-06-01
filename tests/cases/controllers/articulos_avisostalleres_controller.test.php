<?php
/* ArticulosAvisostalleres Test cases generated on: 2011-10-16 18:10:41 : 1318784141*/
App::import('Controller', 'ArticulosAvisostalleres');

class TestArticulosAvisostalleresController extends ArticulosAvisostalleresController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class ArticulosAvisostalleresControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.articulos_avisostallere', 'app.articulo', 'app.familia', 'app.almacene', 'app.proveedore', 'app.referenciasintercambiable', 'app.articulos_referenciasintercambiable', 'app.avisostallere', 'app.cliente', 'app.comerciale', 'app.formapago', 'app.centrostrabajo', 'app.maquina', 'app.facturas_cliente', 'app.articulos_facturas_cliente');

	function startTest() {
		$this->ArticulosAvisostalleres =& new TestArticulosAvisostalleresController();
		$this->ArticulosAvisostalleres->constructClasses();
	}

	function endTest() {
		unset($this->ArticulosAvisostalleres);
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