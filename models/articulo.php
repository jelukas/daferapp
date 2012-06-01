<?php

class Articulo extends AppModel {

    var $name = 'Articulo';
    var $displayField = 'nombre';
    var $virtualFields = array( 'autocomplete' => "CONCAT(Articulo.ref, ' --- ',Articulo.nombre)");
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
    var $hasAndBelongsToMany = array(
        'Referenciasintercambiable' => array(
            'className' => 'Referenciasintercambiable',
            'joinTable' => 'articulos_referenciasintercambiables',
            'foreignKey' => 'articulo_id',
            'associationForeignKey' => 'referenciasintercambiable_id',
            'unique' => false,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'finderQuery' => '',
            'deleteQuery' => '',
            'insertQuery' => ''
        ),
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
