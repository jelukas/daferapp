<?php
/* ArticulosAvisostallere Fixture generated on: 2011-10-04 10:10:41 : 1317716081 */
class ArticulosAvisostallereFixture extends CakeTestFixture {
	var $name = 'ArticulosAvisostallere';

	var $fields = array(
		'articulo_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'index'),
		'avisostallere_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'index'),
		'indexes' => array('articulo_id' => array('column' => 'articulo_id', 'unique' => 0), 'avisostallere_id' => array('column' => 'avisostallere_id', 'unique' => 0)),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

	var $records = array(
		array(
			'articulo_id' => 1,
			'avisostallere_id' => 1
		),
	);
}
?>