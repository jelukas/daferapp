<?php
/* ArticulosPartestallere Fixture generated on: 2011-11-15 18:11:32 : 1321377632 */
class ArticulosPartestallereFixture extends CakeTestFixture {
	var $name = 'ArticulosPartestallere';

	var $fields = array(
		'articulo_id' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'partestallere_id' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'cantidad' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'indexes' => array(),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

	var $records = array(
		array(
			'articulo_id' => 1,
			'partestallere_id' => 1,
			'cantidad' => 1
		),
	);
}
?>