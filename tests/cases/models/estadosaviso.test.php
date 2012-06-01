<?php
/* Estadosaviso Test cases generated on: 2011-11-15 09:11:29 : 1321347569*/
App::import('Model', 'Estadosaviso');

class EstadosavisoTestCase extends CakeTestCase {
	var $fixtures = array('app.estadosaviso', 'app.avisosrepuesto', 'app.cliente', 'app.comerciale', 'app.formapago', 'app.centrostrabajo', 'app.maquina', 'app.presupuestosproveedore', 'app.proveedore', 'app.articulo', 'app.familia', 'app.almacene', 'app.referenciasintercambiable', 'app.articulos_referenciasintercambiable', 'app.facturas_cliente', 'app.avisostallere', 'app.presupuestos_cliente', 'app.transportista', 'app.ordene', 'app.estadosordene', 'app.tarea', 'app.pedidoscliente', 'app.pedidosproveedore', 'app.albaranesproveedore', 'app.facturasproveedore', 'app.tiposiva', 'app.albaranescliente', 'app.articulos_facturas_cliente', 'app.articulos_avisosrepuesto');

	function startTest() {
		$this->Estadosaviso =& ClassRegistry::init('Estadosaviso');
	}

	function endTest() {
		unset($this->Estadosaviso);
		ClassRegistry::flush();
	}

}
?>