<?php
/* Paise Test cases generated on: 2011-09-08 20:09:12 : 1315507212*/
App::import('Model', 'Paise');

class PaiseTestCase extends CakeTestCase {
	var $fixtures = array('app.paise', 'app.proveedore', 'app.provincia', 'app.poblacione', 'app.codigospostale');

	function startTest() {
		$this->Paise =& ClassRegistry::init('Paise');
	}

	function endTest() {
		unset($this->Paise);
		ClassRegistry::flush();
	}

}
?>