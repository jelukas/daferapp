<?php
class Mecanico extends AppModel {
	var $name = 'Mecanico';
	var $displayField='nombre';
	var $validate = array(
		'nombre' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
        
        var $hasMany = array(
        'Parte' => array(
            'className' => 'Parte',
            'foreignKey' => 'mecanico_id',
            'dependent' => false,
        ),
        'Partestallere' => array(
            'className' => 'Partestallere',
            'foreignKey' => 'v',
            'dependent' => true,
        ),
    );
}
?>
