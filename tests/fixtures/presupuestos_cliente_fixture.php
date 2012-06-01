<?php
/* PresupuestosCliente Fixture generated on: 2011-10-11 11:10:52 : 1318326412 */
class PresupuestosClienteFixture extends CakeTestFixture {
	var $name = 'PresupuestosCliente';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'transportista_id' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'key' => 'index'),
		'cliente_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'index'),
		'comerciale_id' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'key' => 'index'),
		'ordene_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'index'),
		'fecha' => array('type' => 'date', 'null' => true, 'default' => NULL),
		'plazos' => array('type' => 'integer', 'null' => true, 'default' => NULL),
		'hora_llegada' => array('type' => 'date', 'null' => true, 'default' => NULL),
		'avisar' => array('type' => 'boolean', 'null' => true, 'default' => NULL),
		'observaciones' => array('type' => 'text', 'null' => true, 'default' => NULL),
		'precio_mat' => array('type' => 'float', 'null' => false, 'default' => NULL),
		'precio_obra' => array('type' => 'float', 'null' => false, 'default' => NULL),
		'precio' => array('type' => 'float', 'null' => false, 'default' => NULL),
		'impuestos' => array('type' => 'float', 'null' => false, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'cliente_id' => array('column' => 'cliente_id', 'unique' => 0), 'ordene_id' => array('column' => 'ordene_id', 'unique' => 0), 'transportista_id' => array('column' => 'transportista_id', 'unique' => 0), 'comerciale_id' => array('column' => 'comerciale_id', 'unique' => 0)),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

	var $records = array(
		array(
			'id' => 1,
			'transportista_id' => 1,
			'cliente_id' => 1,
			'comerciale_id' => 1,
			'ordene_id' => 1,
			'fecha' => '2011-10-11',
			'plazos' => 1,
			'hora_llegada' => '2011-10-11',
			'avisar' => 1,
			'observaciones' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'precio_mat' => 1,
			'precio_obra' => 1,
			'precio' => 1,
			'impuestos' => 1
		),
	);
}
?>