<?php

class MaterialesTareaspedidoscliente extends AppModel {

    var $name = 'MaterialesTareaspedidoscliente';
    var $displayField = 'id';
    //The Associations below have been created with all possible keys, those that are not needed can be removed

    var $belongsTo = array(
        'Tareaspedidoscliente' => array(
            'className' => 'Tareaspedidoscliente',
            'foreignKey' => 'tareaspedidoscliente_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Articulo' => array(
            'className' => 'Articulo',
            'foreignKey' => 'articulo_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );

    function afterSave($created) {
        $materiale = $this->findById($this->id);
        $tarea = $this->Tareaspedidoscliente->find('first', array('contain' => 'MaterialesTareaspedidoscliente', 'conditions' => array('Tareaspedidoscliente.id' => $materiale['MaterialesTareaspedidoscliente']['tareaspedidoscliente_id'])));
        $materiales_total = 0;
        foreach ($tarea['MaterialesTareaspedidoscliente'] as $material) {
            $materiales_total += $material['importe'];
        }
        $tarea['Tareaspedidoscliente']['materiales'] = redondear_dos_decimal($materiales_total);
        $this->Tareaspedidoscliente->save($tarea);
    }

    function beforeDelete() {
        $materiale = $this->findById($this->id);
        $tarea = $this->Tareaspedidoscliente->find('first', array('contain' => 'MaterialesTareaspedidoscliente', 'conditions' => array('Tareaspedidoscliente.id' => $materiale['MaterialesTareaspedidoscliente']['tareaspedidoscliente_id'])));
        $tarea['Tareaspedidoscliente']['materiales'] = redondear_dos_decimal($tarea['Tareaspedidoscliente']['materiales'] - $materiale['MaterialesTareaspedidoscliente']['importe']);
        $this->Tareaspedidoscliente->save($tarea);
        return true;
    }

}

?>