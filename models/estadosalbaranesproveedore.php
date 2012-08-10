<?php
class Estadosalbaranesproveedore extends AppModel {
	var $name = 'Estadosalbaranesproveedore';
        var $displayField = 'estado';
	var $validate = array(
		'estado' => array(
			'notempty' => array(
				'rule' => array('notempty'),
			),
		),
	);
        var $hasMany = array(
		'Pedidosproveedore' => array(
			'className' => 'Albaranesproveedore',
			'foreignKey' => 'estadosalbaranesproveedore_id',
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