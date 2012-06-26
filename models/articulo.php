<?php

class Articulo extends AppModel {

    var $name = 'Articulo';
    var $displayField = 'nombre';

    var $validate = array(
        'ref' => array(
            'notempty' => array(
                'rule' => array('notempty'),
            ),
        ),
        'familia_id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
            ),
        ),
    );

    var $belongsTo = array(
        'Familia' => array(
            'className' => 'Familia',
            'foreignKey' => 'familia_id',
            'conditions' => '',
            'fields' => '',
            'order' => 'Familia.nombre ASC'
        ),
        'Almacene' => array(
            'className' => 'Almacene',
            'foreignKey' => 'almacene_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Proveedore' => array(
            'className' => 'Proveedore',
            'foreignKey' => 'proveedore_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );
    var $hasMany = array(
        'ArticulosAvisosrepuesto' => array(
            'className' => 'ArticulosAvisosrepuesto',
            'foreignKey' => 'articulo_id',
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
        'ArticulosTarea' => array(
            'className' => 'ArticulosTarea',
            'foreignKey' => 'articulo_id',
            'dependent' => true,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        ),
        'ArticulosPresupuestosproveedore' => array(
            'className' => 'ArticulosPresupuestosproveedore',
            'foreignKey' => 'articulo_id',
            'dependent' => true,
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        ),
        'Referido' => array(
            'className' => 'Referenciasintercambiable',
            'foreignKey' => 'articulo_id',
            'dependent' => true,
        ),
        'Referencia' => array(
            'className' => 'Referenciasintercambiable',
            'foreignKey' => 'articuloref_id',
            'dependent' => true,
        ),
    );
}

?>
