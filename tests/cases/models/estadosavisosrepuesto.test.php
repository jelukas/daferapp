<?php
/* Estadosavisosrepuesto Test cases generated on: 2011-11-21 18:11:40 : 1321896940*/
App::import('Model', 'Estadosavisosrepuesto');

class EstadosavisosrepuestoTestCase extends CakeTestCase {
	var $fixtures = array('app.estadosavisosrepuesto');

	function startTest() {
		$this->Estadosavisosrepuesto =& ClassRegistry::init('Estadosavisosrepuesto');
	}

	function endTest() {
		unset($this->Estadosavisosrepuesto);
		ClassRegistry::flush();
	}

}
?>