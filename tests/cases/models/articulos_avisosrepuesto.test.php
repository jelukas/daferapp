<?php
/* ArticulosAvisosrepuesto Test cases generated on: 2011-10-17 02:10:18 : 1318811358*/
App::import('Model', 'ArticulosAvisosrepuesto');

class ArticulosAvisosrepuestoTestCase extends CakeTestCase {
	var $fixtures = array('app.articulos_avisosrepuesto', 'app.articulo', 'app.familia', 'app.almacene', 'app.proveedore', 'app.referenciasintercambiable', 'app.articulos_referenciasintercambiable', 'app.avisostallere', 'app.cliente', 'app.comerciale', 'app.formapago', 'app.centrostrabajo', 'app.maquina', 'app.articulos_avisostallere', 'app.facturas_cliente', 'app.articulos_facturas_cliente', 'app.avisosrepuesto');

	function startTest() {
		$this->ArticulosAvisosrepuesto =& ClassRegistry::init('ArticulosAvisosrepuesto');
	}

	function endTest() {
		unset($this->ArticulosAvisosrepuesto);
		ClassRegistry::flush();
	}

}
?>