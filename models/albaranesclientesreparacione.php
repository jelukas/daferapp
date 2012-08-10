<?php

class Albaranesclientesreparacione extends AppModel {

    var $name = 'Albaranesclientesreparacione';
    var $displayField = 'numero';
    var $order = "Albaranesclientesreparacione.fecha DESC";
    var $validate = array(
        'fecha' => array(
            'date' => array(
                'rule' => array('date'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'numero' => array(
            'notempty' => array(
                'rule' => array('notempty'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'tiposiva_id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
    );
    //The Associations below have been created with all possible keys, those that are not needed can be removed

    var $belongsTo = array(
        'Tiposiva' => array(
            'className' => 'Tiposiva',
            'foreignKey' => 'tiposiva_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Ordene' => array(
            'className' => 'Ordene',
            'foreignKey' => 'ordene_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Cliente' => array(
            'className' => 'Cliente',
            'foreignKey' => 'cliente_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Centrostrabajo' => array(
            'className' => 'Centrostrabajo',
            'foreignKey' => 'centrostrabajo_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Estadosalbaranesclientesreparacione' => array(
            'className' => 'Estadosalbaranesclientesreparacione',
            'foreignKey' => 'estadosalbaranesclientesreparacione_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Maquina' => array(
            'className' => 'Maquina',
            'foreignKey' => 'maquina_id',
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
        ),
        'FacturasCliente' => array(
            'className' => 'FacturasCliente',
            'foreignKey' => 'facturas_cliente_id',
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
        'Centrosdecoste' => array(
            'className' => 'Centrosdecoste',
            'foreignKey' => 'centrosdecoste_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );
    var $hasMany = array(
        'TareasAlbaranesclientesreparacione' => array(
            'className' => 'TareasAlbaranesclientesreparacione',
            'foreignKey' => 'albaranesclientesreparacione_id',
            'dependent' => true,
        ),
    );

    function beforeSave($options) {
        if (empty($this->data['Albaranesclientesreparacione']['id'])) {
            $query = 'SELECT MAX(a.numero)+1 as siguiente  FROM albaranesclientesreparaciones a ';
            $resultado = $this->query($query);
            if (!empty($resultado[0][0]['siguiente']))
                $this->data['Albaranesclientesreparacione']['numero'] = $resultado[0][0]['siguiente'];
            else
                $this->data['Albaranesclientesreparacione']['numero'] = 1;
        }
        return true;
    }

    function dime_siguiente_numero() {
        $query = 'SELECT MAX(a.numero)+1 as siguiente  FROM albaranesclientesreparaciones a ';
        $resultado = $this->query($query);
        if (is_null($resultado[0][0]['siguiente']))
            return 0;
        else
            return $resultado[0][0]['siguiente'];
    }

    public function get_baseimponible($albaranesclientesreparacione_id) {
        $baseimponible = 0;
        $tareas = $this->TareasAlbaranesclientesreparacione->find('all', array(
            'fields' => array('total_partes_imputable', 'total_materiales_imputables'),
            'contain' => '',
            'conditions' => array('TareasAlbaranesclientesreparacione.albaranesclientesreparacione_id' => $albaranesclientesreparacione_id),
                ));
        foreach ($tareas as $tarea) {
            $baseimponible += $tarea['TareasAlbaranesclientesreparacione']['total_partes_imputable'] + $tarea['TareasAlbaranesclientesreparacione']['total_materiales_imputables'];
        }
        return $baseimponible;
    }

    public function get_totalmanoobra_servicios($albaranesclientesreparacione_id) {
        $manoobraotroservicios = 0;
        $tareas = $this->TareasAlbaranesclientesreparacione->find('all', array(
            'fields' => array('total_partes_imputable'),
            'contain' => '',
            'conditions' => array('TareasAlbaranesclientesreparacione.albaranesclientesreparacione_id' => $albaranesclientesreparacione_id),
                ));
        foreach ($tareas as $tarea) {
            $manoobraotroservicios += $tarea['TareasAlbaranesclientesreparacione']['total_partes_imputable'];
        }
        return $manoobraotroservicios;
    }

    public function get_totalrepuestos($albaranesclientesreparacione_id) {
        $total_repuestos = 0;
        $tareas = $this->TareasAlbaranesclientesreparacione->find('all', array(
            'fields' => array('total_materiales_imputables'),
            'contain' => '',
            'conditions' => array('TareasAlbaranesclientesreparacione.albaranesclientesreparacione_id' => $albaranesclientesreparacione_id),
                ));
        foreach ($tareas as $tarea) {
            $total_repuestos += $tarea['TareasAlbaranesclientesreparacione']['total_materiales_imputables'];
        }
        return $total_repuestos;
    }

}

?>