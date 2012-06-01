<?php
/* Presupuestosproveedore Fixture generated on: 2011-10-16 19:10:23 : 1318784603 */
class PresupuestosproveedoreFixture extends CakeTestFixture {
	var $name = 'Presupuestosproveedore';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'proveedore_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'index'),
		'almacene_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'index'),
		'fechaplazo' => array('type' => 'date', 'null' => false, 'default' => NULL),
		'observaciones' => array('type' => 'string', 'null' => false, 'default' => NULL),
		'confirmado' => array('type' => 'boolean', 'null' => false, 'default' => NULL),
		'presupuestoescaneado' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'proveedore_id' => array('column' => 'proveedore_id', 'unique' => 0), 'almacene_id' => array('column' => 'almacene_id', 'unique' => 0)),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

	var $records = array(
		array(
			'id' => 1,
			'proveedore_id' => 1,
			'almacene_id' => 1,
			'fechaplazo' => '2011-10-16',
			'observaciones' => 'Lorem ipsum dolor sit amet',
			'confirmado' => 1,
			'presupuestoescaneado' => 1
		),
	);
}
?>