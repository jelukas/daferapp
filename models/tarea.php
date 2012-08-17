<?php

class Tarea extends AppModel {

    var $name = 'Tarea';
    var $displayField = 'descripcion';
    var $validate = array(
        'ordene_id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
            ),
        ),
    );
    var $virtualFields = array(
        'total_partes_real' => 'Tarea.totalkilometrajereal + Tarea.totalpreciodesplazamiento + Tarea.totaldesplazamientoreal + Tarea.total_horastrabajoprecio_real + Tarea.totaldietasreales + Tarea.totalotroserviciosreales',
        'total_partes_imputable' => 'Tarea.totalkilometrajeimputable + Tarea.totalpreciodesplazamiento + Tarea.totaldesplazamientoimputado + Tarea.total_horastrabajoprecio_imputable + Tarea.totaldietasimputables + Tarea.totalotroserviciosimputables',
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
        $tarea = $this->find('first', array('contain' => array('ArticulosTarea' => 'Articulo', 'Parte', 'Partestallere', 'Ordene' => array('Centrostrabajo')), 'conditions' => array('Tarea.id' => $this->id)));
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
                    $tarea['Tarea']['totaldesplazamientoimputado'] += ($partecentro['horasdesplazamientoimputables_ida'] * $tarea['Ordene']['Centrostrabajo']['preciohoradesplazamiento']) + ($partecentro['horasdesplazamientoimputables_vuelta'] * $tarea['Ordene']['Centrostrabajo']['preciohoradesplazamiento']);
                    $tarea['Tarea']['totalkilometrajereal'] += ($partecentro['kilometrajereal_ida'] * $config['Config']['costokmdesplazamiento']) + ($partecentro['kilometrajereal_vuelta'] * $config['Config']['costokmdesplazamiento']);
                    $tarea['Tarea']['totalkilometrajeimputable'] += ($partecentro['kilometrajeimputable_ida'] + $partecentro['kilometrajeimputable_vuelta'] ) * $tarea['Ordene']['Centrostrabajo']['preciokm'];
                    $tarea['Tarea']['totalpreciodesplazamiento'] += $partecentro['preciodesplazamiento'];
                    $tarea['Tarea']['total_horastrabajoprecio_real'] += $partecentro['horasreales'] * $config['Config']['costo_hora_en_centrotrabajo'];
                    $tarea['Tarea']['total_horastrabajoprecio_imputable'] += $partecentro['horasimputables'] * $tarea['Ordene']['Centrostrabajo']['preciohoraencentro'];
                    $tarea['Tarea']['totaldietasreales'] += $partecentro['dietasreales'];
                    $tarea['Tarea']['totaldietasimputables'] += $partecentro['dietasimputables'];
                    $tarea['Tarea']['totalotroserviciosreales'] += $partecentro['otrosservicios_real'];
                    $tarea['Tarea']['totalotroserviciosimputables'] += $partecentro['otrosservicios_imputable'];
                }
            }
        } else { //  La Tarea es de Taller
            foreach ($tarea['Partestallere'] as $partetaller) {
                if ($partetaller['id'] != $deleted_id) {
                    $tarea['Tarea']['totalotroserviciosreales'] += $partetaller['otrosservicios_real'];
                    $tarea['Tarea']['totalotroserviciosimputables'] += $partetaller['otrosservicios_imputable'];
                    $tarea['Tarea']['total_horastrabajoprecio_real'] += $partetaller['horasreales'] * $config['Config']['costo_hora_en_taller'];
                    $tarea['Tarea']['total_horastrabajoprecio_imputable'] += $partetaller['horasimputables'] * $tarea['Ordene']['Centrostrabajo']['preciohoraentraller'];
                }
            }
        }
        /*
         * Recalculamos los totales de Articulos 
         */
        if (!empty($tarea['ArticulosTarea'])) {
            foreach ($tarea['ArticulosTarea'] as $articulos_tarea) {
                if ($articulos_tarea['id'] != $deleted_id) {
                    $tarea['Tarea']['total_materiales_imputables'] += ($articulos_tarea['cantidad'] * $articulos_tarea['Articulo']['precio_sin_iva']) - (($articulos_tarea['cantidad'] * $articulos_tarea['Articulo']['precio_sin_iva']) * ($articulos_tarea['descuento'] / 100));
                    $tarea['Tarea']['total_materiales_costo'] += $articulos_tarea['cantidadreal'] * $articulos_tarea['Articulo']['ultimopreciocompra'];
                }
            }
        }
        /* Reformateo Antes de Guardar */
        $tarea['Tarea']['totaldesplazamientoreal'] = redondear_dos_decimal($tarea['Tarea']['totaldesplazamientoreal']);
        $tarea['Tarea']['totaldesplazamientoimputado'] = redondear_dos_decimal($tarea['Tarea']['totaldesplazamientoimputado']);
        $tarea['Tarea']['totalkilometrajereal'] = redondear_dos_decimal($tarea['Tarea']['totalkilometrajereal']);
        $tarea['Tarea']['totalkilometrajeimputable'] = redondear_dos_decimal($tarea['Tarea']['totalkilometrajeimputable']);
        $tarea['Tarea']['totalpreciodesplazamiento'] = redondear_dos_decimal($tarea['Tarea']['totalpreciodesplazamiento']);
        $tarea['Tarea']['total_horastrabajoprecio_real'] = redondear_dos_decimal($tarea['Tarea']['total_horastrabajoprecio_real']);
        $tarea['Tarea']['total_horastrabajoprecio_imputable'] = redondear_dos_decimal($tarea['Tarea']['total_horastrabajoprecio_imputable']);
        $tarea['Tarea']['totaldietasreales'] = redondear_dos_decimal($tarea['Tarea']['totaldietasreales']);
        $tarea['Tarea']['totaldietasimputables'] = redondear_dos_decimal($tarea['Tarea']['totaldietasimputables']);
        $tarea['Tarea']['totalotroserviciosreales'] = redondear_dos_decimal($tarea['Tarea']['totalotroserviciosreales']);
        $tarea['Tarea']['totalotroserviciosimputables'] = redondear_dos_decimal($tarea['Tarea']['totalotroserviciosimputables']);
        $tarea['Tarea']['total_materiales_imputables'] = redondear_dos_decimal($tarea['Tarea']['total_materiales_imputables']);
        $tarea['Tarea']['total_materiales_costo'] = redondear_dos_decimal($tarea['Tarea']['total_materiales_costo']);
        $this->save($tarea['Tarea']);
    }
    
}

?>