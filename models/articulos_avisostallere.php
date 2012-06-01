<?php
class ArticulosAvisostallere extends AppModel {
	var $name = 'ArticulosAvisostallere';
	var $primaryKey = 'q';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'Articulo' => array(
			'className' => 'Articulo',
			'foreignKey' => 'articulo_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Avisostallere' => array(
			'className' => 'Avisostallere',
			'foreignKey' => 'avisostallere_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
?>