<?php
class Estadosalbaranesclientesreparacione extends AppModel {
	var $name = 'Estadosalbaranesclientesreparacione';
        var $displayField = 'estado';
	var $validate = array(
		'estado' => array(
			'notempty' => array(
				'rule' => array('notempty'),
			),
		),
	);
        var $hasMany = array(
		'Albaranesclientesreparacione' => array(
			'className' => 'Albaranesclientesreparacione',
			'foreignKey' => 'estadosalbaranesclientesreparacione_id',
			'dependent' => false,
		)
	);
}
?>