<?php
/* Ordene Fixture generated on: 2011-10-11 10:10:51 : 1318322271 */
class OrdeneFixture extends CakeTestFixture {
	var $name = 'Ordene';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'urgente' => array('type' => 'boolean', 'null' => true, 'default' => NULL),
		'observaciones' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 245),
		'avisostallere_id' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'key' => 'index'),
		'estado' => array('type' => 'string', 'null' => true, 'default' => ' ', 'length' => 45),
		'fecha_prevista_reparacion' => array('type' => 'date', 'null' => true, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'avisostallere_id' => array('column' => 'avisostallere_id', 'unique' => 0)),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

	var $records = array(
		array(
			'id' => 1,
			'urgente' => 1,
			'observaciones' => 'Lorem ipsum dolor sit amet',
			'avisostallere_id' => 1,
			'estado' => 'Lorem ipsum dolor sit amet',
			'fecha_prevista_reparacion' => '2011-10-11'
		),
	);
}
?>