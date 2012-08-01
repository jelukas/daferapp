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
        'TareaspedidosclientesOtrosservicio' => array('dependent' => true),
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
            $otrosservicios_total += $tarea['servicios'];
        }
        $pedidoscliente['Pedidoscliente']['precio_mat'] = redondear_dos_decimal($preciomateriales_total);
        $pedidoscliente['Pedidoscliente']['precio_obra'] = redondear_dos_decimal($precioobra_total);
        $pedidoscliente['Pedidoscliente']['precio'] = redondear_dos_decimal($pedidoscliente['Pedidoscliente']['precio_mat'] + $pedidoscliente['Pedidoscliente']['precio_obra'] + $otrosservicios_total);
        $pedidoscliente['Pedidoscliente']['impuestos'] = redondear_dos_decimal($pedidoscliente['Pedidoscliente']['precio'] * ($pedidoscliente['Tiposiva']['porcentaje_aplicable'] / 100));
        $this->Pedidoscliente->save($pedidoscliente);
    }

    function beforeDelete() {
        $tarea = $this->findById($this->id);
        $pedidoscliente = $this->Pedidoscliente->find('first', array('contain' => array('Tareaspedidoscliente' => 'TareaspedidosclientesOtrosservicio', 'Tiposiva'), 'conditions' => array('Pedidoscliente.id' => $tarea['Tareaspedidoscliente']['pedidoscliente_id'])));
        $pedidoscliente['Pedidoscliente']['precio_mat'] = redondear_dos_decimal($pedidoscliente['Pedidoscliente']['precio_mat'] - $tarea['Tareaspedidoscliente']['materiales']);
        $pedidoscliente['Pedidoscliente']['precio_obra'] = redondear_dos_decimal($pedidoscliente['Pedidoscliente']['precio_obra'] - $tarea['Tareaspedidoscliente']['mano_de_obra']);
        $pedidoscliente['Pedidoscliente']['precio'] = redondear_dos_decimal($pedidoscliente['Pedidoscliente']['precio_mat'] + $pedidoscliente['Pedidoscliente']['precio_obra'] - $tarea['Tareaspedidoscliente']['servicios']);
        $pedidoscliente['Pedidoscliente']['impuestos'] = redondear_dos_decimal($pedidoscliente['Pedidoscliente']['precio'] * ($pedidoscliente['Tiposiva']['porcentaje_aplicable'] / 100));
        $this->Pedidoscliente->save($pedidoscliente);
        return true;
    }

}

?>