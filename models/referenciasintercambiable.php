<?php

class Referenciasintercambiable extends AppModel {

    var $name = 'Referenciasintercambiable';
    var $belongsTo = array(
        'Articulo' => array(
            'className' => 'Articulo',
            'foreignKey' => 'articulo_id'
        ),
        'Articulo_referido' => array(
            'className' => 'Articulo',
            'foreignKey' => 'articuloref_id'
        )
    );

}

?>
