<?php

class ArticulosPresupuestosproveedore extends AppModel {

    var $name = 'ArticulosPresupuestosproveedore';
    /*  var $validate = array(
      'cantidad' => array(
      'numeric' => array(
      'rule' => array('numeric'),
      ),
      ),z
      ); */

    var $belongsTo = array(
        'Articulo' => array(
            'className' => 'Articulo',
            'foreignKey' => 'articulo_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Presupuestosproveedore' => array(
            'className' => 'Presupuestosproveedore',
            'foreignKey' => 'presupuestosproveedore_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Tarea' => array(
            'className' => 'Tarea',
            'foreignKey' => 'tarea_id',
        ),
    );

}

?>