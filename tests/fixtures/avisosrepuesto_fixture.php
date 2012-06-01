<?php
/* Avisosrepuesto Fixture generated on: 2011-10-17 02:10:30 : 1318811370 */
class AvisosrepuestoFixture extends CakeTestFixture {
	var $name = 'Avisosrepuesto';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'fechahora' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
		'avisotelefonico' => array('type' => 'boolean', 'null' => false, 'default' => NULL),
		'avisoemail' => array('type' => 'boolean', 'null' => false, 'default' => NULL),
		'cliente_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'index'),
		'centrostrabajo_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'index'),
		'maquina_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'index'),
		'solicitapresupuesto' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'marcarurgente' => array('type' => 'boolean', 'null' => false, 'default' => NULL),
		'confirmadopor' => array('type' => 'string', 'null' => false, 'default' => NULL),
		'pendienteconfirmar' => array('type' => 'boolean', 'null' => false, 'default' => NULL),
		'fechaaceptacion' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
		'enviara' => array('type' => 'string', 'null' => false, 'default' => NULL),
		'observaciones' => array('type' => 'string', 'null' => false, 'default' => NULL),
		'descripcion' => array('type' => 'string', 'null' => false, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'cliente_id' => array('column' => 'cliente_id', 'unique' => 0), 'centrostrabajo_id' => array('column' => 'centrostrabajo_id', 'unique' => 0), 'maquina_id' => array('column' => 'maquina_id', 'unique' => 0)),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

	var $records = array(
		array(
			'id' => 1,
			'fechahora' => '2011-10-17 02:29:30',
			'avisotelefonico' => 1,
			'avisoemail' => 1,
			'cliente_id' => 1,
			'centrostrabajo_id' => 1,
			'maquina_id' => 1,
			'solicitapresupuesto' => 1,
			'marcarurgente' => 1,
			'confirmadopor' => 'Lorem ipsum dolor sit amet',
			'pendienteconfirmar' => 1,
			'fechaaceptacion' => '2011-10-17 02:29:30',
			'enviara' => 'Lorem ipsum dolor sit amet',
			'observaciones' => 'Lorem ipsum dolor sit amet',
			'descripcion' => 'Lorem ipsum dolor sit amet'
		),
	);
}
?>