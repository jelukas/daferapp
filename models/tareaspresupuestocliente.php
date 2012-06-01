<?php

class Tareaspresupuestocliente extends AppModel {

    var $name = 'Tareaspresupuestocliente';
    var $displayField = 'asunto';
    //The Associations below have been created with all possible keys, those that are not needed can be removed

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
            if (!empty($tarea['TareaspresupuestoclientesOtrosservicio']))
                $otrosservicios_total += $tarea['TareaspresupuestoclientesOtrosservicio']['total'];
        }
        $presupuestoscliente['Presupuestoscliente']['precio_mat'] = number_format($preciomateriales_total, 5, '.', '');
        $presupuestoscliente['Presupuestoscliente']['precio_obra'] = number_format($precioobra_total, 5, '.', '');
        $presupuestoscliente['Presupuestoscliente']['precio'] = number_format($presupuestoscliente['Presupuestoscliente']['precio_mat'] + $presupuestoscliente['Presupuestoscliente']['precio_obra'] + $otrosservicios_total, 5, '.', '');
        $presupuestoscliente['Presupuestoscliente']['impuestos'] = number_format($presupuestoscliente['Presupuestoscliente']['precio'] * ((float) str_replace('%', '', $presupuestoscliente['Tiposiva']['tipoiva']) / 100), 5, '.', '');
        $this->Presupuestoscliente->save($presupuestoscliente);
    }

    function beforeDelete() {
        $tarea = $this->findById($this->id);
        $presupuestoscliente = $this->Presupuestoscliente->find('first', array('contain' => array('Tareaspresupuestocliente' => 'TareaspresupuestoclientesOtrosservicio'), 'conditions' => array('Presupuestoscliente.id' => $tarea['Tareaspresupuestocliente']['presupuestoscliente_id'])));
        $presupuestoscliente['Presupuestoscliente']['precio_mat'] = number_format($presupuestoscliente['Presupuestoscliente']['precio_mat'] - $tarea['Tareaspresupuestocliente']['materiales'], 5, '.', '');
        $presupuestoscliente['Presupuestoscliente']['precio_obra'] = number_format($presupuestoscliente['Presupuestoscliente']['precio_obra'] - $tarea['Tareaspresupuestocliente']['mano_de_obra'], 5, '.', '');
        if (!empty($tarea['TareaspresupuestoclientesOtrosservicio']))
            $presupuestoscliente['Presupuestoscliente']['precio'] = number_format($presupuestoscliente['Presupuestoscliente']['precio_mat'] + $presupuestoscliente['Presupuestoscliente']['precio_obra'] - $tarea['TareaspresupuestoclientesOtrosservicio']['total'], 5, '.', '');

        else
            $presupuestoscliente['Presupuestoscliente']['precio'] = number_format($presupuestoscliente['Presupuestoscliente']['precio_mat'] + $presupuestoscliente['Presupuestoscliente']['precio_obra'], 5, '.', '');

        $presupuestoscliente['Presupuestoscliente']['impuestos'] = number_format($presupuestoscliente['Presupuestoscliente']['precio'] * ((float) str_replace('%', '', $presupuestoscliente['Tiposiva']['tipoiva']) / 100), 5, '.', '');
        $this->Presupuestoscliente->save($presupuestoscliente);
        return true;
    }

}

?>