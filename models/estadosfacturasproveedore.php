<?php
class Estadosfacturasproveedore extends AppModel {
	var $name = 'Estadosfacturasproveedore';
        var $displayField = 'estado';
	var $validate = array(
		'estado' => array(
			'notempty' => array(
				'rule' => array('notempty'),
			),
		),
	);
        var $hasMany = array(
		'Facturasproveedore' => array(
			'className' => 'Facturasproveedore',
			'foreignKey' => 'estadosfacturasproveedore_id',
			'dependent' => false,
		)
	);
}
?>