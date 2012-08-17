<?php

class AlbaranesclientesController extends AppController {

    var $name = 'Albaranesclientes';
    var $components = array('RequestHandler', 'Session', 'FileUpload');
    var $helpers = array('Form', 'Autocomplete', 'Ajax', 'Js', 'Javascript', 'Time');

    function beforeFilter() {
        parent::beforeFilter();
        if ($this->params['action'] == 'edit' || $this->params['action'] == 'add' || $this->params['action'] == 'devolucion') {
            $this->FileUpload->fileModel = 'Albaranescliente';
            $this->FileUpload->uploadDir = 'files/albaranescliente';
            $this->FileUpload->fields = array('name' => 'file_name', 'type' => 'file_type', 'size' => 'file_size');
        }
    }

    function index() {
        $this->Albaranescliente->recursive = 0;
        $this->set('albaranesclientes', $this->paginate());
    }

    function view($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Invalid albaranescliente', true));
            $this->redirect($this->referer());
        }
        $albaranescliente = $this->Albaranescliente->find('first', array(
            'contain' => array(
                'FacturasCliente' => 'Cliente',
                'Estadosalbaranescliente',
                'Maquina',
                'Tiposiva',
                'Comerciale',
                'Centrosdecoste',
                'Almacene',
                'Cliente',
                'Centrostrabajo',
                'Pedidoscliente' => array(
                    'Presupuestoscliente' => 'Cliente'),
                'Avisosrepuesto' => array('Cliente', 'Centrostrabajo', 'Maquina'),
                'Tareasalbaranescliente' => array('MaterialesTareasalbaranescliente' => 'Articulo', 'ManodeobrasTareasalbaranescliente', 'TareasalbaranesclientesOtrosservicio'), 'Avisosrepuesto' => array('Cliente', 'Centrostrabajo', 'Maquina')), 'conditions' => array('Albaranescliente.id' => $id)));
        $totalmanoobrayservicios = 0;
        $totalrepuestos = 0;
        foreach ($albaranescliente['Tareasalbaranescliente'] as $tarea) {
            $totalmanoobrayservicios += $tarea['mano_de_obra'] + $tarea['servicios'];
            $totalrepuestos += $tarea['materiales'];
        }
        $this->set('totalrepuestos', $totalrepuestos);
        $this->set('totalmanoobrayservicios', $totalmanoobrayservicios);
        $this->set('albaranescliente', $albaranescliente);
    }

    function add($vienede = null, $iddedondeviene = null) {
        if (!empty($this->data)) {
            $this->Albaranescliente->create();
            if ($this->Albaranescliente->save($this->data)) {
                if (!empty($this->data['Albaranescliente']['pedidoscliente_id'])) { // Si viene de Pedidoscliente 
                    $this->__trapaso_from_pedidoscliente($this->data);
                } elseif (!empty($this->data['Albaranescliente']['ordene_id'])) { // Si viene de Ordene 
                    $this->__trapaso_from_ordene($this->data);
                } elseif (!empty($this->data['Albaranescliente']['avisosrepuesto_id'])) { // Si viene de Avisosrepuesto 
                    $this->__trapaso_from_avisosrepuesto($this->data);
                } else {
                    $this->Albaranescliente->Tareasalbaranescliente->create();
                    $tareasalbaranescliente = array();
                    $tareasalbaranescliente['Tareasalbaranescliente']['tipo'] = 'repuestos';
                    $tareasalbaranescliente['Tareasalbaranescliente']['asunto'] = 'Material de Venta';
                    $tareasalbaranescliente['Tareasalbaranescliente']['materiales'] = 0;
                    $tareasalbaranescliente['Tareasalbaranescliente']['mano_de_obra'] = 0;
                    $tareasalbaranescliente['Tareasalbaranescliente']['servicios'] = 0;
                    $tareasalbaranescliente['Tareasalbaranescliente']['albaranescliente_id'] = $this->Albaranescliente->id;
                    $this->Albaranescliente->Tareasalbaranescliente->save($tareasalbaranescliente);
                }
                /* Guardar fichero */
                if ($this->FileUpload->finalFile != null) {
                    $this->Albaranescliente->saveField('albaranescaneado', $this->FileUpload->finalFile);
                }
                /* Fin de Guardar Fichero */
                if (!empty($this->$this->Albaranescliente->Tareasalbaranescliente->session_message)){
                    $this->Session->setFlash(__('El Albarán de Venta ha sido guardado. Hay material que no ha sido añadido porque no hay existencías', true));
                }else{
                    $this->Session->setFlash(__('El Albarán de Venta ha sido guardado.', true));
                }
                $this->redirect(array('action' => 'view', $this->Albaranescliente->id));
            } else {
                $this->Session->setFlash(__('El Albarán de Venta no ha podido ser guardado. Por favor, prueba de nuevo.', true));
                $this->redirect($this->referer());
            }
        }
        $estadosalbaranesclientes = $this->Albaranescliente->Estadosalbaranescliente->find('list');
        $almacenes = $this->Albaranescliente->Almacene->find('list');
        $tiposivas = $this->Albaranescliente->Tiposiva->find('list');
        $comerciales = $this->Albaranescliente->Comerciale->find('list');
        $centrosdecostes = $this->Albaranescliente->Centrosdecoste->find('list');
        $numero = $this->Albaranescliente->dime_siguiente_numero();
        if ($vienede == 'pedidoscliente') {
            $pedidoscliente = $this->Albaranescliente->Pedidoscliente->find('first', array('contain' => array('Presupuestoscliente' => array('Cliente', 'Centrostrabajo', 'Maquina'), 'Tareaspedidoscliente' => array('MaterialesTareaspedidoscliente' => 'Articulo', 'ManodeobrasTareaspedidoscliente', 'TareaspedidosclientesOtrosservicio')), 'conditions' => array('Pedidoscliente.id' => $iddedondeviene)));
            $this->set(compact('pedidoscliente', 'tiposivas', 'numero', 'centrosdecostes', 'comerciales', 'estadosalbaranesclientes', 'almacenes'));
            $this->render('add_from_pedidoscliente');
        } elseif ($vienede == 'avisosrepuesto') {
            $avisosrepuesto = $this->Albaranescliente->Avisosrepuesto->find('first', array('contain' => array('Cliente', 'Centrostrabajo', 'Maquina', 'ArticulosAvisosrepuesto' => 'Articulo'), 'conditions' => array('Avisosrepuesto.id' => $iddedondeviene)));
            $this->set(compact('avisosrepuesto', 'tiposivas', 'numero', 'centrosdecostes', 'comerciales', 'estadosalbaranesclientes', 'almacenes'));
            $this->render('add_from_avisosrepuesto');
        } else {
            $this->set(compact('tiposivas', 'almacenes', 'numero', 'comerciales', 'estadosalbaranesclientes', 'centrosdecostes'));
            $this->render('add_direct');
        }
    }

    function edit($id = null) {
        if (!$id && empty($this->data)) {
            $this->flashWarnings(__('Invalid albaranescliente', true));
            $this->redirect(array('action' => 'index'));
        }
        if (!empty($this->data)) {
            if ($this->Albaranescliente->save($this->data)) {
                $upload = $this->Albaranescliente->findById($id);
                if (!empty($this->data['Albaranescliente']['remove_file'])) {
                    $this->FileUpload->RemoveFile($upload['Albaranescliente']['albaranescaneado']);
                    $this->Albaranescliente->saveField('albaranescaneado', null);
                }
                if ($this->FileUpload->finalFile != null) {
                    $this->FileUpload->RemoveFile($upload['Albaranescliente']['albaranescaneado']);
                    $this->Albaranescliente->saveField('albaranescaneado', $this->FileUpload->finalFile);
                }

                $this->Session->setFlash(__('The albaranescliente has been saved', true));
                $this->redirect(array('action' => 'view', $id));
            } else {
                $this->flashWarnings(__('The albaranescliente could not be saved. Please, try again.', true));
            }
        }
        if (empty($this->data)) {
            $this->data = $this->Albaranescliente->read(null, $id);
        }

        $almacenes = $this->Albaranescliente->Almacene->find('list');
        $comerciales = $this->Albaranescliente->Comerciale->find('list');
        $estadosalbaranesclientes = $this->Albaranescliente->Estadosalbaranescliente->find('list');
        $centrosdecostes = $this->Albaranescliente->Centrosdecoste->find('list');
        $tiposivas = $this->Albaranescliente->Tiposiva->find('list');
        $avisosrepuestos = $this->Albaranescliente->Avisosrepuesto->find('list');
        $pedidosclientes = $this->Albaranescliente->Pedidoscliente->find('list');
        $facturasClientes = $this->Albaranescliente->FacturasCliente->find('list');
        $this->set(compact('avisosrepuestos', 'pedidosclientes', 'facturasClientes', 'tiposivas', 'centrosdecostes', 'almacenes', 'comerciales', 'estadosalbaranesclientes'));
    }

    function delete($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Invalid id for albaranescliente', true));
            $this->redirect(array('action' => 'index'));
        }
        if ($this->Albaranescliente->delete($id)) {
            $this->Session->setFlash(__('Albaranescliente deleted', true));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Albaranescliente was not deleted', true));
        $this->redirect(array('action' => 'index'));
    }

    function __trapaso_from_pedidoscliente($data) {
        foreach ($data['Tareaspedidoscliente'] as $tareaspedidoscliente) {
            if ($tareaspedidoscliente['id'] != 0) {
                $this->Albaranescliente->Tareasalbaranescliente->create();
                $tareaspedidoscliente_modelo = $this->Albaranescliente->Pedidoscliente->Tareaspedidoscliente->find('first', array('contain' => '', 'conditions' => array('Tareaspedidoscliente.id' => $tareaspedidoscliente['id'])));
                $tareasalbaranescliente['Tareasalbaranescliente'] = $tareaspedidoscliente_modelo['Tareaspedidoscliente'];
                unset($tareasalbaranescliente['Tareasalbaranescliente']['id']);
                unset($tareasalbaranescliente['Tareasalbaranescliente']['pedidoscliente_id']);
                $tareasalbaranescliente['Tareasalbaranescliente']['albaranescliente_id'] = $this->Albaranescliente->id;
                $tareasalbaranescliente['Tareasalbaranescliente']['materiales'] = 0;
                $tareasalbaranescliente['Tareasalbaranescliente']['mano_de_obra'] = 0;
                $tareasalbaranescliente['Tareasalbaranescliente']['servicios'] = 0;
                $this->Albaranescliente->Tareasalbaranescliente->save($tareasalbaranescliente);
                if (!empty($tareaspedidoscliente['MaterialesTareaspedidoscliente'])) {
                    foreach ($tareaspedidoscliente['MaterialesTareaspedidoscliente'] as $materiale) {
                        if ($materiale['id'] != 0) {
                            $this->Albaranescliente->Tareasalbaranescliente->MaterialesTareasalbaranescliente->create();
                            $materiale_modelo = $this->Albaranescliente->Pedidoscliente->Tareaspedidoscliente->MaterialesTareaspedidoscliente->find('first', array('contain' => '', 'conditions' => array('MaterialesTareaspedidoscliente.id' => $materiale['id'])));
                            $materialesalbaranescliente['MaterialesTareasalbaranescliente'] = $materiale_modelo['MaterialesTareaspedidoscliente'];
                            unset($materialesalbaranescliente['MaterialesTareasalbaranescliente']['id']);
                            unset($materialesalbaranescliente['MaterialesTareasalbaranescliente']['tareaspedidoscliente_id']);
                            $materialesalbaranescliente['MaterialesTareasalbaranescliente']['tareasalbaranescliente_id'] = $this->Albaranescliente->Tareasalbaranescliente->id;
                            $this->Albaranescliente->Tareasalbaranescliente->MaterialesTareasalbaranescliente->save($materialesalbaranescliente);
                        }
                    }
                }
                if (!empty($tareaspedidoscliente['ManodeobrasTareaspedidoscliente'])) {
                    foreach ($tareaspedidoscliente['ManodeobrasTareaspedidoscliente'] as $manodeobra) {
                        if ($manodeobra['id'] != 0) {
                            $this->Albaranescliente->Tareasalbaranescliente->ManodeobrasTareasalbaranescliente->create();
                            $manodeobra_modelo = $this->Albaranescliente->Pedidoscliente->Tareaspedidoscliente->ManodeobrasTareaspedidoscliente->find('first', array('contain' => '', 'conditions' => array('ManodeobrasTareaspedidoscliente.id' => $manodeobra['id'])));
                            $manodeobraalbaranescliente['ManodeobrasTareasalbaranescliente'] = $manodeobra_modelo['ManodeobrasTareaspedidoscliente'];
                            unset($manodeobraalbaranescliente['ManodeobrasTareasalbaranescliente']['id']);
                            unset($manodeobraalbaranescliente['ManodeobrasTareasalbaranescliente']['tareaspedidoscliente_id']);
                            $manodeobraalbaranescliente['ManodeobrasTareasalbaranescliente']['tareasalbaranescliente_id'] = $this->Albaranescliente->Tareasalbaranescliente->id;
                            $this->Albaranescliente->Tareasalbaranescliente->ManodeobrasTareasalbaranescliente->save($manodeobraalbaranescliente);
                        }
                    }
                }
                if (!empty($tareaspedidoscliente['TareaspedidosclientesOtrosservicio'])) {
                    foreach ($tareaspedidoscliente['TareaspedidosclientesOtrosservicio'] as $otrosservicio) {
                        if ($otrosservicio['id'] != 0) {
                            $this->Albaranescliente->Tareasalbaranescliente->TareasalbaranesclientesOtrosservicio->create();
                            $otrosservicio_modelo = $this->Albaranescliente->Pedidoscliente->Tareaspedidoscliente->TareaspedidosclientesOtrosservicio->find('first', array('contain' => '', 'conditions' => array('TareaspedidosclientesOtrosservicio.id' => $otrosservicio['id'])));
                            $otrosserviciosalbaranescliente['TareasalbaranesclientesOtrosservicio'] = $otrosservicio_modelo['TareaspedidosclientesOtrosservicio'];
                            unset($otrosserviciosalbaranescliente['TareasalbaranesclientesOtrosservicio']['id']);
                            unset($otrosserviciosalbaranescliente['TareasalbaranesclientesOtrosservicio']['tareaspedidoscliente_id']);
                            $otrosserviciosalbaranescliente['TareasalbaranesclientesOtrosservicio']['tareasalbaranescliente_id'] = $this->Albaranescliente->Tareasalbaranescliente->id;
                            $this->Albaranescliente->Tareasalbaranescliente->TareasalbaranesclientesOtrosservicio->save($otrosserviciosalbaranescliente);
                        }
                    }
                }
            }
        }
    }

    function __trapaso_from_avisosrepuesto($data) {
        $cliente = $this->Albaranescliente->Avisosrepuesto->Cliente->find('first', array('contain' => '', 'conditions' => array('Cliente.id' => $data['Albaranescliente']['cliente_id'])));
        if (!empty($data['ArticulosAvisosrepuesto'])) {
            $this->Albaranescliente->Tareasalbaranescliente->create();
            $tareasalbaranescliente['Tareasalbaranescliente'] = array();
            $tareasalbaranescliente['Tareasalbaranescliente']['albaranescliente_id'] = $this->Albaranescliente->id;
            $tareasalbaranescliente['Tareasalbaranescliente']['asunto'] = 'Material del Aviso de Repuestos';
            $tareasalbaranescliente['Tareasalbaranescliente']['tipo'] = 'repuestos';
            $tareasalbaranescliente['Tareasalbaranescliente']['materiales'] = 0;
            $tareasalbaranescliente['Tareasalbaranescliente']['mano_de_obra'] = 0;
            $tareasalbaranescliente['Tareasalbaranescliente']['servicios'] = 0;
            $this->Albaranescliente->Tareasalbaranescliente->save($tareasalbaranescliente);
            foreach ($data['ArticulosAvisosrepuesto'] as $articulosavisosrepuesto) {
                if ($articulosavisosrepuesto['id'] != 0) {
                    $this->Albaranescliente->Tareasalbaranescliente->MaterialesTareasalbaranescliente->create();
                    $articulosavisosrepuesto_modelo = $this->Albaranescliente->Avisosrepuesto->ArticulosAvisosrepuesto->find('first', array('contain' => 'Articulo', 'conditions' => array('ArticulosAvisosrepuesto.id' => $articulosavisosrepuesto['id'])));
                    $materialesalbaranescliente['MaterialesTareasalbaranescliente']['articulo_id'] = $articulosavisosrepuesto_modelo['ArticulosAvisosrepuesto']['articulo_id'];
                    $materialesalbaranescliente['MaterialesTareasalbaranescliente']['cantidad'] = $articulosavisosrepuesto_modelo['ArticulosAvisosrepuesto']['cantidad'];
                    $materialesalbaranescliente['MaterialesTareasalbaranescliente']['precio_unidad'] = $articulosavisosrepuesto_modelo['Articulo']['precio_sin_iva'];
                    if (empty($cliente['Cliente']['descuentos_repuestos']))
                        $materialesalbaranescliente['MaterialesTareasalbaranescliente']['descuento'] = 0;
                    else
                        $materialesalbaranescliente['MaterialesTareasalbaranescliente']['descuento'] = $cliente['Cliente']['descuentos_repuestos'];
                    $materialesalbaranescliente['MaterialesTareasalbaranescliente']['importe'] = $materialesalbaranescliente['MaterialesTareasalbaranescliente']['cantidad'] * $materialesalbaranescliente['MaterialesTareasalbaranescliente']['precio_unidad'];
                    $materialesalbaranescliente['MaterialesTareasalbaranescliente']['importe'] = $materialesalbaranescliente['MaterialesTareasalbaranescliente']['importe'] - (($materialesalbaranescliente['MaterialesTareasalbaranescliente']['importe'] * $materialesalbaranescliente['MaterialesTareasalbaranescliente']['descuento']) / 100);
                    $materialesalbaranescliente['MaterialesTareasalbaranescliente']['importe'] = number_format($materialesalbaranescliente['MaterialesTareasalbaranescliente']['importe'], 5, '.', '');
                    $materialesalbaranescliente['MaterialesTareasalbaranescliente']['tareasalbaranescliente_id'] = $this->Albaranescliente->Tareasalbaranescliente->id;
                    $this->Albaranescliente->Tareasalbaranescliente->MaterialesTareasalbaranescliente->save($materialesalbaranescliente);
                }
            }
        }
    }

    function search_list() {
        $this->layout = 'ajax';
        die(pr($this->data));
        $cliente_id = $this->data['FacturasCliente']['cliente_id'];
        $albaranesclientes = $this->Albaranescliente->find('all', array('contain' => 'Cliente', 'conditions' => array('Albaranescliente.cliente_id' => $cliente_id)));
        $this->set(compact('albaranesclientes'));
    }

    function facturacion() {
        if (!empty($this->data)) {
            $fecha_inicio = date('Y-m-d', strtotime($this->data['Filtro']['fecha_inicio']['year'] . '-' . $this->data['Filtro']['fecha_inicio']['month'] . '-' . $this->data['Filtro']['fecha_inicio']['day']));
            $fecha_fin = date('Y-m-d', strtotime($this->data['Filtro']['fecha_fin']['year'] . '-' . $this->data['Filtro']['fecha_fin']['month'] . '-' . $this->data['Filtro']['fecha_fin']['day']));
            if (!empty($this->data['Filtro']['todos'])) {
                /* Obtenemos los alabranes de todos los clientes comprendidos ene l rango de fecha
                 * y que se PUEDAN FACTURAR 
                 */
                $clientes = $this->Albaranescliente->Cliente->find('all', array('contain' => array('Centrostrabajo' => 'Maquina')));
                $cliente_list = array();
                foreach ($clientes as $cliente) {
                    $cantidad_albaranes_facturables = 0;
                    switch ($cliente['Cliente']['modo_facturacion']) {
                        case 'centrotrabajo':
                            foreach ($cliente['Centrostrabajo'] as $key => $centrotrabajo) {
                                $albaranescliente = $this->__get_albaranes_by_centrostrabajo($centrotrabajo['id'], $fecha_inicio, $fecha_fin);
                                $cantidad_albaranes_facturables += count($albaranescliente);
                                $cliente['Centrostrabajo'][$key]['Albaranescliente'] = $albaranescliente;
                            }
                            break;
                        case 'maquina':
                            foreach ($cliente['Centrostrabajo'] as $key => $centrotrabajo) {
                                foreach ($centrotrabajo['Maquina'] as $keymaquina => $maquina) {
                                    $albaranescliente = $this->__get_albaranes_by_maquina($maquina['id'], $fecha_inicio, $fecha_fin);
                                    $cliente['Centrostrabajo'][$key]['Maquina'][$keymaquina]['Albaranescliente'] = $albaranescliente;
                                    $cantidad_albaranes_facturables += count($albaranescliente);
                                }
                            }
                            break;
                        case 'albaran':
                            $albaranescliente = $this->__get_albaranes_by_cliente($cliente['Cliente']['id'], $fecha_inicio, $fecha_fin);
                            $cliente['Cliente']['Albaranescliente'] = $albaranescliente;
                            $cantidad_albaranes_facturables += count($albaranescliente);
                            break;
                        case 'todo':
                            $albaranescliente = $this->__get_albaranes_by_cliente($cliente['Cliente']['id'], $fecha_inicio, $fecha_fin);
                            $cliente['Cliente']['Albaranescliente'] = $albaranescliente;
                            $cantidad_albaranes_facturables += count($albaranescliente);
                            break;
                        default: // por defecto por Centrodetrabajo
                            foreach ($cliente['Centrostrabajo'] as $key => $centrotrabajo) {
                                $albaranescliente = $this->__get_albaranes_by_centrostrabajo($centrotrabajo['id'], $fecha_inicio, $fecha_fin);
                                $cantidad_albaranes_facturables += count($albaranescliente);
                                $cliente['Centrostrabajo'][$key]['Albaranescliente'] = $albaranescliente;
                            }
                            break;
                    }
                    $cliente['Cliente']['cantidad_albaranes_facturables'] = $cantidad_albaranes_facturables;
                    if ($cliente['Cliente']['cantidad_albaranes_facturables'] > 0)
                        $cliente_list[] = $cliente;
                }
            } elseif (!empty($this->data['Filtro']['Cliente'])) {
                /* Obtenemos los alabranes de los clientes pasados comprendidos en el rango de fecha
                 * y que se PUEDAN FACTURAR 
                 */
                $cliente_list = array();
                foreach ($this->data['Filtro']['Cliente'] as $cliente_id) {
                    $cantidad_albaranes_facturables = 0;
                    $cliente = $this->Albaranescliente->Cliente->find('first', array('contain' => array('Centrostrabajo' => 'Maquina'), 'conditions' => array('Cliente.id' => $cliente_id)));
                    switch ($cliente['Cliente']['modo_facturacion']) {
                        case 'centrotrabajo':
                            foreach ($cliente['Centrostrabajo'] as $key => $centrotrabajo) {
                                $albaranescliente = $this->__get_albaranes_by_centrostrabajo($centrotrabajo['id'], $fecha_inicio, $fecha_fin);
                                $cantidad_albaranes_facturables += count($albaranescliente);
                                $cliente['Centrostrabajo'][$key]['Albaranescliente'] = $albaranescliente;
                            }
                            break;
                        case 'maquina':
                            foreach ($cliente['Centrostrabajo'] as $key => $centrotrabajo) {
                                foreach ($centrotrabajo['Maquina'] as $keymaquina => $maquina) {
                                    $albaranescliente = $this->__get_albaranes_by_maquina($maquina['id'], $fecha_inicio, $fecha_fin);
                                    $cliente['Centrostrabajo'][$key]['Maquina'][$keymaquina]['Albaranescliente'] = $albaranescliente;
                                    $cantidad_albaranes_facturables += count($albaranescliente);
                                }
                            }
                            break;
                        case 'albaran':
                            $albaranescliente = $this->__get_albaranes_by_cliente($cliente['Cliente']['id'], $fecha_inicio, $fecha_fin);
                            $cliente['Cliente']['Albaranescliente'] = $albaranescliente;
                            $cantidad_albaranes_facturables += count($albaranescliente);
                            break;
                        case 'todo':
                            $albaranescliente = $this->__get_albaranes_by_cliente($cliente['Cliente']['id'], $fecha_inicio, $fecha_fin);
                            $cliente['Cliente']['Albaranescliente'] = $albaranescliente;
                            $cantidad_albaranes_facturables += count($albaranescliente);
                            break;
                        default: // por defecto por CEntrodetrabajo
                            foreach ($cliente['Centrostrabajo'] as $key => $centrotrabajo) {
                                $albaranescliente = $this->__get_albaranes_by_centrostrabajo($centrotrabajo['id'], $fecha_inicio, $fecha_fin);
                                $cantidad_albaranes_facturables += count($albaranescliente);
                                $cliente['Centrostrabajo'][$key]['Albaranescliente'] = $albaranescliente;
                            }
                            break;
                    }
                    $cliente_list[] = $cliente;
                }
            }
            $this->set(compact('cliente_list'));
            $this->render('facturacion_list');
        }
    }

    function devolucion($id = null) {
        if (!$id && empty($this->data)) {
            $this->flashWarnings(__('Invalid albaranescliente', true));
            $this->redirect($this->referer());
        }
        if (!empty($this->data)) {
            $this->data['Albaranescliente']['es_devolucion'] = 1;
            if ($this->Albaranescliente->save($this->data)) {
                $id = $this->Albaranescliente->id;
                $upload = $this->Albaranescliente->findById($id);
                if ($this->FileUpload->finalFile != null) {
                    $this->Albaranescliente->saveField('albaranescaneado', $this->FileUpload->finalFile);
                }
                $this->__trapaso_from_albaran_to_devolucion($this->data);
                $this->Session->setFlash(__('El Albarán de Devolución ha sido guardado', true));
                $this->redirect(array('action' => 'view', $id));
            } else {
                $this->flashWarnings(__('The albaranescliente could not be saved. Please, try again.', true));
                $this->redirect($this->referer());
            }
        }
        $albaranescliente = $albaranescliente = $this->Albaranescliente->find('first', array('contain' => array('Cliente', 'Almacene', 'Ordene' => array('Avisostallere' => 'Cliente'), 'Pedidoscliente' => array('Presupuestoscliente' => 'Cliente'), 'Avisosrepuesto' => 'Cliente', 'Tareasalbaranescliente' => array('MaterialesTareasalbaranescliente' => 'Articulo', 'ManodeobrasTareasalbaranescliente', 'TareasalbaranesclientesOtrosservicio')), 'conditions' => array('Albaranescliente.id' => $id)));
        $tiposivas = $this->Albaranescliente->Tiposiva->find('list');
        $this->set(compact('tiposivas', 'albaranescliente'));
    }

    function __get_albaranes_by_centrostrabajo($centrostrabajo_id, $fecha_inicio, $fecha_fin) {
        $query = "select * from albaranesclientes Albaranescliente where Albaranescliente.fecha BETWEEN '" . $fecha_inicio . "' AND '" . $fecha_fin . "' AND Albaranescliente.facturable=1 AND Albaranescliente.facturas_cliente_id IS NULL AND (";
        $query .= "Albaranescliente.avisosrepuesto_id IN (SELECT ar.id FROM avisosrepuestos ar WHERE ar.centrostrabajo_id = '" . $centrostrabajo_id . "') ";
        $query .= "OR Albaranescliente.pedidoscliente_id IN (SELECT p.id FROM pedidosclientes p WHERE p.presupuestoscliente_id IN (SELECT pre.id FROM presupuestosclientes pre WHERE pre.avisosrepuesto_id IN (SELECT avr.id FROM avisosrepuestos avr WHERE avr.centrostrabajo_id = '" . $centrostrabajo_id . "'))) ";
        $query .= "OR Albaranescliente.pedidoscliente_id IN (SELECT p2.id FROM pedidosclientes p2 WHERE p2.presupuestoscliente_id IN (SELECT pre2.id FROM presupuestosclientes pre2 WHERE pre2.presupuestosproveedore_id IN(SELECT ppro.id FROM presupuestosproveedores ppro WHERE ppro.avisosrepuesto_id IN (SELECT avr2.id FROM avisosrepuestos avr2 WHERE avr2.centrostrabajo_id = '" . $centrostrabajo_id . "')))) ";
        $query .= ")";
        $albaranescliente = $this->Albaranescliente->query($query);
        return $albaranescliente;
    }

    function __get_albaranes_by_maquina($maquina_id, $fecha_inicio, $fecha_fin) {
        $query = "select * from albaranesclientes Albaranescliente where Albaranescliente.fecha BETWEEN '" . $fecha_inicio . "' AND '" . $fecha_fin . "' AND Albaranescliente.facturable=1 AND Albaranescliente.facturas_cliente_id IS NULL AND (";
        $query .= "Albaranescliente.avisosrepuesto_id IN (SELECT ar.id FROM avisosrepuestos ar WHERE ar.maquina_id = '" . $maquina_id . "') ";
        $query .= "OR Albaranescliente.pedidoscliente_id IN (SELECT p.id FROM pedidosclientes p WHERE p.presupuestoscliente_id IN (SELECT pre.id FROM presupuestosclientes pre WHERE pre.avisosrepuesto_id IN (SELECT avr.id FROM avisosrepuestos avr WHERE avr.maquina_id = '" . $maquina_id . "'))) ";
        $query .= "OR Albaranescliente.pedidoscliente_id IN (SELECT p2.id FROM pedidosclientes p2 WHERE p2.presupuestoscliente_id IN (SELECT pre2.id FROM presupuestosclientes pre2 WHERE pre2.presupuestosproveedore_id IN(SELECT ppro.id FROM presupuestosproveedores ppro WHERE ppro.avisosrepuesto_id IN (SELECT avr2.id FROM avisosrepuestos avr2 WHERE avr2.maquina_id = '" . $maquina_id . "')))) ";
        $query .= ")";
        $albaranescliente = $this->Albaranescliente->query($query);
        return $albaranescliente;
    }

    function __get_albaranes_by_cliente($cliente_id, $fecha_inicio, $fecha_fin) {
        $query = "select * from albaranesclientes Albaranescliente where Albaranescliente.fecha BETWEEN '" . $fecha_inicio . "' AND '" . $fecha_fin . "' AND Albaranescliente.facturable=1 AND Albaranescliente.facturas_cliente_id IS NULL AND Albaranescliente.cliente_id='" . $cliente_id . "'";
        $albaranescliente = $this->Albaranescliente->query($query);
        return $albaranescliente;
    }

    function __trapaso_from_albaran_to_devolucion($data) {
        foreach ($data['Tareasalbaranescliente'] as $tareaspedidoscliente) {
            if ($tareaspedidoscliente['id'] != 0) {
                $this->Albaranescliente->Tareasalbaranescliente->create();
                $tareaspedidoscliente_modelo = $this->Albaranescliente->Tareasalbaranescliente->find('first', array('contain' => '', 'conditions' => array('Tareasalbaranescliente.id' => $tareaspedidoscliente['id'])));
                $tareasalbaranescliente['Tareasalbaranescliente'] = $tareaspedidoscliente_modelo['Tareasalbaranescliente'];
                unset($tareasalbaranescliente['Tareasalbaranescliente']['id']);
                $tareasalbaranescliente['Tareasalbaranescliente']['albaranescliente_id'] = $this->Albaranescliente->id;
                $tareasalbaranescliente['Tareasalbaranescliente']['materiales'] = 0;
                $tareasalbaranescliente['Tareasalbaranescliente']['mano_de_obra'] = 0;
                $tareasalbaranescliente['Tareasalbaranescliente']['servicios'] = 0;
                $this->Albaranescliente->Tareasalbaranescliente->save($tareasalbaranescliente);
                if (!empty($tareaspedidoscliente['MaterialesTareasalbaranescliente'])) {
                    foreach ($tareaspedidoscliente['MaterialesTareasalbaranescliente'] as $materiale) {
                        if ($materiale['id'] != 0) {
                            $this->Albaranescliente->Tareasalbaranescliente->MaterialesTareasalbaranescliente->create();
                            $materiale_modelo = $this->Albaranescliente->Tareasalbaranescliente->MaterialesTareasalbaranescliente->find('first', array('contain' => '', 'conditions' => array('MaterialesTareasalbaranescliente.id' => $materiale['id'])));
                            $materialesalbaranescliente['MaterialesTareasalbaranescliente'] = $materiale_modelo['MaterialesTareasalbaranescliente'];
                            unset($materialesalbaranescliente['MaterialesTareasalbaranescliente']['id']);
                            $materialesalbaranescliente['MaterialesTareasalbaranescliente']['cantidad'] = $materialesalbaranescliente['MaterialesTareasalbaranescliente']['cantidad'] * -1;
                            $materialesalbaranescliente['MaterialesTareasalbaranescliente']['importe'] = number_format($materialesalbaranescliente['MaterialesTareasalbaranescliente']['importe'] * -1, 5, '.', '');
                            $materialesalbaranescliente['MaterialesTareasalbaranescliente']['tareasalbaranescliente_id'] = $this->Albaranescliente->Tareasalbaranescliente->id;
                            $this->Albaranescliente->Tareasalbaranescliente->MaterialesTareasalbaranescliente->save($materialesalbaranescliente);
                        }
                    }
                }
                if (!empty($tareaspedidoscliente['ManodeobrasTareasalbaranescliente'])) {
                    foreach ($tareaspedidoscliente['ManodeobrasTareasalbaranescliente'] as $manodeobra) {
                        if ($manodeobra['id'] != 0) {
                            $this->Albaranescliente->Tareasalbaranescliente->ManodeobrasTareasalbaranescliente->create();
                            $manodeobra_modelo = $this->Albaranescliente->Tareasalbaranescliente->ManodeobrasTareasalbaranescliente->find('first', array('contain' => '', 'conditions' => array('ManodeobrasTareasalbaranescliente.id' => $manodeobra['id'])));
                            $manodeobraalbaranescliente['ManodeobrasTareasalbaranescliente'] = $manodeobra_modelo['ManodeobrasTareasalbaranescliente'];
                            $manodeobraalbaranescliente['ManodeobrasTareasalbaranescliente']['horas'] = $manodeobraalbaranescliente['ManodeobrasTareasalbaranescliente']['horas'] * -1;
                            $manodeobraalbaranescliente['ManodeobrasTareasalbaranescliente']['importe'] = number_format($manodeobraalbaranescliente['ManodeobrasTareasalbaranescliente']['importe'] * -1, 5, '.', '');
                            unset($manodeobraalbaranescliente['ManodeobrasTareasalbaranescliente']['id']);
                            $manodeobraalbaranescliente['ManodeobrasTareasalbaranescliente']['tareasalbaranescliente_id'] = $this->Albaranescliente->Tareasalbaranescliente->id;
                            $this->Albaranescliente->Tareasalbaranescliente->ManodeobrasTareasalbaranescliente->save($manodeobraalbaranescliente);
                        }
                    }
                }
                if (!empty($tareaspedidoscliente['TareasalbaranesclientesOtrosservicio'])) {
                    foreach ($tareaspedidoscliente['TareasalbaranesclientesOtrosservicio'] as $otrosservicio) {
                        if ($otrosservicio['id'] != 0) {
                            $this->Albaranescliente->Tareasalbaranescliente->TareasalbaranesclientesOtrosservicio->create();
                            $otrosservicio_modelo = $this->Albaranescliente->Tareasalbaranescliente->TareasalbaranesclientesOtrosservicio->find('first', array('contain' => '', 'conditions' => array('TareasalbaranesclientesOtrosservicio.id' => $otrosservicio['id'])));
                            $otrosserviciosalbaranescliente['TareasalbaranesclientesOtrosservicio'] = $otrosservicio_modelo['TareasalbaranesclientesOtrosservicio'];
                            unset($otrosserviciosalbaranescliente['TareasalbaranesclientesOtrosservicio']['id']);
                            //$otrosserviciosalbaranescliente['TareasalbaranesclientesOtrosservicio'] = $otrosserviciosalbaranescliente['TareasalbaranesclientesOtrosservicio'] * -1;
                            $otrosserviciosalbaranescliente['TareasalbaranesclientesOtrosservicio']['tareasalbaranescliente_id'] = $this->Albaranescliente->Tareasalbaranescliente->id;
                            $this->Albaranescliente->Tareasalbaranescliente->TareasalbaranesclientesOtrosservicio->save($otrosserviciosalbaranescliente);
                        }
                    }
                }
            }
        }
    }

}

?>