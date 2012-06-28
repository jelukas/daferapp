<?php

class PresupuestosproveedoresController extends AppController {

    var $name = 'Presupuestosproveedores';
    var $helpers = array('Ajax', 'Js', 'Autocomplete');
    var $components = array('FileUpload', 'RequestHandler');

    function beforeFilter() {
        parent::beforeFilter();
        $this->FileUpload->fileModel = 'Presupuestosproveedore';
        if ($this->params['action'] == 'edit' || $this->params['action'] == 'add') {
            $this->FileUpload->fileModel = 'Presupuestosproveedore';
            $this->FileUpload->uploadDir = 'files/presupuestosproveedore';
            $this->FileUpload->fields = array('name' => 'file_name', 'type' => 'file_type', 'size' => 'file_size');
        }
        if ($this->params['action'] == 'index') {
            $this->__list();
        }
    }

    function index() {

        $conditions = array();
        if (!empty($this->params['url']['proveedore_id'])) {
            $conditions['Presupuestosproveedore.proveedore_id ='] = $this->params['url']['proveedore_id'];
        }
        if (!empty($this->params['url']['almacene_id'])) {
            $conditions['Presupuestosproveedore.almacene_id ='] = $this->params['url']['almacene_id'];
        }
        if (!empty($this->params['url']['observaciones'])) {
            $conditions['Presupuestosproveedore.observaciones LIKE'] = '%' . $this->params['url']['observaciones'] . '%';
        }
        if (!empty($this->params['url']['confirmado'])) {
            $conditions['Presupuestosproveedore.confirmado ='] = $this->params['url']['confirmado'];
        }
        if (!empty($this->params['url']['day_fechaplazo_f']) && !empty($this->params['url']['month_fechaplazo_f']) && !empty($this->params['url']['year_fechaplazo_f'])) {
            $conditions['Presupuestosproveedore.fechaplazo >='] = $this->params['url']['year_fechaplazo_f'] . '-' . $this->params['url']['month_fechaplazo_f'] . '-' . $this->params['url']['day_fechaplazo_f'];
        }
        if (!empty($this->params['url']['day_fechaplazo_t']) && !empty($this->params['url']['month_fechaplazo_t']) && !empty($this->params['url']['year_fechaplazo_t'])) {
            $conditions['Presupuestosproveedore.fechaplazo <='] = $this->params['url']['year_fechaplazo_t'] . '-' . $this->params['url']['month_fechaplazo_t'] . '-' . $this->params['url']['day_fechaplazo_t'];
        }

        $presupuestosproveedores = $this->paginate('Presupuestosproveedore', $conditions);
        $this->paginate = array('conditions' => $conditions, 'limit' => 20, 'contain' => array('Ordene' => array('Avisostallere' => array('Cliente', 'Centrostrabajo', 'Maquina')), 'Avisostallere' => array('Cliente', 'Centrostrabajo', 'Maquina'), 'Avisosrepuesto' => array('Cliente', 'Centrostrabajo', 'Maquina'), 'ArticulosPresupuestosproveedore' => 'Articulo', 'Proveedore', 'Almacene'));
        $this->set('presupuestosproveedores', $presupuestosproveedores);

        if (!empty($this->params['url']['pdf'])) {
            $this->layout = 'pdf';
            $this->render('/presupuestosproveedores/pdfFilter');
        }
    }

    function view($id = null) {
        if (!$id) {
            $this->flashWarnings(__('Invalid presupuestosproveedore', true));
            $this->redirect(array('action' => 'index'));
        }
        $this->set('presupuestosproveedore', $this->Presupuestosproveedore->find(
                        'first', array('contain' =>
                    array('Pedidosproveedore',
                        'Pedidoscliente',
                        'Ordene' => array('Avisostallere' => array('Cliente', 'Centrostrabajo', 'Maquina')),
                        'Avisostallere' => array('Cliente', 'Centrostrabajo', 'Maquina', 'Estadosavisostallere'),
                        'Avisosrepuesto' => array('Cliente', 'Centrostrabajo', 'Maquina', 'Estadosaviso'),
                        'ArticulosPresupuestosproveedore' => 'Articulo', 'Proveedore', 'Almacene'),
                    'conditions' => array('Presupuestosproveedore.id' => $id))));
        $this->set('articulos_presupuestosproveedore', $this->Presupuestosproveedore->ArticulosPresupuestosproveedore->find('all', array('contain' => array('Articulo'), 'conditions' => array('ArticulosPresupuestosproveedore.presupuestosproveedore_id' => $id))));
    }

    function add($avisorepuestos_id = null, $avisostallere_id = null, $ordene_id = null) {
        if (!empty($this->data) && !isset($this->data['articulos_validados'])) {
            $this->Presupuestosproveedore->create();
            if ($this->Presupuestosproveedore->save($this->data)) {
                $id = $this->Presupuestosproveedore->id;
                /* Guarda fichero */
                if ($this->FileUpload->finalFile != null) {
                    $this->Presupuestosproveedore->saveField('presupuestoescaneado', $this->FileUpload->finalFile);
                }
                /* FIn Guardar Fichero */
                if (!empty($this->data['Presupuestosproveedore']['avisosrepuesto_id'])) {
                    /* Convertimos los articulos del aviso de repuesto a articulos para pedir a proveedor */
                    $articulos_avisosrepuesto = $this->Presupuestosproveedore->Avisosrepuesto->ArticulosAvisosrepuesto->findAllByAvisosrepuestoId($this->data['Presupuestosproveedore']['avisosrepuesto_id']);
                    $data = array();
                    foreach ($articulos_avisosrepuesto as $articulo_avisosrepuesto) {
                        $articulo_proveedore = array();
                        $articulo_proveedore['ArticulosPresupuestosproveedore']['articulo_id'] = $articulo_avisosrepuesto['ArticulosAvisosrepuesto']['articulo_id'];
                        $articulo_proveedore['ArticulosPresupuestosproveedore']['presupuestosproveedore_id'] = $id;
                        $articulo_proveedore['ArticulosPresupuestosproveedore']['cantidad'] = $articulo_avisosrepuesto['ArticulosAvisosrepuesto']['cantidad'];
                        $data[] = $articulo_proveedore;
                    }
                    $this->Presupuestosproveedore->ArticulosPresupuestosproveedore->saveAll($data);
                    /* Fin conversion */
                } elseif (!empty($this->data['Presupuestosproveedore']['ordene_id'])) {
                    $this->Presupuestosproveedore->Ordene->updateAll(array('Ordene.estadosordene_id' => 1), array('Ordene.id' => $this->data['Presupuestosproveedore']['ordene_id']));
                } elseif (!empty($this->data['Albaranesproveedore']['albaranesproveedore_id'])) {
                    /* Convertimos los Articulos que vienen de albaran marcados para devolucion */
                    $articulos_albaranesproveedore = $this->Presupuestosproveedore->Pedidosproveedore->Albaranesproveedore->ArticulosAlbaranesproveedore->findAllByAlbaranesproveedoreId($this->data['Albaranesproveedore']['albaranesproveedore_id']);
                    $articulos_presupuestosproveedore = array();
                    foreach ($articulos_albaranesproveedore as $articulo_albaranesproveedore) {
                        if ($articulo_albaranesproveedore['ArticulosAlbaranesproveedore']['marcado'] != 0) {
                            $articulo_proveedore = array();
                            $articulo_pedido = $this->Presupuestosproveedore->Pedidosproveedore->ArticulosPresupuestosproveedorePedidosproveedore->findById($articulo_albaranesproveedore['ArticulosAlbaranesproveedore']['articulos_presupuestosproveedore_pedidosproveedore_id']);
                            $articulo_presupuesto = $this->Presupuestosproveedore->ArticulosPresupuestosproveedore->findById($articulo_pedido['ArticulosPresupuestosproveedorePedidosproveedore']['articulos_presupuestosproveedore_id']);
                            $articulo_proveedore['ArticulosPresupuestosproveedore']['articulo_id'] = $articulo_presupuesto['ArticulosPresupuestosproveedore']['articulo_id'];
                            $articulo_proveedore['ArticulosPresupuestosproveedore']['presupuestosproveedore_id'] = $id;
                            $articulo_proveedore['ArticulosPresupuestosproveedore']['cantidad'] = 0 - $articulo_presupuesto['ArticulosPresupuestosproveedore']['cantidad'];
                            $articulos_presupuestosproveedore[] = $articulo_proveedore;
                        }
                    }
                    $this->Presupuestosproveedore->ArticulosPresupuestosproveedore->saveAll($articulos_presupuestosproveedore);
                    /* Fin conversion */
                } elseif (!empty($this->data['paraalmacen'])) {
                    /* Convertimos los articulos del aviso de repuesto a articulos para pedir a proveedor */
                    $articulos = $this->Presupuestosproveedore->ArticulosPresupuestosproveedore->Articulo->find('all', array('conditions' => array('Articulo.id' => $this->data['articulos'])));
                    $data = array();
                    foreach ($articulos as $articulo) {
                        $articulo_proveedore = array();
                        $articulo_proveedore['ArticulosPresupuestosproveedore']['articulo_id'] = $articulo['Articulo']['id'];
                        $articulo_proveedore['ArticulosPresupuestosproveedore']['presupuestosproveedore_id'] = $id;
                        $articulo_proveedore['ArticulosPresupuestosproveedore']['cantidad'] = $articulo['Articulo']['stock_maximo'] - $articulo['Articulo']['existencias'];
                        $data[] = $articulo_proveedore;
                    }
                    $this->Presupuestosproveedore->ArticulosPresupuestosproveedore->saveAll($data);
                    /* Fin conversion */
                }
                $this->Session->setFlash(__('El presupuesto de proveedor ha sido guardado correctamente', true));
                $this->redirect(array('action' => 'view', $this->Presupuestosproveedore->id));
            } else {
                $this->flashWarnings(__('El presupuesto de proveedor no ha podido ser guardado. Por favor, intentalo de nuevo.', true));
                $this->redirect($this->referer());
            }
        }

        $proveedores = $this->Presupuestosproveedore->Proveedore->find('list');
        $almacenes = $this->Presupuestosproveedore->Almacene->find('list');
        $numero = $this->Presupuestosproveedore->dime_siguiente_numero();
        $this->set(compact('proveedores', 'almacenes', 'ordene_id', 'numero'));
        if ($avisorepuestos_id == null && $avisostallere_id == null && $ordene_id == null) {
            if (empty($this->data['articulos_validados'])) {
                $this->render('add_directo');
            } else {
                $articulos = $this->Presupuestosproveedore->ArticulosPresupuestosproveedore->Articulo->find('all', array('conditions' => array('Articulo.id' => $this->data['articulos_validados'])));
                $this->set(compact('articulos'));
                $this->render('add_almacen');
            }
        } elseif ($avisorepuestos_id == 'devolucion' && !empty($avisostallere_id)) {
            $albaranesproveedore_id = $avisostallere_id; //Albaran del que vienen las devoluciones
            $this->set('albaranesproveedore_id', $albaranesproveedore_id);
            $this->render('add_devolucion');
        } else {
            if ($avisorepuestos_id != null && $avisorepuestos_id >= 0) {
                $avisorepuesto = $this->Presupuestosproveedore->Avisosrepuesto->read(null, $avisorepuestos_id);
                $this->set('avisorepuesto', $avisorepuesto);
            } elseif ($avisostallere_id != null && $avisostallere_id >= 0) {
                $avisotaller = $this->Presupuestosproveedore->Avisostallere->read(null, $avisostallere_id);
                $this->set('avisotaller', $avisotaller);
            } elseif ($ordene_id != null && $ordene_id >= 0) {
                $ordene = $this->Presupuestosproveedore->Ordene->find('first', array('contain' => array('Avisostallere' => array('Cliente', 'Centrostrabajo', 'Maquina')), 'conditions' => array('Ordene.id' => $ordene_id)));
                $this->set('ordene', $ordene);
            }
        }
    }

    function edit($id = null) {
        if (!$id && empty($this->data)) {
            $this->flashWarnings(__('Invalid presupuestosproveedore', true));
            $this->redirect($this->referer());
        }
        if (!empty($this->data)) {
            if ($this->Presupuestosproveedore->saveAll($this->data)) {
                $id = $this->Presupuestosproveedore->id;
                $upload = $this->Presupuestosproveedore->findById($id);
                if (!empty($this->data['Presupuestosproveedore']['remove_file'])) {
                    $this->FileUpload->RemoveFile($upload['Presupuestosproveedore']['presupuestoescaneado']);
                    $this->Presupuestosproveedore->saveField('presupuestoescaneado', null);
                }
                if ($this->FileUpload->finalFile != null) {
                    $this->FileUpload->RemoveFile($upload['Presupuestosproveedore']['presupuestoescaneado']);
                    $this->Presupuestosproveedore->saveField('presupuestoescaneado', $this->FileUpload->finalFile);
                }
                $this->Session->setFlash(__('El presupuesto de proveedor ha sido guardado correctamente', true));
                $this->redirect($this->referer());
            } else {
                $this->flashWarnings(__('El presupuesto de proveedor no ha podido ser guardado. Por favor, intentalo de nuevo.', true));
            }
        }
        if (empty($this->data)) {
            $this->Presupuestosproveedore->recursive = 2;
            $this->data = $this->Presupuestosproveedore->read(null, $id);
        }
        $this->Presupuestosproveedore->ArticulosPresupuestosproveedore->recursive = 2;
        $this->set('articulos_presupuestosproveedore', $this->Presupuestosproveedore->ArticulosPresupuestosproveedore->findAllByPresupuestosproveedoreId($id));
        $proveedores = $this->Presupuestosproveedore->Proveedore->find('list');
        $almacenes = $this->Presupuestosproveedore->Almacene->find('list');
        $this->set(compact('proveedores', 'almacenes'));
        if (empty($this->data['Presupuestosproveedore']['avisostallere_id']) && empty($this->data['Presupuestosproveedore']['avisosrepuesto_id']) && empty($this->data['Presupuestosproveedore']['ordene_id'])) {
            $this->render('edit_directo');
        }
    }

    function delete($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Id invalida del presupuesto de Proveedor', true));
            $this->redirect(array('action' => 'index'));
        }
        $upload = $this->Presupuestosproveedore->findById($id);
        $this->FileUpload->RemoveFile($upload['Presupuestosproveedore']['presupuestoescaneado']);
        if ($this->Presupuestosproveedore->delete($id)) {
            $this->Session->setFlash(__('Presupuessto de Proveedor borrado correctamente', true));
            $this->redirect(array('action' => 'index'));
        }
        $this->flashWarnings(__('No se pudo borrar el presupuesto de Proveedor', true));
        $this->redirect($this->referer());
    }

    function pdf($id = null) {
        if ($id != null) {
            //Configure::write('debug',0);
            $this->Presupuestosproveedore->recursive = 2;
            $this->layout = 'pdf';
            $presupuesto = $this->Presupuestosproveedore->read(null, $id);
            //pr($presupuesto);die();
            $this->set('presupuesto', $presupuesto);
            if ($presupuesto['Avisostallere']['id'] != null) {
                $this->Presupuestosproveedore->Ordene->recursive = 2;
                $orden = $this->Presupuestosproveedore->Ordene->read(null, $presupuesto['Ordene']['id']);
                $this->set('orden', $orden);
                $this->Presupuestosproveedore->Ordene->Tarea->recursive = 2;
                $tareas = $this->Presupuestosproveedore->Ordene->Tarea->findAllByOrdene_id($orden['Ordene']['id']);
                //pr($tareas);die();
                $this->set('tareas', $tareas);
                $this->set('cliente', $orden['Avisostallere']['Cliente']);
                $centrotrabajo = $orden['Avisostallere']['Centrostrabajo'];
                $this->set('centrotrabajo', $centrotrabajo);
                //pr($tareas);die();
                $this->render('/presupuestosproveedores/pdfAvisostalleres');
            } elseif ($presupuesto['Avisosrepuesto']['id'] != null) {
                $this->render('/presupuestosproveedores/pdfAvisosrepuestos');
            }
        }
    }

    private function __list() {
        $proveedores = $this->Presupuestosproveedore->Proveedore->find('list');
        $almacenes = $this->Presupuestosproveedore->Almacene->find('list');
        $this->set(compact('proveedores', 'almacenes'));
    }

}

?>