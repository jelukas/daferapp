<?php
/* ArticulosParte Fixture generated on: 2012-02-14 11:02:30 : 1329216330 */
class ArticulosParteFixture extends CakeTestFixture {
	var $name = 'ArticulosParte';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'articulo_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'index'),
		'parte_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'index'),
		'cantidad' => array('type' => 'integer', 'null' => false, 'default' => '1'),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'parte_id' => array('column' => 'parte_id', 'unique' => 0), 'articulo_id' => array('column' => 'articulo_id', 'unique' => 0)),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

	var $records = array(
		array(
			'id' => 1,
			'articulo_id' => 1,
			'parte_id' => 1,
			'cantidad' => 1
		),
	);
}
?>