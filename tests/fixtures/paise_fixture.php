<?php
/* Paise Fixture generated on: 2011-09-08 20:09:12 : 1315507212 */
class PaiseFixture extends CakeTestFixture {
	var $name = 'Paise';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'pais' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 100),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_spanish2_ci', 'engine' => 'InnoDB')
	);

	var $records = array(
		array(
			'id' => 1,
			'pais' => 'Lorem ipsum dolor sit amet'
		),
	);
}
?>