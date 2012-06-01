<?php
/* Partestallere Fixture generated on: 2011-11-15 18:11:08 : 1321377668 */
class PartestallereFixture extends CakeTestFixture {
	var $name = 'Partestallere';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'ordene_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'index'),
		'tarea_id' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'fecha' => array('type' => 'date', 'null' => false, 'default' => NULL),
		'horainicio' => array('type' => 'time', 'null' => false, 'default' => NULL),
		'horafinal' => array('type' => 'time', 'null' => false, 'default' => NULL),
		'horasimputables' => array('type' => 'float', 'null' => false, 'default' => NULL),
		'horasnoimputables' => array('type' => 'float', 'null' => true, 'default' => NULL),
		'operacion' => array('type' => 'text', 'null' => false, 'default' => NULL),
		'observaciones' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 500),
		'firmadopor' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 100),
		'DNI' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 9),
		'parteescaneado' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 100),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'ordene_id' => array('column' => array('ordene_id', 'tarea_id'), 'unique' => 0)),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

	var $records = array(
		array(
			'id' => 1,
			'ordene_id' => 1,
			'tarea_id' => 1,
			'fecha' => '2011-11-15',
			'horainicio' => '18:21:08',
			'horafinal' => '18:21:08',
			'horasimputables' => 1,
			'horasnoimputables' => 1,
			'operacion' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'observaciones' => 'Lorem ipsum dolor sit amet',
			'firmadopor' => 'Lorem ipsum dolor sit amet',
			'DNI' => 'Lorem i',
			'parteescaneado' => 'Lorem ipsum dolor sit amet'
		),
	);
}
?>