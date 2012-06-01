<?php
/* ArticulosAvisostallere Test cases generated on: 2011-10-04 10:10:41 : 1317716081*/
App::import('Model', 'ArticulosAvisostallere');

class ArticulosAvisostallereTestCase extends CakeTestCase {
	var $fixtures = array('app.articulos_avisostallere', 'app.articulo', 'app.familia', 'app.almacene', 'app.proveedore', 'app.referenciasintercambiable', 'app.articulos_referenciasintercambiable', 'app.avisostallere', 'app.cliente', 'app.comerciale', 'app.formapago', 'app.centrostrabajo', 'app.maquina');

	function startTest() {
		$this->ArticulosAvisostallere =& ClassRegistry::init('ArticulosAvisostallere');
	}

	function endTest() {
		unset($this->ArticulosAvisostallere);
		ClassRegistry::flush();
	}

}
?>