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

    function beforeSave(){
        $this->data['Parte']['total_kmdesplazamiento_imputable'] = $this->data['Parte']['kilometrajeimputable_ida'] + $this->data['Parte']['kilometrajeimputable_vuelta'] ;
        $this->data['Parte']['total_horasdesplazamiento_imputable'] = $this->data['Parte']['horasdesplazamientoimputables_ida'] + $this->data['Parte']['horasdesplazamientoimputables_vuelta'] ;
        return true;
    }
    
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