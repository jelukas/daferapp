<?php
class Estadosalbaranescliente extends AppModel {
	var $name = 'Estadosalbaranescliente';
        var $displayField = 'estado';
	var $validate = array(
		'estado' => array(
			'notempty' => array(
				'rule' => array('notempty'),
			),
		),
	);
        var $hasMany = array(
		'Albaranescliente' => array(
			'className' => 'Albaranescliente',
			'foreignKey' => 'estadosalbaranescliente_id',
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