<?php
/* Centrostrabajo Fixture generated on: 2011-09-19 20:09:54 : 1316457354 */
class CentrostrabajoFixture extends CakeTestFixture {
	var $name = 'Centrostrabajo';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'centrotrabajo' => array('type' => 'string', 'null' => false, 'default' => NULL),
		'direccion' => array('type' => 'string', 'null' => false, 'default' => NULL),
		'poblacion' => array('type' => 'string', 'null' => false, 'default' => NULL),
		'provincia' => array('type' => 'string', 'null' => false, 'default' => NULL),
		'cp' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 5),
		'telefono' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 100),
		'cliente_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'index'),
		'preciodesplazamiento' => array('type' => 'float', 'null' => false, 'default' => NULL),
		'kilometraje' => array('type' => 'float', 'null' => false, 'default' => NULL),
		'observaciones' => array('type' => 'string', 'null' => false, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'cliente_id' => array('column' => 'cliente_id', 'unique' => 0)),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

	var $records = array(
		array(
			'id' => 1,
			'centrotrabajo' => 'Lorem ipsum dolor sit amet',
			'direccion' => 'Lorem ipsum dolor sit amet',
			'poblacion' => 'Lorem ipsum dolor sit amet',
			'provincia' => 'Lorem ipsum dolor sit amet',
			'cp' => 1,
			'telefono' => 'Lorem ipsum dolor sit amet',
			'cliente_id' => 1,
			'preciodesplazamiento' => 1,
			'kilometraje' => 1,
			'observaciones' => 'Lorem ipsum dolor sit amet'
		),
	);
}
?>