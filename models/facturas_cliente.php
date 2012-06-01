<?php

class FacturasCliente extends AppModel {

    var $name = 'FacturasCliente';
    var $belongsTo = array(
        'Cliente' => array(
            'className' => 'Cliente',
            'foreignKey' => 'cliente_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
    );
    var $hasMany = array(
        'Albaranescliente' => array(
            'className' => 'Albaranescliente',
            'foreignKey' => 'facturas_cliente_id',
            'dependent' => false
        ),
    );

    function beforeSave($options) {
        if (empty($this->data['FacturasCliente']['id'])){
            $query = 'SELECT MAX(f.numero)+1 as siguiente_factura_id  FROM facturas_clientes f '; 
            $resultado = $this->query($query);
            $this->data['FacturasCliente']['numero'] = $resultado[0][0]['siguiente_factura_id'];
        }
        return true;
    }

}

?>