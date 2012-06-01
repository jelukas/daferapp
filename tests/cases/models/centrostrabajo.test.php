<?php
/* Centrostrabajo Test cases generated on: 2011-09-19 20:09:03 : 1316457363*/
App::import('Model', 'Centrostrabajo');

class CentrostrabajoTestCase extends CakeTestCase {
	var $fixtures = array('app.centrostrabajo', 'app.cliente', 'app.comerciale', 'app.formapago');

	function startTest() {
		$this->Centrostrabajo =& ClassRegistry::init('Centrostrabajo');
	}

	function endTest() {
		unset($this->Centrostrabajo);
		ClassRegistry::flush();
	}

}
?>