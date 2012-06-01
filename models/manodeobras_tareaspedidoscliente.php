<?php

class ManodeobrasTareaspedidoscliente extends AppModel {

    var $name = 'ManodeobrasTareaspedidoscliente';
    var $displayField = 'id';
    //The Associations below have been created with all possible keys, those that are not needed can be removed

    var $belongsTo = array(
        'Tareaspedidoscliente' => array(
            'className' => 'Tareaspedidoscliente',
            'foreignKey' => 'tareaspedidoscliente_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );

    function afterSave($created) {
        $tarea = $this->Tareaspedidoscliente->find('first', array('contain' => 'ManodeobrasTareaspedidoscliente', 'conditions' => array('Tareaspedidoscliente.id' => $this->data['ManodeobrasTareaspedidoscliente']['tareaspedidoscliente_id'])));
        $manodeobra_total = 0;
        foreach ($tarea['ManodeobrasTareaspedidoscliente'] as $manodeobra) {
            $manodeobra_total += $manodeobra['importe'];
        }
        $tarea['Tareaspedidoscliente']['mano_de_obra'] = number_format($manodeobra_total, 5, '.', '');
        $this->Tareaspedidoscliente->save($tarea);
    }

    function beforeDelete() {
        $manodeobra = $this->findById($this->id);
        $tarea = $this->Tareaspedidoscliente->find('first', array('contain' => 'ManodeobrasTareaspedidoscliente', 'conditions' => array('Tareaspedidoscliente.id' => $manodeobra['ManodeobrasTareaspedidoscliente']['tareaspedidoscliente_id'])));
        $tarea['Tareaspedidoscliente']['mano_de_obra'] = number_format($tarea['Tareaspedidoscliente']['mano_de_obra'] - $manodeobra['ManodeobrasTareaspedidoscliente']['importe'], 5, '.', '');
        $this->Tareaspedidoscliente->save($tarea);
        return true;
    }

}

?>