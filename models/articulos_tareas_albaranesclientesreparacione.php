<?php

class ArticulosTareasAlbaranesclientesreparacione extends AppModel {

    var $name = 'ArticulosTareasAlbaranesclientesreparacione';
    var $validate = array(
        'cantidad' => array(
            'numeric' => array(
                'rule' => array('numeric'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
    );
    //The Associations below have been created with all possible keys, those that are not needed can be removed

    var $belongsTo = array(
        'Articulo' => array(
            'className' => 'Articulo',
            'foreignKey' => 'articulo_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'ArticulosTarea' => array(
            'className' => 'ArticulosTarea',
            'foreignKey' => 'articulos_tarea_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'TareasAlbaranesclientesreparacione' => array(
            'className' => 'TareasAlbaranesclientesreparacione',
            'foreignKey' => 'tareas_albaranesclientesreparacione_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );

    function afterSave($created) {
        $articulos_tarea = $this->find('first', array('conditions' => array('ArticulosTareasAlbaranesclientesreparacione.id' => $this->id)));
        $this->TareasAlbaranesclientesreparacione->id = $articulos_tarea['ArticulosTareasAlbaranesclientesreparacione']['tareas_albaranesclientesreparacione_id'];
        $this->TareasAlbaranesclientesreparacione->recalcularTotales();
    }

}

?>