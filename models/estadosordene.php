<?php
class Estadosordene extends AppModel {
	var $name = 'Estadosordene';
	var $displayField = 'estado';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $hasMany = array(
		'Ordene' => array(
			'className' => 'Ordene',
			'foreignKey' => 'estadosordene_id',
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
