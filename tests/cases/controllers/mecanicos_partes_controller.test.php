<?php
/* MecanicosPartes Test cases generated on: 2011-11-15 18:11:26 : 1321377686*/
App::import('Controller', 'MecanicosPartes');

class TestMecanicosPartesController extends MecanicosPartesController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class MecanicosPartesControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.mecanicos_parte', 'app.mecanico', 'app.parte', 'app.ordene', 'app.avisostallere', 'app.cliente', 'app.comerciale', 'app.formapago', 'app.centrostrabajo', 'app.maquina', 'app.presupuestosproveedore', 'app.proveedore', 'app.articulo', 'app.familia', 'app.almacene', 'app.referenciasintercambiable', 'app.articulos_referenciasintercambiable', 'app.facturas_cliente', 'app.avisosrepuesto', 'app.estadosaviso', 'app.presupuestos_cliente', 'app.transportista', 'app.pedidoscliente', 'app.pedidosproveedore', 'app.albaranesproveedore', 'app.facturasproveedore', 'app.tiposiva', 'app.albaranescliente', 'app.articulos_avisosrepuesto', 'app.articulos_facturas_cliente', 'app.estadosordene', 'app.tarea', 'app.articulos_partestallere', 'app.mecanicos_partestallere');

	function startTest() {
		$this->MecanicosPartes =& new TestMecanicosPartesController();
		$this->MecanicosPartes->constructClasses();
	}

	function endTest() {
		unset($this->MecanicosPartes);
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