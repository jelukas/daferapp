<?php
/* Proveedore Fixture generated on: 2011-09-20 17:09:09 : 1316531889 */
class ProveedoreFixture extends CakeTestFixture {
	var $name = 'Proveedore';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'cif' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 9),
		'nombre' => array('type' => 'string', 'null' => false, 'default' => NULL, 'key' => 'index'),
		'direccion' => array('type' => 'string', 'null' => true, 'default' => NULL),
		'direccionalmacen' => array('type' => 'string', 'null' => false, 'default' => NULL),
		'telefono' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 9),
		'fax' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 9),
		'web' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 45),
		'email' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 80),
		'comercial' => array('type' => 'string', 'null' => false, 'default' => NULL),
		'impuestos' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 45),
		'cuentacontable' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 45),
		'observaciones' => array('type' => 'string', 'null' => true, 'default' => NULL),
		'poblacion' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 100),
		'provincia' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 100),
		'cp' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 10),
		'pais' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 100),
		'tipomaterial' => array('type' => 'string', 'null' => false, 'default' => NULL),
		'tipotransporte' => array('type' => 'string', 'null' => false, 'default' => NULL),
		'formapedido' => array('type' => 'string', 'null' => false, 'default' => NULL),
		'ecommerce' => array('type' => 'string', 'null' => false, 'default' => NULL),
		'usuario' => array('type' => 'string', 'null' => false, 'default' => NULL),
		'contrasenia' => array('type' => 'string', 'null' => false, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'nombre' => array('column' => 'nombre', 'unique' => 0)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_spanish2_ci', 'engine' => 'InnoDB')
	);

	var $records = array(
		array(
			'id' => 1,
			'cif' => 'Lorem i',
			'nombre' => 'Lorem ipsum dolor sit amet',
			'direccion' => 'Lorem ipsum dolor sit amet',
			'direccionalmacen' => 'Lorem ipsum dolor sit amet',
			'telefono' => 'Lorem i',
			'fax' => 'Lorem i',
			'web' => 'Lorem ipsum dolor sit amet',
			'email' => 'Lorem ipsum dolor sit amet',
			'comercial' => 'Lorem ipsum dolor sit amet',
			'impuestos' => 'Lorem ipsum dolor sit amet',
			'cuentacontable' => 'Lorem ipsum dolor sit amet',
			'observaciones' => 'Lorem ipsum dolor sit amet',
			'poblacion' => 'Lorem ipsum dolor sit amet',
			'provincia' => 'Lorem ipsum dolor sit amet',
			'cp' => 'Lorem ip',
			'pais' => 'Lorem ipsum dolor sit amet',
			'tipomaterial' => 'Lorem ipsum dolor sit amet',
			'tipotransporte' => 'Lorem ipsum dolor sit amet',
			'formapedido' => 'Lorem ipsum dolor sit amet',
			'ecommerce' => 'Lorem ipsum dolor sit amet',
			'usuario' => 'Lorem ipsum dolor sit amet',
			'contrasenia' => 'Lorem ipsum dolor sit amet'
		),
	);
}
?>