<?php
/* Devolucionesproveedores Test cases generated on: 2011-12-16 12:12:45 : 1324036725*/
App::import('Controller', 'Devolucionesproveedores');

class TestDevolucionesproveedoresController extends DevolucionesproveedoresController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class DevolucionesproveedoresControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.devolucionesproveedore', 'app.facturasproveedore', 'app.proveedore', 'app.articulo', 'app.familia', 'app.almacene', 'app.referenciasintercambiable', 'app.articulos_referenciasintercambiable', 'app.parte', 'app.tarea', 'app.ordene', 'app.avisostallere', 'app.cliente', 'app.comerciale', 'app.formapago', 'app.centrostrabajo', 'app.avisosrepuesto', 'app.maquina', 'app.estadosaviso', 'app.presupuestosproveedore', 'app.presupuestos_cliente', 'app.transportista', 'app.pedidoscliente', 'app.pedidosproveedore', 'app.albaranesproveedore', 'app.albaranescliente', 'app.facturas_cliente', 'app.tiposiva', 'app.articulos_facturas_cliente', 'app.albaranesclientes_facturas_cliente', 'app.articulos_avisosrepuesto', 'app.estadosavisostallere', 'app.estadosordene', 'app.partestallere', 'app.articulos_partestallere', 'app.mecanico', 'app.mecanicos_parte', 'app.mecanicos_partestallere', 'app.articulos_parte');

	function startTest() {
		$this->Devolucionesproveedores =& new TestDevolucionesproveedoresController();
		$this->Devolucionesproveedores->constructClasses();
	}

	function endTest() {
		unset($this->Devolucionesproveedores);
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