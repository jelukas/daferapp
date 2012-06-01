<?php
/* GroupsUser Fixture generated on: 2011-09-08 21:09:50 : 1315509350 */
class GroupsUserFixture extends CakeTestFixture {
	var $name = 'GroupsUser';

	var $fields = array(
		'group_id' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'indexes' => array(),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

	var $records = array(
		array(
			'group_id' => 1,
			'user_id' => 1
		),
	);
}
?>