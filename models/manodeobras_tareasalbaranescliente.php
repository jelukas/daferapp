<?php

class ManodeobrasTareasalbaranescliente extends AppModel {

    var $name = 'ManodeobrasTareasalbaranescliente';
    var $displayField = 'id';
    //The Associations below have been created with all possible keys, those that are not needed can be removed

    var $belongsTo = array(
        'Tareasalbaranescliente' => array(
            'className' => 'Tareasalbaranescliente',
            'foreignKey' => 'tareasalbaranescliente_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );

    function afterSave($created) {
        $tarea = $this->Tareasalbaranescliente->find('first', array('contain' => 'ManodeobrasTareasalbaranescliente', 'conditions' => array('Tareasalbaranescliente.id' => $this->data['ManodeobrasTareasalbaranescliente']['tareasalbaranescliente_id'])));
        $manodeobra_total = 0;
        foreach ($tarea['ManodeobrasTareasalbaranescliente'] as $manodeobra) {
            $manodeobra_total += $manodeobra['importe'];
        }
        $tarea['Tareasalbaranescliente']['mano_de_obra'] = redondear_dos_decimal($manodeobra_total);
        $this->Tareasalbaranescliente->save($tarea);
    }

    function beforeDelete() {
        $manodeobra = $this->findById($this->id);
        $tarea = $this->Tareasalbaranescliente->find('first', array('contain' => 'ManodeobrasTareasalbaranescliente', 'conditions' => array('Tareasalbaranescliente.id' => $manodeobra['ManodeobrasTareasalbaranescliente']['tareasalbaranescliente_id'])));
        $tarea['Tareasalbaranescliente']['mano_de_obra'] = redondear_dos_decimal($tarea['Tareasalbaranescliente']['mano_de_obra'] - $manodeobra['ManodeobrasTareasalbaranescliente']['importe']);
        $this->Tareasalbaranescliente->save($tarea);
        return true;
    }

}

?>