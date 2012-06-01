<?php
/* ArticulosAvisosrepuestos Test cases generated on: 2011-10-17 02:10:20 : 1318811360*/
App::import('Controller', 'ArticulosAvisosrepuestos');

class TestArticulosAvisosrepuestosController extends ArticulosAvisosrepuestosController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class ArticulosAvisosrepuestosControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.articulos_avisosrepuesto', 'app.articulo', 'app.familia', 'app.almacene', 'app.proveedore', 'app.referenciasintercambiable', 'app.articulos_referenciasintercambiable', 'app.avisostallere', 'app.cliente', 'app.comerciale', 'app.formapago', 'app.centrostrabajo', 'app.maquina', 'app.articulos_avisostallere', 'app.facturas_cliente', 'app.articulos_facturas_cliente', 'app.avisosrepuesto');

	function startTest() {
		$this->ArticulosAvisosrepuestos =& new TestArticulosAvisosrepuestosController();
		$this->ArticulosAvisosrepuestos->constructClasses();
	}

	function endTest() {
		unset($this->ArticulosAvisosrepuestos);
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