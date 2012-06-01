<?php
class Estadosaviso extends AppModel {
	var $name = 'Estadosaviso';
        var $displayField = 'estado';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $hasMany = array(
		'Avisosrepuesto' => array(
			'className' => 'Avisosrepuesto',
			'foreignKey' => 'estadosaviso_id',
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