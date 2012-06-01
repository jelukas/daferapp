<?php
/* Tareas Test cases generated on: 2011-11-16 01:11:09 : 1321402629*/
App::import('Controller', 'Tareas');

class TestTareasController extends TareasController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class TareasControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.tarea', 'app.ordene', 'app.avisostallere', 'app.cliente', 'app.comerciale', 'app.formapago', 'app.centrostrabajo', 'app.avisosrepuesto', 'app.maquina', 'app.estadosaviso', 'app.presupuestosproveedore', 'app.proveedore', 'app.articulo', 'app.familia', 'app.almacene', 'app.referenciasintercambiable', 'app.articulos_referenciasintercambiable', 'app.parte', 'app.articulos_partestallere', 'app.mecanico', 'app.mecanicos_parte', 'app.partestallere', 'app.mecanicos_partestallere', 'app.articulos_parte', 'app.facturas_cliente', 'app.tiposiva', 'app.articulos_facturas_cliente', 'app.presupuestos_cliente', 'app.transportista', 'app.pedidoscliente', 'app.pedidosproveedore', 'app.albaranesproveedore', 'app.facturasproveedore', 'app.albaranescliente', 'app.articulos_avisosrepuesto', 'app.estadosordene');

	function startTest() {
		$this->Tareas =& new TestTareasController();
		$this->Tareas->constructClasses();
	}

	function endTest() {
		unset($this->Tareas);
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