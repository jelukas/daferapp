<?php
/* Avisostallere Test cases generated on: 2011-09-30 09:09:51 : 1317367491*/
App::import('Model', 'Avisostallere');

class AvisostallereTestCase extends CakeTestCase {
	var $fixtures = array('app.avisostallere', 'app.cliente', 'app.comerciale', 'app.formapago', 'app.centrostrabajo', 'app.maquina', 'app.articulo', 'app.familia', 'app.almacene', 'app.proveedore', 'app.referenciasintercambiable', 'app.articulos_referenciasintercambiable');

	function startTest() {
		$this->Avisostallere =& ClassRegistry::init('Avisostallere');
	}

	function endTest() {
		unset($this->Avisostallere);
		ClassRegistry::flush();
	}

}
?>