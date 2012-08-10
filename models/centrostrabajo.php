<?php
class Centrostrabajo extends AppModel {
	var $name = 'Centrostrabajo';
	var $displayField = 'centrotrabajo';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

		var $belongsTo = array(
		'Cliente' => array(
			'className' => 'Cliente',
			'foreignKey' => 'cliente_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	var $hasMany = array(
		'Avisosrepuesto' => array(
			'className' => 'Avisosrepuesto',
			'foreignKey' => 'centrostrabajo_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Avisostallere' => array(
			'className' => 'Avisostallere',
			'foreignKey' => 'centrostrabajo_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Telefono' => array(
			'className' => 'Telefono',
			'foreignKey' => 'centrostrabajo_id',
			'dependent' => true,
		),
		'Maquina' => array(
			'className' => 'Maquina',
			'foreignKey' => 'centrostrabajo_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Albaranescliente' => array(
			'className' => 'Albaranescliente',
			'foreignKey' => 'centrostrabajo_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Albaranesclientesreparacione' => array(
			'className' => 'Albaranesclientesreparacione',
			'foreignKey' => 'centrostrabajo_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
	);
}
?>
