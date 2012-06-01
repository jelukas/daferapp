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

    function afterSave($created) {
        $materiale = $this->findById($this->id);
        $tarea = $this->Tareaspresupuestocliente->find('first', array('contain' => 'Materiale', 'conditions' => array('Tareaspresupuestocliente.id' => $materiale['Materiale']['tareaspresupuestocliente_id'])));
        $materiales_total = 0;
        foreach ($tarea['Materiale'] as $material) {
            $materiales_total += $material['importe'];
        }
        $tarea['Tareaspresupuestocliente']['materiales'] = number_format($materiales_total, 5, '.', '');
        $this->Tareaspresupuestocliente->save($tarea);
    }

    function beforeDelete() {
        $materiale = $this->findById($this->id);
        $tarea = $this->Tareaspresupuestocliente->find('first', array('contain' => 'Materiale', 'conditions' => array('Tareaspresupuestocliente.id' => $materiale['Materiale']['tareaspresupuestocliente_id'])));
        $tarea['Tareaspresupuestocliente']['materiales'] = number_format($tarea['Tareaspresupuestocliente']['materiales'] - $materiale['Materiale']['importe'], 5, '.', '');
        $this->Tareaspresupuestocliente->save($tarea);
        return true;
    }

}

?>