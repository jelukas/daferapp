<?php

class ArticulosTareasAlbaranesclientesreparacione extends AppModel {

    var $name = 'ArticulosTareasAlbaranesclientesreparacione';
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
        'ArticulosTarea' => array(
            'className' => 'ArticulosTarea',
            'foreignKey' => 'articulos_tarea_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'TareasAlbaranesclientesreparacione' => array(
            'className' => 'TareasAlbaranesclientesreparacione',
            'foreignKey' => 'tareas_albaranesclientesreparacione_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );

    function beforeSave($options) {
        /* Las existencias del Articulo original deben disminuir o aumentar */

        if (!empty($this->data['ArticulosTareasAlbaranesclientesreparacione']['id'])) {
            /* Estamos modificando */
            $articulos_tarea = $this->find('first', array('contain' => '', 'conditions' => array('ArticulosTareasAlbaranesclientesreparacione.id' => $this->data['ArticulosTareasAlbaranesclientesreparacione']['id'])));
            $articulo = $this->Articulo->find('first', array('contain' => '', 'conditions' => array('Articulo.id' => $this->data['ArticulosTareasAlbaranesclientesreparacione']['articulo_id'])));
            $this->Articulo->id = $this->data['ArticulosTareasAlbaranesclientesreparacione']['articulo_id'];
            $cantidad = $articulos_tarea['ArticulosTareasAlbaranesclientesreparacione']['cantidad'] - $this->data['ArticulosTareasAlbaranesclientesreparacione']['cantidad'];
            $this->Articulo->saveField('existencias', $articulo['Articulo']['existencias'] + $cantidad);
        } else {
            /* Estamos creando */
            $articulo = $this->Articulo->find('first', array('contain' => '', 'conditions' => array('Articulo.id' => $this->data['ArticulosTareasAlbaranesclientesreparacione']['articulo_id'])));
            $this->Articulo->id = $this->data['ArticulosTareasAlbaranesclientesreparacione']['articulo_id'];
            $cantidad = $this->data['ArticulosTareasAlbaranesclientesreparacione']['cantidad'] - $articulo['Articulo']['cantidad'];
            $this->Articulo->saveField('existencias', $articulo['Articulo']['existencias'] - $this->data['ArticulosTareasAlbaranesclientesreparacione']['cantidad']);
        }
        return true;
    }

    function beforeDelete() {
        /* Las existencias del Articulo original deben aumentar */
        $articulos_tarea = $this->find('first', array('contain' => '', 'conditions' => array('ArticulosTareasAlbaranesclientesreparacione.id' => $this->id)));
        $articulo = $this->Articulo->find('first', array('contain' => '', 'conditions' => array('Articulo.id' => $articulos_tarea['ArticulosTareasAlbaranesclientesreparacione']['articulo_id'])));
        $this->Articulo->id = $articulos_tarea['ArticulosTareasAlbaranesclientesreparacione']['articulo_id'];
        $cantidad = $articulos_tarea['ArticulosTareasAlbaranesclientesreparacione']['cantidad'] - $articulo['Articulo']['cantidad'];
        $this->Articulo->saveField('existencias', $articulo['Articulo']['existencias'] + $articulos_tarea['ArticulosTareasAlbaranesclientesreparacione']['cantidad']);
        
        $this->TareasAlbaranesclientesreparacione->id = $articulos_tarea['ArticulosTareasAlbaranesclientesreparacione']['tareas_albaranesclientesreparacione_id'];
        $this->TareasAlbaranesclientesreparacione->recalcularTotales();
        return true;
    }

    function afterSave($created) {
        $articulos_tarea = $this->find('first', array('conditions' => array('ArticulosTareasAlbaranesclientesreparacione.id' => $this->id)));
        $this->TareasAlbaranesclientesreparacione->id = $articulos_tarea['ArticulosTareasAlbaranesclientesreparacione']['tareas_albaranesclientesreparacione_id'];
        $this->TareasAlbaranesclientesreparacione->recalcularTotales();
    }

}

?>