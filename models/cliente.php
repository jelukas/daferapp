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
        ),
        'Cuentascontable' => array(
            'className' => 'Cuentascontable',
            'foreignKey' => 'cuentascontable_id',
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
        'Telefono' => array(
            'className' => 'Telefono',
            'foreignKey' => 'cliente_id',
            'dependent' => true,
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

    public function get_cliente_facturable($fecha_inicio, $fecha_fin) {
        $cliente = $this->find('first', array('contain' => '', 'conditions' => array('Cliente.id' => $this->id)));
        $cliente_facturable = array();
        if ($cliente['Cliente']['modo_facturacion'] == 'albaran') {
            $cliente_facturable = $this->find('first', array(
                'contain' => array(
                    'Albaranescliente' => array(
                        'Centrostrabajo',
                        'Maquina',
                        'conditions' => array(
                            'Albaranescliente.facturable' => 1,
                            'Albaranescliente.facturas_cliente_id' => null,
                            'Albaranescliente.fecha BETWEEN ? AND ?' => array($fecha_inicio, $fecha_fin))),
                    'Albaranesclientesreparacione' => array(
                        'Centrostrabajo',
                        'Maquina',
                        'conditions' => array(
                            'Albaranesclientesreparacione.facturable' => 1,
                            'Albaranesclientesreparacione.facturas_cliente_id' => null,
                            'Albaranesclientesreparacione.estadosalbaranesclientesreparacione_id' => 2,
                            'Albaranesclientesreparacione.fecha BETWEEN ? AND ?' => array($fecha_inicio, $fecha_fin)))
                ),
                'conditions' => array('Cliente.id' => $this->id)
                    ));
        } elseif ($cliente['Cliente']['modo_facturacion'] == 'centrotrabajo') {
            $cliente_facturable = $this->find('first', array(
                'contain' => array(
                    'Centrostrabajo' => array(
                        'Albaranescliente' => array(
                            'Maquina',
                            'conditions' => array(
                                'Albaranescliente.facturable' => 1,
                                'Albaranescliente.facturas_cliente_id' => null,
                                'Albaranescliente.estadosalbaranescliente_id' => 2,
                                'Albaranescliente.fecha BETWEEN ? AND ?' => array($fecha_inicio, $fecha_fin))),
                        'Albaranesclientesreparacione' => array(
                            'Maquina',
                            'conditions' => array(
                                'Albaranesclientesreparacione.facturable' => 1,
                                'Albaranesclientesreparacione.facturas_cliente_id' => null,
                                'Albaranesclientesreparacione.estadosalbaranesclientesreparacione_id' => 2,
                                'Albaranesclientesreparacione.fecha BETWEEN ? AND ?' => array($fecha_inicio, $fecha_fin)))
                    )
                ),
                'conditions' => array('Cliente.id' => $this->id)
                    ));
        } elseif ($cliente['Cliente']['modo_facturacion'] == 'maquina') {
            $cliente_facturable = $this->find('first', array(
                'contain' => array(
                    'Centrostrabajo' => array(
                        'Maquina' => array(
                            'Albaranescliente' => array(
                                'conditions' => array(
                                    'Albaranescliente.facturable' => 1,
                                    'Albaranescliente.facturas_cliente_id' => null,
                                    'Albaranescliente.estadosalbaranescliente_id' => 2,
                                    'Albaranescliente.fecha BETWEEN ? AND ?' => array($fecha_inicio, $fecha_fin))),
                            'Albaranesclientesreparacione' => array(
                                'conditions' => array(
                                    'Albaranesclientesreparacione.facturable' => 1,
                                    'Albaranesclientesreparacione.facturas_cliente_id' => null,
                                    'Albaranesclientesreparacione.estadosalbaranesclientesreparacione_id' => 2,
                                    'Albaranesclientesreparacione.fecha BETWEEN ? AND ?' => array($fecha_inicio, $fecha_fin)))
                        )
                    )
                ),
                'conditions' => array('Cliente.id' => $this->id)
                    ));
        } else { // Por defecto factura por albaran
            $cliente_facturable = $this->find('first', array(
                'contain' => array(
                    'Albaranescliente' => array(
                        'conditions' => array(
                            'Albaranescliente.facturable' => 1,
                            'Albaranescliente.facturas_cliente_id' => null,
                            'Albaranescliente.estadosalbaranescliente_id' => 2,
                            'Albaranescliente.fecha BETWEEN ? AND ?' => array($fecha_inicio, $fecha_fin))),
                    'Albaranesclientesreparacione' => array(
                        'conditions' => array(
                            'Albaranesclientesreparacione.facturable' => 1,
                            'Albaranesclientesreparacione.facturas_cliente_id' => null,
                            'Albaranesclientesreparacione.estadosalbaranesclientesreparacione_id' => 2,
                            'Albaranesclientesreparacione.fecha BETWEEN ? AND ?' => array($fecha_inicio, $fecha_fin)))
                ),
                'conditions' => array('Cliente.id' => $this->id)
                    ));
        }
        return $cliente_facturable;
    }

}

?>
