<?php
class ArticulosReferenciasintercambiable extends AppModel {
	var $name = 'ArticulosReferenciasintercambiable';
	var $validate = array(
		'articulo_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'referenciasintercambiable_id' => array(
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
		'Articulo' => array(
			'className' => 'Articulo',
			'foreignKey' => 'articulo_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Referenciasintercambiable' => array(
			'className' => 'Referenciasintercambiable',
			'foreignKey' => 'referenciasintercambiable_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
?>