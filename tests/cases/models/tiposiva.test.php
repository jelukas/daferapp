<?php
/* Tiposiva Test cases generated on: 2011-10-16 19:10:36 : 1318786476*/
App::import('Model', 'Tiposiva');

class TiposivaTestCase extends CakeTestCase {
	var $fixtures = array('app.tiposiva');

	function startTest() {
		$this->Tiposiva =& ClassRegistry::init('Tiposiva');
	}

	function endTest() {
		unset($this->Tiposiva);
		ClassRegistry::flush();
	}

}
?>