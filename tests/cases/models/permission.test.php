<?php
/* Permission Test cases generated on: 2011-09-08 21:09:02 : 1315509362*/
App::import('Model', 'Permission');

class PermissionTestCase extends CakeTestCase {
	var $fixtures = array('app.permission', 'app.group', 'app.groups_permission', 'app.user', 'app.groups_user');

	function startTest() {
		$this->Permission =& ClassRegistry::init('Permission');
	}

	function endTest() {
		unset($this->Permission);
		ClassRegistry::flush();
	}

}
?>