<?php
/* ComercialesProveedore Test cases generated on: 2011-09-08 20:09:40 : 1315507060*/
App::import('Model', 'ComercialesProveedore');

class ComercialesProveedoreTestCase extends CakeTestCase {
	var $fixtures = array('app.comerciales_proveedore', 'app.proveedore', 'app.provincia', 'app.poblacione', 'app.codigospostale');

	function startTest() {
		$this->ComercialesProveedore =& ClassRegistry::init('ComercialesProveedore');
	}

	function endTest() {
		unset($this->ComercialesProveedore);
		ClassRegistry::flush();
	}

}
?>