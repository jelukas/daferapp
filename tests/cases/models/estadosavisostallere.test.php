<?php
/* Estadosavisostallere Test cases generated on: 2011-11-21 19:11:34 : 1321899034*/
App::import('Model', 'Estadosavisostallere');

class EstadosavisostallereTestCase extends CakeTestCase {
	var $fixtures = array('app.estadosavisostallere');

	function startTest() {
		$this->Estadosavisostallere =& ClassRegistry::init('Estadosavisostallere');
	}

	function endTest() {
		unset($this->Estadosavisostallere);
		ClassRegistry::flush();
	}

}
?>