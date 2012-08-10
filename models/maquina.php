<?php
class Maquina extends AppModel {
	var $name = 'Maquina';
	var $displayField= 'nombre';
	var $validate = array(
		'nombre' => array(
			'notempty' => array(
				'rule' => array('notempty'),
			),
		),
		'codigo' => array(
			'notempty' => array(
				'rule' => array('notempty'),
			),
		),
		'nombre' => array(
			'notempty' => array(
				'rule' => array('notempty'),
			),
		),
		
	);
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'Centrostrabajo' => array(
			'className' => 'Centrostrabajo',
			'foreignKey' => 'centrostrabajo_id',
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
		)
	);
        
        var $hasMany = array(
		'Articulosparamantenimiento' => array(
			'className' => 'Articulosparamantenimiento',
			'foreignKey' => 'maquina_id',
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
		'Otrosrepuesto' => array(
			'className' => 'Otrosrepuesto',
			'foreignKey' => 'maquina_id',
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
			'foreignKey' => 'maquina_id',
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
			'foreignKey' => 'maquina_id',
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
