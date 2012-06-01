<?php
/* Proveedore Test cases generated on: 2011-09-20 17:09:13 : 1316531893*/
App::import('Model', 'Proveedore');

class ProveedoreTestCase extends CakeTestCase {
	var $fixtures = array('app.proveedore', 'app.articulo', 'app.familia', 'app.almacene', 'app.referenciasintercambiable', 'app.articulos_referenciasintercambiable', 'app.comerciale', 'app.cliente', 'app.formapago', 'app.centrostrabajo', 'app.maquina', 'app.comerciales_proveedore');

	function startTest() {
		$this->Proveedore =& ClassRegistry::init('Proveedore');
	}

	function endTest() {
		unset($this->Proveedore);
		ClassRegistry::flush();
	}

}
?>