<?php

class TareasAlbaranesclientesreparacione extends AppModel {

    var $name = 'TareasAlbaranesclientesreparacione';
    var $validate = array(
        'albaranesclientesreparacione_id' => array(
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
        'Albaranesclientesreparacione' => array(
            'className' => 'Albaranesclientesreparacione',
            'foreignKey' => 'albaranesclientesreparacione_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    ); /*
      var $hasMany = array(
      'Parte' => array(
      'className' => 'Parte',
      'foreignKey' => 'tarea_id',
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
      'ArticulosTarea' => array(
      'className' => 'ArticulosTarea',
      'foreignKey' => 'tarea_id',
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
      'Partestallere' => array(
      'className' => 'Partestallere',
      'foreignKey' => 'tarea_id',
      'dependent' => true,
      'conditions' => '',
      'fields' => '',
      'order' => '',
      'limit' => '',
      'offset' => '',
      'exclusive' => '',
      'finderQuery' => '',
      'counterQuery' => ''
      )
      );
     */

    function crear_desde_tarea_de_orden($tarea_id, $albaranesclientesreparacione_id) {
        $tarea = $this->Albaranesclientesreparacione->Ordene->Tarea->find('first', array('conditions' => array('Tarea.id' => $tarea_id)));
        $tarea_albaranesclientesreparacione['TareasAlbaranesclientesreparacione'] = $tarea['Tarea'];
        $tarea_albaranesclientesreparacione['TareasAlbaranesclientesreparacione']['albaranesclientesreparacione_id'] = $albaranesclientesreparacione_id;
        unset($tarea_albaranesclientesreparacione['TareasAlbaranesclientesreparacione']['id']);
        unset($tarea_albaranesclientesreparacione['TareasAlbaranesclientesreparacione']['ordene_id']);
        $this->save($tarea_albaranesclientesreparacione);
    }

}

?>