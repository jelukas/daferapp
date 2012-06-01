<?php
/* GroupsPermission Test cases generated on: 2011-09-08 21:09:33 : 1315509333*/
App::import('Model', 'GroupsPermission');

class GroupsPermissionTestCase extends CakeTestCase {
	var $fixtures = array('app.groups_permission', 'app.group', 'app.permission', 'app.user', 'app.groups_user');

	function startTest() {
		$this->GroupsPermission =& ClassRegistry::init('GroupsPermission');
	}

	function endTest() {
		unset($this->GroupsPermission);
		ClassRegistry::flush();
	}

}
?>