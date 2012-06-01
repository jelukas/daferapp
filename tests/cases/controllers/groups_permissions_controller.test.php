<?php
/* GroupsPermissions Test cases generated on: 2011-09-09 11:09:06 : 1315559346*/
App::import('Controller', 'GroupsPermissions');

class TestGroupsPermissionsController extends GroupsPermissionsController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class GroupsPermissionsControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.groups_permission', 'app.group', 'app.permission', 'app.user', 'app.groups_user');

	function startTest() {
		$this->GroupsPermissions =& new TestGroupsPermissionsController();
		$this->GroupsPermissions->constructClasses();
	}

	function endTest() {
		unset($this->GroupsPermissions);
		ClassRegistry::flush();
	}

	function testIndex() {

	}

	function testView() {

	}

	function testAdd() {

	}

	function testEdit() {

	}

	function testDelete() {

	}

}
?>