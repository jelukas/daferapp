<?php

class TareasAlbaranesclientesreparacionesParte extends AppModel {

    var $name = 'TareasAlbaranesclientesreparacionesParte';
    //The Associations below have been created with all possible keys, those that are not needed can be removed

    var $belongsTo = array(
        'TareasAlbaranesclientesreparacione' => array(
            'className' => 'TareasAlbaranesclientesreparacione',
            'foreignKey' => 'tareas_albaranesclientesreparacione_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Parte' => array(
            'className' => 'Parte',
            'foreignKey' => 'parte_id',
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
        $parte = $this->find('first', array('contain' => array('TareasAlbaranesclientesreparacione'), 'conditions' => array('TareasAlbaranesclientesreparacionesParte.id' => $this->id)));
        $this->TareasAlbaranesclientesreparacione->id = $parte['TareasAlbaranesclientesreparacionesParte']['tareas_albaranesclientesreparacione_id'];
        $this->TareasAlbaranesclientesreparacione->recalcularTotales();
    }

    function beforeDelete() {
        $parte = $this->find('first', array('contain' => array('TareasAlbaranesclientesreparacione'), 'conditions' => array('TareasAlbaranesclientesreparacionesParte.id' => $this->id)));
        $this->TareasAlbaranesclientesreparacione->id = $parte['TareasAlbaranesclientesreparacionesParte']['tareas_albaranesclientesreparacione_id'];
        $this->TareasAlbaranesclientesreparacione->recalcularTotales($this->id);
        return true;
    }

}

?>