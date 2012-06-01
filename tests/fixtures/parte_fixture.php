<?php
/* Parte Fixture generated on: 2011-10-16 15:10:16 : 1318770976 */
class ParteFixture extends CakeTestFixture {
	var $name = 'Parte';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'ordene_id' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'key' => 'index'),
		'operacion' => array('type' => 'string', 'null' => true, 'default' => NULL),
		'mecanico_id' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'key' => 'index'),
		'fecha' => array('type' => 'date', 'null' => true, 'default' => NULL),
		'horainicio' => array('type' => 'time', 'null' => true, 'default' => NULL),
		'horafinal' => array('type' => 'time', 'null' => true, 'default' => NULL),
		'descripcion' => array('type' => 'string', 'null' => true, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'ordene_id' => array('column' => 'ordene_id', 'unique' => 0), 'mecanico_id' => array('column' => 'mecanico_id', 'unique' => 0)),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

	var $records = array(
		array(
			'id' => 1,
			'ordene_id' => 1,
			'operacion' => 'Lorem ipsum dolor sit amet',
			'mecanico_id' => 1,
			'fecha' => '2011-10-16',
			'horainicio' => '15:16:16',
			'horafinal' => '15:16:16',
			'descripcion' => 'Lorem ipsum dolor sit amet'
		),
	);
}
?>