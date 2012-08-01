<?php

class Tareaspresupuestocliente extends AppModel {

    var $name = 'Tareaspresupuestocliente';
    var $displayField = 'asunto';

    var $belongsTo = array(
        'Presupuestoscliente' => array(
            'className' => 'Presupuestoscliente',
            'foreignKey' => 'presupuestoscliente_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );
    var $hasMany = array(
        'Materiale' => array('dependent' => true),
        'TareaspresupuestoclientesOtrosservicio' => array('dependent' => true),
        'Manodeobra' => array('dependent' => true)
    );
    var $hasOne = array(
        'TareaspresupuestoclientesOtrosservicio' => array('dependent' => true),
    );
    var $virtualFields = array(
        'total' => 'Tareaspresupuestocliente.mano_de_obra + Tareaspresupuestocliente.materiales + Tareaspresupuestocliente.servicios'
    );

    function afterSave($created) {
        $presupuestoscliente = $this->Presupuestoscliente->find('first', array('contain' => array('Tareaspresupuestocliente' => 'TareaspresupuestoclientesOtrosservicio', 'Tiposiva'), 'conditions' => array('Presupuestoscliente.id' => $this->data['Tareaspresupuestocliente']['presupuestoscliente_id'])));
        $preciomateriales_total = 0;
        $precioobra_total = 0;
        $otrosservicios_total = 0;
        foreach ($presupuestoscliente['Tareaspresupuestocliente'] as $tarea) {
            $preciomateriales_total += $tarea['materiales'];
            $precioobra_total += $tarea['mano_de_obra'];
            $otrosservicios_total += $tarea['servicios'];
        }
        $presupuestoscliente['Presupuestoscliente']['precio_mat'] = redondear_dos_decimal($preciomateriales_total);
        $presupuestoscliente['Presupuestoscliente']['precio_obra'] = redondear_dos_decimal($precioobra_total);
        $presupuestoscliente['Presupuestoscliente']['precio'] = redondear_dos_decimal($presupuestoscliente['Presupuestoscliente']['precio_mat'] + $presupuestoscliente['Presupuestoscliente']['precio_obra'] + $otrosservicios_total);
        $presupuestoscliente['Presupuestoscliente']['impuestos'] = redondear_dos_decimal($presupuestoscliente['Presupuestoscliente']['precio'] * ($presupuestoscliente['Tiposiva']['porcentaje_aplicable'] / 100));
        $this->Presupuestoscliente->save($presupuestoscliente);
    }

    function beforeDelete() {
        $tarea = $this->findById($this->id);
        $presupuestoscliente = $this->Presupuestoscliente->find('first', array('contain' => array('Tareaspresupuestocliente' => 'TareaspresupuestoclientesOtrosservicio','Tiposiva'), 'conditions' => array('Presupuestoscliente.id' => $tarea['Tareaspresupuestocliente']['presupuestoscliente_id'])));
        $presupuestoscliente['Presupuestoscliente']['precio_mat'] = redondear_dos_decimal($presupuestoscliente['Presupuestoscliente']['precio_mat'] - $tarea['Tareaspresupuestocliente']['materiales']);
        $presupuestoscliente['Presupuestoscliente']['precio_obra'] = redondear_dos_decimal($presupuestoscliente['Presupuestoscliente']['precio_obra'] - $tarea['Tareaspresupuestocliente']['mano_de_obra']);
        $presupuestoscliente['Presupuestoscliente']['precio'] = redondear_dos_decimal($presupuestoscliente['Presupuestoscliente']['precio_mat'] + $presupuestoscliente['Presupuestoscliente']['precio_obra'] - $tarea['Tareaspresupuestocliente']['servicios']);
        $presupuestoscliente['Presupuestoscliente']['impuestos'] = redondear_dos_decimal($presupuestoscliente['Presupuestoscliente']['precio'] * ($presupuestoscliente['Tiposiva']['porcentaje_aplicable'] / 100));
        $this->Presupuestoscliente->save($presupuestoscliente);
        return true;
    }

}

?>