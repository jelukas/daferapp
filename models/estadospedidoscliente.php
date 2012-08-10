<?php
class Estadospedidoscliente extends AppModel {
	var $name = 'Estadospedidoscliente';
        var $displayField = 'estado';
	var $validate = array(
		'estado' => array(
			'notempty' => array(
				'rule' => array('notempty'),
			),
		),
	);
        var $hasMany = array(
		'Pedidoscliente' => array(
			'className' => 'Pedidoscliente',
			'foreignKey' => 'estadospedidoscliente_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);
}
?>