<?php
/* Cliente Fixture generated on: 2011-09-19 20:09:40 : 1316457460 */
class ClienteFixture extends CakeTestFixture {
	var $name = 'Cliente';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'cif' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 9),
		'codigo' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 100),
		'nombre' => array('type' => 'string', 'null' => true, 'default' => NULL, 'key' => 'index'),
		'descripcion' => array('type' => 'string', 'null' => true, 'default' => NULL),
		'personacontacto' => array('type' => 'string', 'null' => false, 'default' => NULL),
		'cuentabancaria' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 23),
		'telefono' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 9),
		'fax' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 9),
		'web' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 45),
		'email' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 100),
		'direccion' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 45),
		'direccion_postal' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 45),
		'direccion_fiscal' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 45),
		'valoracion' => array('type' => 'string', 'null' => true, 'default' => NULL),
		'descuentos_repuestos' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 20),
		'materiales' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 45),
		'descuentos_materiales' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 20),
		'precio_mano_obra' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 20),
		'dietas' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 45),
		'riesgos' => array('type' => 'float', 'null' => true, 'default' => NULL),
		'modo_facturacion' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 45),
		'comerciale_id' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'key' => 'index'),
		'formapago_id' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'key' => 'index'),
		'imprimirconreferencias' => array('type' => 'boolean', 'null' => false, 'default' => NULL),
		'enviarcorreoe' => array('type' => 'boolean', 'null' => false, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'formapago_id' => array('column' => 'formapago_id', 'unique' => 0), 'comerciale_id' => array('column' => 'comerciale_id', 'unique' => 0), 'nombre' => array('column' => 'nombre', 'unique' => 0)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_spanish_ci', 'engine' => 'InnoDB')
	);

	var $records = array(
		array(
			'id' => 1,
			'cif' => 'Lorem i',
			'codigo' => 'Lorem ipsum dolor sit amet',
			'nombre' => 'Lorem ipsum dolor sit amet',
			'descripcion' => 'Lorem ipsum dolor sit amet',
			'personacontacto' => 'Lorem ipsum dolor sit amet',
			'cuentabancaria' => 'Lorem ipsum dolor sit',
			'telefono' => 'Lorem i',
			'fax' => 'Lorem i',
			'web' => 'Lorem ipsum dolor sit amet',
			'email' => 'Lorem ipsum dolor sit amet',
			'direccion' => 'Lorem ipsum dolor sit amet',
			'direccion_postal' => 'Lorem ipsum dolor sit amet',
			'direccion_fiscal' => 'Lorem ipsum dolor sit amet',
			'valoracion' => 'Lorem ipsum dolor sit amet',
			'descuentos_repuestos' => 'Lorem ipsum dolor ',
			'materiales' => 'Lorem ipsum dolor sit amet',
			'descuentos_materiales' => 'Lorem ipsum dolor ',
			'precio_mano_obra' => 'Lorem ipsum dolor ',
			'dietas' => 'Lorem ipsum dolor sit amet',
			'riesgos' => 1,
			'modo_facturacion' => 'Lorem ipsum dolor sit amet',
			'comerciale_id' => 1,
			'formapago_id' => 1,
			'imprimirconreferencias' => 1,
			'enviarcorreoe' => 1
		),
	);
}
?>