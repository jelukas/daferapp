<?php
class Proveedore extends AppModel {
	var $name = 'Proveedore';
	var $displayField = 'idnombre';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

        var $virtualFields = array( 'idnombre' => "CONCAT(Proveedore.nombre, ' --- ', Proveedore.id)");
        
	var $hasMany = array(
		'Articulo' => array(
			'className' => 'Articulo',
			'foreignKey' => 'proveedore_id',
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
		'Albaranesproveedore' => array(
			'className' => 'Albaranesproveedore',
			'foreignKey' => 'proveedore_id',
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
