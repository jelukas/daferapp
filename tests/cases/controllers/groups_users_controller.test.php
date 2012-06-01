<?php
/* GroupsUsers Test cases generated on: 2011-09-09 11:09:13 : 1315559353*/
App::import('Controller', 'GroupsUsers');

class TestGroupsUsersController extends GroupsUsersController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class GroupsUsersControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.groups_user', 'app.group', 'app.permission', 'app.groups_permission', 'app.user');

	function startTest() {
		$this->GroupsUsers =& new TestGroupsUsersController();
		$this->GroupsUsers->constructClasses();
	}

	function endTest() {
		unset($this->GroupsUsers);
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