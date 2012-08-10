<?php
class Estadospresupuestosproveedore extends AppModel {
	var $name = 'Estadospresupuestosproveedore';
        var $displayField = 'estado';
	var $validate = array(
		'estado' => array(
			'notempty' => array(
				'rule' => array('notempty'),
			),
		),
	);
        var $hasMany = array(
		'Presupuestosproveedore' => array(
			'className' => 'Presupuestosproveedore',
			'foreignKey' => 'estadospresupuestosproveedore_id',
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