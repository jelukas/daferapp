<?php
/* ArticulosTarea Fixture generated on: 2012-02-14 11:02:54 : 1329217194 */
class ArticulosTareaFixture extends CakeTestFixture {
	var $name = 'ArticulosTarea';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'articulo_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'index'),
		'tarea_id' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'cantidad' => array('type' => 'integer', 'null' => false, 'default' => '0'),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'articulo_id' => array('column' => array('articulo_id', 'tarea_id'), 'unique' => 0)),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'MyISAM')
	);

	var $records = array(
		array(
			'id' => 1,
			'articulo_id' => 1,
			'tarea_id' => 1,
			'cantidad' => 1
		),
	);
}
?>