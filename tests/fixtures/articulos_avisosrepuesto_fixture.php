<?php
/* ArticulosAvisosrepuesto Fixture generated on: 2011-10-17 02:10:18 : 1318811358 */
class ArticulosAvisosrepuestoFixture extends CakeTestFixture {
	var $name = 'ArticulosAvisosrepuesto';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'articulo_id' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'avisosrepuesto_id' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'cantidad' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'MyISAM')
	);

	var $records = array(
		array(
			'id' => 1,
			'articulo_id' => 1,
			'avisosrepuesto_id' => 1,
			'cantidad' => 1
		),
	);
}
?>