<?php
/* ArticulosTareas Test cases generated on: 2012-02-14 12:02:58 : 1329218758*/
App::import('Controller', 'ArticulosTareas');

class TestArticulosTareasController extends ArticulosTareasController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class ArticulosTareasControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.articulos_tarea', 'app.articulo', 'app.familia', 'app.almacene', 'app.proveedore', 'app.articulos_avisosrepuesto', 'app.avisosrepuesto', 'app.cliente', 'app.comerciale', 'app.formapago', 'app.centrostrabajo', 'app.avisostallere', 'app.maquina', 'app.estadosavisostallere', 'app.presupuestosproveedore', 'app.ordene', 'app.estadosordene', 'app.presupuestos_cliente', 'app.transportista', 'app.pedidoscliente', 'app.tarea', 'app.parte', 'app.articulos_parte', 'app.mecanico', 'app.mecanicos_parte', 'app.partestallere', 'app.articulos_partestallere', 'app.mecanicos_partestallere', 'app.articulos_presupuestosproveedore', 'app.pedidosproveedore', 'app.albaranesproveedore', 'app.facturasproveedore', 'app.tiposiva', 'app.albaranescliente', 'app.facturas_cliente', 'app.articulos_facturas_cliente', 'app.albaranesclientes_facturas_cliente', 'app.estadosaviso', 'app.referenciasintercambiable', 'app.articulos_referenciasintercambiable', 'app.devolucionesproveedore', 'app.articulos_devolucionesproveedore', 'app.devolucionescliente', 'app.articulos_devolucionescliente');

	function startTest() {
		$this->ArticulosTareas =& new TestArticulosTareasController();
		$this->ArticulosTareas->constructClasses();
	}

	function endTest() {
		unset($this->ArticulosTareas);
		ClassRegistry::flush();
	}

}
?>