<?php
/* Devolucionesproveedore Fixture generated on: 2011-12-16 12:12:44 : 1324036724 */
class DevolucionesproveedoreFixture extends CakeTestFixture {
	var $name = 'Devolucionesproveedore';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'facturasproveedore_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'index'),
		'albaranesproveedore_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'index'),
		'proveedore_id' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'fecha' => array('type' => 'date', 'null' => false, 'default' => NULL),
		'numeroabono' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 50),
		'observaciones' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'facturasproveedore_id' => array('column' => 'facturasproveedore_id', 'unique' => 0), 'albaranesproveedore_id' => array('column' => 'albaranesproveedore_id', 'unique' => 0)),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

	var $records = array(
		array(
			'id' => 1,
			'facturasproveedore_id' => 1,
			'albaranesproveedore_id' => 1,
			'proveedore_id' => 1,
			'fecha' => '2011-12-16',
			'numeroabono' => 'Lorem ipsum dolor sit amet',
			'observaciones' => 1
		),
	);
}
?>