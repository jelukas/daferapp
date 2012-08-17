<?php
class Estadosfacturascliente extends AppModel {
	var $name = 'Estadosfacturascliente';
        var $displayField = 'estado';
	var $validate = array(
		'estado' => array(
			'notempty' => array(
				'rule' => array('notempty'),
			),
		),
	);
        var $hasMany = array(
		'FacturasCliente' => array(
			'className' => 'FacturasCliente',
			'foreignKey' => 'estadosfacturascliente_id',
			'dependent' => false,
		)
	);
}
?>