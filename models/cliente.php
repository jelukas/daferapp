<?php

class Cliente extends AppModel {

    var $name = 'Cliente';
    var $displayField = 'nombre';
    //The Associations below have been created with all possible keys, those that are not needed can be removed


    var $hasOne = array(
        'Cuentasbancaria' => array(
            'className' => 'Cuentasbancaria',
            'foreignKey' => 'cliente_id',
            'dependent' => true
        ),
        'Formapago' => array(
            'className' => 'Formapago',
            'foreignKey' => 'cliente_id',
            'dependent' => true
        ),
    );
    var $belongsTo = array(
        'Comerciale' => array(
            'className' => 'Comerciale',
            'foreignKey' => 'comerciale_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );
    var $hasMany = array(
        'Centrostrabajo' => array(
            'className' => 'Centrostrabajo',
            'foreignKey' => 'cliente_id',
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
        'Albaranescliente' => array(
            'className' => 'Albaranescliente',
            'foreignKey' => 'cliente_id',
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
            'foreignKey' => 'cliente_id',
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
        'Presupuestoscliente' => array(
            'className' => 'Presupuestoscliente',
            'foreignKey' => 'cliente_id',
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
        'Maquina' => array(
            'className' => 'Maquina',
            'foreignKey' => 'cliente_id',
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

    public function get_albaranesrepuestos_para_facturar($fecha_inicio, $fecha_fin) {
        $cliente = $this->find('first', array('contain' => array('Centrostrabajo' => 'Maquina'), 'conditions' => array('Cliente.id' => $this->id)));
        $albaranes_para_facturar = array();
        if ($cliente['Cliente']['modo_facturacion'] == 'albaran') {
            $albaranesrepuestos_list = $this->Albaranescliente->find(
                    'all', array(
                'contain' => '',
                'conditions' => array(
                    'Albaranescliente.cliente_id' => $this->id,
                    'Albaranescliente.facturable' => 1,
                    'Albaranescliente.facturas_cliente_id' => null,
                    'Albaranescliente.fecha BETWEEN ? AND ?' => array($fecha_inicio, $fecha_fin)
                ),
                    ));
            $albaranes_para_facturar['Albaranescliente'] =  $albaranesrepuestos_list;
        } elseif ($cliente['Cliente']['modo_facturacion'] == 'centrotrabajo') {
            foreach ($cliente['Centrostrabajo'] as $centrostrabajo) {
                $albaranesrepuestos_list = $this->Albaranescliente->find(
                        'all', array(
                    'contain' => '',
                    'conditions' => array(
                        'Albaranescliente.centrostrabajo_id' => $centrostrabajo['id'],
                        'Albaranescliente.facturable' => 1,
                        'Albaranescliente.facturas_cliente_id' => null,
                        'Albaranescliente.fecha BETWEEN ? AND ?' => array($fecha_inicio, $fecha_fin)
                    ),
                        ));
                $centrostrabajo['Albaranescliente'] = $albaranesrepuestos_list;
                $albaranes_para_facturar['Centrostrabajo'][] = $centrostrabajo;
            }
        }

        return $albaranes_para_facturar;
    }

    public function get_albaranesreparaciones_para_facturar($fecha_inicio, $fecha_fin) {
        $albaranesreparacion_list = $this->Albaranesclientesreparacione->find(
                'all', array(
            'contain' => '',
            'conditions' => array(
                'Albaranescliente.cliente_id' => $this->id,
                'Albaranesclientesreparacione.facturable' => 1,
                'Albaranesclientesreparacione.facturas_cliente_id' => null,
                'Albaranesclientesreparacione.fecha BETWEEN ? AND ?' => array($fecha_inicio, $fecha_fin)
            )
                ));
        return $albaranesreparacion_list;
    }

}

?>
