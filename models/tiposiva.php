<?php
class Tiposiva extends AppModel {
	var $name = 'Tiposiva';
	var $displayField = 'tipoiva';
	var $validate = array(
		'tipoiva' => array(
			'notempty' => array(
				'rule' => array('notempty'),
			),
		),
	);
        var $hasMany = array(
          'Presupuestoscliente'  
        );
}
?>
