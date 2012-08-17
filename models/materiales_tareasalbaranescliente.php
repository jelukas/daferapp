<?php

class MaterialesTareasalbaranescliente extends AppModel {

    var $name = 'MaterialesTareasalbaranescliente';
    var $displayField = 'id';
    //The Associations below have been created with all possible keys, those that are not needed can be removed

    var $belongsTo = array(
        'Tareasalbaranescliente' => array(
            'className' => 'Tareasalbaranescliente',
            'foreignKey' => 'tareasalbaranescliente_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Articulo' => array(
            'className' => 'Articulo',
            'foreignKey' => 'articulo_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );

    function afterSave($created) {
        $materiale = $this->findById($this->id);
        $tarea = $this->Tareasalbaranescliente->find('first', array('contain' => 'MaterialesTareasalbaranescliente', 'conditions' => array('Tareasalbaranescliente.id' => $materiale['MaterialesTareasalbaranescliente']['tareasalbaranescliente_id'])));
        $materiales_total = 0;
        foreach ($tarea['MaterialesTareasalbaranescliente'] as $material) {
            $materiales_total += $material['importe'];
        }
        $tarea['Tareasalbaranescliente']['materiales'] = redondear_dos_decimal($materiales_total);
        $this->Tareasalbaranescliente->save($tarea);
    }

    function beforeDelete() {
        /* Las existencias del Articulo original deben aumentar */
        $articulos_tarea = $this->find('first', array('contain' => '', 'conditions' => array('MaterialesTareasalbaranescliente.id' => $this->id)));
        $articulo = $this->Articulo->find('first', array('contain' => '', 'conditions' => array('Articulo.id' => $articulos_tarea['MaterialesTareasalbaranescliente']['articulo_id'])));
        $this->Articulo->id = $articulos_tarea['MaterialesTareasalbaranescliente']['articulo_id'];
        $this->Articulo->saveField('existencias', $articulo['Articulo']['existencias'] + $articulos_tarea['MaterialesTareasalbaranescliente']['cantidad']);
        $materiale = $this->findById($this->id);
        $tarea = $this->Tareasalbaranescliente->find('first', array('contain' => 'MaterialesTareasalbaranescliente', 'conditions' => array('Tareasalbaranescliente.id' => $materiale['MaterialesTareasalbaranescliente']['tareasalbaranescliente_id'])));
        $tarea['Tareasalbaranescliente']['materiales'] = redondear_dos_decimal($tarea['Tareasalbaranescliente']['materiales'] - $materiale['MaterialesTareasalbaranescliente']['importe']);
        $this->Tareasalbaranescliente->save($tarea);
        return true;
    }

    function beforeSave($options) {
        /* Las existencias del Articulo original deben disminuir o aumentar */
        if (!empty($this->data['MaterialesTareasalbaranescliente']['id'])) {
            /* Estamos modificando */
            $articulos_tarea = $this->find('first', array('contain' => '', 'conditions' => array('MaterialesTareasalbaranescliente.id' => $this->data['MaterialesTareasalbaranescliente']['id'])));
            $articulo = $this->Articulo->find('first', array('contain' => '', 'conditions' => array('Articulo.id' => $this->data['MaterialesTareasalbaranescliente']['articulo_id'])));
            $this->Articulo->id = $this->data['MaterialesTareasalbaranescliente']['articulo_id'];
            $cantidad = $articulos_tarea['MaterialesTareasalbaranescliente']['cantidad'] - $this->data['MaterialesTareasalbaranescliente']['cantidad'];
            $existencias = $articulo['Articulo']['existencias'] + $cantidad;
            if ($existencias <= 0) {
                $this->session_message = 'No hay existencias suficientes del Artículo';
                $guardar = False;
            } else {
                $this->Articulo->saveField('existencias', $existencias);
                $guardar = True;
            }
        } else {
            /* Estamos creando */
            $articulo = $this->Articulo->find('first', array('contain' => '', 'conditions' => array('Articulo.id' => $this->data['MaterialesTareasalbaranescliente']['articulo_id'])));
            $this->Articulo->id = $this->data['MaterialesTareasalbaranescliente']['articulo_id'];
            $existencias = $articulo['Articulo']['existencias'] - $this->data['MaterialesTareasalbaranescliente']['cantidad'];
            if ($existencias <= 0) {
                $this->session_message = 'No hay existencias suficientes del Artículo';
                $guardar = False;
            } else {
                $this->Articulo->saveField('existencias', $existencias);
                $guardar = True;
            }
        }
        return $guardar;
    }

}

?>