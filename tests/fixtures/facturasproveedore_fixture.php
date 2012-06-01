<?php
/* Facturasproveedore Fixture generated on: 2011-10-16 19:10:29 : 1318786769 */
class FacturasproveedoreFixture extends CakeTestFixture {
	var $name = 'Facturasproveedore';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'proveedore_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'index'),
		'numerofactura' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 50),
		'fechafactura' => array('type' => 'date', 'null' => false, 'default' => NULL),
		'baseimponible' => array('type' => 'float', 'null' => false, 'default' => NULL),
		'tiposiva_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'index'),
		'iva' => array('type' => 'float', 'null' => false, 'default' => NULL),
		'total' => array('type' => 'float', 'null' => false, 'default' => NULL),
		'observaciones' => array('type' => 'string', 'null' => false, 'default' => NULL),
		'fechalimitepago' => array('type' => 'date', 'null' => false, 'default' => NULL),
		'fechapagada' => array('type' => 'date', 'null' => false, 'default' => NULL),
		'facturaescaneada' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'proveedore_id' => array('column' => 'proveedore_id', 'unique' => 0), 'tiposiva_id' => array('column' => 'tiposiva_id', 'unique' => 0)),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

	var $records = array(
		array(
			'id' => 1,
			'proveedore_id' => 1,
			'numerofactura' => 'Lorem ipsum dolor sit amet',
			'fechafactura' => '2011-10-16',
			'baseimponible' => 1,
			'tiposiva_id' => 1,
			'iva' => 1,
			'total' => 1,
			'observaciones' => 'Lorem ipsum dolor sit amet',
			'fechalimitepago' => '2011-10-16',
			'fechapagada' => '2011-10-16',
			'facturaescaneada' => 1
		),
	);
}
?>