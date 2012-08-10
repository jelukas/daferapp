<?php

class Ordene extends AppModel {

    var $name = 'Ordene';
    //The Associations below have been created with all possible keys, those that are not needed can be removed

    var $order = "Ordene.numero DESC";
    var $belongsTo = array(
        'Avisostallere' => array(
            'className' => 'Avisostallere',
            'foreignKey' => 'avisostallere_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Estadosordene' => array(
            'className' => 'Estadosordene',
            'foreignKey' => 'estadosordene_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Comerciale' => array(
            'className' => 'Comerciale',
            'foreignKey' => 'comerciale_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Almacene' => array(
            'className' => 'Almacene',
            'foreignKey' => 'almacene_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );
    var $hasMany = array(
        'Presupuestoscliente' => array(
            'className' => 'Presupuestoscliente',
            'foreignKey' => 'ordene_id',
            'dependent' => false,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        ),
        'Presupuestosproveedore' => array(
            'className' => 'Presupuestosproveedore',
            'foreignKey' => 'ordene_id',
            'dependent' => false,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        ),
        'Albaranesclientesreparacione' => array(
            'className' => 'Albaranesclientesreparacione',
            'foreignKey' => 'ordene_id',
            'dependent' => false,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        ),
        'Tarea' => array(
            'className' => 'Tarea',
            'foreignKey' => 'ordene_id',
            'dependent' => false,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        )
    );

    function beforeSave($options) {
        if (empty($this->data['Ordene']['id'])) {
            $query = 'SELECT MAX(o.numero)+1 as siguiente  FROM ordenes o ';
            $resultado = $this->query($query);
            if (!empty($resultado[0][0]['siguiente']))
                $this->data['Ordene']['numero'] = $resultado[0][0]['siguiente'];
            else
                $this->data['Ordene']['numero'] = 1;
        }
        return true;
    }

    function dime_siguiente_numero() {
        $query = 'SELECT MAX(o.numero)+1 as siguiente  FROM ordenes o ';
        $resultado = $this->query($query);
        return $resultado[0][0]['siguiente'];
    }

    public function get_baseimponible($ordene_id) {
        $baseimponible = 0;
        $tareas = $this->Tarea->find('all', array(
            'fields' => array('total_partes_imputable', 'total_materiales_imputables'),
            'contain' => '',
            'conditions' => array('Tarea.ordene_id' => $ordene_id),
                ));
        foreach ($tareas as $tarea) {
            $baseimponible += $tarea['Tarea']['total_partes_imputable'] + $tarea['Tarea']['total_materiales_imputables'];
        }
        return $baseimponible;
    }

    public function get_totalmanoobra_servicios($ordene_id) {
        $manoobraotroservicios = 0;
        $tareas = $this->Tarea->find('all', array(
            'fields' => array('total_partes_imputable'),
            'contain' => '',
            'conditions' => array('Tarea.ordene_id' => $ordene_id),
                ));
        foreach ($tareas as $tarea) {
            $manoobraotroservicios += $tarea['Tarea']['total_partes_imputable'];
        }
        return $manoobraotroservicios;
    }

    public function get_totalrepuestos($ordene_id) {
        $total_repuestos = 0;
        $tareas = $this->Tarea->find('all', array(
            'fields' => array('total_materiales_imputables'),
            'contain' => '',
            'conditions' => array('Tarea.ordene_id' => $ordene_id),
                ));
        foreach ($tareas as $tarea) {
            $total_repuestos += $tarea['Tarea']['total_materiales_imputables'];
        }
        return $total_repuestos;
    }

}

?>
