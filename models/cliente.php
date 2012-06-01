<?php
class Cliente extends AppModel {
	var $name = 'Cliente';
	var $displayField = 'nombre';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'Comerciale' => array(
			'className' => 'Comerciale',
			'foreignKey' => 'comerciale_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Formapago' => array(
			'className' => 'Formapago',
			'foreignKey' => 'formapago_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	var $hasMany = array(
		'Centrostrabajo' => array(
			'className' => 'Centrostrabajo',
			'foreignKey' => 'cliente_id',
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
		'Presupuestoscliente' => array(
			'className' => 'Presupuestoscliente',
			'foreignKey' => 'cliente_id',
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

		'Maquina' => array(
			'className' => 'Maquina',
			'foreignKey' => 'cliente_id',
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
