<?php

class FacturasproveedoresController extends AppController {

    var $name = 'Facturasproveedores';
    var $components = array('FileUpload');

    function beforeFilter() {
        parent::beforeFilter();
        //defaults to 'files', will be webroot/files, make sure webroot/files exists and is chmod 777 
        $this->FileUpload->fileModel = 'Facturasproveedore';
        $this->FileUpload->uploadDir = 'files';
        $this->FileUpload->fields = array('name' => 'file_name', 'type' => 'file_type', 'size' => 'file_size');
        if ($this->params['action'] == 'index') {
            $this->__list();
        }
    }

    function index() {
        $this->Facturasproveedore->recursive = 0;

        $conditions = array();
        if (!empty($this->params['url']['day_factura_f']) && !empty($this->params['url']['month_factura_f']) && !empty($this->params['url']['year_factura_f'])) {
            $conditions['Facturasproveedore.fechafactura >='] = $this->params['url']['year_factura_f'] . '-' . $this->params['url']['month_factura_f'] . '-' . $this->params['url']['day_factura_f'];
        }
        if (!empty($this->params['url']['day_factura_t']) && !empty($this->params['url']['month_factura_t']) && !empty($this->params['url']['year_factura_t'])) {
            $conditions['Facturasproveedore.fechafactura <='] = $this->params['url']['year_factura_t'] . '-' . $this->params['url']['month_factura_t'] . '-' . $this->params['url']['day_factura_t'];
        }

        if (!empty($this->params['url']['tiposiva_id'])) {
            $conditions['Facturasproveedore.tiposiva_id ='] = $this->params['url']['tiposiva_id'];
        }
        if (!empty($this->params['url']['day_limite_f']) && !empty($this->params['url']['month_limite_f']) && !empty($this->params['url']['year_limite_f'])) {
            $conditions['Facturasproveedore.fechalimitepago >='] = $this->params['url']['year_limite_f'] . '-' . $this->params['url']['month_limite_f'] . '-' . $this->params['url']['day_limite_f'];
        }
        if (!empty($this->params['url']['day_limite_t']) && !empty($this->params['url']['month_limite_t']) && !empty($this->params['url']['year_limite_t'])) {
            $conditions['Facturasproveedore.fechalimitepago <='] = $this->params['url']['year_limite_t'] . '-' . $this->params['url']['month_limite_t'] . '-' . $this->params['url']['day_limite_t'];
        }

        if (!empty($this->params['url']['day_fechapagada_f']) && !empty($this->params['url']['month_fechapagada_f']) && !empty($this->params['url']['year_fechapagada_f'])) {
            $conditions['Facturasproveedore.fechapagada >='] = $this->params['url']['year_fechapagada_f'] . '-' . $this->params['url']['month_fechapagada_f'] . '-' . $this->params['url']['day_fechapagada_f'];
        }
        if (!empty($this->params['url']['day_fechapagada_t']) && !empty($this->params['url']['month_fechapagada_t']) && !empty($this->params['url']['year_fechapagada_t'])) {
            $conditions['Facturasproveedore.fechapagada <='] = $this->params['url']['year_fechapagada_t'] . '-' . $this->params['url']['month_fechapagada_t'] . '-' . $this->params['url']['day_fechapagada_t'];
        }

        $facturasproveedores = $this->paginate('Facturasproveedore', $conditions);
        $this->set('facturasproveedores', $facturasproveedores);
        if (!empty($this->params['url']['pdf'])) {
            $this->layout = 'pdf';
            $this->render('/facturasproveedores/pdfFilter');
        }
    }

    function view($id = null) {
        if (!$id) {
            $this->flashWarnings(__('Factura de Proveedor No Existe', true));
            $this->redirect($this->redirect());
        }

        $facturasproveedore = $this->Facturasproveedore->read(null, $id);
        $articulos_facturasproveedore = $this->Facturasproveedore->ArticulosFacturasproveedore->findAllByFacturasproveedoreId($id);
        $pedidosproveedore = $this->Facturasproveedore->Albaranesproveedore->Pedidosproveedore->findById($facturasproveedore['Albaranesproveedore']['pedidosproveedore_id']);
        $presupuestosproveedore = $this->Facturasproveedore->Albaranesproveedore->Pedidosproveedore->Presupuestosproveedore->findById($pedidosproveedore['Pedidosproveedore']['presupuestosproveedore_id']);

        $this->set('facturasproveedore', $facturasproveedore);
        $this->set('pedidosproveedore', $pedidosproveedore);
        $this->set('presupuestosproveedore', $presupuestosproveedore);
        $this->set('articulos_facturasproveedore', $articulos_facturasproveedore);
    }

    function add($albaranesproveedore_id = null) {

        $this->Facturasproveedore->recursive = 2;
        if (!empty($this->data)) {
            $albaranesproveedore_id = $this->data['Facturasproveedore']['albaranesproveedore_id'];
            $this->Facturasproveedore->create();
            if ($this->Facturasproveedore->save($this->data)) {
                $id = $this->Facturasproveedore->id;
                $this->Facturasproveedore->saveField('facturaescaneada', $this->FileUpload->finalFile);
                // START validacion de articulosalabranes a articulosfactura
                $data = array();
                foreach ($this->data['ArticulosAlbaranesproveedore'] as $articulo_albaranesproveedore) {
                    if ($articulo_albaranesproveedore['id'] != 0) {
                        $this->Facturasproveedore->Albaranesproveedore->ArticulosAlbaranesproveedore->recursive = -1;
                        $articulo_albaranesproveedore = $this->Facturasproveedore->Albaranesproveedore->ArticulosAlbaranesproveedore->find('first', array('conditions' => array('ArticulosAlbaranesproveedore.id' => $articulo_albaranesproveedore['id'])));
                        $articulo_facturasproveedore = array();
                        $articulo_facturasproveedore['ArticulosFacturasproveedore']['facturasproveedore_id'] = $id;
                        $articulo_facturasproveedore['ArticulosFacturasproveedore']['articulo_id'] = $articulo_albaranesproveedore['ArticulosAlbaranesproveedore']['articulo_id'];
                        $articulo_facturasproveedore['ArticulosFacturasproveedore']['cantidad'] = $articulo_albaranesproveedore['ArticulosAlbaranesproveedore']['cantidad'];
                        $articulo_facturasproveedore['ArticulosFacturasproveedore']['precio_proveedor'] = $articulo_albaranesproveedore['ArticulosAlbaranesproveedore']['precio_proveedor'];
                        $articulo_facturasproveedore['ArticulosFacturasproveedore']['descuento'] = $articulo_albaranesproveedore['ArticulosAlbaranesproveedore']['descuento'];
                        $articulo_facturasproveedore['ArticulosFacturasproveedore']['neto'] = $articulo_albaranesproveedore['ArticulosAlbaranesproveedore']['neto'];
                        $articulo_facturasproveedore['ArticulosFacturasproveedore']['total'] = $articulo_albaranesproveedore['ArticulosAlbaranesproveedore']['total'];
                        $data[] = $articulo_facturasproveedore;
                    }
                }
                $this->Facturasproveedore->ArticulosFacturasproveedore->saveAll($data);
                // Fin de la validacion de ArticulosAlbaranesProveedore a ArticulosFacturasproveedore
                $this->Session->setFlash(__('La Factura de Proveedor ha sido guardada correctamente', true));
                $this->redirect(array('action' => 'view', $this->Facturasproveedore->id));
            } else {
                $this->flashWarnings(__('La Factura de Proveedor no ha podido ser guardada. Prueba de nuevo.', true));
            }
        }
        $albaranesproveedore = $this->Facturasproveedore->Albaranesproveedore->find('first', array('contain' => array('ArticulosAlbaranesproveedore' => 'Articulo'), 'conditions' => array('Albaranesproveedore.id' => $albaranesproveedore_id)));
        $tiposivas = $this->Facturasproveedore->Tiposiva->find('list');
        $this->set(compact('tiposivas', 'albaranesproveedore_id', 'albaranesproveedore'));
    }

    function edit($id = null) {
        if (!$id && empty($this->data)) {
            $this->flashWarnings(__('Factura de Proveedor Inválida', true));
            $this->redirect(array('action' => 'index'));
        }
        if (!empty($this->data)) {
            if ($this->Facturasproveedore->save($this->data)) {
                if ($this->FileUpload->finalFile != null) {
                    $id = $this->Facturasproveedore->id;
                    $upload = $this->Facturasproveedore->findById($id);
                    $this->FileUpload->RemoveFile($upload['Facturasproveedore']['facturaescaneada']);
                    $this->Facturasproveedore->saveField('facturaescaneada', $this->FileUpload->finalFile);
                }
                $this->Session->setFlash(__('La Factura de Proveedor ha sido guardada correctamente', true));
                $this->redirect(array('action' => 'view', $id));
            } else {
                $this->flashWarnings(__('La Factura de Proveedor No ha podido ser guardada.', true));
            }
        }
        if (empty($this->data)) {
            $this->data = $this->Facturasproveedore->read(null, $id);
        }
        $this->Facturasproveedore->ArticulosFacturasproveedore->recursive = 4;
        $tiposivas = $this->Facturasproveedore->Tiposiva->find('list');
        $articulos_facturasproveedore = $this->Facturasproveedore->ArticulosFacturasproveedore->findAllByFacturasproveedoreId($id);
        $this->set('articulos_facturasproveedore', $articulos_facturasproveedore);
        $this->set(compact('tiposivas'));
    }

    function delete($id = null) {
        if (!$id) {
            $this->flashWarnings(__('Id invalida de Factura de Proveedor', true));
            $this->redirect($this->referer());
        }
        $id = $this->Facturasproveedore->id;
        $upload = $this->Facturasproveedore->findById($id);
        $this->FileUpload->RemoveFile($upload['Facturasproveedore']['facturaescaneada']);
        if ($this->Facturasproveedore->delete($id)) {
            $this->Session->setFlash(__('Facturasproveedore deleted', true));
            $this->redirect(array('controller' => 'facturasproveedores', 'action' => 'index'));
        }
        $this->flashWarnings(__('Facturasproveedore was not deleted', true));
        $this->redirect($this->referer());
    }

    function pdf($id = null) {
        if ($id != null) {
            /* Cargar modelos */
            $this->Facturasproveedore->recursive = 0;
            $this->loadModel('Albaranesproveedore');
            $this->Albaranesproveedore->recursive = 0;
            $this->loadModel('ArticulosAvisosrepuesto');
            $this->ArticulosAvisosrepuesto->recursive = 0;
            $this->loadModel('Articulo');
            $this->Articulo->recursive = 0;
            $this->loadModel('Avisosrepuesto');
            $this->Avisosrepuesto->recursive = 0;
            $this->loadModel('Avisostallere');
            $this->Avisostallere->recursive = 0;
            $this->loadModel('Ordene');
            $this->Ordene->recursive = 0;
            $this->loadModel('Tarea');
            $this->Tarea->recursive = -1;
            $this->loadModel('Parte');
            $this->Parte->recursive = -1;
            $this->loadModel('Partestallere');
            $this->Partestallere->recursive = -1;
            $this->loadModel('ArticulosParte');
            $this->ArticulosParte->recursive = 0;
            $this->loadModel('ArticulosPartestallere');
            $this->ArticulosPartestallere->recursive = -1;
            $this->loadModel('Articulo');
            $this->Articulo->recursive = -1;
            /* Fin cargar modelos */
            $factura = $this->Facturasproveedore->findById($id);
            $albaranes = $this->Albaranesproveedore->findAllByFacturasproveedoreId($id);
            foreach ($albaranes as $key_alabaran => $albaran) {
                $albaran_proveedor = $this->Albaranesproveedore->findById($albaran['Albaranesproveedore']['id']);
                $albaranes[$key_alabaran]['DetalleAlbaran'] = $albaran_proveedor['Albaranesproveedore'];
                /* ¿Albaran de Aviso de taller o de Repuestos? */
                if (!empty($albaran_proveedor['Albaranesproveedore']['avisosrepuesto_id'])) {
                    /*
                     * Albaran de Aviso de Repuesto 
                     */
                    //Repuestos
                    $repuestos = $this->ArticulosAvisosrepuesto->findAllByAvisosrepuestoId($albaran_proveedor['Albaranesproveedore']['avisosrepuesto_id']);
                    foreach ($repuestos as $key_repuestos => $repuesto) {
                        $articulo = $this->Articulo->findById($repuesto['ArticulosAvisosrepuesto']['articulo_id']);
                        $repuestos[$key_repuestos]['DetalleArticulo'] = $articulo['Articulo'];
                    }
                    $albaranes[$key_alabaran]['AvisoRepuesto']['Repuestos'] = $repuestos;
                    //Aviso de Repuestos
                    $aviso_repuesto = $this->Avisosrepuesto->findById($albaran_proveedor['Albaranesproveedore']['avisosrepuesto_id']);
                } elseif (!empty($albaran_proveedor['Albaranesproveedore']['avisostallere_id'])) {
                    /*
                     *  Alabran de Avisos de Taller 
                     */

                    //Primero cojemos el aviso
                    $aviso_de_taller = $this->Avisostallere->findById($albaran_proveedor['Albaranesproveedore']['avisostallere_id']);
                    //despues cojemos la orden del aviso
                    $orden_aviso_taller = $this->Ordene->findByAvisostallereId($aviso_de_taller['Avisostallere']['id']);
                    // y ahora cojemos las tareas de la orden
                    $tareas = $this->Tarea->findAllByOrdeneId($orden_aviso_taller['Ordene']['id']);
                    $albaranes[$key_alabaran]['AvisoTaller'] = $tareas;
                    //Ahora por cada tarea cojemos y les ponemos los partes y partes de talleres
                    foreach ($albaranes[$key_alabaran]['AvisoTaller'] as $key_tarea => $tarea) {
                        $partes_tallere = $this->Partestallere->findAllByTareaId($tarea['Tarea']['id']);
                        $partes_centros = $this->Parte->findAllByTareaId($tarea['Tarea']['id']);
                        $albaranes[$key_alabaran]['AvisoTaller'][$key_tarea]['PartesTallere'] = $partes_tallere;
                        $albaranes[$key_alabaran]['AvisoTaller'][$key_tarea]['PartesCentros'] = $partes_centros;
                        //Ahora sacamos los articulos asociados a cada tipo de parte:
                        // 1º Articulos de Parte de Taller
                        foreach ($albaranes[$key_alabaran]['AvisoTaller'][$key_tarea]['PartesTallere'] as $key_parte_taller => $parte_taller) {
                            $articulos = $this->ArticulosPartestallere->findAllByPartestallereId($parte_taller['Partestallere']['id']);
                            $albaranes[$key_alabaran]['AvisoTaller'][$key_tarea]['PartesTallere'][$key_parte_taller]['Articulos'] = $articulos;
                            foreach ($albaranes[$key_alabaran]['AvisoTaller'][$key_tarea]['PartesTallere'][$key_parte_taller]['Articulos'] as $articulo_parte_taller_key => $articulo_parte_taller) {
                                $detalle_articulo = $this->Articulo->findById($articulo_parte_taller['ArticulosPartestallere']['articulo_id']);
                                $albaranes[$key_alabaran]['AvisoTaller'][$key_tarea]['PartesTallere'][$key_parte_taller]['Articulos'][$articulo_parte_taller_key]['Articulo'] = array_shift($detalle_articulo);
                            }
                        }
                        // 2º Articulos de Parte de Centrotrabajo
                    }
                }
            }
            $factura["Albaranes"] = $albaranes;
        } else {
            die("Factura no encontrada");
        }
        /* pr($factura);
          die(); */
        $this->layout = 'pdf';
        $this->set('factura', $factura);
        $this->render();
    }

    function downloadFile($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Id inválida para factura de proveedores', true));
            $this->redirect(array('action' => 'index'));
        } else {
            $id = $this->Facturasproveedore->id;
            $upload = $this->Facturasproveedore->findById($id);
            $name = $upload['Facturasproveedore']['facturaescaneada'];
            $ruta = '../webroot/files/' . $name;

            header("Content-disposition: attachment; filename=$name");
            header("Content-type: application/octet-stream");
            readfile($ruta);
        }
    }

    private function __list() {
        $tiposivas = $this->Facturasproveedore->Tiposiva->find('list');
        $this->set(compact('tiposivas'));
    }

    function select() {
        $facturasproveedores = $this->Facturasproveedore->find('list', array('conditions' => array('Facturasproveedore.proveedore_id' => $this->data['Devolucionesproveedore']['proveedore_id'])));
        $this->set(compact('facturasproveedores'));
    }

}

?>