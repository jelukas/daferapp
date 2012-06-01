<?php
/* Maquina Fixture generated on: 2011-09-20 13:09:48 : 1316517048 */
class MaquinaFixture extends CakeTestFixture {
	var $name = 'Maquina';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'nombre' => array('type' => 'string', 'null' => false, 'default' => NULL),
		'serie_maquina' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 100),
		'serie_motor' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 100),
		'modelo_transmision' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 100),
		'serie_transmision' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 100),
		'horas' => array('type' => 'float', 'null' => false, 'default' => NULL),
		'observaciones' => array('type' => 'string', 'null' => false, 'default' => NULL),
		'centrostrabajo_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'index'),
		'cliente_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'index'),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'cliente_id' => array('column' => 'cliente_id', 'unique' => 0), 'centrostrabajo_id' => array('column' => 'centrostrabajo_id', 'unique' => 0)),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

	var $records = array(
		array(
			'id' => 1,
			'nombre' => 'Lorem ipsum dolor sit amet',
			'serie_maquina' => 'Lorem ipsum dolor sit amet',
			'serie_motor' => 'Lorem ipsum dolor sit amet',
			'modelo_transmision' => 'Lorem ipsum dolor sit amet',
			'serie_transmision' => 'Lorem ipsum dolor sit amet',
			'horas' => 1,
			'observaciones' => 'Lorem ipsum dolor sit amet',
			'centrostrabajo_id' => 1,
			'cliente_id' => 1
		),
	);
}
?>