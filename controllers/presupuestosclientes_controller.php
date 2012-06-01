<?php

class PresupuestosclientesController extends AppController {

    var $name = 'Presupuestosclientes';
    var $helpers = array('Ajax', 'Js', 'Autocomplete');

    function index() {
        $this->Presupuestoscliente->recursive = 0;
        $this->set('presupuestosclientes', $this->paginate());
    }

    function view($id = null) {
        if (!$id) {
            $this->flashWarnings(__('Presupuestos Cliente Inválido', true));
            $this->redirect(array('action' => 'index'));
        }
        $presupuestoscliente = $this->Presupuestoscliente->find('first', array('contain' => array('Almacene','Cliente', 'Comerciale', 'Pedidoscliente', 'Tiposiva', 'Avisosrepuesto', 'Presupuestosproveedore', 'Avisostallere', 'Ordene', 'Tareaspresupuestocliente' => array('TareaspresupuestoclientesOtrosservicio', 'Materiale' => array('Articulo'), 'Manodeobra')), 'conditions' => array('Presupuestoscliente.id' => $id)));
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
            if ($this->Presupuestoscliente->save($this->data)) {
                $this->Session->setFlash(__('El Presupuestoscliente ha sido guardado', true));
                /* Comenzamos con el paso de las relaciones */
                if (!empty($this->data['Presupuestoscliente']['avisosrepuesto_id'])) {
                    $articulos_avisosrepuesto = $this->Presupuestoscliente->Avisosrepuesto->ArticulosAvisosrepuesto->find('all', array('contain' => 'Articulo', 'conditions' => array('ArticulosAvisosrepuesto.avisosrepuesto_id' => $this->data['Presupuestoscliente']['avisosrepuesto_id'])));
                    $tarea = array();
                    $tarea['Tareaspresupuestocliente']['asunto'] = 'Presupuesto Material';
                    $tarea['Tareaspresupuestocliente']['presupuestoscliente_id'] = $this->Presupuestoscliente->id;
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
                    $this->Presupuestoscliente->Tareaspresupuestocliente->save($tarea);
                } elseif (!empty($this->data['Presupuestoscliente']['ordene_id'])) {
                    $ordene = $this->Presupuestoscliente->Ordene->find('first', array('contain' => array('Avisostallere', 'Tarea' => array('ArticulosTarea' => 'Articulo')), 'conditions' => array('Ordene.id' => $this->data['Presupuestoscliente']['ordene_id'])));
                    foreach ($ordene['Tarea'] as $tarea_ordene) {
                        $tarea = array();
                        $tarea['Tareaspresupuestocliente']['asunto'] = $tarea_ordene['descripcion'];
                        $tarea['Tareaspresupuestocliente']['presupuestoscliente_id'] = $this->Presupuestoscliente->id;
                        $this->Presupuestoscliente->Tareaspresupuestocliente->save($tarea);
                        $materiale = array();
                        $i = 0;
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
                } elseif (!empty($this->data['Presupuestoscliente']['presupuestosproveedore_id'])) {
                    $articulos_presupuestoproveedore = $this->Presupuestoscliente->Presupuestosproveedore->ArticulosPresupuestosproveedore->find('all', array('contain' => 'Articulo', 'conditions' => array('ArticulosPresupuestosproveedore.presupuestosproveedore_id' => $this->data['Presupuestoscliente']['presupuestosproveedore_id'])));
                    $tarea = array();
                    $tarea['Tareaspresupuestocliente']['asunto'] = 'Presupuesto Material';
                    $tarea['Tareaspresupuestocliente']['presupuestoscliente_id'] = $this->Presupuestoscliente->id;
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
                }
                /* Finalizamos con el paso de las relaciones */
                $this->redirect(array('action' => 'view', $this->Presupuestoscliente->id));
            } else {
                $this->Session->setFlash(__('El Presupuestoscliente no ha podido ser guardado. Por favor, inténtelo de nuevo', true));
            }
        }
        $comerciales = $this->Presupuestoscliente->Comerciale->find('list');
        $tiposivas = $this->Presupuestoscliente->Tiposiva->find('list');
        $this->set(compact('comerciales', 'tiposivas'));
        switch ($vienede) {
            case 'avisosrepuesto':
                $avisosrepuesto = $this->Presupuestoscliente->Avisosrepuesto->find('first', array('contain' => array('Almacene','Cliente'), 'conditions' => array('Avisosrepuesto.id' => $iddedondeviene)));
                $this->set(compact('avisosrepuesto'));
                $this->render('add_from_avisosrepuesto');
                break;
            case 'avisostallere':
                $almacenes = $this->Presupuestoscliente->Almacene->find('list');
                $avisostallere = $this->Presupuestoscliente->Avisostallere->findById($iddedondeviene);
                $this->set(compact('avisostallere','almacenes'));
                $this->render('add_from_avisostallere');
                break;
            case 'ordene':
                $ordene = $this->Presupuestoscliente->Ordene->find('first', array('contain' => array('Almacene','Avisostallere' => 'Cliente'), 'conditions' => array('Ordene.id' => $iddedondeviene)));
                $this->set(compact('ordene'));
                $this->render('add_from_ordene');
                break;
            case 'presupuestosproveedore':
                $presupuestosproveedore = $this->Presupuestoscliente->Presupuestosproveedore->find('first', array('contain' => 'Almacene', 'conditions' => array('Presupuestosproveedore.id' => $iddedondeviene)));
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
        $tiposivas = $this->Presupuestoscliente->Tiposiva->find('list');
        $comerciales = $this->Presupuestoscliente->Comerciale->find('list');
        $almacenes = $this->Presupuestoscliente->Almacene->find('list');
        $avisosrepuestos = $this->Presupuestoscliente->Avisosrepuesto->find('list');
        $ordenes = $this->Presupuestoscliente->Ordene->find('list');
        $avisostalleres = $this->Presupuestoscliente->Avisostallere->find('list');
        $this->set(compact('almacenes','comerciales', 'avisosrepuestos', 'ordenes', 'avisostalleres', 'tiposivas'));
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

}

?>