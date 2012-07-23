<?php

class TareasAlbaranesclientesreparacionesPartestallere extends AppModel {

    var $name = 'TareasAlbaranesclientesreparacionesPartestallere';
    var $validate = array(
        'tareas_albaranesclientesreparacione_id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'fecha' => array(
            'date' => array(
                'rule' => array('date'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'horainicio' => array(
            'time' => array(
                'rule' => array('time'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'horafinal' => array(
            'time' => array(
                'rule' => array('time'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'operacion' => array(
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
    //The Associations below have been created with all possible keys, those that are not needed can be removed

    var $belongsTo = array(
        'TareasAlbaranesclientesreparacione' => array(
            'className' => 'TareasAlbaranesclientesreparacione',
            'foreignKey' => 'tareas_albaranesclientesreparacione_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Partestallere' => array(
            'className' => 'Partestallere',
            'foreignKey' => 'partestallere_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Mecanico' => array(
            'className' => 'Mecanico',
            'foreignKey' => 'mecanico_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );

    function afterSave($created) {
        $partestallere = $this->find('first', array('contain' => array('TareasAlbaranesclientesreparacione'), 'conditions' => array('TareasAlbaranesclientesreparacionesPartestallere.id' => $this->id)));
        $this->TareasAlbaranesclientesreparacione->id = $partestallere['TareasAlbaranesclientesreparacionesPartestallere']['tareas_albaranesclientesreparacione_id'];
        $this->TareasAlbaranesclientesreparacione->recalcularTotales();
    }

    function beforeDelete() {
        $partestallere = $this->find('first', array('contain' => array('TareasAlbaranesclientesreparacione'), 'conditions' => array('TareasAlbaranesclientesreparacionesPartestallere.id' => $this->id)));
        $this->TareasAlbaranesclientesreparacione->id = $partestallere['TareasAlbaranesclientesreparacionesPartestallere']['tareas_albaranesclientesreparacione_id'];
        $this->TareasAlbaranesclientesreparacione->recalcularTotales($this->id);
        return true;
    }

}

?>