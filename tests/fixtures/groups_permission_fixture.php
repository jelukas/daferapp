<?php
/* GroupsPermission Fixture generated on: 2011-09-08 21:09:33 : 1315509333 */
class GroupsPermissionFixture extends CakeTestFixture {
	var $name = 'GroupsPermission';

	var $fields = array(
		'group_id' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'permission_id' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'indexes' => array(),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

	var $records = array(
		array(
			'group_id' => 1,
			'permission_id' => 1
		),
	);
}
?>