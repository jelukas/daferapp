<?php
class Estadospresupuestoscliente extends AppModel {
	var $name = 'Estadospresupuestoscliente';
        var $displayField = 'estado';
	var $validate = array(
		'estado' => array(
			'notempty' => array(
				'rule' => array('notempty'),
			),
		),
	);
        var $hasMany = array(
		'Presupuestoscliente' => array(
			'className' => 'Presupuestoscliente',
			'foreignKey' => 'estadospresupuestoscliente_id',
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