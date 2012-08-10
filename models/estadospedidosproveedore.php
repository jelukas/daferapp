<?php
class Estadospedidosproveedore extends AppModel {
	var $name = 'Estadospedidosproveedore';
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
			'className' => 'Pedidosproveedore',
			'foreignKey' => 'estadospedidosproveedore_id',
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