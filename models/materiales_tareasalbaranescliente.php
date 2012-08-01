<?php

class MaterialesTareasalbaranescliente extends AppModel {

    var $name = 'MaterialesTareasalbaranescliente';
    var $displayField = 'id';
    //The Associations below have been created with all possible keys, those that are not needed can be removed

    var $belongsTo = array(
        'Tareasalbaranescliente' => array(
            'className' => 'Tareasalbaranescliente',
            'foreignKey' => 'tareasalbaranescliente_id',
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
        $tarea = $this->Tareasalbaranescliente->find('first', array('contain' => 'MaterialesTareasalbaranescliente', 'conditions' => array('Tareasalbaranescliente.id' => $materiale['MaterialesTareasalbaranescliente']['tareasalbaranescliente_id'])));
        $materiales_total = 0;
        foreach ($tarea['MaterialesTareasalbaranescliente'] as $material) {
            $materiales_total += $material['importe'];
        }
        $tarea['Tareasalbaranescliente']['materiales'] = redondear_dos_decimal($materiales_total);
        $this->Tareasalbaranescliente->save($tarea);
    }

    function beforeDelete() {
        $materiale = $this->findById($this->id);
        $tarea = $this->Tareasalbaranescliente->find('first', array('contain' => 'MaterialesTareasalbaranescliente', 'conditions' => array('Tareasalbaranescliente.id' => $materiale['MaterialesTareasalbaranescliente']['tareasalbaranescliente_id'])));
        $tarea['Tareasalbaranescliente']['materiales'] = redondear_dos_decimal($tarea['Tareasalbaranescliente']['materiales'] - $materiale['MaterialesTareasalbaranescliente']['importe']);
        $this->Tareasalbaranescliente->save($tarea);
        return true;
    }

}

?>