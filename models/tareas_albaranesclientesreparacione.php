<?php

class TareasAlbaranesclientesreparacione extends AppModel {

    var $name = 'TareasAlbaranesclientesreparacione';
    var $validate = array(
        'albaranesclientesreparacione_id' => array(
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
        'Albaranesclientesreparacione' => array(
            'className' => 'Albaranesclientesreparacione',
            'foreignKey' => 'albaranesclientesreparacione_id',
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
    var $hasMany = array(
        'TareasAlbaranesclientesreparacionesParte' => array(
            'className' => 'TareasAlbaranesclientesreparacionesParte',
            'foreignKey' => 'tareas_albaranesclientesreparacione_id',
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
        'ArticulosTareasAlbaranesclientesreparacione' => array(
            'className' => 'ArticulosTareasAlbaranesclientesreparacione',
            'foreignKey' => 'tareas_albaranesclientesreparacione_id',
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
        'TareasAlbaranesclientesreparacionesPartestallere' => array(
            'className' => 'TareasAlbaranesclientesreparacionesPartestallere',
            'foreignKey' => 'tareas_albaranesclientesreparacione_id',
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

    function crear_desde_tarea_de_orden($tarea_id, $albaranesclientesreparacione_id) {
        $tarea = $this->Albaranesclientesreparacione->Ordene->Tarea->find('first', array('contain' => array('Parte', 'Partestallere', 'ArticulosTarea'), 'conditions' => array('Tarea.id' => $tarea_id)));
        $tarea_albaranesclientesreparacione['TareasAlbaranesclientesreparacione'] = $tarea['Tarea'];
        $tarea_albaranesclientesreparacione['TareasAlbaranesclientesreparacione']['albaranesclientesreparacione_id'] = $albaranesclientesreparacione_id;
        $tarea_albaranesclientesreparacione['TareasAlbaranesclientesreparacione']['tarea_id'] = $tarea['Tarea']['id'];
        unset($tarea_albaranesclientesreparacione['TareasAlbaranesclientesreparacione']['id']);
        unset($tarea_albaranesclientesreparacione['TareasAlbaranesclientesreparacione']['ordene_id']);
        $this->create();
        $this->save($tarea_albaranesclientesreparacione);
        /* Conversión de Parte a TareasAlbaranesclientesreparacionesParte */
        foreach ($tarea['Parte'] as $parte) {
            $tareareparacion_parte = array();
            $tareareparacion_parte['TareasAlbaranesclientesreparacionesParte'] = $parte;
            unset($tareareparacion_parte['TareasAlbaranesclientesreparacionesParte']['id']);
            unset($tareareparacion_parte['TareasAlbaranesclientesreparacionesParte']['tarea_id']);
            $tareareparacion_parte['TareasAlbaranesclientesreparacionesParte']['parte_id'] = $parte['id'];
            $tareareparacion_parte['TareasAlbaranesclientesreparacionesParte']['tareas_albaranesclientesreparacione_id'] = $this->id;
            $this->TareasAlbaranesclientesreparacionesParte->create();
            $this->TareasAlbaranesclientesreparacionesParte->save($tareareparacion_parte);
        }
        /* Conversión de Partestallere a TareasAlbaranesclientesreparacionesPartestallere */
        foreach ($tarea['Partestallere'] as $partestallere) {
            $tareareparacion_partestallere = array();
            $tareareparacion_partestallere['TareasAlbaranesclientesreparacionesPartestallere'] = $partestallere;
            unset($tareareparacion_partestallere['TareasAlbaranesclientesreparacionesPartestallere']['id']);
            unset($tareareparacion_partestallere['TareasAlbaranesclientesreparacionesPartestallere']['tarea_id']);
            $tareareparacion_partestallere['TareasAlbaranesclientesreparacionesPartestallere']['tareas_albaranesclientesreparacione_id'] = $this->id;
            $tareareparacion_partestallere['TareasAlbaranesclientesreparacionesPartestallere']['partestallere_id'] = $partestallere['id'];
            $this->TareasAlbaranesclientesreparacionesPartestallere->create();
            $this->TareasAlbaranesclientesreparacionesPartestallere->save($tareareparacion_partestallere);
        }
        /* Conversión de ArticulosTarea a ArticulosTareasAlbaranesclientesreparacione */
        $tareareparacion_articulo = array();
        foreach ($tarea['ArticulosTarea'] as $articulos_tarea) {
            $tareareparacion_articulo['ArticulosTareasAlbaranesclientesreparacione'] = $articulos_tarea;
            unset($tareareparacion_articulo['ArticulosTareasAlbaranesclientesreparacione']['id']);
            unset($tareareparacion_articulo['ArticulosTareasAlbaranesclientesreparacione']['tarea_id']);
            $tareareparacion_articulo['ArticulosTareasAlbaranesclientesreparacione']['tareas_albaranesclientesreparacione_id'] = $this->id;
            $tareareparacion_articulo['ArticulosTareasAlbaranesclientesreparacione']['articulos_tarea_id'] = $articulos_tarea['id'];
            $this->ArticulosTareasAlbaranesclientesreparacione->create();
            $this->ArticulosTareasAlbaranesclientesreparacione->save($tareareparacion_articulo);
        }
    }

    public function recalcularTotales($deleted_id = null) {
        $config = ClassRegistry::init("Config")->findById(1);
        $tarea = $this->find('first', array('contain' => array('ArticulosTareasAlbaranesclientesreparacione' => 'Articulo', 'TareasAlbaranesclientesreparacionesParte', 'TareasAlbaranesclientesreparacionesPartestallere', 'Albaranesclientesreparacione' => array('Ordene' => array('Avisostallere' => 'Centrostrabajo'))), 'conditions' => array('TareasAlbaranesclientesreparacione.id' => $this->id)));
        $tarea['TareasAlbaranesclientesreparacione']['totaldesplazamientoreal'] = 0;
        $tarea['TareasAlbaranesclientesreparacione']['totaldesplazamientoimputado'] = 0;
        $tarea['TareasAlbaranesclientesreparacione']['totalkilometrajereal'] = 0;
        $tarea['TareasAlbaranesclientesreparacione']['totalkilometrajeimputable'] = 0;
        $tarea['TareasAlbaranesclientesreparacione']['totalpreciodesplazamiento'] = 0;
        $tarea['TareasAlbaranesclientesreparacione']['total_horastrabajoprecio_real'] = 0;
        $tarea['TareasAlbaranesclientesreparacione']['total_horastrabajoprecio_imputable'] = 0;
        $tarea['TareasAlbaranesclientesreparacione']['totaldietasreales'] = 0;
        $tarea['TareasAlbaranesclientesreparacione']['totaldietasimputables'] = 0;
        $tarea['TareasAlbaranesclientesreparacione']['totalotroserviciosreales'] = 0;
        $tarea['TareasAlbaranesclientesreparacione']['totalotroserviciosimputables'] = 0;
        $tarea['TareasAlbaranesclientesreparacione']['total_materiales_imputables'] = 0;
        $tarea['TareasAlbaranesclientesreparacione']['total_materiales_costo'] = 0;
        /*
         * La Tarea es de Centro de trabajo
         */
        if ($tarea['TareasAlbaranesclientesreparacione']['tipo'] == 'centro') {
            foreach ($tarea['TareasAlbaranesclientesreparacionesParte'] as $partecentro) {
                if ($partecentro['id'] != $deleted_id) {
                    $tarea['TareasAlbaranesclientesreparacione']['totaldesplazamientoreal'] += ($partecentro['horasdesplazamientoreales_ida'] * $config['Config']['costohoradesplazamiento']) + ($partecentro['horasdesplazamientoreales_vuelta'] * $config['Config']['costohoradesplazamiento']);
                    $tarea['TareasAlbaranesclientesreparacione']['totaldesplazamientoimputado'] += ($partecentro['horasdesplazamientoimputables_ida'] * $tarea['Albaranesclientesreparacione']['Ordene']['Avisostallere']['Centrostrabajo']['preciohoradesplazamiento']) + ($partecentro['horasdesplazamientoimputables_vuelta'] * $tarea['Albaranesclientesreparacione']['Ordene']['Avisostallere']['Centrostrabajo']['preciohoradesplazamiento']);
                    $tarea['TareasAlbaranesclientesreparacione']['totalkilometrajereal'] += ($partecentro['kilometrajereal_ida'] * $config['Config']['costokmdesplazamiento']) + ($partecentro['kilometrajereal_vuelta'] * $config['Config']['costokmdesplazamiento']);
                    $tarea['TareasAlbaranesclientesreparacione']['totalkilometrajeimputable'] += ($partecentro['kilometrajeimputable_ida'] + $partecentro['kilometrajeimputable_vuelta'] ) * $tarea['Albaranesclientesreparacione']['Ordene']['Avisostallere']['Centrostrabajo']['preciokm'];
                    $tarea['TareasAlbaranesclientesreparacione']['totalpreciodesplazamiento'] += $partecentro['preciodesplazamiento'];
                    $tarea['TareasAlbaranesclientesreparacione']['total_horastrabajoprecio_real'] += $partecentro['horasreales'] * $config['Config']['costo_hora_en_centrotrabajo'];
                    $tarea['TareasAlbaranesclientesreparacione']['total_horastrabajoprecio_imputable'] += $partecentro['horasimputables'] * $tarea['Albaranesclientesreparacione']['Ordene']['Avisostallere']['Centrostrabajo']['preciohoraencentro'];
                    $tarea['TareasAlbaranesclientesreparacione']['totaldietasreales'] += $partecentro['dietasreales'];
                    $tarea['TareasAlbaranesclientesreparacione']['totaldietasimputables'] += $partecentro['dietasimputables'];
                    $tarea['TareasAlbaranesclientesreparacione']['totalotroserviciosreales'] += $partecentro['otrosservicios_real'];
                    $tarea['TareasAlbaranesclientesreparacione']['totalotroserviciosimputables'] += $partecentro['otrosservicios_imputable'];
                }
            }
            $tarea['TareasAlbaranesclientesreparacione']['total_partes_real'] = $tarea['TareasAlbaranesclientesreparacione']['totaldesplazamientoreal'] + $tarea['TareasAlbaranesclientesreparacione']['totalkilometrajereal'] + $tarea['TareasAlbaranesclientesreparacione']['total_horastrabajoprecio_real'] + $tarea['TareasAlbaranesclientesreparacione']['totaldietasreales'] + $tarea['TareasAlbaranesclientesreparacione']['totalotroserviciosreales'];

            if ($tarea['Albaranesclientesreparacione']['Ordene']['Avisostallere']['Centrostrabajo']['modofacturacion'] == 'preciofijio')
                $tarea['TareasAlbaranesclientesreparacione']['total_partes_imputable'] = $tarea['TareasAlbaranesclientesreparacione']['totalpreciodesplazamiento'] + $tarea['TareasAlbaranesclientesreparacione']['total_horastrabajoprecio_imputable'] + $tarea['TareasAlbaranesclientesreparacione']['totaldietasimputables'] + $tarea['TareasAlbaranesclientesreparacione']['totalotroserviciosimputables'];
            else
                $tarea['TareasAlbaranesclientesreparacione']['total_partes_imputable'] = $tarea['TareasAlbaranesclientesreparacione']['totaldesplazamientoimputado'] + $tarea['TareasAlbaranesclientesreparacione']['totalkilometrajeimputable'] + $tarea['TareasAlbaranesclientesreparacione']['total_horastrabajoprecio_imputable'] + $tarea['TareasAlbaranesclientesreparacione']['totaldietasimputables'] + $tarea['TareasAlbaranesclientesreparacione']['totalotroserviciosimputables'];
        } else { //  La Tarea es de Taller
            foreach ($tarea['TareasAlbaranesclientesreparacionesPartestallere'] as $partetaller) {
                if ($partetaller['id'] != $deleted_id) {
                    $tarea['TareasAlbaranesclientesreparacione']['total_horastrabajoprecio_real'] += $partetaller['horasreales'] * $config['Config']['costo_hora_en_taller'];
                    $tarea['TareasAlbaranesclientesreparacione']['total_horastrabajoprecio_imputable'] += $partetaller['horasimputables'] * $tarea['Albaranesclientesreparacione']['Ordene']['Avisostallere']['Centrostrabajo']['preciohoraentraller'];
                    $tarea['TareasAlbaranesclientesreparacione']['totalotroserviciosreales'] += $partetaller['otrosservicios_real'];
                    $tarea['TareasAlbaranesclientesreparacione']['totalotroserviciosimputables'] += $partetaller['otrosservicios_imputable'];
                }
            }
            $tarea['TareasAlbaranesclientesreparacione']['total_partes_real'] = $tarea['TareasAlbaranesclientesreparacione']['total_horastrabajoprecio_real'] + $tarea['TareasAlbaranesclientesreparacione']['totaldietasreales'] + $tarea['TareasAlbaranesclientesreparacione']['totalotroserviciosreales'];
            $tarea['TareasAlbaranesclientesreparacione']['total_partes_imputable'] = $tarea['TareasAlbaranesclientesreparacione']['total_horastrabajoprecio_imputable'] + $tarea['TareasAlbaranesclientesreparacione']['totaldietasimputables'] + $tarea['TareasAlbaranesclientesreparacione']['totalotroserviciosimputables'];
        }
        /*
         * Recalculamos los totales de Articulos 
         */
        if (!empty($tarea['ArticulosTareasAlbaranesclientesreparacione'])) {
            foreach ($tarea['ArticulosTareasAlbaranesclientesreparacione'] as $articulos_tarea) {
                $tarea['TareasAlbaranesclientesreparacione']['total_materiales_imputables'] += ($articulos_tarea['cantidad'] * $articulos_tarea['Articulo']['precio_sin_iva']) - (($articulos_tarea['cantidad'] * $articulos_tarea['Articulo']['precio_sin_iva']) * ($articulos_tarea['descuento'] / 100));
                $tarea['TareasAlbaranesclientesreparacione']['total_materiales_costo'] += $articulos_tarea['cantidadreal'] * $articulos_tarea['Articulo']['ultimopreciocompra'];
            }
        }
        /* Reformateo Antes de Guardar */
        $tarea['TareasAlbaranesclientesreparacione']['totaldesplazamientoreal'] = number_format($tarea['TareasAlbaranesclientesreparacione']['totaldesplazamientoreal'], 5, '.', '');
        $tarea['TareasAlbaranesclientesreparacione']['totaldesplazamientoimputado'] = number_format($tarea['TareasAlbaranesclientesreparacione']['totaldesplazamientoimputado'], 5, '.', '');
        $tarea['TareasAlbaranesclientesreparacione']['totalkilometrajereal'] = number_format($tarea['TareasAlbaranesclientesreparacione']['totalkilometrajereal'], 5, '.', '');
        $tarea['TareasAlbaranesclientesreparacione']['totalkilometrajeimputable'] = number_format($tarea['TareasAlbaranesclientesreparacione']['totalkilometrajeimputable'], 5, '.', '');
        $tarea['TareasAlbaranesclientesreparacione']['totalpreciodesplazamiento'] = number_format($tarea['TareasAlbaranesclientesreparacione']['totalpreciodesplazamiento'], 5, '.', '');
        $tarea['TareasAlbaranesclientesreparacione']['total_horastrabajoprecio_real'] = number_format($tarea['TareasAlbaranesclientesreparacione']['total_horastrabajoprecio_real'], 5, '.', '');
        $tarea['TareasAlbaranesclientesreparacione']['total_horastrabajoprecio_imputable'] = number_format($tarea['TareasAlbaranesclientesreparacione']['total_horastrabajoprecio_imputable'], 5, '.', '');
        $tarea['TareasAlbaranesclientesreparacione']['totaldietasreales'] = number_format($tarea['TareasAlbaranesclientesreparacione']['totaldietasreales'], 5, '.', '');
        $tarea['TareasAlbaranesclientesreparacione']['totaldietasimputables'] = number_format($tarea['TareasAlbaranesclientesreparacione']['totaldietasimputables'], 5, '.', '');
        $tarea['TareasAlbaranesclientesreparacione']['totalotroserviciosreales'] = number_format($tarea['TareasAlbaranesclientesreparacione']['totalotroserviciosreales'], 5, '.', '');
        $tarea['TareasAlbaranesclientesreparacione']['totalotroserviciosimputables'] = number_format($tarea['TareasAlbaranesclientesreparacione']['totalotroserviciosimputables'], 5, '.', '');
        $tarea['TareasAlbaranesclientesreparacione']['total_materiales_imputables'] = number_format($tarea['TareasAlbaranesclientesreparacione']['total_materiales_imputables'], 5, '.', '');
        $tarea['TareasAlbaranesclientesreparacione']['total_materiales_costo'] = number_format($tarea['TareasAlbaranesclientesreparacione']['total_materiales_costo'], 5, '.', '');
        $tarea['TareasAlbaranesclientesreparacione']['total_partes_real'] = number_format($tarea['TareasAlbaranesclientesreparacione']['total_partes_real'], 5, '.', '');
        $tarea['TareasAlbaranesclientesreparacione']['total_partes_imputable'] = number_format($tarea['TareasAlbaranesclientesreparacione']['total_partes_imputable'], 5, '.', '');
        $this->save($tarea['TareasAlbaranesclientesreparacione']);
    }

}

?>