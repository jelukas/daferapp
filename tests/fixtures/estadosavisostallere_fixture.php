<?php
/* Estadosavisostallere Fixture generated on: 2011-11-21 19:11:34 : 1321899034 */
class EstadosavisostallereFixture extends CakeTestFixture {
	var $name = 'Estadosavisostallere';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'estado' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 100),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

	var $records = array(
		array(
			'id' => 1,
			'estado' => 'Lorem ipsum dolor sit amet'
		),
	);
}
?>