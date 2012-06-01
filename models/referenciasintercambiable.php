<?php
class Referenciasintercambiable extends AppModel {
	var $name = 'Referenciasintercambiable';
	
	
	
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'Articulo' => array(
			'className' => 'Articulo',
			'foreignKey' => 'articulo_id',
			'conditions' => '',
			'fields' => '',
			'order' => 'Articulo.nombre ASC'
		)
	);

	var $hasAndBelongsToMany = array(
		'Articulo' => array(
			'className' => 'Articulo',
			'joinTable' => 'articulos_referenciasintercambiables',
			'foreignKey' => 'referenciasintercambiable_id',
			'associationForeignKey' => 'articulo_id',
			'unique' => false,
			'conditions' => '',
			'fields' => '',
			'order' => 'Articulo.nombre ASC',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		)
	);

}
?>
