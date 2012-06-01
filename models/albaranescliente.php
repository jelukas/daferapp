<?php
class Albaranescliente extends AppModel {
	var $name = 'Albaranescliente';
	var $displayField = 'id';
	var $validate = array(
		'fecha' => array(
			'date' => array(
				'rule' => array('date'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'numeroalbaran' => array(
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
		'Avisosrepuesto' => array(
			'className' => 'Avisosrepuesto',
			'foreignKey' => 'avisosrepuesto_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Ordene' => array(
			'className' => 'Ordene',
			'foreignKey' => 'ordene_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Cliente' => array(
			'className' => 'Cliente',
			'foreignKey' => 'cliente_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Pedidoscliente' => array(
			'className' => 'Pedidoscliente',
			'foreignKey' => 'pedidoscliente_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Almacene' => array(
			'className' => 'Almacene',
			'foreignKey' => 'almacene_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Tiposiva' => array(
			'className' => 'Tiposiva',
			'foreignKey' => 'tiposiva_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'FacturasCliente' => array(
			'className' => 'FacturasCliente',
			'foreignKey' => 'facturas_cliente_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	var $hasMany = array(
		'Tareasalbaranescliente' => array(
			'className' => 'Tareasalbaranescliente',
			'foreignKey' => 'albaranescliente_id',
			'dependent' => true,
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