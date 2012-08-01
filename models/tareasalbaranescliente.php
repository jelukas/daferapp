<?php

class Tareasalbaranescliente extends AppModel {

    var $name = 'Tareasalbaranescliente';
    var $displayField = 'id';
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
        'TareasalbaranesclientesOtrosservicio' => array('dependent' => true),
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
            $otrosservicios_total += $tarea['servicios'];
        }
        $albaranescliente['Albaranescliente']['precio_mat'] = redondear_dos_decimal($preciomateriales_total);
        $albaranescliente['Albaranescliente']['precio_obra'] = redondear_dos_decimal($precioobra_total);
        $albaranescliente['Albaranescliente']['precio'] = redondear_dos_decimal($albaranescliente['Albaranescliente']['precio_mat'] + $albaranescliente['Albaranescliente']['precio_obra'] + $otrosservicios_total);
        $albaranescliente['Albaranescliente']['impuestos'] = redondear_dos_decimal($albaranescliente['Albaranescliente']['precio'] * ($albaranescliente['Tiposiva']['porcentaje_aplicable'] / 100));
        $this->Albaranescliente->save($albaranescliente);
    }
    
    function beforeDelete() {
        $tarea = $this->findById($this->id);
        $albaranescliente = $this->Albaranescliente->find('first', array('contain' => array('Tareasalbaranescliente' => 'TareasalbaranesclientesOtrosservicio', 'Tiposiva'), 'conditions' => array('Albaranescliente.id' => $tarea['Tareasalbaranescliente']['albaranescliente_id'])));
        $albaranescliente['Albaranescliente']['precio_mat'] = redondear_dos_decimal($albaranescliente['Albaranescliente']['precio_mat'] - $tarea['Tareasalbaranescliente']['materiales']);
        $albaranescliente['Albaranescliente']['precio_obra'] = redondear_dos_decimal($albaranescliente['Albaranescliente']['precio_obra'] - $tarea['Tareasalbaranescliente']['mano_de_obra']);
        $albaranescliente['Albaranescliente']['precio'] = redondear_dos_decimal($albaranescliente['Albaranescliente']['precio_mat'] + $albaranescliente['Albaranescliente']['precio_obra'] - $tarea['Tareasalbaranescliente']['servicios']);
        $albaranescliente['Albaranescliente']['impuestos'] = redondear_dos_decimal($albaranescliente['Albaranescliente']['precio'] * ($albaranescliente['Tiposiva']['porcentaje_aplicable'] / 100));
        $this->Albaranescliente->save($albaranescliente);
        return true;
    }

}

?>