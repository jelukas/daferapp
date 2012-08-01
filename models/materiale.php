<?php

class Materiale extends AppModel {

    var $name = 'Materiale';
    var $displayField = 'id';
    //The Associations below have been created with all possible keys, those that are not needed can be removed

    var $belongsTo = array(
        'Tareaspresupuestocliente' => array(
            'className' => 'Tareaspresupuestocliente',
            'foreignKey' => 'tareaspresupuestocliente_id',
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

    // Si le hemos cambiado la tarea debes actualizar la cantidad de materiales de la tarea ORigen
    function beforeSave($options) {
        //Estoy Editando 
        if (!empty($this->id)) {
            $materiale = $this->findById($this->id);
            if ($materiale['Materiale']['tareaspresupuestocliente_id'] != $this->data['Materiale']['tareaspresupuestocliente_id']) {
                $tarea_origen = $this->Tareaspresupuestocliente->find('first', array('contain' => 'Materiale', 'conditions' => array('Tareaspresupuestocliente.id' => $materiale['Materiale']['tareaspresupuestocliente_id'])));
                $tarea_origen['Tareaspresupuestocliente']['materiales'] = redondear_dos_decimal( $tarea_origen['Tareaspresupuestocliente']['materiales'] - $materiale['Materiale']['importe']);
                $this->Tareaspresupuestocliente->save($tarea_origen);
            }
        }
        return true;
    }

    function afterSave($created) {
        $materiale = $this->findById($this->id);
        $tarea = $this->Tareaspresupuestocliente->find('first', array('contain' => 'Materiale', 'conditions' => array('Tareaspresupuestocliente.id' => $materiale['Materiale']['tareaspresupuestocliente_id'])));
        $materiales_total = 0;
        foreach ($tarea['Materiale'] as $material) {
            $materiales_total += $material['importe'];
        }
        $tarea['Tareaspresupuestocliente']['materiales'] = redondear_dos_decimal($materiales_total);
        $this->Tareaspresupuestocliente->save($tarea);
    }

    function beforeDelete() {
        $materiale = $this->findById($this->id);
        $tarea = $this->Tareaspresupuestocliente->find('first', array('contain' => 'Materiale', 'conditions' => array('Tareaspresupuestocliente.id' => $materiale['Materiale']['tareaspresupuestocliente_id'])));
        $tarea['Tareaspresupuestocliente']['materiales'] = redondear_dos_decimal($tarea['Tareaspresupuestocliente']['materiales'] - $materiale['Materiale']['importe']);
        $this->Tareaspresupuestocliente->save($tarea);
        return true;
    }

}

?>