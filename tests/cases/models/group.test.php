<?php
/* Group Test cases generated on: 2011-09-08 21:09:14 : 1315509314*/
App::import('Model', 'Group');

class GroupTestCase extends CakeTestCase {
	var $fixtures = array('app.group', 'app.permission', 'app.groups_permission', 'app.user', 'app.groups_user');

	function startTest() {
		$this->Group =& ClassRegistry::init('Group');
	}

	function endTest() {
		unset($this->Group);
		ClassRegistry::flush();
	}

}
?>