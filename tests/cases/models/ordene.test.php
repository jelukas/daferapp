<?php
/* Ordene Test cases generated on: 2011-10-11 10:10:51 : 1318322271*/
App::import('Model', 'Ordene');

class OrdeneTestCase extends CakeTestCase {
	var $fixtures = array('app.ordene', 'app.avisostallere', 'app.cliente', 'app.comerciale', 'app.formapago', 'app.centrostrabajo', 'app.maquina', 'app.articulo', 'app.familia', 'app.almacene', 'app.proveedore', 'app.referenciasintercambiable', 'app.articulos_referenciasintercambiable', 'app.articulos_avisostallere', 'app.presupuestos_cliente');

	function startTest() {
		$this->Ordene =& ClassRegistry::init('Ordene');
	}

	function endTest() {
		unset($this->Ordene);
		ClassRegistry::flush();
	}

}
?>