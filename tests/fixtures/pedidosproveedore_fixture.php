<?php
/* Pedidosproveedore Fixture generated on: 2011-10-16 19:10:03 : 1318785123 */
class PedidosproveedoreFixture extends CakeTestFixture {
	var $name = 'Pedidosproveedore';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'fecha' => array('type' => 'date', 'null' => false, 'default' => NULL),
		'proveedore_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'index'),
		'almacene_id' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'observaciones' => array('type' => 'string', 'null' => false, 'default' => NULL),
		'fecharecepcion' => array('type' => 'date', 'null' => false, 'default' => NULL),
		'pedidoescaneado' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'proveedore_id' => array('column' => array('proveedore_id', 'almacene_id'), 'unique' => 0)),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

	var $records = array(
		array(
			'id' => 1,
			'fecha' => '2011-10-16',
			'proveedore_id' => 1,
			'almacene_id' => 1,
			'observaciones' => 'Lorem ipsum dolor sit amet',
			'fecharecepcion' => '2011-10-16',
			'pedidoescaneado' => 1
		),
	);
}
?>