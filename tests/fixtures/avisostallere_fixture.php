<?php
/* Avisostallere Fixture generated on: 2011-09-30 09:09:51 : 1317367491 */
class AvisostallereFixture extends CakeTestFixture {
	var $name = 'Avisostallere';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'fechaaviso' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
		'avisotelefonico' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 4),
		'avisoemail' => array('type' => 'integer', 'null' => true, 'default' => NULL),
		'cliente_id' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'maquina_id' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'centrostrabajo_id' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'solicitaresupuesto' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 4),
		'marcarurgente' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 4),
		'confirmadopor' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 100),
		'pendienteconfirmar' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 4),
		'fechaaceptacion' => array('type' => 'date', 'null' => true, 'default' => NULL),
		'enviara' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 100),
		'observaciones' => array('type' => 'string', 'null' => true, 'default' => NULL),
		'descripcion' => array('type' => 'string', 'null' => true, 'default' => NULL),
		'articulo_id' => array('type' => 'integer', 'null' => true, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

	var $records = array(
		array(
			'id' => 1,
			'fechaaviso' => '2011-09-30 09:24:51',
			'avisotelefonico' => 1,
			'avisoemail' => 1,
			'cliente_id' => 1,
			'maquina_id' => 1,
			'centrostrabajo_id' => 1,
			'solicitaresupuesto' => 1,
			'marcarurgente' => 1,
			'confirmadopor' => 'Lorem ipsum dolor sit amet',
			'pendienteconfirmar' => 1,
			'fechaaceptacion' => '2011-09-30',
			'enviara' => 'Lorem ipsum dolor sit amet',
			'observaciones' => 'Lorem ipsum dolor sit amet',
			'descripcion' => 'Lorem ipsum dolor sit amet',
			'articulo_id' => 1
		),
	);
}
?>