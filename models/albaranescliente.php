<?php

class Albaranescliente extends AppModel {

    var $name = 'Albaranescliente';
    var $displayField = 'numero';
    var $order = "Albaranescliente.fecha DESC";
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
    );
    //The Associations below have been created with all possible keys, those that are not needed can be removed

    var $belongsTo = array(
        'Avisosrepuesto' => array(
            'className' => 'Avisosrepuesto',
            'foreignKey' => 'avisosrepuesto_id',
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
        'Maquina' => array(
            'className' => 'Maquina',
            'foreignKey' => 'maquina_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Pedidoscliente' => array(
            'className' => 'Pedidoscliente',
            'foreignKey' => 'pedidoscliente_id',
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
        'Tiposiva' => array(
            'className' => 'Tiposiva',
            'foreignKey' => 'tiposiva_id',
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
        ),
        'Comerciale' => array(
            'className' => 'Comerciale',
            'foreignKey' => 'comerciale_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Estadosalbaranescliente' => array(
            'className' => 'Estadosalbaranescliente',
            'foreignKey' => 'estadosalbaranescliente_id',
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
        )
    );
    var $hasMany = array(
        'Tareasalbaranescliente' => array(
            'className' => 'Tareasalbaranescliente',
            'foreignKey' => 'albaranescliente_id',
            'dependent' => true,
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

    function dime_siguiente_numero() {
        $query = 'SELECT COALESCE(MAX(a.numero)+1,1) as siguiente  FROM albaranesclientes a ';
        $resultado = $this->query($query);
        return $resultado[0][0]['siguiente'];
    }

    function afterSave($created) {
        $albaranescliente = $this->find('first', array(
            'contain' => 'Comerciale',
            'conditions' => array('Albaranescliente.id' => $this->id)));
        $comision = redondear_dos_decimal($albaranescliente['Albaranescliente']['precio'] * ($albaranescliente['Comerciale']['porcentaje_comision'] / 100 ));
        $query = 'UPDATE albaranesclientes a SET a.comision = ' . $comision . ' WHERE a.id = ' . $this->id;
        $resultado = $this->query($query);
    }

}

?>