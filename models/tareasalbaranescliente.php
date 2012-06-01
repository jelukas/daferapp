<?php

class Tareasalbaranescliente extends AppModel {

    var $name = 'Tareasalbaranescliente';
    var $displayField = 'id';
    //The Associations below have been created with all possible keys, those that are not needed can be removed

    var $belongsTo = array(
        'Albaranescliente' => array(
            'className' => 'Albaranescliente',
            'foreignKey' => 'albaranescliente_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );
    var $hasMany = array(
        'MaterialesTareasalbaranescliente' => array('dependent' => true),
        'ManodeobrasTareasalbaranescliente' => array('dependent' => true),
    );
    var $hasOne = array(
        'TareasalbaranesclientesOtrosservicio' => array('dependent' => true),
    );
    var $virtualFields = array(
        'total' => 'Tareasalbaranescliente.mano_de_obra + Tareasalbaranescliente.materiales + Tareasalbaranescliente.servicios'
    );

    function afterSave($created) {
        $albaranescliente = $this->Albaranescliente->find('first', array('contain' => array('Tareasalbaranescliente' => 'TareasalbaranesclientesOtrosservicio', 'Tiposiva'), 'conditions' => array('Albaranescliente.id' => $this->data['Tareasalbaranescliente']['albaranescliente_id'])));
        $preciomateriales_total = 0;
        $precioobra_total = 0;
        $otrosservicios_total = 0;
        foreach ($albaranescliente['Tareasalbaranescliente'] as $tarea) {
            $preciomateriales_total += $tarea['materiales'];
            $precioobra_total += $tarea['mano_de_obra'];
            if (!empty($tarea['TareasalbaranesclientesOtrosservicio']))
                $otrosservicios_total += $tarea['TareasalbaranesclientesOtrosservicio']['total'];
        }
        $albaranescliente['Albaranescliente']['precio_mat'] = number_format($preciomateriales_total, 5, '.', '');
        $albaranescliente['Albaranescliente']['precio_obra'] = number_format($precioobra_total, 5, '.', '');
        $albaranescliente['Albaranescliente']['precio'] = number_format($albaranescliente['Albaranescliente']['precio_mat'] + $albaranescliente['Albaranescliente']['precio_obra'] + $otrosservicios_total, 5, '.', '');
        $albaranescliente['Albaranescliente']['impuestos'] = number_format($albaranescliente['Albaranescliente']['precio'] * ((float) str_replace('%', '', $albaranescliente['Tiposiva']['tipoiva']) / 100), 5, '.', '');
        $this->Albaranescliente->save($albaranescliente);
    }

    function beforeDelete() {
        $tarea = $this->findById($this->id);
        $albaranescliente = $this->Albaranescliente->find('first', array('contain' => array('Tareasalbaranescliente' => 'TareasalbaranesclientesOtrosservicio'), 'conditions' => array('Albaranescliente.id' => $tarea['Tareasalbaranescliente']['albaranescliente_id'])));
        $albaranescliente['Albaranescliente']['precio_mat'] = number_format($albaranescliente['Albaranescliente']['precio_mat'] - $tarea['Tareasalbaranescliente']['materiales'], 5, '.', '');
        $albaranescliente['Albaranescliente']['precio_obra'] = number_format($albaranescliente['Albaranescliente']['precio_obra'] - $tarea['Tareasalbaranescliente']['mano_de_obra'], 5, '.', '');
        if (!empty($tarea['TareasalbaranesclientesOtrosservicio']))
            $albaranescliente['Albaranescliente']['precio'] = number_format($albaranescliente['Albaranescliente']['precio_mat'] + $albaranescliente['Albaranescliente']['precio_obra'] - $tarea['TareasalbaranesclientesOtrosservicio']['total'], 5, '.', '');

        else
            $albaranescliente['Albaranescliente']['precio'] = number_format($albaranescliente['Albaranescliente']['precio_mat'] + $albaranescliente['Albaranescliente']['precio_obra'], 5, '.', '');

        $albaranescliente['Albaranescliente']['impuestos'] = number_format($albaranescliente['Albaranescliente']['precio'] * ((float) str_replace('%', '', $albaranescliente['Tiposiva']['tipoiva']) / 100), 5, '.', '');
        $this->Albaranescliente->save($albaranescliente);
        return true;
    }

}

?>