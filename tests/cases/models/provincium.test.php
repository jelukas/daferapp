<?php
/* Provincium Test cases generated on: 2011-09-08 20:09:28 : 1315507228*/
App::import('Model', 'Provincium');

class ProvinciumTestCase extends CakeTestCase {
	function startTest() {
		$this->Provincium =& ClassRegistry::init('Provincium');
	}

	function endTest() {
		unset($this->Provincium);
		ClassRegistry::flush();
	}

}
?>