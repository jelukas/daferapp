<?php
/* Tarea Test cases generated on: 2011-11-14 23:11:54 : 1321310694*/
App::import('Model', 'Tarea');

class TareaTestCase extends CakeTestCase {
	var $fixtures = array('app.tarea', 'app.ordene', 'app.avisostallere', 'app.cliente', 'app.comerciale', 'app.formapago', 'app.centrostrabajo', 'app.maquina', 'app.presupuestosproveedore', 'app.proveedore', 'app.articulo', 'app.familia', 'app.almacene', 'app.referenciasintercambiable', 'app.articulos_referenciasintercambiable', 'app.facturas_cliente', 'app.avisosrepuesto', 'app.presupuestos_cliente', 'app.transportista', 'app.pedidoscliente', 'app.pedidosproveedore', 'app.albaranesproveedore', 'app.facturasproveedore', 'app.tiposiva', 'app.albaranescliente', 'app.articulos_avisosrepuesto', 'app.articulos_facturas_cliente', 'app.estadosordene');

	function startTest() {
		$this->Tarea =& ClassRegistry::init('Tarea');
	}

	function endTest() {
		unset($this->Tarea);
		ClassRegistry::flush();
	}

}
?>