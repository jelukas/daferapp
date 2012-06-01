<?php
/* Estadosavisosrepuesto Fixture generated on: 2011-11-21 18:11:40 : 1321896940 */
class EstadosavisosrepuestoFixture extends CakeTestFixture {
	var $name = 'Estadosavisosrepuesto';

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