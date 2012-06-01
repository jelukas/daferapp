<?php
/* Maquina Test cases generated on: 2011-09-20 13:09:48 : 1316517048*/
App::import('Model', 'Maquina');

class MaquinaTestCase extends CakeTestCase {
	var $fixtures = array('app.maquina', 'app.centrostrabajo', 'app.cliente', 'app.comerciale', 'app.formapago');

	function startTest() {
		$this->Maquina =& ClassRegistry::init('Maquina');
	}

	function endTest() {
		unset($this->Maquina);
		ClassRegistry::flush();
	}

}
?>