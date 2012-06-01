<?php

class TareasalbaranesclientesOtrosservicio extends AppModel {

    var $name = 'TareasalbaranesclientesOtrosservicio';
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
        $tarea = $this->Tareasalbaranescliente->find('first', array('contain' => 'TareasalbaranesclientesOtrosservicio', 'conditions' => array('Tareasalbaranescliente.id' => $this->data['TareasalbaranesclientesOtrosservicio']['tareasalbaranescliente_id'])));
        $tarea['Tareasalbaranescliente']['servicios'] = number_format($tarea['TareasalbaranesclientesOtrosservicio']['total'], 5, '.', '');
        $this->Tareasalbaranescliente->save($tarea);
    }

    function beforeDelete() {
        $servicio = $this->findById($this->id);
        $tarea = $this->Tareasalbaranescliente->find('first', array('contain' => 'TareasalbaranesclientesOtrosservicio', 'conditions' => array('Tareasalbaranescliente.id' => $servicio['TareasalbaranesclientesOtrosservicio']['tareasalbaranescliente_id'])));
        $tarea['Tareasalbaranescliente']['servicios'] = number_format($tarea['Tareasalbaranescliente']['servicios'] - $servicio['TareasalbaranesclientesOtrosservicio']['total'], 5, '.', '');
        $this->Tareasalbaranescliente->save($tarea);
        return true;
    }

}

?>