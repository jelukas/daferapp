<?php
/* GroupsUser Test cases generated on: 2011-09-08 21:09:50 : 1315509350*/
App::import('Model', 'GroupsUser');

class GroupsUserTestCase extends CakeTestCase {
	var $fixtures = array('app.groups_user', 'app.group', 'app.permission', 'app.groups_permission', 'app.user');

	function startTest() {
		$this->GroupsUser =& ClassRegistry::init('GroupsUser');
	}

	function endTest() {
		unset($this->GroupsUser);
		ClassRegistry::flush();
	}

}
?>