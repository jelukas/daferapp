<?php
/* Avisosrepuesto Test cases generated on: 2011-10-17 02:10:30 : 1318811370*/
App::import('Model', 'Avisosrepuesto');

class AvisosrepuestoTestCase extends CakeTestCase {
	var $fixtures = array('app.avisosrepuesto', 'app.cliente', 'app.comerciale', 'app.formapago', 'app.centrostrabajo', 'app.maquina', 'app.articulo', 'app.familia', 'app.almacene', 'app.proveedore', 'app.referenciasintercambiable', 'app.articulos_referenciasintercambiable', 'app.avisostallere', 'app.articulos_avisostallere', 'app.facturas_cliente', 'app.articulos_facturas_cliente', 'app.articulos_avisosrepuesto');

	function startTest() {
		$this->Avisosrepuesto =& ClassRegistry::init('Avisosrepuesto');
	}

	function endTest() {
		unset($this->Avisosrepuesto);
		ClassRegistry::flush();
	}

}
?>