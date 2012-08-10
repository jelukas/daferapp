<?php

class FacturasCliente extends AppModel {

    var $name = 'FacturasCliente';
    var $order = "FacturasCliente.fecha DESC";
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
        'Albaranesclientesreparacione' => array(
            'className' => 'Albaranesclientesreparacione',
            'foreignKey' => 'facturas_cliente_id',
            'dependent' => false
        ),
    );

    function beforeSave($options) {
        if (empty($this->data['FacturasCliente']['id'])) {
            $query = 'SELECT MAX(f.numero)+1 as siguiente  FROM facturas_clientes f ';
            $resultado = $this->query($query);
            if (!empty($resultado[0][0]['siguiente']))
                $this->data['FacturasCliente']['numero'] = $resultado[0][0]['siguiente'];
            else
                $this->data['FacturasCliente']['numero'] = 1;
        }
        return true;
    }

    function dime_siguiente_numero() {
        $query = 'SELECT MAX(f.numero)+1 as siguiente  FROM facturas_clientes f ';
        $resultado = $this->query($query);
        return $resultado[0][0]['siguiente'];
    }

    /*
     * Antes de borrar los albaranes debemos poner facturables a True
     */
    function beforeDelete(){
        $albaranescliente_list = $this->Albaranescliente->find('list',array('conditions'=>array('Albaranescliente.facturas_cliente_id' => $this->id)));
        foreach($albaranescliente_list as $albaranescliente_id => $value){
            $this->Albaranescliente->id = $albaranescliente_id;
            $this->Albaranescliente->saveField('facturable',1);
        }
        return true;
    }
}

?>