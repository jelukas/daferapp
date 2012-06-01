<?php
/* Devolucionesproveedore Test cases generated on: 2011-12-16 12:12:44 : 1324036724*/
App::import('Model', 'Devolucionesproveedore');

class DevolucionesproveedoreTestCase extends CakeTestCase {
	var $fixtures = array('app.devolucionesproveedore', 'app.facturasproveedore', 'app.proveedore', 'app.articulo', 'app.familia', 'app.almacene', 'app.referenciasintercambiable', 'app.articulos_referenciasintercambiable', 'app.parte', 'app.tarea', 'app.ordene', 'app.avisostallere', 'app.cliente', 'app.comerciale', 'app.formapago', 'app.centrostrabajo', 'app.avisosrepuesto', 'app.maquina', 'app.estadosaviso', 'app.presupuestosproveedore', 'app.presupuestos_cliente', 'app.transportista', 'app.pedidoscliente', 'app.pedidosproveedore', 'app.albaranesproveedore', 'app.albaranescliente', 'app.facturas_cliente', 'app.tiposiva', 'app.articulos_facturas_cliente', 'app.albaranesclientes_facturas_cliente', 'app.articulos_avisosrepuesto', 'app.estadosavisostallere', 'app.estadosordene', 'app.partestallere', 'app.articulos_partestallere', 'app.mecanico', 'app.mecanicos_parte', 'app.mecanicos_partestallere', 'app.articulos_parte');

	function startTest() {
		$this->Devolucionesproveedore =& ClassRegistry::init('Devolucionesproveedore');
	}

	function endTest() {
		unset($this->Devolucionesproveedore);
		ClassRegistry::flush();
	}

}
?>