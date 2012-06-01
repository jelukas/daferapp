<?php
/* ArticulosDevolucionesproveedore Fixture generated on: 2011-12-19 10:12:24 : 1324288224 */
class ArticulosDevolucionesproveedoreFixture extends CakeTestFixture {
	var $name = 'ArticulosDevolucionesproveedore';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'articulo_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'index'),
		'devolucionesproveedore_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'index'),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'articulo_id' => array('column' => 'articulo_id', 'unique' => 0), 'devolucionesproveedore_id' => array('column' => 'devolucionesproveedore_id', 'unique' => 0)),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

	var $records = array(
		array(
			'id' => 1,
			'articulo_id' => 1,
			'devolucionesproveedore_id' => 1
		),
	);
}
?>