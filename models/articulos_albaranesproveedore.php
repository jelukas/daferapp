<?php

class ArticulosAlbaranesproveedore extends AppModel {

    var $name = 'ArticulosAlbaranesproveedore';
    var $displayField = 'id';
    var $articulo_id = 0;
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
        ),
        'Tarea' => array(
            'className' => 'Tarea',
            'foreignKey' => 'tarea_id',
        ),
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
        $this->articulo_id = $this->data['ArticulosAlbaranesproveedore']['articulo_id'];
        $this->Articulo->saveField('ultimopreciocompra', $this->data['ArticulosAlbaranesproveedore']['precio_proveedor']);
        return true;
    }

    /*
     * Antes de Eliminar
     */

    function beforeDelete() {
        /* Las existencias del Articulo original deben aumentar */
        $articulos_albaranesproveedore = $this->find('first', array('contain' => '', 'conditions' => array('ArticulosAlbaranesproveedore.id' => $this->id)));
        $articulo = $this->Articulo->find('first', array('contain' => '', 'conditions' => array('Articulo.id' => $articulos_albaranesproveedore['ArticulosAlbaranesproveedore']['articulo_id'])));
        $this->Articulo->id = $articulos_albaranesproveedore['ArticulosAlbaranesproveedore']['articulo_id'];
        $this->Articulo->saveField('existencias', $articulo['Articulo']['existencias'] - $articulos_albaranesproveedore['ArticulosAlbaranesproveedore']['cantidad']);
        $albaranesproveedore = $this->Albaranesproveedore->find('first', array('contain' => '', 'conditions' => array('Albaranesproveedore.id' => $articulos_albaranesproveedore['ArticulosAlbaranesproveedore']['albaranesproveedore_id'])));
        $this->Albaranesproveedore->id = $articulos_albaranesproveedore['ArticulosAlbaranesproveedore']['albaranesproveedore_id'];
        $this->Albaranesproveedore->saveField('baseimponible', $albaranesproveedore['Albaranesproveedore']['baseimponible'] - $articulos_albaranesproveedore['ArticulosAlbaranesproveedore']['total']);
        $this->articulo_id = $articulos_albaranesproveedore['ArticulosAlbaranesproveedore']['articulo_id'];
        return true;
    }

    /*
     * Esto se hará: Despues de uno nuevo , despues de editar y despues de borrar
     */

    function recalcular_valoracion($articulo_id) {
        
        $articulos_albaranesproveedores = $this->find('all', array('contain'=>array(),'conditions' => array('ArticulosAlbaranesproveedore.articulo_id' => $articulo_id)));
        $nueva_valoracion = 0;
        $cantidad_por_precio = 0;
        $cantidad_total = 0;

        foreach ($articulos_albaranesproveedores as $articulos_albaranesproveedore) {
            $cantidad_por_precio += $articulos_albaranesproveedore['ArticulosAlbaranesproveedore']['cantidad'] * $articulos_albaranesproveedore['ArticulosAlbaranesproveedore']['precio_proveedor'];
            $cantidad_total += $articulos_albaranesproveedore['ArticulosAlbaranesproveedore']['cantidad'];
        }
        $nueva_valoracion = $cantidad_por_precio / $cantidad_total;
        $this->Articulo->id = $articulo_id;
        $this->Articulo->saveField('valoracion',number_format($nueva_valoracion, 5, '.', ''));
    }

    /*
     * Despues de Guardar
     */

    function afterSave($created) {
        $articulo_id = $this->articulo_id;
        $this->recalcular_valoracion($articulo_id);
    }

    /*
     * Despues de borrar
     */

    function afterDelete() {
        $articulo_id = $this->articulo_id;
        $this->recalcular_valoracion($articulo_id);
    }

}

?>