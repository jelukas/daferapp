<?php
/* Estadosavisos Test cases generated on: 2011-11-15 09:11:31 : 1321347571*/
App::import('Controller', 'Estadosavisos');

class TestEstadosavisosController extends EstadosavisosController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class EstadosavisosControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.estadosaviso', 'app.avisosrepuesto', 'app.cliente', 'app.comerciale', 'app.formapago', 'app.centrostrabajo', 'app.maquina', 'app.presupuestosproveedore', 'app.proveedore', 'app.articulo', 'app.familia', 'app.almacene', 'app.referenciasintercambiable', 'app.articulos_referenciasintercambiable', 'app.facturas_cliente', 'app.avisostallere', 'app.presupuestos_cliente', 'app.transportista', 'app.ordene', 'app.estadosordene', 'app.tarea', 'app.pedidoscliente', 'app.pedidosproveedore', 'app.albaranesproveedore', 'app.facturasproveedore', 'app.tiposiva', 'app.albaranescliente', 'app.articulos_facturas_cliente', 'app.articulos_avisosrepuesto');

	function startTest() {
		$this->Estadosavisos =& new TestEstadosavisosController();
		$this->Estadosavisos->constructClasses();
	}

	function endTest() {
		unset($this->Estadosavisos);
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