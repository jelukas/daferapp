<?php

class Tarea extends AppModel {

    var $name = 'Tarea';
    var $validate = array(
        'ordene_id' => array(
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
        'Ordene' => array(
            'className' => 'Ordene',
            'foreignKey' => 'ordene_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );
    var $hasMany = array(
        'Parte' => array(
            'className' => 'Parte',
            'foreignKey' => 'tarea_id',
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
        'ArticulosTarea' => array(
            'className' => 'ArticulosTarea',
            'foreignKey' => 'tarea_id',
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
        'Partestallere' => array(
            'className' => 'Partestallere',
            'foreignKey' => 'tarea_id',
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

    public function recalcularTotales($deleted_id = null) {
        /*
         * 	totaldesplazamientoreal
         * 	totaldesplazamientoimputado
         * 	totalkilometrajereal
         * 	totalkilometrajeimputable
         * 	totalpreciodesplazamiento
         * 	totalhorasreales
         * 	totalhorasimputables
         * 	totaldietasreales
         * 	totaldietasimputables
         */
        $tarea = $this->find('first', array('contain' => array('Parte', 'Partestallere', 'Ordene' => array('Avisostallere' => 'Centrostrabajo')), 'conditions' => array('Tarea.id' => $this->id)));
        $tarea['Tarea']['totaldesplazamientoreal'] = 0;
        $tarea['Tarea']['totaldesplazamientoimputado'] = 0;
        $tarea['Tarea']['totalkilometrajereal'] = 0;
        $tarea['Tarea']['totalkilometrajeimputable'] = 0;
        $tarea['Tarea']['totalpreciodesplazamiento'] = 0;
        $tarea['Tarea']['totalhorasreales'] = 0;
        $tarea['Tarea']['totalhorasimputables'] = 0;
        $tarea['Tarea']['totaldietasreales'] = 0;
        $tarea['Tarea']['totaldietasimputables'] = 0;
        /*
         * La Tarea es de Centro de trabajo
         */
        if ($tarea['Tarea']['tipo'] == 'centro') {
            foreach ($tarea['Parte'] as $partecentro) {
                if ($partecentro['id'] != $deleted_id) {
                    $tarea['Tarea']['totaldesplazamientoreal'] += $partecentro['horasdesplazamientoreales'] * $tarea['Ordene']['Avisostallere']['Centrostrabajo']['preciohoradesplazamiento'];
                    $tarea['Tarea']['totaldesplazamientoimputado'] += $partecentro['horasdesplazamientoimputables'] * $tarea['Ordene']['Avisostallere']['Centrostrabajo']['preciohoradesplazamiento'];
                    $tarea['Tarea']['totalkilometrajereal'] += $partecentro['kilometrajereal'] * $tarea['Ordene']['Avisostallere']['Centrostrabajo']['preciokm'];
                    $tarea['Tarea']['totalkilometrajeimputable'] += $partecentro['kilometrajeimputable'] * $tarea['Ordene']['Avisostallere']['Centrostrabajo']['preciokm'];
                    $tarea['Tarea']['totalpreciodesplazamiento'] += $partecentro['preciodesplazamiento'];
                    $tarea['Tarea']['totalhorasreales'] += $partecentro['horafinal'] * $tarea['Ordene']['Avisostallere']['Centrostrabajo']['preciohoraencentro'];
                    $tarea['Tarea']['totalhorasimputables'] += $partecentro['horasimputables'] * $tarea['Ordene']['Avisostallere']['Centrostrabajo']['preciohoraencentro'];
                    $tarea['Tarea']['totaldietasreales'] += $partecentro['dietasreales'];
                    $tarea['Tarea']['totaldietasimputables'] += $partecentro['dietasimputables'];
                }
            }
        } else {
            foreach ($tarea['Partestallere'] as $partetaller) {
                if ($partetaller['id'] != $deleted_id) {
                    $tarea['Tarea']['totalhorasreales'] += $partetaller['horasimputables'] * $tarea['Ordene']['Avisostallere']['Centrostrabajo']['preciohoraentraller'];
                    $tarea['Tarea']['totalhorasimputables'] += $partetaller['horasreales'] * $tarea['Ordene']['Avisostallere']['Centrostrabajo']['preciohoraentraller'];
                }
            }
        }
        /* Reformateo Antes de Guardar */
        $tarea['Tarea']['totaldesplazamientoreal'] = number_format($tarea['Tarea']['totaldesplazamientoreal'], 5, '.', '');
        $tarea['Tarea']['totaldesplazamientoimputado'] = number_format($tarea['Tarea']['totaldesplazamientoimputado'], 5, '.', '');
        $tarea['Tarea']['totalkilometrajereal'] = number_format($tarea['Tarea']['totalkilometrajereal'], 5, '.', '');
        $tarea['Tarea']['totalkilometrajeimputable'] = number_format($tarea['Tarea']['totalkilometrajeimputable'], 5, '.', '');
        $tarea['Tarea']['totalpreciodesplazamiento'] = number_format($tarea['Tarea']['totalpreciodesplazamiento'], 5, '.', '');
        $tarea['Tarea']['totalhorasreales'] = number_format($tarea['Tarea']['totalhorasreales'], 5, '.', '');
        $tarea['Tarea']['totalhorasimputables'] = number_format($tarea['Tarea']['totalhorasimputables'], 5, '.', '');
        $tarea['Tarea']['totaldietasreales'] = number_format($tarea['Tarea']['totaldietasreales'], 5, '.', '');
        $tarea['Tarea']['totaldietasimputables'] = number_format($tarea['Tarea']['totaldietasimputables'], 5, '.', '');

        $this->save($tarea['Tarea']);
    }

}

?>