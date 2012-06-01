<?php

class Manodeobra extends AppModel {

    var $name = 'Manodeobra';
    var $displayField = 'id';
    //The Associations below have been created with all possible keys, those that are not needed can be removed

    var $belongsTo = array(
        'Tareaspresupuestocliente' => array(
            'className' => 'Tareaspresupuestocliente',
            'foreignKey' => 'tareaspresupuestocliente_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );

    function afterSave($created) {
        $tarea = $this->Tareaspresupuestocliente->find('first', array('contain' => 'Manodeobra', 'conditions' => array('Tareaspresupuestocliente.id' => $this->data['Manodeobra']['tareaspresupuestocliente_id'])));
        $manodeobra_total = 0;
        foreach ($tarea['Manodeobra'] as $manodeobra) {
            $manodeobra_total += $manodeobra['importe'];
        }
        $tarea['Tareaspresupuestocliente']['mano_de_obra'] = number_format($manodeobra_total, 5, '.', '');
        $this->Tareaspresupuestocliente->save($tarea);
    }

    function beforeDelete() {
        $manodeobra = $this->findById($this->id);
        $tarea = $this->Tareaspresupuestocliente->find('first', array('contain' => 'Manodeobra', 'conditions' => array('Tareaspresupuestocliente.id' => $manodeobra['Manodeobra']['tareaspresupuestocliente_id'])));
        $tarea['Tareaspresupuestocliente']['mano_de_obra'] = number_format($tarea['Tareaspresupuestocliente']['mano_de_obra'] - $manodeobra['Manodeobra']['importe'], 5, '.', '');
        $this->Tareaspresupuestocliente->save($tarea);
        return true;
    }

}

?>