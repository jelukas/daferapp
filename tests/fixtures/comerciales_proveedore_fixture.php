<?php
/* ComercialesProveedore Fixture generated on: 2011-09-08 20:09:40 : 1315507060 */
class ComercialesProveedoreFixture extends CakeTestFixture {
	var $name = 'ComercialesProveedore';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'nombre' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 45),
		'apellidos' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 45),
		'email' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 45),
		'telefono' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 45),
		'observaciones' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 45),
		'proveedore_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'index'),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'proveedore_id' => array('column' => 'proveedore_id', 'unique' => 0)),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

	var $records = array(
		array(
			'id' => 1,
			'nombre' => 'Lorem ipsum dolor sit amet',
			'apellidos' => 'Lorem ipsum dolor sit amet',
			'email' => 'Lorem ipsum dolor sit amet',
			'telefono' => 'Lorem ipsum dolor sit amet',
			'observaciones' => 'Lorem ipsum dolor sit amet',
			'proveedore_id' => 1
		),
	);
}
?>