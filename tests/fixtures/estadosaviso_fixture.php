<?php
/* Estadosaviso Fixture generated on: 2011-11-15 09:11:29 : 1321347569 */
class EstadosavisoFixture extends CakeTestFixture {
	var $name = 'Estadosaviso';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'estado' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 50),
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