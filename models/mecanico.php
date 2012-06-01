<?php
class Mecanico extends AppModel {
	var $name = 'Mecanico';
	var $displayField='nombre';
	var $validate = array(
		'nombre' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
        
        var $hasAndBelongsToMany = array(
		'Parte' => array(
			'className' => 'Parte',
			'joinTable' => 'mecanicos_partes',
			'foreignKey' => 'mecanico_id',
			'associationForeignKey' => 'parte_id',
			'unique' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		),
		'Partestallere' => array(
			'className' => 'Partestallere',
			'joinTable' => 'mecanicos_partestalleres',
			'foreignKey' => 'mecanico_id',
			'associationForeignKey' => 'partestallere_id',
			'unique' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		)
	);
}
?>
