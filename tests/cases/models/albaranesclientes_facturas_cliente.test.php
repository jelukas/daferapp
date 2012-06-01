<?php
/* AlbaranesclientesFacturasCliente Test cases generated on: 2011-11-17 10:11:25 : 1321523485*/
App::import('Model', 'AlbaranesclientesFacturasCliente');

class AlbaranesclientesFacturasClienteTestCase extends CakeTestCase {
	var $fixtures = array('app.albaranesclientes_facturas_cliente', 'app.albaranesclientes', 'app.facturas_cliente', 'app.cliente', 'app.comerciale', 'app.formapago', 'app.centrostrabajo', 'app.avisosrepuesto', 'app.maquina', 'app.estadosaviso', 'app.presupuestosproveedore', 'app.proveedore', 'app.articulo', 'app.familia', 'app.almacene', 'app.referenciasintercambiable', 'app.articulos_referenciasintercambiable', 'app.parte', 'app.ordene', 'app.avisostallere', 'app.presupuestos_cliente', 'app.transportista', 'app.pedidoscliente', 'app.pedidosproveedore', 'app.albaranesproveedore', 'app.facturasproveedore', 'app.tiposiva', 'app.albaranescliente', 'app.estadosordene', 'app.tarea', 'app.partestallere', 'app.articulos_partestallere', 'app.mecanico', 'app.mecanicos_parte', 'app.mecanicos_partestallere', 'app.articulos_parte', 'app.articulos_facturas_cliente', 'app.articulos_avisosrepuesto');

	function startTest() {
		$this->AlbaranesclientesFacturasCliente =& ClassRegistry::init('AlbaranesclientesFacturasCliente');
	}

	function endTest() {
		unset($this->AlbaranesclientesFacturasCliente);
		ClassRegistry::flush();
	}

}
?>