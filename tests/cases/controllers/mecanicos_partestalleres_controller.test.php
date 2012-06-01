<?php
/* MecanicosPartestalleres Test cases generated on: 2011-11-15 18:11:36 : 1321377696*/
App::import('Controller', 'MecanicosPartestalleres');

class TestMecanicosPartestalleresController extends MecanicosPartestalleresController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class MecanicosPartestalleresControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.mecanicos_partestallere', 'app.mecanico', 'app.partestallere', 'app.ordene', 'app.avisostallere', 'app.cliente', 'app.comerciale', 'app.formapago', 'app.centrostrabajo', 'app.maquina', 'app.presupuestosproveedore', 'app.proveedore', 'app.articulo', 'app.familia', 'app.almacene', 'app.referenciasintercambiable', 'app.articulos_referenciasintercambiable', 'app.facturas_cliente', 'app.avisosrepuesto', 'app.estadosaviso', 'app.presupuestos_cliente', 'app.transportista', 'app.pedidoscliente', 'app.pedidosproveedore', 'app.albaranesproveedore', 'app.facturasproveedore', 'app.tiposiva', 'app.albaranescliente', 'app.articulos_avisosrepuesto', 'app.articulos_facturas_cliente', 'app.estadosordene', 'app.tarea', 'app.articulos_partestallere');

	function startTest() {
		$this->MecanicosPartestalleres =& new TestMecanicosPartestalleresController();
		$this->MecanicosPartestalleres->constructClasses();
	}

	function endTest() {
		unset($this->MecanicosPartestalleres);
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