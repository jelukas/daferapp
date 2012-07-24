<?php

class Tarea extends AppModel {

    var $name = 'Tarea';
    var $validate = array(
        'ordene_id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
            ),
        ),
    );

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
        $config = ClassRegistry::init("Config")->findById(1);
        $tarea = $this->find('first', array('contain' => array('ArticulosTarea' => 'Articulo', 'Parte', 'Partestallere', 'Ordene' => array('Avisostallere' => 'Centrostrabajo')), 'conditions' => array('Tarea.id' => $this->id)));
        $tarea['Tarea']['totaldesplazamientoreal'] = 0;
        $tarea['Tarea']['totaldesplazamientoimputado'] = 0;
        $tarea['Tarea']['totalkilometrajereal'] = 0;
        $tarea['Tarea']['totalkilometrajeimputable'] = 0;
        $tarea['Tarea']['totalpreciodesplazamiento'] = 0;
        $tarea['Tarea']['total_horastrabajoprecio_real'] = 0;
        $tarea['Tarea']['total_horastrabajoprecio_imputable'] = 0;
        $tarea['Tarea']['totaldietasreales'] = 0;
        $tarea['Tarea']['totaldietasimputables'] = 0;
        $tarea['Tarea']['totalotroserviciosreales'] = 0;
        $tarea['Tarea']['totalotroserviciosimputables'] = 0;
        $tarea['Tarea']['total_materiales_imputables'] = 0;
        $tarea['Tarea']['total_materiales_costo'] = 0;
        /*
         * La Tarea es de Centro de trabajo
         */
        if ($tarea['Tarea']['tipo'] == 'centro') {
            foreach ($tarea['Parte'] as $partecentro) {
                if ($partecentro['id'] != $deleted_id) {
                    $tarea['Tarea']['totaldesplazamientoreal'] += ($partecentro['horasdesplazamientoreales_ida'] * $config['Config']['costohoradesplazamiento']) + ($partecentro['horasdesplazamientoreales_vuelta'] * $config['Config']['costohoradesplazamiento']);
                    $tarea['Tarea']['totaldesplazamientoimputado'] += ($partecentro['horasdesplazamientoimputables_ida'] * $tarea['Ordene']['Avisostallere']['Centrostrabajo']['preciohoradesplazamiento']) + ($partecentro['horasdesplazamientoimputables_vuelta'] * $tarea['Ordene']['Avisostallere']['Centrostrabajo']['preciohoradesplazamiento']);
                    $tarea['Tarea']['totalkilometrajereal'] += ($partecentro['kilometrajereal_ida'] * $config['Config']['costokmdesplazamiento']) + ($partecentro['kilometrajereal_vuelta'] * $config['Config']['costokmdesplazamiento']);
                    $tarea['Tarea']['totalkilometrajeimputable'] += ($partecentro['kilometrajeimputable_ida'] + $partecentro['kilometrajeimputable_vuelta'] ) * $tarea['Ordene']['Avisostallere']['Centrostrabajo']['preciokm'];
                    $tarea['Tarea']['totalpreciodesplazamiento'] += $partecentro['preciodesplazamiento'];
                    $tarea['Tarea']['total_horastrabajoprecio_real'] += $partecentro['horasreales'] * $config['Config']['costo_hora_en_centrotrabajo'];
                    $tarea['Tarea']['total_horastrabajoprecio_imputable'] += $partecentro['horasimputables'] * $tarea['Ordene']['Avisostallere']['Centrostrabajo']['preciohoraencentro'];
                    $tarea['Tarea']['totaldietasreales'] += $partecentro['dietasreales'];
                    $tarea['Tarea']['totaldietasimputables'] += $partecentro['dietasimputables'];
                    $tarea['Tarea']['totalotroserviciosreales'] += $partecentro['otrosservicios_real'];
                    $tarea['Tarea']['totalotroserviciosimputables'] += $partecentro['otrosservicios_imputable'];
                }
            }
            $tarea['Tarea']['total_partes_real'] = $tarea['Tarea']['totaldesplazamientoreal'] + $tarea['Tarea']['totalkilometrajereal'] + $tarea['Tarea']['total_horastrabajoprecio_real'] + $tarea['Tarea']['totaldietasreales'] + $tarea['Tarea']['totalotroserviciosreales'];

            if ($tarea['Ordene']['Avisostallere']['Centrostrabajo']['modofacturacion'] == 'preciofijio')
                $tarea['Tarea']['total_partes_imputable'] = $tarea['Tarea']['totalpreciodesplazamiento'] + $tarea['Tarea']['total_horastrabajoprecio_imputable'] + $tarea['Tarea']['totaldietasimputables'] + $tarea['Tarea']['totalotroserviciosimputables'];
            else
                $tarea['Tarea']['total_partes_imputable'] = $tarea['Tarea']['totaldesplazamientoimputado'] + $tarea['Tarea']['totalkilometrajeimputable'] + $tarea['Tarea']['total_horastrabajoprecio_imputable'] + $tarea['Tarea']['totaldietasimputables'] + $tarea['Tarea']['totalotroserviciosimputables'];
        } else { //  La Tarea es de Taller
            foreach ($tarea['Partestallere'] as $partetaller) {
                if ($partetaller['id'] != $deleted_id) {
                    $tarea['Tarea']['totalotroserviciosreales'] += $partetaller['otrosservicios_real'];
                    $tarea['Tarea']['totalotroserviciosimputables'] += $partetaller['otrosservicios_imputable'];
                    $tarea['Tarea']['total_horastrabajoprecio_real'] += $partetaller['horasreales'] * $config['Config']['costo_hora_en_taller'];
                    $tarea['Tarea']['total_horastrabajoprecio_imputable'] += $partetaller['horasimputables'] * $tarea['Ordene']['Avisostallere']['Centrostrabajo']['preciohoraentraller'];
                }
            }
            $tarea['Tarea']['total_partes_real'] =  $tarea['Tarea']['total_horastrabajoprecio_real'] + $tarea['Tarea']['totaldietasreales'] + $tarea['Tarea']['totalotroserviciosreales'];
            $tarea['Tarea']['total_partes_imputable'] = $tarea['Tarea']['total_horastrabajoprecio_imputable'] + $tarea['Tarea']['totaldietasimputables'] + $tarea['Tarea']['totalotroserviciosimputables'];
        }
        /*
         * Recalculamos los totales de Articulos 
         */
        if (!empty($tarea['ArticulosTarea'])) {
            foreach ($tarea['ArticulosTarea'] as $articulos_tarea) {
                $tarea['Tarea']['total_materiales_imputables'] += ($articulos_tarea['cantidad'] * $articulos_tarea['Articulo']['precio_sin_iva']) - (($articulos_tarea['cantidad'] * $articulos_tarea['Articulo']['precio_sin_iva']) * ($articulos_tarea['descuento'] / 100));
                $tarea['Tarea']['total_materiales_costo'] += $articulos_tarea['cantidadreal'] * $articulos_tarea['Articulo']['ultimopreciocompra'];
            }
        }
        /* Reformateo Antes de Guardar */
        $tarea['Tarea']['totaldesplazamientoreal'] = number_format($tarea['Tarea']['totaldesplazamientoreal'], 5, '.', '');
        $tarea['Tarea']['totaldesplazamientoimputado'] = number_format($tarea['Tarea']['totaldesplazamientoimputado'], 5, '.', '');
        $tarea['Tarea']['totalkilometrajereal'] = number_format($tarea['Tarea']['totalkilometrajereal'], 5, '.', '');
        $tarea['Tarea']['totalkilometrajeimputable'] = number_format($tarea['Tarea']['totalkilometrajeimputable'], 5, '.', '');
        $tarea['Tarea']['totalpreciodesplazamiento'] = number_format($tarea['Tarea']['totalpreciodesplazamiento'], 5, '.', '');
        $tarea['Tarea']['total_horastrabajoprecio_real'] = number_format($tarea['Tarea']['total_horastrabajoprecio_real'], 5, '.', '');
        $tarea['Tarea']['total_horastrabajoprecio_imputable'] = number_format($tarea['Tarea']['total_horastrabajoprecio_imputable'], 5, '.', '');
        $tarea['Tarea']['totaldietasreales'] = number_format($tarea['Tarea']['totaldietasreales'], 5, '.', '');
        $tarea['Tarea']['totaldietasimputables'] = number_format($tarea['Tarea']['totaldietasimputables'], 5, '.', '');
        $tarea['Tarea']['totalotroserviciosreales'] = number_format($tarea['Tarea']['totalotroserviciosreales'], 5, '.', '');
        $tarea['Tarea']['totalotroserviciosimputables'] = number_format($tarea['Tarea']['totalotroserviciosimputables'], 5, '.', '');
        $tarea['Tarea']['total_materiales_imputables'] = number_format($tarea['Tarea']['total_materiales_imputables'], 5, '.', '');
        $tarea['Tarea']['total_materiales_costo'] = number_format($tarea['Tarea']['total_materiales_costo'], 5, '.', '');
        $tarea['Tarea']['total_partes_real'] = number_format($tarea['Tarea']['total_partes_real'], 5, '.', '');
        $tarea['Tarea']['total_partes_imputable'] = number_format($tarea['Tarea']['total_partes_imputable'], 5, '.', '');
        $this->save($tarea['Tarea']);
    }

}

?>