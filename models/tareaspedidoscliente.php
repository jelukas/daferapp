<?php

class Tareaspedidoscliente extends AppModel {

    var $name = 'Tareaspedidoscliente';
    var $displayField = 'asunto';

    var $belongsTo = array(
        'Pedidoscliente' => array(
            'className' => 'Pedidoscliente',
            'foreignKey' => 'pedidoscliente_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );
    var $hasMany = array(
        'MaterialesTareaspedidoscliente' => array('dependent' => true),
        'ManodeobrasTareaspedidoscliente' => array('dependent' => true),
    );
    var $hasOne = array(
        'TareaspedidosclientesOtrosservicio' => array('dependent' => true),
    );
    var $virtualFields = array(
        'total' => 'Tareaspedidoscliente.mano_de_obra + Tareaspedidoscliente.materiales + Tareaspedidoscliente.servicios'
    );

    function afterSave($created) {
        $pedidoscliente = $this->Pedidoscliente->find('first', array('contain' => array('Tareaspedidoscliente' => 'TareaspedidosclientesOtrosservicio', 'Tiposiva'), 'conditions' => array('Pedidoscliente.id' => $this->data['Tareaspedidoscliente']['pedidoscliente_id'])));
        $preciomateriales_total = 0;
        $precioobra_total = 0;
        $otrosservicios_total = 0;
        foreach ($pedidoscliente['Tareaspedidoscliente'] as $tarea) {
            $preciomateriales_total += $tarea['materiales'];
            $precioobra_total += $tarea['mano_de_obra'];
            if (!empty($tarea['TareaspedidosclientesOtrosservicio']))
                $otrosservicios_total += $tarea['TareaspedidosclientesOtrosservicio']['total'];
        }
        $pedidoscliente['Pedidoscliente']['precio_mat'] = number_format($preciomateriales_total, 5, '.', '');
        $pedidoscliente['Pedidoscliente']['precio_obra'] = number_format($precioobra_total, 5, '.', '');
        $pedidoscliente['Pedidoscliente']['precio'] = number_format($pedidoscliente['Pedidoscliente']['precio_mat'] + $pedidoscliente['Pedidoscliente']['precio_obra'] + $otrosservicios_total, 5, '.', '');
        $pedidoscliente['Pedidoscliente']['impuestos'] = number_format($pedidoscliente['Pedidoscliente']['precio'] * ((float) str_replace('%', '', $pedidoscliente['Tiposiva']['tipoiva']) / 100), 5, '.', '');
        $this->Pedidoscliente->save($pedidoscliente);
    }

    function beforeDelete() {
        $tarea = $this->findById($this->id);
        $pedidoscliente = $this->Pedidoscliente->find('first', array('contain' => array('Tareaspedidoscliente' => 'TareaspedidosclientesOtrosservicio'), 'conditions' => array('Pedidoscliente.id' => $tarea['Tareaspedidoscliente']['pedidoscliente_id'])));
        $pedidoscliente['Pedidoscliente']['precio_mat'] = number_format($pedidoscliente['Pedidoscliente']['precio_mat'] - $tarea['Tareaspedidoscliente']['materiales'], 5, '.', '');
        $pedidoscliente['Pedidoscliente']['precio_obra'] = number_format($pedidoscliente['Pedidoscliente']['precio_obra'] - $tarea['Tareaspedidoscliente']['mano_de_obra'], 5, '.', '');
        if (!empty($tarea['TareaspedidosclientesOtrosservicio']))
            $pedidoscliente['Pedidoscliente']['precio'] = number_format($pedidoscliente['Pedidoscliente']['precio_mat'] + $pedidoscliente['Pedidoscliente']['precio_obra'] - $tarea['TareaspedidosclientesOtrosservicio']['total'], 5, '.', '');

        else
            $pedidoscliente['Pedidoscliente']['precio'] = number_format($pedidoscliente['Pedidoscliente']['precio_mat'] + $pedidoscliente['Pedidoscliente']['precio_obra'], 5, '.', '');

        $pedidoscliente['Pedidoscliente']['impuestos'] = number_format($pedidoscliente['Pedidoscliente']['precio'] * ((float) str_replace('%', '', $pedidoscliente['Tiposiva']['tipoiva']) / 100), 5, '.', '');
        $this->Pedidoscliente->save($pedidoscliente);
        return true;
    }

}

?>