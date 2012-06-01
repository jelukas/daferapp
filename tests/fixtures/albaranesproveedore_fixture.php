<?php
/* Albaranesproveedore Fixture generated on: 2011-10-16 19:10:50 : 1318786490 */
class AlbaranesproveedoreFixture extends CakeTestFixture {
	var $name = 'Albaranesproveedore';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'pedidosproveedore_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'index'),
		'fecha' => array('type' => 'date', 'null' => false, 'default' => NULL),
		'numeroalbaran' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 50),
		'observaciones' => array('type' => 'string', 'null' => false, 'default' => NULL),
		'albaranescaneado' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'facturasproveedore_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'index'),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'facturasproveedore_id' => array('column' => 'facturasproveedore_id', 'unique' => 0), 'pedidosproveedore_id' => array('column' => 'pedidosproveedore_id', 'unique' => 0)),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

	var $records = array(
		array(
			'id' => 1,
			'pedidosproveedore_id' => 1,
			'fecha' => '2011-10-16',
			'numeroalbaran' => 'Lorem ipsum dolor sit amet',
			'observaciones' => 'Lorem ipsum dolor sit amet',
			'albaranescaneado' => 1,
			'facturasproveedore_id' => 1
		),
	);
}
?>