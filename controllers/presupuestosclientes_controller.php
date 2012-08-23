<?php

class PresupuestosclientesController extends AppController {

    var $name = 'Presupuestosclientes';
    var $helpers = array('Ajax', 'Js', 'Autocomplete', 'Time');

    function index() {
        $this->Presupuestoscliente->recursive = 0;
        $this->set('presupuestosclientes', $this->paginate());
    }

    function view($id = null) {
        if (!$id) {
            $this->flashWarnings(__('Presupuestos Cliente Inválido', true));
            $this->redirect(array('action' => 'index'));
        }
        $presupuestoscliente = $this->Presupuestoscliente->find(
                'first', array(
            'contain' => array(
                'Estadospresupuestoscliente',
                'Maquina',
                'Centrostrabajo',
                'Mensajesinformativo',
                'Almacene',
                'Cliente',
                'Comerciale',
                'Pedidoscliente',
                'Tiposiva',
                'Avisosrepuesto' => array('Cliente', 'Centrostrabajo', 'Maquina'),
                'Presupuestosproveedore' => array('Proveedore', 'Avisostallere' => 'Cliente', 'Avisosrepuesto' => 'Cliente'),
                'Avisostallere' => array('Cliente', 'Centrostrabajo', 'Maquina'),
                'Ordene' => array('Avisostallere' => array('Cliente', 'Centrostrabajo', 'Maquina')),
                'Tareaspresupuestocliente' => array(
                    'TareaspresupuestoclientesOtrosservicio',
                    'Materiale' => array('Articulo'),
                    'Manodeobra'
                )
            ),
            'conditions' => array('Presupuestoscliente.id' => $id)));
        $totalmanoobrayservicios = 0;
        $totalrepuestos = 0;
        foreach ($presupuestoscliente['Tareaspresupuestocliente'] as $tarea) {
            $totalmanoobrayservicios += $tarea['mano_de_obra'] + $tarea['servicios'];
            $totalrepuestos += $tarea['materiales'];
        }
        $this->set('presupuestoscliente', $presupuestoscliente);
        $this->set('totalrepuestos', $totalrepuestos);
        $this->set('totalmanoobrayservicios', $totalmanoobrayservicios);
    }

    function add($vienede = null, $iddedondeviene = null, $cliente_id = null) {
        if (!empty($this->data)) {
            $this->Presupuestoscliente->create();
            if (!empty($this->data['Articulosparamantenimiento'])) {
                //Si viene el presupuesto desde una maquina para encargar los repuestos necesarios para el mantenimiento
                $presupuestoscliente = array();
                $presupuestoscliente['Presupuestoscliente']['cliente_id'] = $this->data['Presupuestoscliente']['cliente_id'];
                $presupuestoscliente['Presupuestoscliente']['centrostrabajo_id'] = $this->data['Presupuestoscliente']['centrostrabajo_id'];
                $presupuestoscliente['Presupuestoscliente']['maquina_id'] = $this->data['Presupuestoscliente']['maquina_id'];
                $presupuestoscliente['Presupuestoscliente']['precio_mat'] = 0;
                $presupuestoscliente['Presupuestoscliente']['precio_obra'] = 0;
                $presupuestoscliente['Presupuestoscliente']['precio'] = 0;
                $presupuestoscliente['Presupuestoscliente']['impuestos'] = 0;
                $presupuestoscliente['Presupuestoscliente']['fecha'] = date('Y-m-d');
            } else {
                $presupuestoscliente = $this->data;
            }

            if ($this->Presupuestoscliente->save($presupuestoscliente)) {
                $this->Session->setFlash(__('El Presupuestoscliente ha sido guardado', true));
                /* Comenzamos con el paso de las relaciones */
                if (!empty($this->data['Presupuestoscliente']['avisosrepuesto_id'])) {
                    $articulos_avisosrepuesto = $this->Presupuestoscliente->Avisosrepuesto->ArticulosAvisosrepuesto->find('all', array('contain' => 'Articulo', 'conditions' => array('ArticulosAvisosrepuesto.avisosrepuesto_id' => $this->data['Presupuestoscliente']['avisosrepuesto_id'])));
                    $tarea = array();
                    $tarea['Tareaspresupuestocliente']['asunto'] = 'Presupuesto Material';
                    $tarea['Tareaspresupuestocliente']['presupuestoscliente_id'] = $this->Presupuestoscliente->id;
                    $this->Presupuestoscliente->Tareaspresupuestocliente->create();
                    $this->Presupuestoscliente->Tareaspresupuestocliente->save($tarea);
                    $materiale = array();
                    $i = 0;
                    foreach ($articulos_avisosrepuesto as $articulo_avisosrepuesto) {
                        $materiale['Materiale'][$i]['articulo_id'] = $articulo_avisosrepuesto['ArticulosAvisosrepuesto']['articulo_id'];
                        $materiale['Materiale'][$i]['cantidad'] = $articulo_avisosrepuesto['ArticulosAvisosrepuesto']['cantidad'];
                        $materiale['Materiale'][$i]['precio_unidad'] = $articulo_avisosrepuesto['Articulo']['precio_sin_iva'];
                        $materiale['Materiale'][$i]['importe'] = number_format($materiale['Materiale'][$i]['precio_unidad'] * $materiale['Materiale'][$i]['cantidad'], 5, '.', '');
                        $materiale['Materiale'][$i]['descuento'] = 0;
                        $materiale['Materiale'][$i]['tareaspresupuestocliente_id'] = $this->Presupuestoscliente->Tareaspresupuestocliente->id;
                        $i++;
                    }
                    $this->Presupuestoscliente->Tareaspresupuestocliente->Materiale->saveAll($materiale['Materiale']);
                } elseif (!empty($this->data['Presupuestoscliente']['avisostallere_id'])) {
                    $avisostallere = $this->Presupuestoscliente->Avisostallere->find('first', array('contain' => '', 'conditions' => array('Avisostallere.id' => $this->data['Presupuestoscliente']['avisostallere_id'])));
                    $tarea = array();
                    $tarea['Tareaspresupuestocliente']['asunto'] = $avisostallere['Avisostallere']['descripcion'];
                    $tarea['Tareaspresupuestocliente']['presupuestoscliente_id'] = $this->Presupuestoscliente->id;
                    $this->Presupuestoscliente->Tareaspresupuestocliente->create();
                    $this->Presupuestoscliente->Tareaspresupuestocliente->save($tarea);
                } elseif (!empty($this->data['Presupuestoscliente']['ordene_id'])) {
                    $ordene = $this->Presupuestoscliente->Ordene->find('first', array('contain' => array('Avisostallere', 'Tarea' => array('ArticulosTarea' => 'Articulo')), 'conditions' => array('Ordene.id' => $this->data['Presupuestoscliente']['ordene_id'])));
                    foreach ($ordene['Tarea'] as $tarea_ordene) {
                        $tarea = array();
                        $tarea['Tareaspresupuestocliente']['asunto'] = $tarea_ordene['descripcion'];
                        $tarea['Tareaspresupuestocliente']['tipo'] = $tarea_ordene['tipo'];
                        $tarea['Tareaspresupuestocliente']['presupuestoscliente_id'] = $this->Presupuestoscliente->id;
                        $this->Presupuestoscliente->Tareaspresupuestocliente->create();
                        $this->Presupuestoscliente->Tareaspresupuestocliente->save($tarea);
                        $materiale = array();
                        $i = 0;
                        if (!empty($tarea_ordene['ArticulosTarea'])) {
                            foreach ($tarea_ordene['ArticulosTarea'] as $articulo_tarea) {
                                $materiale['Materiale'][$i]['articulo_id'] = $articulo_tarea['articulo_id'];
                                $materiale['Materiale'][$i]['cantidad'] = $articulo_tarea['cantidad'];
                                $materiale['Materiale'][$i]['precio_unidad'] = $articulo_tarea['Articulo']['precio_sin_iva'];
                                $materiale['Materiale'][$i]['importe'] = number_format($materiale['Materiale'][$i]['precio_unidad'] * $materiale['Materiale'][$i]['cantidad'], 5, '.', '');
                                $materiale['Materiale'][$i]['descuento'] = 0;
                                $materiale['Materiale'][$i]['tareaspresupuestocliente_id'] = $this->Presupuestoscliente->Tareaspresupuestocliente->id;
                                $i++;
                            }
                            $this->Presupuestoscliente->Tareaspresupuestocliente->Materiale->saveAll($materiale['Materiale']);
                        }
                    }
                } elseif (!empty($this->data['Presupuestoscliente']['presupuestosproveedore_id'])) {
                    $articulos_presupuestoproveedore = $this->Presupuestoscliente->Presupuestosproveedore->ArticulosPresupuestosproveedore->find('all', array('contain' => 'Articulo', 'conditions' => array('ArticulosPresupuestosproveedore.presupuestosproveedore_id' => $this->data['Presupuestoscliente']['presupuestosproveedore_id'])));
                    $tarea = array();
                    $tarea['Tareaspresupuestocliente']['asunto'] = 'Presupuesto Material';
                    $tarea['Tareaspresupuestocliente']['presupuestoscliente_id'] = $this->Presupuestoscliente->id;
                    $this->Presupuestoscliente->Tareaspresupuestocliente->create();
                    $this->Presupuestoscliente->Tareaspresupuestocliente->save($tarea);
                    $materiale = array();
                    $i = 0;
                    foreach ($articulos_presupuestoproveedore as $articulo_presupuestoproveedore) {
                        $materiale['Materiale'][$i]['articulo_id'] = $articulo_presupuestoproveedore['ArticulosPresupuestosproveedore']['articulo_id'];
                        $materiale['Materiale'][$i]['cantidad'] = $articulo_presupuestoproveedore['ArticulosPresupuestosproveedore']['cantidad'];
                        $materiale['Materiale'][$i]['precio_unidad'] = $articulo_presupuestoproveedore['Articulo']['precio_sin_iva'];
                        $materiale['Materiale'][$i]['importe'] = number_format($materiale['Materiale'][$i]['precio_unidad'] * $materiale['Materiale'][$i]['cantidad'], 5, '.', '');
                        $materiale['Materiale'][$i]['descuento'] = 0;
                        $materiale['Materiale'][$i]['tareaspresupuestocliente_id'] = $this->Presupuestoscliente->Tareaspresupuestocliente->id;
                        $i++;
                    }
                    $this->Presupuestoscliente->Tareaspresupuestocliente->Materiale->saveAll($materiale['Materiale']);
                } elseif (!empty($this->data['Articulosparamantenimiento'])) {
                    $tarea = array();
                    $tarea['Tareaspresupuestocliente']['asunto'] = 'Presupuesto Material';
                    $tarea['Tareaspresupuestocliente']['presupuestoscliente_id'] = $this->Presupuestoscliente->id;
                    $this->Presupuestoscliente->Tareaspresupuestocliente->create();
                    $this->Presupuestoscliente->Tareaspresupuestocliente->save($tarea);
                    $materiale = array();
                    $i = 0;
                    foreach ($this->data['Articulosparamantenimiento'] as $articulosparamantenimiento) {
                        $articulosparamantenimiento = $this->Presupuestoscliente->Cliente->Maquina->Articulosparamantenimiento->find('first', array('contain' => array('Articulo'),
                            'conditions' => array('Articulosparamantenimiento.id' => $articulosparamantenimiento['id'])));
                        $materiale['Materiale'][$i]['articulo_id'] = $articulosparamantenimiento['Articulosparamantenimiento']['articulo_id'];
                        $materiale['Materiale'][$i]['cantidad'] = $articulosparamantenimiento['Articulosparamantenimiento']['cantidad'];
                        $materiale['Materiale'][$i]['precio_unidad'] = $articulosparamantenimiento['Articulo']['precio_sin_iva'];
                        $materiale['Materiale'][$i]['importe'] = number_format($materiale['Materiale'][$i]['precio_unidad'] * $materiale['Materiale'][$i]['cantidad'], 5, '.', '');
                        $materiale['Materiale'][$i]['descuento'] = 0;
                        $materiale['Materiale'][$i]['tareaspresupuestocliente_id'] = $this->Presupuestoscliente->Tareaspresupuestocliente->id;
                        $i++;
                    }
                    $this->Presupuestoscliente->Tareaspresupuestocliente->Materiale->saveAll($materiale['Materiale']);
                }
                /* Finalizamos con el paso de las relaciones */
                $this->redirect(array('action' => 'view', $this->Presupuestoscliente->id));
            } else {
                $this->Session->setFlash(__('El Presupuestoscliente no ha podido ser guardado. Por favor, inténtelo de nuevo', true));
            }
        }
        $estadospresupuestosclientes = $this->Presupuestoscliente->Estadospresupuestoscliente->find('list');
        $comerciales = $this->Presupuestoscliente->Comerciale->find('list');
        $tiposivas = $this->Presupuestoscliente->Tiposiva->find('list');
        $almacenes = $this->Presupuestoscliente->Almacene->find('list');
        $mensajesinformativos = $this->Presupuestoscliente->Mensajesinformativo->find('list');
        $numero = $this->Presupuestoscliente->dime_siguiente_numero();
        $this->set(compact('estadospresupuestosclientes', 'comerciales', 'tiposivas', 'almacenes', 'numero', 'mensajesinformativos'));
        switch ($vienede) {
            case 'avisosrepuesto':
                $avisosrepuesto = $this->Presupuestoscliente->Avisosrepuesto->find('first', array('contain' => array('Almacene', 'Cliente', 'Centrostrabajo', 'Maquina'), 'conditions' => array('Avisosrepuesto.id' => $iddedondeviene)));
                $this->set(compact('avisosrepuesto'));
                $this->render('add_from_avisosrepuesto');
                break;
            case 'avisostallere':
                $avisostallere = $this->Presupuestoscliente->Avisostallere->find('first', array('contain' => array('Cliente', 'Centrostrabajo', 'Maquina'), 'conditions' => array('Avisostallere.id' => $iddedondeviene)));
                $this->set(compact('avisostallere'));
                $this->render('add_from_avisostallere');
                break;
            case 'ordene':
                $ordene = $this->Presupuestoscliente->Ordene->find('first', array('contain' => array('Almacene', 'Avisostallere' => array('Cliente', 'Centrostrabajo', 'Maquina')), 'conditions' => array('Ordene.id' => $iddedondeviene)));
                $this->set(compact('ordene'));
                $this->render('add_from_ordene');
                break;
            case 'presupuestosproveedore':
                $presupuestosproveedore = $this->Presupuestoscliente->Presupuestosproveedore->find('first', array('contain' => array('Almacene', 'Avisostallere' => array('Centrostrabajo', 'Maquina'), 'Avisosrepuesto' => array('Centrostrabajo', 'Maquina'), 'Ordene' => array('Avisostallere' => array('Centrostrabajo', 'Maquina'))), 'conditions' => array('Presupuestosproveedore.id' => $iddedondeviene)));
                $cliente = $this->Presupuestoscliente->Cliente->find('first', array('contain' => '', 'conditions' => array('Cliente.id' => $cliente_id)));
                $this->set(compact('presupuestosproveedore', 'cliente'));
                $this->render('add_from_presupuestosproveedore');
                break;
            default:
                $clientes = $this->Presupuestoscliente->Cliente->find('list');
                break;
        }
    }

    function edit($id = null) {
        if (!$id && empty($this->data)) {
            $this->Session->setFlash(__('Invalid presupuestoscliente', true));
            $this->redirect(array('action' => 'index'));
        }
        if (!empty($this->data)) {
            if ($this->Presupuestoscliente->save($this->data)) {
                $this->Session->setFlash(__('The presupuestoscliente has been saved', true));
                $this->redirect(array('action' => 'view', $id));
            } else {
                $this->Session->setFlash(__('The presupuestoscliente could not be saved. Please, try again.', true));
            }
        }
        if (empty($this->data)) {
            $this->data = $this->Presupuestoscliente->read(null, $id);
        }
        $estadospresupuestosclientes = $this->Presupuestoscliente->Estadospresupuestoscliente->find('list');
        $tiposivas = $this->Presupuestoscliente->Tiposiva->find('list');
        $comerciales = $this->Presupuestoscliente->Comerciale->find('list');
        $almacenes = $this->Presupuestoscliente->Almacene->find('list');
        $avisosrepuestos = $this->Presupuestoscliente->Avisosrepuesto->find('list');
        $ordenes = $this->Presupuestoscliente->Ordene->find('list');
        $avisostalleres = $this->Presupuestoscliente->Avisostallere->find('list');
        $mensajesinformativos = $this->Presupuestoscliente->Mensajesinformativo->find('list');
        $this->set(compact('estadospresupuestosclientes', 'mensajesinformativos', 'almacenes', 'comerciales', 'avisosrepuestos', 'ordenes', 'avisostalleres', 'tiposivas'));
    }

    function delete($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Invalid id for presupuestoscliente', true));
            $this->redirect(array('action' => 'index'));
        }
        if ($this->Presupuestoscliente->delete($id)) {
            $this->Session->setFlash(__('Presupuestoscliente deleted', true));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Presupuestoscliente was not deleted', true));
        $this->redirect(array('action' => 'index'));
    }

    function reogranizardatos() {
        $presupuestosclientes = $this->Presupuestoscliente->find('list');
        die(pr($presupuestosclientes));
        foreach ($presupuestosclientes as $id => $fecha) {
            $presupuestoscliente_modelo = $this->Presupuestoscliente->find('first', array(
                'contain' => array(
                    'Avisosrepuesto' => array('Cliente', 'Centrostrabajo', 'Maquina'),
                    'Avisostallere' => array('Cliente', 'Centrostrabajo', 'Maquina'),
                    'Ordene' => array('Avisostallere' => array('Cliente', 'Centrostrabajo', 'Maquina')),
                ),
                'conditions' => array('Presupuestoscliente.id' => $id)));
            $this->Presupuestoscliente->id = $presupuestoscliente_modelo['Presupuestoscliente']['id'];
            if (!empty($presupuestoscliente_modelo['Avisosrepuesto'])) {
                $presupuestoscliente_modelo['Presupuestoscliente']['cliente_id'] = $presupuestoscliente_modelo['Avisosrepuesto']['cliente_id'];
            }
            if (!empty($presupuestoscliente_modelo['Ordene'])) {
                $presupuestoscliente_modelo['Presupuestoscliente']['cliente_id'] = $presupuestoscliente_modelo['Ordene']['Avisostallere']['cliente_id'];
            }
            if (!empty($presupuestoscliente_modelo['Avisostallere'])) {
                $presupuestoscliente_modelo['Presupuestoscliente']['cliente_id'] = $presupuestoscliente_modelo['Avisostallere']['cliente_id'];
            }
            $this->Presupuestoscliente->save($presupuestoscliente_modelo['Presupuestoscliente']);
        }
    }

}

?>