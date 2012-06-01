<?php
/* PresupuestosCliente Test cases generated on: 2011-10-11 11:10:52 : 1318326412*/
App::import('Model', 'PresupuestosCliente');

class PresupuestosClienteTestCase extends CakeTestCase {
	var $fixtures = array('app.presupuestos_cliente', 'app.transportista', 'app.cliente', 'app.comerciale', 'app.formapago', 'app.centrostrabajo', 'app.maquina', 'app.ordene', 'app.avisostallere', 'app.articulo', 'app.familia', 'app.almacene', 'app.proveedore', 'app.referenciasintercambiable', 'app.articulos_referenciasintercambiable', 'app.articulos_avisostallere', 'app.pedidos_cliente');

	function startTest() {
		$this->PresupuestosCliente =& ClassRegistry::init('PresupuestosCliente');
	}

	function endTest() {
		unset($this->PresupuestosCliente);
		ClassRegistry::flush();
	}

}
?>