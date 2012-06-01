<?php
/* Parte Test cases generated on: 2011-10-16 15:10:16 : 1318770976*/
App::import('Model', 'Parte');

class ParteTestCase extends CakeTestCase {
	var $fixtures = array('app.parte', 'app.ordene', 'app.avisostallere', 'app.cliente', 'app.comerciale', 'app.formapago', 'app.centrostrabajo', 'app.maquina', 'app.articulo', 'app.familia', 'app.almacene', 'app.proveedore', 'app.referenciasintercambiable', 'app.articulos_referenciasintercambiable', 'app.articulos_avisostallere', 'app.facturas_cliente', 'app.articulos_facturas_cliente', 'app.presupuestos_cliente', 'app.transportista', 'app.pedidos_cliente', 'app.mecanico');

	function startTest() {
		$this->Parte =& ClassRegistry::init('Parte');
	}

	function endTest() {
		unset($this->Parte);
		ClassRegistry::flush();
	}

}
?>