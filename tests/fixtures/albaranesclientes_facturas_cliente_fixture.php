<?php
/* AlbaranesclientesFacturasCliente Fixture generated on: 2011-11-17 10:11:25 : 1321523485 */
class AlbaranesclientesFacturasClienteFixture extends CakeTestFixture {
	var $name = 'AlbaranesclientesFacturasCliente';

	var $fields = array(
		'albaranesclientes_id' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'key' => 'index'),
		'facturas_cliente_id' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'key' => 'index'),
		'indexes' => array('albaranesclientes_id' => array('column' => 'albaranesclientes_id', 'unique' => 0), 'facturas_cliente_id' => array('column' => 'facturas_cliente_id', 'unique' => 0)),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

	var $records = array(
		array(
			'albaranesclientes_id' => 1,
			'facturas_cliente_id' => 1
		),
	);
}
?>