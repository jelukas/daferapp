<?php
/* Estadosordene Fixture generated on: 2011-11-14 00:11:06 : 1321225326 */
class EstadosordeneFixture extends CakeTestFixture {
	var $name = 'Estadosordene';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'estado' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 50),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

	var $records = array(
		array(
			'id' => 1,
			'estado' => 'Lorem ipsum dolor sit amet'
		),
	);
}
?>