<?php

class FacturasproveedoresController extends AppController {

    var $name = 'Facturasproveedores';
    var $components = array('FileUpload');

    function beforeFilter() {
        parent::beforeFilter();
        if ($this->params['action'] == 'edit' || $this->params['action'] == 'add') {
            $this->FileUpload->fileModel = 'Facturasproveedore';
            $this->FileUpload->uploadDir = 'files/facturasproveedore';
            $this->FileUpload->fields = array('name' => 'file_name', 'type' => 'file_type', 'size' => 'file_size');
        }
        if ($this->params['action'] == 'index') {
            $this->__list();
        }
    }

    function index() {
        $this->Facturasproveedore->recursive = 1;

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
        $facturasproveedore = $this->Facturasproveedore->find('first', array('conditions' => array('Facturasproveedore.id' => $id), 'contain' => array('Proveedore', 'Tiposiva', 'Formapago', 'Albaranesproveedore')));
        $this->set('facturasproveedore', $facturasproveedore);
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
                $id = $this->Facturasproveedore->id;
                $upload = $this->Facturasproveedore->findById($id);
                if (!empty($this->data['Facturasproveedore']['remove_file'])) {
                    $this->FileUpload->RemoveFile($upload['Facturasproveedore']['facturaescaneada']);
                    $this->Facturasproveedore->saveField('facturaescaneada', null);
                }
                if ($this->FileUpload->finalFile != null) {
                    $this->FileUpload->RemoveFile($upload['Facturasproveedore']['facturaescaneada']);
                    $this->Facturasproveedore->saveField('facturaescaneada', $this->FileUpload->finalFile);
                }
                $this->Session->setFlash(__('La Factura de Proveedor ha sido guardada correctamente', true));
                $this->redirect(array('action' => 'view', $id));
            } else {
                $this->flashWarnings(__('La Factura de Proveedor No ha podido ser guardada.', true));
            }
        }
        $this->data = $this->Facturasproveedore->find('first', array('contain' => array('Proveedore', 'Formapago', 'Tiposiva'), 'conditions' => array('Facturasproveedore.id' => $id)));
        $tiposivas = $this->Facturasproveedore->Tiposiva->find('list');
        $this->set(compact('tiposivas'));
    }

    function delete($id = null) {
        if (!$id) {
            $this->flashWarnings(__('Id invalida de Factura de Proveedor', true));
            $this->redirect($this->referer());
        }
        $id = $this->Facturasproveedore->id;
        $upload = $this->Facturasproveedore->findById($id);
        if ($this->Facturasproveedore->delete($id)) {
            $this->FileUpload->RemoveFile($upload['Facturasproveedore']['facturaescaneada']);
            $this->Session->setFlash(__('Facturasproveedore deleted', true));
            $this->redirect(array('controller' => 'facturasproveedores', 'action' => 'index'));
        }
        $this->flashWarnings(__('No se ha podido borrar la Factura de Proveedor. Posiblemente contenga Albaranes de Proveedor', true));
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

    function facturar() {
        if (!empty($this->data)) {
            $facturasproveedore_ids = array();
            foreach ($this->data['facturable'] as $factura_id => $albaranes_id) {
                $this->Facturasproveedore->create();
                $facturasproveedore = array();
                $proveedore_id = null;
                $fecha = date('Y-m-d');
                $baseimponible = 0;
                $facturasproveedore['Facturasproveedore']['fechafactura'] = $fecha;
                $facturasproveedore['Facturasproveedore']['baseimponible'] = $baseimponible;
                $facturasproveedore['Facturasproveedore']['tiposiva_id'] = 1;
                $this->Facturasproveedore->save($facturasproveedore);
                if ($this->Facturasproveedore->save($facturasproveedore)) {
                    foreach ($albaranes_id as $albarane_id) {
                        $albaranesproveedore = $this->Facturasproveedore->Albaranesproveedore->find('first', array('contain' => array(), 'conditions' => array('Albaranesproveedore.id' => $albarane_id)));
                        $this->Facturasproveedore->Albaranesproveedore->id = $albaranesproveedore['Albaranesproveedore']['id'];
                        $this->Facturasproveedore->Albaranesproveedore->saveField('facturasproveedore_id', $this->Facturasproveedore->id);
                        $proveedore_id = $albaranesproveedore['Albaranesproveedore']['proveedore_id'];
                        $baseimponible += $albaranesproveedore['Albaranesproveedore']['baseimponible'];
                    }
                    $this->Facturasproveedore->saveField('proveedore_id', $proveedore_id);
                    $this->Facturasproveedore->saveField('baseimponible', number_format($baseimponible, 5, '.', ''));
                    $facturasproveedore_ids[] = $this->Facturasproveedore->id;
                } else {
                    $this->flashWarnings(__('La Facturacion no puede ser realizada', true));
                    $this->redirect($this->referer());
                }
            }
            $facturasproveedores = $this->Facturasproveedore->find('all', array('contain' => array('Proveedore', 'Tiposiva'), 'conditions' => array('Facturasproveedore.id' => $facturasproveedore_ids)));
            $this->Session->setFlash(__('La Facturacion ha sido guardada correctamente', true));
            $this->set(compact('facturasproveedores'));
        } else {
            $this->flashWarnings(__('La Facturacion no puede ser realizada', true));
            $this->redirect($this->referer());
        }
    }

    function quitar_albaran($albaranesproveedore_id) {
        $albaranesproveedore = $this->Facturasproveedore->Albaranesproveedore->find('first', array('contain' => array(), 'conditions' => array('Albaranesproveedore.id' => $albaranesproveedore_id)));
        $facturasproveedore = $this->Facturasproveedore->find('first', array('contain' => array(), 'conditions' => array('Facturasproveedore.id' => $albaranesproveedore['Albaranesproveedore']['facturasproveedore_id'])));
        $this->Facturasproveedore->id = $facturasproveedore['Facturasproveedore']['id'];
        $this->Facturasproveedore->saveField('baseimponible', number_format($facturasproveedore['Facturasproveedore']['baseimponible'] - $albaranesproveedore['Albaranesproveedore']['baseimponible'], 5, '.', ''));
        $this->Facturasproveedore->Albaranesproveedore->id = $albaranesproveedore['Albaranesproveedore']['id'];
        $this->Facturasproveedore->Albaranesproveedore->saveField('facturasproveedore_id', null);
        $this->Session->setFlash(__('Albarán de proveedore Nº ' . $albaranesproveedore['Albaranesproveedore']['numero'] . ' quitado de la Factura de Proveedor correctamente', true));
        $this->redirect($this->referer());
    }

}

?>