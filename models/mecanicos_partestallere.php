<?php
class MecanicosPartestallere extends AppModel {
	var $name = 'MecanicosPartestallere';
	var $validate = array(
		'mecanico_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'partestallere_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'Mecanico' => array(
			'className' => 'Mecanico',
			'foreignKey' => 'mecanico_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Partestallere' => array(
			'className' => 'Partestallere',
			'foreignKey' => 'partestallere_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
?>