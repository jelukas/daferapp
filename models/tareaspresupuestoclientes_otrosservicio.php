<?php

class TareaspresupuestoclientesOtrosservicio extends AppModel {

    var $name = 'TareaspresupuestoclientesOtrosservicio';
    var $displayField = 'id';
    //The Associations below have been created with all possible keys, those that are not needed can be removed

    var $belongsTo = array(
        'Tareaspresupuestocliente' => array(
            'className' => 'Tareaspresupuestocliente',
            'foreignKey' => 'tareaspresupuestocliente_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );
    var $virtualFields = array(
        'total_desplazamiento' => 'TareaspresupuestoclientesOtrosservicio.desplazamiento + TareaspresupuestoclientesOtrosservicio.manoobradesplazamiento + TareaspresupuestoclientesOtrosservicio.kilometraje'
    );

    function afterSave($created) {
        $tarea = $this->Tareaspresupuestocliente->find('first', array('contain' => 'TareaspresupuestoclientesOtrosservicio', 'conditions' => array('Tareaspresupuestocliente.id' => $this->data['TareaspresupuestoclientesOtrosservicio']['tareaspresupuestocliente_id'])));
        $tarea['Tareaspresupuestocliente']['servicios'] = redondear_dos_decimal($tarea['TareaspresupuestoclientesOtrosservicio']['total']);
        $this->Tareaspresupuestocliente->save($tarea);
    }

    function beforeDelete() {
        $servicio = $this->findById($this->id);
        $tarea = $this->Tareaspresupuestocliente->find('first', array('contain' => 'TareaspresupuestoclientesOtrosservicio', 'conditions' => array('Tareaspresupuestocliente.id' => $servicio['TareaspresupuestoclientesOtrosservicio']['tareaspresupuestocliente_id'])));
        $tarea['Tareaspresupuestocliente']['servicios'] = redondear_dos_decimal($tarea['Tareaspresupuestocliente']['servicios'] - $servicio['TareaspresupuestoclientesOtrosservicio']['total']);
        $this->Tareaspresupuestocliente->save($tarea);
        return true;
    }

}

?>