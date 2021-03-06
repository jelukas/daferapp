<?php

class TareasAlbaranesclientesreparacione extends AppModel {

    var $name = 'TareasAlbaranesclientesreparacione';
    var $validate = array(
        'albaranesclientesreparacione_id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
            ),
        ),
    );

    var $virtualFields = array(
        'total_partes_real' => 'TareasAlbaranesclientesreparacione.totalkilometrajereal + TareasAlbaranesclientesreparacione.totalpreciodesplazamiento + TareasAlbaranesclientesreparacione.totaldesplazamientoreal + TareasAlbaranesclientesreparacione.total_horastrabajoprecio_real + TareasAlbaranesclientesreparacione.totaldietasreales + TareasAlbaranesclientesreparacione.totalotroserviciosreales',
        'total_partes_imputable' => 'TareasAlbaranesclientesreparacione.totalkilometrajeimputable + TareasAlbaranesclientesreparacione.totalpreciodesplazamiento + TareasAlbaranesclientesreparacione.totaldesplazamientoimputado + TareasAlbaranesclientesreparacione.total_horastrabajoprecio_imputable + TareasAlbaranesclientesreparacione.totaldietasimputables + TareasAlbaranesclientesreparacione.totalotroserviciosimputables',
    );
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
        $tarea = $this->Albaranesclientesreparacione->Ordene->Tarea->find('first', array('contain' => array('Parte', 'Partestallere', 'ArticulosTarea'=>'Articulo'), 'conditions' => array('Tarea.id' => $tarea_id)));
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
            $tareareparacion_articulo['ArticulosTareasAlbaranesclientesreparacione']['precio_unidad'] = $articulos_tarea['Articulo']['precio_sin_iva'];
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
        } else { //  La Tarea es de Taller
            foreach ($tarea['TareasAlbaranesclientesreparacionesPartestallere'] as $partetaller) {
                if ($partetaller['id'] != $deleted_id) {
                    $tarea['TareasAlbaranesclientesreparacione']['total_horastrabajoprecio_real'] += $partetaller['horasreales'] * $config['Config']['costo_hora_en_taller'];
                    $tarea['TareasAlbaranesclientesreparacione']['total_horastrabajoprecio_imputable'] += $partetaller['horasimputables'] * $tarea['Albaranesclientesreparacione']['Ordene']['Avisostallere']['Centrostrabajo']['preciohoraentraller'];
                    $tarea['TareasAlbaranesclientesreparacione']['totalotroserviciosreales'] += $partetaller['otrosservicios_real'];
                    $tarea['TareasAlbaranesclientesreparacione']['totalotroserviciosimputables'] += $partetaller['otrosservicios_imputable'];
                }
            }
        }
        /*
         * Recalculamos los totales de Articulos 
         */
        if (!empty($tarea['ArticulosTareasAlbaranesclientesreparacione'])) {
            foreach ($tarea['ArticulosTareasAlbaranesclientesreparacione'] as $articulos_tarea) {
                if ($articulos_tarea['id'] != $deleted_id) {
                    $tarea['TareasAlbaranesclientesreparacione']['total_materiales_imputables'] += ($articulos_tarea['cantidad'] * $articulos_tarea['precio_unidad']) - (($articulos_tarea['cantidad'] * $articulos_tarea['precio_unidad']) * ($articulos_tarea['descuento'] / 100));
                    $tarea['TareasAlbaranesclientesreparacione']['total_materiales_costo'] += $articulos_tarea['cantidadreal'] * $articulos_tarea['Articulo']['ultimopreciocompra'];
                }
            }
        }
        /* Reformateo Antes de Guardar */
        $tarea['TareasAlbaranesclientesreparacione']['totaldesplazamientoreal'] = redondear_dos_decimal($tarea['TareasAlbaranesclientesreparacione']['totaldesplazamientoreal']);
        $tarea['TareasAlbaranesclientesreparacione']['totaldesplazamientoimputado'] = redondear_dos_decimal($tarea['TareasAlbaranesclientesreparacione']['totaldesplazamientoimputado']);
        $tarea['TareasAlbaranesclientesreparacione']['totalkilometrajereal'] = redondear_dos_decimal($tarea['TareasAlbaranesclientesreparacione']['totalkilometrajereal']);
        $tarea['TareasAlbaranesclientesreparacione']['totalkilometrajeimputable'] = redondear_dos_decimal($tarea['TareasAlbaranesclientesreparacione']['totalkilometrajeimputable']);
        $tarea['TareasAlbaranesclientesreparacione']['totalpreciodesplazamiento'] = redondear_dos_decimal($tarea['TareasAlbaranesclientesreparacione']['totalpreciodesplazamiento']);
        $tarea['TareasAlbaranesclientesreparacione']['total_horastrabajoprecio_real'] = redondear_dos_decimal($tarea['TareasAlbaranesclientesreparacione']['total_horastrabajoprecio_real']);
        $tarea['TareasAlbaranesclientesreparacione']['total_horastrabajoprecio_imputable'] = redondear_dos_decimal($tarea['TareasAlbaranesclientesreparacione']['total_horastrabajoprecio_imputable']);
        $tarea['TareasAlbaranesclientesreparacione']['totaldietasreales'] = redondear_dos_decimal($tarea['TareasAlbaranesclientesreparacione']['totaldietasreales']);
        $tarea['TareasAlbaranesclientesreparacione']['totaldietasimputables'] = redondear_dos_decimal($tarea['TareasAlbaranesclientesreparacione']['totaldietasimputables']);
        $tarea['TareasAlbaranesclientesreparacione']['totalotroserviciosreales'] = redondear_dos_decimal($tarea['TareasAlbaranesclientesreparacione']['totalotroserviciosreales']);
        $tarea['TareasAlbaranesclientesreparacione']['totalotroserviciosimputables'] = redondear_dos_decimal($tarea['TareasAlbaranesclientesreparacione']['totalotroserviciosimputables']);
        $tarea['TareasAlbaranesclientesreparacione']['total_materiales_imputables'] = redondear_dos_decimal($tarea['TareasAlbaranesclientesreparacione']['total_materiales_imputables']);
        $tarea['TareasAlbaranesclientesreparacione']['total_materiales_costo'] = redondear_dos_decimal($tarea['TareasAlbaranesclientesreparacione']['total_materiales_costo']);
        $this->save($tarea['TareasAlbaranesclientesreparacione']);
    }
    function afterSave($created){
        $tarea = $this->find('first', array('conditions' => array('TareasAlbaranesclientesreparacione.id' => $this->id)));
        $this->Albaranesclientesreparacione->id = $tarea['TareasAlbaranesclientesreparacione']['albaranesclientesreparacione_id'];
        $this->Albaranesclientesreparacione->recalcularTotales();
    }
    function beforeDelete($created){
        $tarea = $this->find('first', array('conditions' => array('TareasAlbaranesclientesreparacione.id' => $this->id)));
        $this->Albaranesclientesreparacione->id = $tarea['TareasAlbaranesclientesreparacione']['albaranesclientesreparacione_id'];
        $this->Albaranesclientesreparacione->recalcularTotales($this->id);
        return true;
    }
}

?>