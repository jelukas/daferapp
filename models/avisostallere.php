<?php
class Avisostallere extends AppModel {
	var $name = 'Avisostallere';


	var $belongsTo = array(
		'Cliente' => array(
			'className' => 'Cliente',
			'foreignKey' => 'cliente_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Maquina' => array(
			'className' => 'Maquina',
			'foreignKey' => 'maquina_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
            
                'Estadosavisostallere' => array(
			'className' => 'Estadosavisostallere',
			'foreignKey' => 'estadosavisostallere_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
            
		'Centrostrabajo' => array(
			'className' => 'Centrostrabajo',
			'foreignKey' => 'centrostrabajo_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
         var $hasMany = array(
		'Presupuestosproveedore' => array(
			'className' => 'Presupuestosproveedore',
			'foreignKey' => 'avisostallere_id',
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
			'foreignKey' => 'avisostallere_id',
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
