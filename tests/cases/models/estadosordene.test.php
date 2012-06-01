<?php
/* Estadosordene Test cases generated on: 2011-11-14 00:11:06 : 1321225326*/
App::import('Model', 'Estadosordene');

class EstadosordeneTestCase extends CakeTestCase {
	var $fixtures = array('app.estadosordene');

	function startTest() {
		$this->Estadosordene =& ClassRegistry::init('Estadosordene');
	}

	function endTest() {
		unset($this->Estadosordene);
		ClassRegistry::flush();
	}

}
?>