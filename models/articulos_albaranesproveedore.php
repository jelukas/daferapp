<?php

class ArticulosAlbaranesproveedore extends AppModel {

    var $name = 'ArticulosAlbaranesproveedore';
    var $displayField = 'id';
    var $validate = array(
        'articulo_id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'albaranesproveedore_id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'cantidad' => array(
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
        'Articulo' => array(
            'className' => 'Articulo',
            'foreignKey' => 'articulo_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Albaranesproveedore' => array(
            'className' => 'Albaranesproveedore',
            'foreignKey' => 'albaranesproveedore_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );

    function beforeSave($options) {
        if (!empty($this->data['ArticulosAlbaranesproveedore']['id'])) {
            /* Estamos modificando */
            /* Las existencias del Articulo original deben disminuir o aumentar */
            $articulos_albaranesproveedore = $this->find('first', array('contain' => '', 'conditions' => array('ArticulosAlbaranesproveedore.id' => $this->data['ArticulosAlbaranesproveedore']['id'])));
            $articulo = $this->Articulo->find('first', array('contain' => '', 'conditions' => array('Articulo.id' => $this->data['ArticulosAlbaranesproveedore']['articulo_id'])));
            $this->Articulo->id = $this->data['ArticulosAlbaranesproveedore']['articulo_id'];
            $cantidad = $this->data['ArticulosAlbaranesproveedore']['cantidad'] - $articulos_albaranesproveedore['ArticulosAlbaranesproveedore']['cantidad'];
            $this->Articulo->saveField('existencias', $articulo['Articulo']['existencias'] + $cantidad);
            $albaranesproveedore = $this->Albaranesproveedore->find('first', array('contain' => '', 'conditions' => array('Albaranesproveedore.id' => $articulos_albaranesproveedore['ArticulosAlbaranesproveedore']['albaranesproveedore_id'])));
            $this->Albaranesproveedore->id = $articulos_albaranesproveedore['ArticulosAlbaranesproveedore']['albaranesproveedore_id'];
            $this->Albaranesproveedore->saveField('baseimponible', $albaranesproveedore['Albaranesproveedore']['baseimponible'] - $articulos_albaranesproveedore['ArticulosAlbaranesproveedore']['total'] + $this->data['ArticulosAlbaranesproveedore']['total']);
        } else {
            /* Estmaos creando */
            /* Las existencias del Articulo original deben aumentar */
            $articulo = $this->Articulo->find('first', array('contain' => '', 'conditions' => array('Articulo.id' => $this->data['ArticulosAlbaranesproveedore']['articulo_id'])));
            $this->Articulo->id = $this->data['ArticulosAlbaranesproveedore']['articulo_id'];
            $this->Articulo->saveField('existencias', $articulo['Articulo']['existencias'] + $this->data['ArticulosAlbaranesproveedore']['cantidad']);
            $albaranesproveedore = $this->Albaranesproveedore->find('first', array('contain' => '', 'conditions' => array('Albaranesproveedore.id' => $this->data['ArticulosAlbaranesproveedore']['albaranesproveedore_id'])));
            $this->Albaranesproveedore->id = $this->data['ArticulosAlbaranesproveedore']['albaranesproveedore_id'];
            $this->Albaranesproveedore->saveField('baseimponible', $albaranesproveedore['Albaranesproveedore']['baseimponible'] + $this->data['ArticulosAlbaranesproveedore']['total']);
        }
        $this->Articulo->id = $this->data['ArticulosAlbaranesproveedore']['articulo_id'];
        $this->Articulo->saveField('ultimopreciocompra', $this->data['ArticulosAlbaranesproveedore']['precio_proveedor']);
        return true;
    }

    function beforeDelete() {
        /* Las existencias del Articulo original deben aumentar */
        $articulos_albaranesproveedore = $this->find('first', array('contain' => '', 'conditions' => array('ArticulosAlbaranesproveedore.id' => $this->id)));
        $articulo = $this->Articulo->find('first', array('contain' => '', 'conditions' => array('Articulo.id' => $articulos_albaranesproveedore['ArticulosAlbaranesproveedore']['articulo_id'])));
        $this->Articulo->id = $articulos_albaranesproveedore['ArticulosAlbaranesproveedore']['articulo_id'];
        $this->Articulo->saveField('existencias', $articulo['Articulo']['existencias'] - $articulos_albaranesproveedore['ArticulosAlbaranesproveedore']['cantidad']);
        $albaranesproveedore = $this->Albaranesproveedore->find('first', array('contain' => '', 'conditions' => array('Albaranesproveedore.id' => $articulos_albaranesproveedore['ArticulosAlbaranesproveedore']['albaranesproveedore_id'])));
        $this->Albaranesproveedore->id = $articulos_albaranesproveedore['ArticulosAlbaranesproveedore']['albaranesproveedore_id'];
        $this->Albaranesproveedore->saveField('baseimponible', $albaranesproveedore['Albaranesproveedore']['baseimponible'] - $articulos_albaranesproveedore['ArticulosAlbaranesproveedore']['total']);
        return true;
    }

}

?>