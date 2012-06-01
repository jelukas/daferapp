<?php
/* ArticulosDevolucionescliente Fixture generated on: 2011-12-21 13:12:55 : 1324472035 */
class ArticulosDevolucionesclienteFixture extends CakeTestFixture {
	var $name = 'ArticulosDevolucionescliente';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'articulo_id' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'devolucionescliente_id' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'cantidad' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'albaranescliente_id' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

	var $records = array(
		array(
			'id' => 1,
			'articulo_id' => 1,
			'devolucionescliente_id' => 1,
			'cantidad' => 1,
			'albaranescliente_id' => 1
		),
	);
}
?>