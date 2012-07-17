<?php

class PedidosclientesController extends AppController {

    var $name = 'Pedidosclientes';
    var $components = array('FileUpload');

    function beforeFilter() {
        parent::beforeFilter();
        if ($this->params['action'] == 'edit' || $this->params['action'] == 'add') {
            $this->FileUpload->fileModel = 'Pedidoscliente';
            $this->FileUpload->uploadDir = 'files/pedidoscliente';
            $this->FileUpload->fields = array('name' => 'file_name', 'type' => 'file_type', 'size' => 'file_size');
        }
        if ($this->params['action'] == 'index') {
            $this->__list();
        }
    }

    function index() {
        $this->Pedidoscliente->recursive = 2;
        $conditions = array();
        if (!empty($this->params['url']['cliente_id'])) {
            $conditions['OR'] = array(array('Avisostallere.cliente_id' => $this->params['url']['cliente_id']), array('Avisosrepuesto.cliente_id' => $this->params['url']['cliente_id']));
        }
        if (!empty($this->params['url']['day_pedido_f']) && !empty($this->params['url']['month_pedido_f']) && !empty($this->params['url']['year_pedido_f'])) {
            $conditions['Pedidoscliente.fecha_plazo >='] = $this->params['url']['year_pedido_f'] . '-' . $this->params['url']['month_pedido_f'] . '-' . $this->params['url']['day_pedido_f'];
        }
        if (!empty($this->params['url']['day_pedido_t']) && !empty($this->params['url']['month_pedido_t']) && !empty($this->params['url']['year_pedido_t'])) {
            $conditions['Pedidoscliente.fecha_plazo <='] = $this->params['url']['year_pedido_t'] . '-' . $this->params['url']['month_pedido_t'] . '-' . $this->params['url']['day_pedido_t'];
        }

        $pedidosclientes = $this->paginate('Pedidoscliente', $conditions);
        $this->set('pedidosclientes', $pedidosclientes);
        if (!empty($this->params['url']['pdf'])) {
            $this->layout = 'pdf';
            $this->render('/pedidosclientes/pdfFilter');
        }
    }

    function view($id = null) {
        if (!$id) {
            $this->flashWarnings(__('Pedido de Cliente Inválido', true));
            $this->redirect($this->referer());
        }
        $pedidoscliente = $this->Pedidoscliente->find('first', array('contain' => array('Presupuestoscliente' => array('Almacene','Comerciale','Presupuestosproveedore', 'Avisosrepuesto' => array('Centrostrabajo', 'Maquina'), 'Presupuestosproveedore', 'Avisostallere' => array('Centrostrabajo', 'Maquina'), 'Ordene' => array('Avisostallere' => array('Centrostrabajo', 'Maquina'))), 'Tareaspedidoscliente' => array('TareaspedidosclientesOtrosservicio', 'MaterialesTareaspedidoscliente' => array('Articulo'), 'ManodeobrasTareaspedidoscliente')), 'conditions' => array('Pedidoscliente.id' => $id)));
        $totalmanoobrayservicios = 0;
        $totalrepuestos = 0;
        foreach ($pedidoscliente['Tareaspedidoscliente'] as $tarea) {
            $totalmanoobrayservicios += $tarea['mano_de_obra'] + $tarea['servicios'];
            $totalrepuestos += $tarea['materiales'];
        }
        $this->set('pedidoscliente', $pedidoscliente);
        $this->set('totalrepuestos', $totalrepuestos);
        $this->set('totalmanoobrayservicios', $totalmanoobrayservicios);
    }

    function add($presupuestoscliente_id = null) {
        if (!empty($this->data)) {
            //die(pr($this->data));
            $this->Pedidoscliente->create();
            if ($this->Pedidoscliente->save($this->data)) {
                $id = $this->Pedidoscliente->id;
                $this->Pedidoscliente->saveField('pedidoescaneado', $this->FileUpload->finalFile);
                /* Comenzamos con el traspaso */
                foreach ($this->data['Tareaspresupuestocliente'] as $tareapresupuesto) {
                    if ($tareapresupuesto['id'] != 0) {
                        $this->Pedidoscliente->Tareaspedidoscliente->create();
                        $tareapresupuesto_modelo = $this->Pedidoscliente->Presupuestoscliente->Tareaspresupuestocliente->find('first', array('contain' => '', 'conditions' => array('Tareaspresupuestocliente.id' => $tareapresupuesto['id'])));
                        $tareaspedidoscliente['Tareaspedidoscliente'] = $tareapresupuesto_modelo['Tareaspresupuestocliente'];
                        unset($tareaspedidoscliente['Tareaspedidoscliente']['id']);
                        unset($tareaspedidoscliente['Tareaspedidoscliente']['presupuestoscliente_id']);
                        $tareaspedidoscliente['Tareaspedidoscliente']['pedidoscliente_id'] = $this->Pedidoscliente->id;
                        $tareaspedidoscliente['Tareaspedidoscliente']['materiales'] = 0;
                        $tareaspedidoscliente['Tareaspedidoscliente']['mano_de_obra'] = 0;
                        $tareaspedidoscliente['Tareaspedidoscliente']['servicios'] = 0;
                        $this->Pedidoscliente->Tareaspedidoscliente->save($tareaspedidoscliente);
                        if (!empty($tareapresupuesto['Materiale'])) {
                            foreach ($tareapresupuesto['Materiale'] as $materiale) {
                                if ($materiale['id'] != 0) {
                                    $this->Pedidoscliente->Tareaspedidoscliente->MaterialesTareaspedidoscliente->create();
                                    $materiale_modelo = $this->Pedidoscliente->Presupuestoscliente->Tareaspresupuestocliente->Materiale->find('first', array('contain' => '', 'conditions' => array('Materiale.id' => $materiale['id'])));
                                    $materialespedidoscliente['MaterialesTareaspedidoscliente'] = $materiale_modelo['Materiale'];
                                    unset($materialespedidoscliente['MaterialesTareaspedidoscliente']['id']);
                                    unset($materialespedidoscliente['MaterialesTareaspedidoscliente']['tareaspresupuestocliente_id']);
                                    $materialespedidoscliente['MaterialesTareaspedidoscliente']['tareaspedidoscliente_id'] = $this->Pedidoscliente->Tareaspedidoscliente->id;
                                    $this->Pedidoscliente->Tareaspedidoscliente->MaterialesTareaspedidoscliente->save($materialespedidoscliente);
                                }
                            }
                        }
                        if (!empty($tareapresupuesto['Manodeobra'])) {
                            foreach ($tareapresupuesto['Manodeobra'] as $manodeobra) {
                                if ($manodeobra['id'] != 0) {
                                    $this->Pedidoscliente->Tareaspedidoscliente->ManodeobrasTareaspedidoscliente->create();
                                    $manodeobra_modelo = $this->Pedidoscliente->Presupuestoscliente->Tareaspresupuestocliente->Manodeobra->find('first', array('contain' => '', 'conditions' => array('Manodeobra.id' => $manodeobra['id'])));
                                    $manodeobrapedidoscliente['ManodeobrasTareaspedidoscliente'] = $manodeobra_modelo['Manodeobra'];
                                    unset($manodeobrapedidoscliente['ManodeobrasTareaspedidoscliente']['id']);
                                    unset($manodeobrapedidoscliente['ManodeobrasTareaspedidoscliente']['tareaspresupuestocliente_id']);
                                    $manodeobrapedidoscliente['ManodeobrasTareaspedidoscliente']['tareaspedidoscliente_id'] = $this->Pedidoscliente->Tareaspedidoscliente->id;
                                    $this->Pedidoscliente->Tareaspedidoscliente->ManodeobrasTareaspedidoscliente->save($manodeobrapedidoscliente);
                                }
                            }
                        }
                        if (!empty($tareapresupuesto['TareaspresupuestoclientesOtrosservicio'])) {
                            foreach ($tareapresupuesto['TareaspresupuestoclientesOtrosservicio'] as $otrosservicio) {
                                if ($otrosservicio['id'] != 0) {
                                    $this->Pedidoscliente->Tareaspedidoscliente->TareaspedidosclientesOtrosservicio->create();
                                    $otrosservicio_modelo = $this->Pedidoscliente->Presupuestoscliente->Tareaspresupuestocliente->TareaspresupuestoclientesOtrosservicio->find('first', array('contain' => '', 'conditions' => array('TareaspresupuestoclientesOtrosservicio.id' => $otrosservicio['id'])));
                                    $otrosserviciospedidoscliente['TareaspedidosclientesOtrosservicio'] = $otrosservicio_modelo['TareaspresupuestoclientesOtrosservicio'];
                                    unset($otrosserviciospedidoscliente['TareaspedidosclientesOtrosservicio']['id']);
                                    unset($otrosserviciospedidoscliente['TareaspedidosclientesOtrosservicio']['tareaspresupuestocliente_id']);
                                    $otrosserviciospedidoscliente['TareaspedidosclientesOtrosservicio']['tareaspedidoscliente_id'] = $this->Pedidoscliente->Tareaspedidoscliente->id;
                                    $this->Pedidoscliente->Tareaspedidoscliente->TareaspedidosclientesOtrosservicio->save($otrosserviciospedidoscliente);
                                }
                            }
                        }
                    }
                }
                /* Finall del traspaso */
                /* Guarda fichero */
                if ($this->FileUpload->finalFile != null) {
                    $this->Pedidoscliente->saveField('pedidoescaneado', $this->FileUpload->finalFile);
                }
                $this->Session->setFlash(__('El Pedido de Cliente ha sido guardado', true));
                $this->redirect(array('action' => 'view', $this->Pedidoscliente->id));
            } else {
                $this->flashWarnings(__('El Pedido de Cliente no ha posido ser guardado. Por favor, inténtalo de nuevo.', true));
                $this->redirect($this->referer());
            }
        }
        $numero = $this->Pedidoscliente->dime_siguiente_numero();
        $presupuestoscliente = $this->Pedidoscliente->Presupuestoscliente->find('first', array('contain' => array('Tareaspresupuestocliente' => array('Materiale' => 'Articulo', 'Manodeobra', 'TareaspresupuestoclientesOtrosservicio')), 'conditions' => array('Presupuestoscliente.id' => $presupuestoscliente_id)));
        $tiposivas = $this->Pedidoscliente->Presupuestoscliente->Tiposiva->find('list');
        $this->set(compact('presupuestoscliente', 'tiposiva','numero'));
    }

    function edit($id = null) {
        if (!$id && empty($this->data)) {
            $this->Session->setFlash(__('Invalid pedidoscliente', true));
            $this->redirect(array('action' => 'index'));
        }
        if (!empty($this->data)) {
            if ($this->Pedidoscliente->save($this->data)) {
                $id = $this->Pedidoscliente->id;
                $upload = $this->Pedidoscliente->findById($id);
                if (!empty($this->data['Pedidoscliente']['remove_file'])) {
                    $this->FileUpload->RemoveFile($upload['Pedidoscliente']['pedidoescaneado']);
                    $this->Pedidoscliente->saveField('pedidoescaneado', null);
                }
                if ($this->FileUpload->finalFile != null) {
                    $this->FileUpload->RemoveFile($upload['Pedidoscliente']['pedidoescaneado']);
                    $this->Pedidoscliente->saveField('pedidoescaneado', $this->FileUpload->finalFile);
                }
                $this->Session->setFlash(__('The pedidoscliente has been saved', true));
                $this->redirect(array('action' => 'view', $this->Pedidoscliente->id));
            } else {
                $this->flashWarnings(__('The pedidoscliente could not be saved. Please, try again.', true));
            }
        }
        if (empty($this->data)) {
            $this->data = $this->Pedidoscliente->read(null, $id);
        }
    }

    function delete($id = null) {
        if (!$id) {
            $this->flashWarnings(__('Invalid id for pedidoscliente', true));
            $this->redirect($this->referer());
        }
        $id = $this->Pedidoscliente->id;
        $upload = $this->Pedidoscliente->findById($id);
        $this->FileUpload->RemoveFile($upload['Pedidoscliente']['pedidoescaneado']);
        if ($this->Pedidoscliente->delete($id)) {
            $this->Session->setFlash(__('Pedidoscliente deleted', true));
            $this->redirect(array('controller' => 'presupuestosclientes', 'action' => 'view', $upload['Pedidoscliente']['presupuestoscliente_id']));
        }
        $this->flashWarnings(__('Pedidoscliente was not deleted', true));
        $this->redirect($this->referer());
    }

    function downloadFile($id = null) {
        if (!$id) {
            $this->flashWarnings(__('Id inválida para pedido de cliente', true));
            $this->redirect(array('action' => 'index'));
        } else {
            $id = $this->Pedidoscliente->id;
            $upload = $this->Pedidoscliente->findById($id);
            $name = $upload['Pedidoscliente']['pedidoescaneado'];
            $ruta = '../webroot/files/' . $name;

            header("Content-disposition: attachment; filename=$name");
            header("Content-type: application/octet-stream");
            readfile($ruta);
        }
    }

    function pdf($id = null) {
        if ($id != null) {
            $this->Pedidoscliente->recursive = 2;
            $this->layout = 'pdf';
            $pedido = $this->Pedidoscliente->read(null, $id);
            $this->set('pedido', $pedido);
            $this->render();
        }
    }

    private function __list() {
        
    }

}

?>