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
    var $virtualFields = array(
        'total_desplazamiento' => 'TareasalbaranesclientesOtrosservicio.desplazamiento + TareasalbaranesclientesOtrosservicio.manoobradesplazamiento + TareasalbaranesclientesOtrosservicio.kilometraje'
    );

    function afterSave($created) {
        $tarea = $this->Tareasalbaranescliente->find('first', array('contain' => 'TareasalbaranesclientesOtrosservicio', 'conditions' => array('Tareasalbaranescliente.id' => $this->data['TareasalbaranesclientesOtrosservicio']['tareasalbaranescliente_id'])));
        $tarea['Tareasalbaranescliente']['servicios'] = redondear_dos_decimal($tarea['TareasalbaranesclientesOtrosservicio']['total']);
        $this->Tareasalbaranescliente->save($tarea);
    }

    function beforeDelete() {
        $servicio = $this->findById($this->id);
        $tarea = $this->Tareasalbaranescliente->find('first', array('contain' => 'TareasalbaranesclientesOtrosservicio', 'conditions' => array('Tareasalbaranescliente.id' => $servicio['TareasalbaranesclientesOtrosservicio']['tareasalbaranescliente_id'])));
        $tarea['Tareasalbaranescliente']['servicios'] = redondear_dos_decimal($tarea['Tareasalbaranescliente']['servicios'] - $servicio['TareasalbaranesclientesOtrosservicio']['total']);
        $this->Tareasalbaranescliente->save($tarea);
        return true;
    }

}

?>