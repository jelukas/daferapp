<?php

class OrdenesController extends AppController {

    var $name = 'Ordenes';
    var $uses = array('Ordene', 'Avisostallere');
    var $helpers = array('Javascript', 'Time', 'Number');
    var $components = array('FileUpload');

    function beforeFilter() {
        parent::beforeFilter();
        if ($this->params['action'] == 'edit' || $this->params['action'] == 'add') {
            $this->FileUpload->fileModel = 'Ordene';
            $this->FileUpload->uploadDir = 'files/ordene';
            $this->FileUpload->fields = array('name' => 'file_name', 'type' => 'file_type', 'size' => 'file_size');
        }
    }

    function index() {
        $this->paginate = array('limit' => 20, 'contain' => array('Avisostallere', 'Estadosordene', 'Cliente', 'Maquina', 'Centrostrabajo'));
        $ordenes = $this->paginate();
        $this->set('ordenes', $ordenes);
    }

    function view($id = null) {
        if (!$id) {
            $this->flashWarnings(__('Orden Inválida', true));
            $this->redirect(array('action' => 'index'));
        }
        $orden = $this->Ordene->find('first', array(
            'contain' => array(
                'Comerciale',
                'Cliente',
                'Maquina',
                'Centrostrabajo',
                'Avisostallere' => 'Cliente',
                'Presupuestosproveedore' => array('Proveedore', 'Pedidosproveedore'),
                'Presupuestoscliente' => array('Cliente', 'Pedidoscliente'),
                'Albaranesclientesreparacione' => array('Cliente'),
                'Estadosordene',
                'Almacene',
                'Tarea' => array('ArticulosTarea' => 'Articulo', 'Parte' => array('Mecanico'), 'Partestallere' => array('Mecanico'))
            ),
            'conditions' => array(
                'Ordene.id' => $id)
                )
        );
        $baseimponible = $this->Ordene->get_baseimponible($id);
        $totalrepuestos = $this->Ordene->get_totalrepuestos($id);
        $totalmanoobra_servicios = $this->Ordene->get_totalmanoobra_servicios($id);
        $this->set('baseimponible', $baseimponible);
        $this->set('totalrepuestos', $totalrepuestos);
        $this->set('totalmanoobra_servicios', $totalmanoobra_servicios);
        $this->set('ordene', $orden);
        $avisostallere_id = $orden['Avisostallere']['id'];
        $this->set('avisostallere', $this->Ordene->Avisostallere->read(null, $avisostallere_id));
        $estadosordene_id = $orden['Estadosordene']['id'];
        $this->set('estadosordene', $this->Ordene->Estadosordene->read(null, $estadosordene_id));
        $this->set('comerciales', $this->Ordene->Comerciale->find('list'));
        $this->loadModel('Config');
        $this->set('config', $this->Config->read(null, 1));
    }

    function add($avisostallere_id = null) {
        if (!empty($this->data)) {
            $this->Ordene->create();
            $this->data['Ordene']['fecha'] = date('d-m-Y');
            if ($this->Ordene->save($this->data)) {
                $id = $this->Ordene->id;
                $this->Ordene->Avisostallere->id = $this->data['Ordene']['avisostallere_id'];
                $this->Ordene->Avisostallere->saveField('estadosavisostallere_id', 3);
                $this->Session->setFlash(__('La nueva orden de taller ha sido creada correctamente', true));
                $this->redirect(array('action' => 'view', $this->Ordene->id));
            } else {
                $this->flashWarnings(__('La orden de taller no ha podido ser creada correctamente. Vuelva a intentarlo', true));
            }
        }
        $avisotallere = $this->Avisostallere->find('first', array('contain' => array('Cliente', 'Maquina', 'Centrostrabajo', 'Ordene'), 'conditions' => array('Avisostallere.id' => $avisostallere_id)));
        if (!empty($avisotallere['Ordene'])) {
            $this->flashWarnings(__('Este Aviso ya tiene una Orden Creada', true));
            $this->redirect($this->referer());
        }
        $this->set('avisotallere', $avisotallere);
        $estadosordenes = $this->Ordene->Estadosordene->find('list');
        $almacenes = $this->Ordene->Almacene->find('list');
        $this->set('comerciales', $this->Ordene->Comerciale->find('list'));
        $numero = $this->Ordene->dime_siguiente_numero();
        $this->set(compact('estadosordenes', 'almacenes', 'numero'));
    }

    function edit($id = null) {
        if (!$id && empty($this->data)) {
            $this->flashWarnings(__('Orden Inválida', true));
            $this->redirect($this->referer());
        }
        if (!empty($this->data)) {
            if ($this->Ordene->save($this->data)) {
                $this->Session->setFlash(__('La Orden hasido guardada', true));
                $this->redirect(array('action' => 'view', $id));
            } else {
                $this->flashWarnings(__('The ordene could not be saved. Please, try again.', true));
            }
        }
        if (empty($this->data)) {
            $this->data = $this->Ordene->find('first', array('contain' => array('Avisostallere', 'Cliente', 'Maquina', 'Centrostrabajo', 'Presupuestosproveedore' => 'Proveedore', 'Presupuestoscliente' => 'Cliente', 'Estadosordene', 'Almacene', 'Tarea' => array('ArticulosTarea' => 'Articulo', 'Parte' => array('Mecanico'), 'Partestallere' => array('Mecanico'))), 'conditions' => array('Ordene.id' => $id)));
        }
        $this->set('comerciales', $this->Ordene->Comerciale->find('list'));
        $estadosordenes = $this->Ordene->Estadosordene->find('list');
        $this->set(compact('estadosordenes'));
    }

    function mapa() {
        //Estados de las ordenes a mostrar array("1", "2", "3")
        $ordenes = $this->Ordene->find('all', array('contain' => array('Avisostallere' => array('Cliente', 'Centrostrabajo', 'Maquina'), 'Almacene', 'Estadosordene'), 'conditions' => array('Ordene.estadosordene_id' => array("1", "2", "3", "5"))));
        $this->set('ordenes', $ordenes);
        $this->set(compact('ordenes'));
    }

    function pdf($id = null) {

        //Configure::write('debug',0);
        $this->Ordene->recursive = 2;
        $this->layout = 'pdf';
        $orden = $this->Ordene->read(null, $id);
        //pr($orden);die();
        $this->set('orden', $orden);
        $this->render();
    }

    function imputar($pedidoscliente_id = null) {
        if (!empty($this->data)) {
            /* Aqui imputamos lo que hemos marcado */
            if (!empty($this->data['Ordene']['id'])) {
                if ($this->Ordene->save($this->data)) {
                    $ordene_id = $this->Ordene->id;
                    /* Imputamos el material a la orden */
                    foreach ($this->data['Tareaspedidoscliente'] as $tareapedido) {
                        if ($tareapedido['id'] != 0) {
                            $this->Ordene->Tarea->create();
                            $tareapedido_modelo = $this->Ordene->Presupuestoscliente->Pedidoscliente->Tareaspedidoscliente->find('first', array('contain' => 'TareaspedidosclientesOtrosservicio', 'conditions' => array('Tareaspedidoscliente.id' => $tareapedido['id'])));
                            $tarea['Tarea'] = array();
                            $tarea['Tarea']['ordene_id'] = $ordene_id;
                            $tarea['Tarea']['descripcion'] = $tareapedido_modelo['Tareaspedidoscliente']['asunto'];
                            $tarea['Tarea']['tipo'] = $tareapedido_modelo['Tareaspedidoscliente']['tipo'];
                            $tarea['Tarea']['total_materiales_presupuestado'] = $tareapedido_modelo['Tareaspedidoscliente']['materiales'];
                            $tarea['Tarea']['total_manoobra_presupuestada'] = $tareapedido_modelo['Tareaspedidoscliente']['mano_de_obra'];
                            if (!empty($tareapedido_modelo['TareaspedidosclientesOtrosservicio'])) {
                                $tarea['Tarea']['total_dietas_presupuestada'] = $tareapedido_modelo['TareaspedidosclientesOtrosservicio']['dietas'];
                                $tarea['Tarea']['total_desplazamiento_presupuestado'] = $tareapedido_modelo['TareaspedidosclientesOtrosservicio']['total_desplazamiento'];
                                $tarea['Tarea']['total_varios_presupuestado'] = $tareapedido_modelo['TareaspedidosclientesOtrosservicio']['varios'];
                            }
                            $this->Ordene->Tarea->save($tarea);
                            if (!empty($tareapedido['MaterialesTareaspedidoscliente'])) {
                                foreach ($tareapedido['MaterialesTareaspedidoscliente'] as $materiale) {
                                    if ($materiale['id'] != 0) {
                                        $this->Ordene->Tarea->ArticulosTarea->create();
                                        $materiale_modelo = $this->Ordene->Presupuestoscliente->Pedidoscliente->Tareaspedidoscliente->MaterialesTareaspedidoscliente->find('first', array('contain' => '', 'conditions' => array('MaterialesTareaspedidoscliente.id' => $materiale['id'])));
                                        $articulos_tarea['ArticulosTarea'] = array();
                                        $articulos_tarea['ArticulosTarea']['tarea_id'] = $this->Ordene->Tarea->id;
                                        $articulos_tarea['ArticulosTarea']['articulo_id'] = $materiale_modelo['MaterialesTareaspedidoscliente']['articulo_id'];
                                        $articulos_tarea['ArticulosTarea']['cantidad'] = $materiale_modelo['MaterialesTareaspedidoscliente']['cantidad'];
                                        $articulos_tarea['ArticulosTarea']['presupuestado'] = $materiale_modelo['MaterialesTareaspedidoscliente']['importe'];
                                        $articulos_tarea['ArticulosTarea']['cantidad_presupuestada'] = $materiale_modelo['MaterialesTareaspedidoscliente']['cantidad'];
                                        $articulos_tarea['ArticulosTarea']['descuento'] = $materiale_modelo['MaterialesTareaspedidoscliente']['descuento'];
                                        $articulos_tarea['ArticulosTarea']['precio_unidad'] = $materiale_modelo['MaterialesTareaspedidoscliente']['precio_unidad'];
                                        $this->Ordene->Tarea->ArticulosTarea->save($articulos_tarea);
                                        die(pr($this->Ordene->Tarea->ArticulosTarea->invalidFields()));
                                    }
                                }
                            }
                        }
                    }
                    /* Fin de la Imputacion */
                    $this->Session->setFlash(__('Se ha imputado material a la Orden', true));
                    $this->redirect(array('action' => 'view', $ordene_id));
                } else {
                    $this->flashWarnings(__('The ordene could not be saved. Please, try again.', true));
                    $this->redirect($this->referer());
                }
            } elseif (!empty($this->data['Ordene']['avisostallere_id'])) {
                /* Se va ha convertir el aviso a orden imputandole los materiales */
                $this->Ordene->create();
                if ($this->Ordene->save($this->data)) {
                    $this->Ordene->Avisostallere->id = $this->data['Ordene']['avisostallere_id'];
                    $this->Ordene->Avisostallere->saveField('estadosavisostallere_id', 3);
                    $ordene_id = $this->Ordene->id;
                    /* Imputamos el material a la orden */
                    foreach ($this->data['Tareaspedidoscliente'] as $tareapedido) {
                        if ($tareapedido['id'] != 0) {
                            $this->Ordene->Tarea->create();
                            $tareapedido_modelo = $this->Ordene->Presupuestoscliente->Pedidoscliente->Tareaspedidoscliente->find('first', array('contain' => 'TareaspedidosclientesOtrosservicio', 'conditions' => array('Tareaspedidoscliente.id' => $tareapedido['id'])));
                            $tarea['Tarea'] = array();
                            $tarea['Tarea']['ordene_id'] = $ordene_id;
                            $tarea['Tarea']['descripcion'] = $tareapedido_modelo['Tareaspedidoscliente']['asunto'];
                            $tarea['Tarea']['tipo'] = $tareapedido_modelo['Tareaspedidoscliente']['tipo'];
                            $tarea['Tarea']['total_materiales_presupuestado'] = $tareapedido_modelo['Tareaspedidoscliente']['materiales'];
                            $tarea['Tarea']['total_manoobra_presupuestada'] = $tareapedido_modelo['Tareaspedidoscliente']['mano_de_obra'];
                            if (!empty($tareapedido_modelo['TareaspedidosclientesOtrosservicio'])) {
                                $tarea['Tarea']['total_dietas_presupuestada'] = $tareapedido_modelo['TareaspedidosclientesOtrosservicio']['dietas'];
                                $tarea['Tarea']['total_desplazamiento_presupuestado'] = $tareapedido_modelo['TareaspedidosclientesOtrosservicio']['total_desplazamiento'];
                                $tarea['Tarea']['total_varios_presupuestado'] = $tareapedido_modelo['TareaspedidosclientesOtrosservicio']['varios'];
                            }
                            $this->Ordene->Tarea->save($tarea);
                            if (!empty($tareapedido['MaterialesTareaspedidoscliente'])) {
                                foreach ($tareapedido['MaterialesTareaspedidoscliente'] as $materiale) {
                                    if ($materiale['id'] != 0) {
                                        $this->Ordene->Tarea->ArticulosTarea->create();
                                        $materiale_modelo = $this->Ordene->Presupuestoscliente->Pedidoscliente->Tareaspedidoscliente->MaterialesTareaspedidoscliente->find('first', array('contain' => '', 'conditions' => array('MaterialesTareaspedidoscliente.id' => $materiale['id'])));
                                        $articulos_tarea['ArticulosTarea'] = array();
                                        $articulos_tarea['ArticulosTarea']['tarea_id'] = $this->Ordene->Tarea->id;
                                        $articulos_tarea['ArticulosTarea']['articulo_id'] = $materiale_modelo['MaterialesTareaspedidoscliente']['articulo_id'];
                                        $articulos_tarea['ArticulosTarea']['cantidad'] = $materiale_modelo['MaterialesTareaspedidoscliente']['cantidad'];
                                        $articulos_tarea['ArticulosTarea']['presupuestado'] = $materiale_modelo['MaterialesTareaspedidoscliente']['importe'];
                                        $articulos_tarea['ArticulosTarea']['cantidad_presupuestada'] = $materiale_modelo['MaterialesTareaspedidoscliente']['cantidad'];
                                        $articulos_tarea['ArticulosTarea']['descuento'] = $materiale_modelo['MaterialesTareaspedidoscliente']['descuento'];
                                        if(!$this->Ordene->Tarea->ArticulosTarea->save($articulos_tarea)){
                                            $flash_message .= $this->Ordene->Tarea->ArticulosTarea->session_message.'<br/>';
                                            $this->Ordene->Tarea->ArticulosTarea->session_message = null;
                                        }
                                    }
                                }
                            }
                        }
                    }
                    $this->Session->setFlash('Imputacion a la Orden realizada <br/>'.$flash_message,true);
                    /* Fin de la Imputacion */
                } else {
                    $this->flashWarnings(__('The ordene could not be saved. Please, try again.' . pr($this->Orden->invalidFields()), true));
                    $this->redirect($this->referer());
                }
            }
            $this->redirect(array('action' => 'view', $ordene_id));
        }

        $pedidoscliente = $this->Ordene->Presupuestoscliente->Pedidoscliente->find('first', array('contain' => array('Presupuestoscliente' => array('Cliente', 'Centrostrabajo', 'Maquina', 'Avisostallere'), 'Tareaspedidoscliente' => array('MaterialesTareaspedidoscliente' => 'Articulo', 'ManodeobrasTareaspedidoscliente', 'TareaspedidosclientesOtrosservicio')), 'conditions' => array('Pedidoscliente.id' => $pedidoscliente_id)));
        if (!empty($pedidoscliente['Presupuestoscliente']['ordene_id'])) {
            // echo 'Imputamos las nuevas tareas que hemos selecionado a la orden';
            $ordene_id = $pedidoscliente['Presupuestoscliente']['ordene_id'];
        } elseif (!empty($pedidoscliente['Presupuestoscliente']['avisostallere_id'])) {
            $avisostallere = $pedidoscliente['Presupuestoscliente']['Avisostallere'];
            $almacene_id = $pedidoscliente['Presupuestoscliente']['almacene_id'];
            //echo 'Crear Orden NUEVA con las tareas que hemos selecionado';
        } elseif (!empty($pedidoscliente['Presupuestoscliente']['presupuestosproveedore_id'])) {
            $presupuestosproveedore = $this->Ordene->Presupuestoscliente->Presupuestosproveedore->find('first', array('contain' => 'Avisostallere', 'conditions' => array('Presupuestosproveedore.id' => $pedidoscliente['Presupuestoscliente']['presupuestosproveedore_id'])));
            if (!empty($presupuestosproveedore['Presupuestosproveedore']['avisostallere_id'])) {
                // echo 'Si viene el  presupuesto de proveedor de un Aviso de tallere';
                $avisostallere = $presupuestosproveedore['Avisostallere'];
                $almacene_id = $presupuestosproveedore['Presupuestosproveedore']['almacene_id'];
            } elseif (!empty($presupuestosproveedore['Presupuestosproveedore']['ordene_id'])) {
                // echo 'Si viene de Una orden el PResupuestos de Proveedore ';
                $ordene_id = $presupuestosproveedore['Presupuestosproveedore']['ordene_id'];
            }
        }
        $this->set(compact('pedidoscliente', 'avisostallere', 'ordene_id', 'almacene_id'));
    }

    function imputar_albaranproveedor($albaranesproveedore_id = null) {
        if (!empty($this->data)) {
            foreach ($this->data['ArticulosAlbaranesproveedore'] as $articulos_albaranesproveedore) {
                $this->Ordene->Tarea->ArticulosTarea->create();
                $articulos_albaranesproveedore_modelo = $this->Ordene->Presupuestosproveedore->Pedidosproveedore->Albaranesproveedore->ArticulosAlbaranesproveedore->find('first', array('contain' => '', 'conditions' => array('ArticulosAlbaranesproveedore.id' => $articulos_albaranesproveedore['id'])));
                $articulos_tarea['ArticulosTarea']['articulo_id'] = $articulos_albaranesproveedore_modelo['ArticulosAlbaranesproveedore']['articulo_id'];
                $articulos_tarea['ArticulosTarea']['tarea_id'] = $articulos_albaranesproveedore_modelo['ArticulosAlbaranesproveedore']['tarea_id'];
                $articulos_tarea['ArticulosTarea']['cantidadreal'] = $articulos_albaranesproveedore_modelo['ArticulosAlbaranesproveedore']['cantidad'];
                $articulos_tarea['ArticulosTarea']['cantidad'] = $articulos_albaranesproveedore_modelo['ArticulosAlbaranesproveedore']['cantidad'];
                $this->Ordene->Tarea->ArticulosTarea->save($articulos_tarea);
            }
            $this->redirect(array('action' => 'view', $this->data['Ordene']['id']));
        } else {
            $albaranesproveedore = $this->Ordene->Presupuestosproveedore->Pedidosproveedore->Albaranesproveedore->find('first', array('contain' => array('Pedidosproveedore' => 'Presupuestosproveedore', 'ArticulosAlbaranesproveedore' => array('Articulo', 'Tarea')), 'conditions' => array('Albaranesproveedore.id' => $albaranesproveedore_id)));
            $ordene = $this->Ordene->find('first', array('contain' => '', 'conditions' => array('Ordene.id' => $albaranesproveedore['Pedidosproveedore']['Presupuestosproveedore']['ordene_id'])));
        }
        $this->set(compact('ordene', 'albaranesproveedore'));
    }

    function cambiar_estado($ordene_id, $estadosordene_id) {
        $this->Ordene->id = $ordene_id;
        $estadosordene = $this->Ordene->Estadosordene->find('first', array('contain' => '', 'conditions' => array('Estadosordene.id' => $estadosordene_id)));
        if ($this->Ordene->saveField('estadosordene_id', $estadosordene_id))
            $this->Session->setFlash(__('Se ha cambiado el estado de la Orden correctamente: ' . $estadosordene['Estadosordene']['estado'], true));
        else
            $this->flashWarnings(__('No Se ha podido cambiar el estado de la Orden', true));
        $this->redirect($this->referer());
    }

    function search() {
        //die(pr($this->data));
        /* Con esto buscamos por cliente ID *//*
          $contain = array('Avisostallere' => 'Cliente');
          $conditions = array(
          'Ordene.id >' => 8000,
          '1' => '1 AND Ordene.avisostallere_id IN (SELECT Avisostallere.id FROM avisostalleres Avisostallere WHERE Avisostallere.cliente_id = 1 )'
          );
          $ordenes = $this->Ordene->find('all',array('contain'=>$contain,'conditions' => $conditions)); */
        /* Fin de con esto buscamos por cliente ID */

        /* Con esto buscamos por articulos Usados */
        /*  $contain = array('Tarea' => array('ArticulosTarea' => 'Articulo'));
          $conditions = array(
          'Ordene.id >' => 8000,
          '1' => '1 AND Ordene.id IN (SELECT Tarea.ordene_id FROM tareas Tarea WHERE Tarea.id IN (SELECT ArticulosTarea.tarea_id FROM articulos_tareas ArticulosTarea WHERE ArticulosTarea.articulo_id = 35649))'
          );
          $ordenes = $this->Ordene->find('all', array('contain' => $contain, 'conditions' => $conditions)); */
        /* Fin de Con esto buscamos por articulos Usados */

        /* Busqueda prueba */
        $contain = array('Estadosordene', 'Avisostallere' => array('Cliente', 'Centrostrabajo', 'Maquina'));
        $conditions = array();
        if (!empty($this->params['url']['numero']))
            $conditions [] = array('Ordene.numero' => $this->params['url']['numero']);
        if (!empty($this->params['named']['numero']))
            $conditions [] = array('Ordene.numero' => $this->params['named']['numero']);
        if (!empty($this->params['url']['cliente_id']))
            $conditions [] = array('1' => '1 AND Ordene.avisostallere_id IN (SELECT Avisostallere.id FROM avisostalleres Avisostallere WHERE Avisostallere.cliente_id = ' . $this->params['url']['cliente_id'] . ' )');
        if (!empty($this->params['named']['cliente_id']))
            $conditions [] = array('1' => '1 AND Ordene.avisostallere_id IN (SELECT Avisostallere.id FROM avisostalleres Avisostallere WHERE Avisostallere.cliente_id = ' . $this->params['named']['cliente_id'] . ' )');
        if (!empty($this->params['url']['articulo_id']))
            $conditions [] = array('1' => '1 AND Ordene.id IN (SELECT Tarea.ordene_id FROM tareas Tarea WHERE Tarea.id IN (SELECT ArticulosTarea.tarea_id FROM articulos_tareas ArticulosTarea WHERE ArticulosTarea.articulo_id = ' . $this->params['url']['articulo_id'] . '))');
        if (!empty($this->params['named']['articulo_id']))
            $conditions [] = array('1' => '1 AND Ordene.id IN (SELECT Tarea.ordene_id FROM tareas Tarea WHERE Tarea.id IN (SELECT ArticulosTarea.tarea_id FROM articulos_tareas ArticulosTarea WHERE ArticulosTarea.articulo_id = ' . $this->params['named']['articulo_id'] . '))');
        $this->paginate = array('limit' => 20, 'contain' => $contain, 'conditions' => $conditions, 'url' => $this->params['pass']);
        $ordenes = $this->paginate();
        /* Fin de Busqueda Prueba */
        $clientes = $this->Ordene->Avisostallere->Cliente->find('list');
        $this->set(compact('ordenes', 'clientes'));
    }

    function delete($id = null) {
        if (!$id) {
            $this->flashWarnings(__('ID no válido', true));
            $this->redirect(array('action' => 'index'));
        }
        if ($this->Ordene->delete($id)) {
            $this->Session->setFlash(__('Orden eliminada correctamente', true));
            $this->redirect(array('action' => 'index'));
        }
        $this->flashWarnings(__('Orden No eliminada: Es posible que haya documentos que dependan de ella', true));
        $this->redirect($this->referer());
    }

}

?>
