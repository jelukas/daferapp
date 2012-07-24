<?php

class Parte extends AppModel {

    var $name = 'Parte';

    var $belongsTo = array(
        'Tarea' => array(
            'className' => 'Tarea',
            'foreignKey' => 'tarea_id',
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
        $parte = $this->find('first', array('contain' => array('Tarea'), 'conditions' => array('Parte.id' => $this->id)));
        $this->Tarea->id = $parte['Parte']['tarea_id'];
        $this->Tarea->recalcularTotales();
    }

    function beforeDelete() {
        $parte = $this->find('first', array('contain' => array('Tarea'), 'conditions' => array('Parte.id' => $this->id)));
        $this->Tarea->id = $parte['Parte']['tarea_id'];
        $this->Tarea->recalcularTotales($this->id);
        return true;
    }

}

?>