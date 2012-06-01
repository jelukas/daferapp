<?php
/* ArticulosReferenciasintercambiable Test cases generated on: 2011-10-04 10:10:08 : 1317715928*/
App::import('Model', 'ArticulosReferenciasintercambiable');

class ArticulosReferenciasintercambiableTestCase extends CakeTestCase {
	var $fixtures = array('app.articulos_referenciasintercambiable', 'app.articulo', 'app.familia', 'app.almacene', 'app.proveedore', 'app.referenciasintercambiable', 'app.avisostallere', 'app.cliente', 'app.comerciale', 'app.formapago', 'app.centrostrabajo', 'app.maquina', 'app.articulos_avisostallere');

	function startTest() {
		$this->ArticulosReferenciasintercambiable =& ClassRegistry::init('ArticulosReferenciasintercambiable');
	}

	function endTest() {
		unset($this->ArticulosReferenciasintercambiable);
		ClassRegistry::flush();
	}

}
?>