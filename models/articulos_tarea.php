<?php

class ArticulosTarea extends AppModel {

    var $name = 'ArticulosTarea';
    var $validate = array(
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
        'Tarea' => array(
            'className' => 'Tarea',
            'foreignKey' => 'tarea_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );

    function beforeSave($options) {
        /* Las existencias del Articulo original deben disminuir o aumentar */

        if (!empty($this->data['ArticulosTarea']['id'])) {
            /* Estamos modificando */
            $articulos_tarea = $this->find('first', array('contain' => '', 'conditions' => array('ArticulosTarea.id' => $this->data['ArticulosTarea']['id'])));
            $articulo = $this->Articulo->find('first', array('contain' => '', 'conditions' => array('Articulo.id' => $this->data['ArticulosTarea']['articulo_id'])));
            $this->Articulo->id = $this->data['ArticulosTarea']['articulo_id'];
            $cantidad = $articulos_tarea['ArticulosTarea']['cantidad'] - $this->data['ArticulosTarea']['cantidad'];
            $this->Articulo->saveField('existencias', $articulo['Articulo']['existencias'] + $cantidad);
        } else {
            /* Estmaos creando */
            $articulo = $this->Articulo->find('first', array('contain' => '', 'conditions' => array('Articulo.id' => $this->data['ArticulosTarea']['articulo_id'])));
            $this->Articulo->id = $this->data['ArticulosTarea']['articulo_id'];
            $this->Articulo->saveField('existencias', $articulo['Articulo']['existencias'] - $this->data['ArticulosTarea']['cantidad']);
        }
        return true;
    }

    function beforeDelete() {
        /* Las existencias del Articulo original deben aumentar */
        $articulos_tarea = $this->find('first', array('contain' => '', 'conditions' => array('ArticulosTarea.id' => $this->id)));
        $articulo = $this->Articulo->find('first', array('contain' => '', 'conditions' => array('Articulo.id' => $articulos_tarea['ArticulosTarea']['articulo_id'])));
        $this->Articulo->id = $articulos_tarea['ArticulosTarea']['articulo_id'];
        $cantidad = $articulos_tarea['ArticulosTarea']['cantidad'] - $articulo['Articulo']['cantidad'];
        $this->Articulo->saveField('existencias', $articulo['Articulo']['existencias'] + $articulos_tarea['ArticulosTarea']['cantidad']);
        
        $this->Tarea->id = $articulos_tarea['ArticulosTarea']['tarea_id'];
        $this->Tarea->recalcularTotales();
        return true;
    }

    function afterSave($created) {
        $articulos_tarea = $this->find('first', array('conditions' => array('ArticulosTarea.id' => $this->id)));
        $this->Tarea->id = $articulos_tarea['ArticulosTarea']['tarea_id'];
        $this->Tarea->recalcularTotales();
    }

}

?>