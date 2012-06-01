<?php
/* Devolucionescliente Fixture generated on: 2011-12-21 13:12:39 : 1324472019 */
class DevolucionesclienteFixture extends CakeTestFixture {
	var $name = 'Devolucionescliente';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'cliente_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'index'),
		'facturas_cliente_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'index'),
		'numeroabono' => array('type' => 'integer', 'null' => true, 'default' => NULL),
		'fecha' => array('type' => 'date', 'null' => false, 'default' => NULL),
		'observaciones' => array('type' => 'integer', 'null' => true, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'cliente_id' => array('column' => 'cliente_id', 'unique' => 0), 'facturas_cliente_id' => array('column' => 'facturas_cliente_id', 'unique' => 0)),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

	var $records = array(
		array(
			'id' => 1,
			'cliente_id' => 1,
			'facturas_cliente_id' => 1,
			'numeroabono' => 1,
			'fecha' => '2011-12-21',
			'observaciones' => 1
		),
	);
}
?>