<?php

class ArticulosAvisosrepuesto extends AppModel {

    var $name = 'ArticulosAvisosrepuesto';
    var $validate = array(
        'cantidad' => array(
            'numeric' => array(
                'rule' => array('numeric'),
            ),
        ),
    );
    var $belongsTo = array(
        'Articulo' => array(
            'className' => 'Articulo',
            'foreignKey' => 'articulo_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Avisosrepuesto' => array(
            'className' => 'Avisosrepuesto',
            'foreignKey' => 'avisosrepuesto_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );
}

?>