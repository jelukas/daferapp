<?php
/* Tiposiva Fixture generated on: 2011-10-16 19:10:36 : 1318786476 */
class TiposivaFixture extends CakeTestFixture {
	var $name = 'Tiposiva';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'tipoiva' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 50),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

	var $records = array(
		array(
			'id' => 1,
			'tipoiva' => 'Lorem ipsum dolor sit amet'
		),
	);
}
?>