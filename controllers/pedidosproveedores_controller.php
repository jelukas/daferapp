<?php

class PedidosproveedoresController extends AppController {

    var $name = 'Pedidosproveedores';
    var $components = array('FileUpload');
    var $helpers = array('Ajax', 'Js', 'Autocomplete', 'Time');

    function beforeFilter() {
        parent::beforeFilter();
        if ($this->params['action'] == 'edit' || $this->params['action'] == 'add') {
            $this->FileUpload->fileModel = 'Pedidosproveedore';
            $this->FileUpload->uploadDir = 'files/pedidosproveedore';
            $this->FileUpload->fields = array('name' => 'file_name', 'type' => 'file_type', 'size' => 'file_size');
        }
        if ($this->params['action'] == 'index') {
            $this->__list();
        }
    }

    function index() {
        $conditions = array();
        $this->paginate = array(
            'conditions' => $conditions, 
            'limit' => 20,
            'contain' => array(
                'Presupuestosproveedore' => array('Avisostallere', 'Ordene', 'Avisosrepuesto', 'Proveedore', 'Almacene'),
                'Estadospedidosproveedore', 
                )
            );
        $pedidosproveedores = $this->paginate('Pedidosproveedore', $conditions);

        $this->set('pedidosproveedores', $pedidosproveedores);
        if (!empty($this->params['url']['pdf'])) {
            $this->layout = 'pdf';
            $this->render('/pedidosproveedores/pdfFilter');
        }
    }

    function view($id = null) {
        if (!$id) {
            $this->flashWarnings(__('Pedido a Proveedor No válido', true));
            $this->redirect(array('action' => 'index'));
        }
        $pedidosproveedore = $this->Pedidosproveedore->find('first', array(
            'contain' => array(
                'ArticulosPedidosproveedore' => array('Articulo','Tarea'),
                'Albaranesproveedore'=>'Proveedore',
                'Estadospedidosproveedore',
                'Transportista',
                'Presupuestosproveedore' => array(
                    'Proveedore' =>'Tiposiva',
                    'Estadospresupuestosproveedore',
                    'Presupuestoscliente' => 'Cliente',
                    'Pedidoscliente' => array('Presupuestoscliente' => 'Cliente'),
                    'Ordene' => array('Avisostallere' => array('Cliente', 'Centrostrabajo', 'Maquina')),
                    'Avisostallere' => array('Cliente', 'Centrostrabajo', 'Maquina', 'Estadosavisostallere'),
                    'Avisosrepuesto' => array('Cliente', 'Centrostrabajo', 'Maquina', 'Estadosaviso'),
                    'ArticulosPresupuestosproveedore' => 'Articulo', 'Proveedore', 'Almacene')
            ),
            'conditions' => array('Pedidosproveedore.id' => $id)
                ));
        $this->set('pedidosproveedore', $pedidosproveedore);
    }

    function edit($id = null) {
        if (!$id && empty($this->data)) {
            $this->flashWarnings(__('Pedido a Proveedor Inválido', true));
            $this->redirect(array('action' => 'index'));
        }
        if (!empty($this->data)) {
            if ($this->Pedidosproveedore->saveAll($this->data)) {
                $id = $this->Pedidosproveedore->id;
                $upload = $this->Pedidosproveedore->findById($id);
                if (!empty($this->data['Pedidosproveedore']['remove_file'])) {
                    $this->FileUpload->RemoveFile($upload['Pedidosproveedore']['pedidoescaneado']);
                    $this->Pedidosproveedore->saveField('pedidoescaneado', null);
                }
                if ($this->FileUpload->finalFile != null) {
                    $this->FileUpload->RemoveFile($upload['Pedidosproveedore']['pedidoescaneado']);
                    $this->Pedidosproveedore->saveField('pedidoescaneado', $this->FileUpload->finalFile);
                }
                $this->Session->setFlash(__('El Pedido a Proveedor a sido Guardado', true));
                $this->redirect(array('action' => 'view', $id));
            } else {
                $this->flashWarnings(__('El Pedido a Proveedor no ha podido ser guardado. Inténtalo de nuevo', true));
            }
        }
        if (empty($this->data)) {
            $this->data = $this->Pedidosproveedore->read(null, $id);
        }
        $this->set('presupuestosproveedore', $this->Pedidosproveedore->Presupuestosproveedore->find(
                        'first', array('contain' =>
                    array(
                        'Estadospresupuestosproveedore',
                        'Presupuestoscliente' => 'Cliente',
                        'Pedidoscliente' => array('Presupuestoscliente' => 'Cliente'),
                        'Ordene' => array('Avisostallere' => array('Cliente', 'Centrostrabajo', 'Maquina')),
                        'Avisostallere' => array('Cliente', 'Centrostrabajo', 'Maquina', 'Estadosavisostallere'),
                        'Avisosrepuesto' => array('Cliente', 'Centrostrabajo', 'Maquina', 'Estadosaviso'),
                        'ArticulosPresupuestosproveedore' => 'Articulo', 'Proveedore', 'Almacene'),
                    'conditions' => array('Presupuestosproveedore.id' => $this->data['Pedidosproveedore']['presupuestosproveedore_id']))));
        $this->set('transportistas', $this->Pedidosproveedore->Transportista->find('list'));
        $this->set('articulos_pedidosproveedore', $this->Pedidosproveedore->ArticulosPedidosproveedore->findAllByPedidosproveedoreId($id));
        $this->set('estadospedidosproveedores', $this->Pedidosproveedore->Estadospedidosproveedore->find('list'));
    }

    function delete($id = null, $presupuestosproveedore_id = null) {
        if (!$id) {
            $this->flashWarnings(__('Id inválida para el Pedido a Proveedor', true));
            $this->redirect(array('action' => 'index'));
        }
        $id = $this->Pedidosproveedore->id;
        $upload = $this->Pedidosproveedore->findById($id);
        $this->FileUpload->RemoveFile($upload['Pedidosproveedore']['pedidoescaneado']);
        if ($this->Pedidosproveedore->delete($id)) {
            $this->Session->setFlash(__('Pedido a Proveedor borrado correctamente', true));
            if (!empty($presupuestosproveedore_id)) {
                $this->redirect(array('controller' => 'presupuestosproveedores', 'action' => 'view', $presupuestosproveedore_id));
            } else {
                $this->redirect(array('action' => 'index'));
            }
        }
        $this->flashWarnings(__('No ha podido ser borrado el pedido a Proveedor', true));
        $this->redirect(array('action' => 'index'));
    }

    function downloadFile($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Id inválida para pedido de proveedores', true));
            $this->redirect(array('action' => 'index'));
        } else {
            $id = $this->Pedidosproveedore->id;
            $upload = $this->Pedidosproveedore->findById($id);
            $name = $upload['Pedidosproveedore']['pedidoescaneado'];
            $ruta = '../webroot/files/' . $name;

            header("Content-disposition: attachment; filename=$name");
            header("Content-type: application/octet-stream");
            readfile($ruta);
        }
    }

    function pdf($id = null) {
        if ($id != null) {
            $this->Pedidosproveedore->recursive = 2;
            $this->layout = 'pdf';
            $pedido = $this->Pedidosproveedore->read(null, $id);
            $this->set('pedido', $pedido);
            $this->render();
        }
    }

    private function __list() {
        
    }

    function add($presupuestosproveedore_id = null) {
        if (!empty($this->data)) {
            $presupuestosproveedore_id = $this->data['Pedidosproveedore']['presupuestosproveedore_id'];
            $this->Pedidosproveedore->create();
            if ($this->Pedidosproveedore->saveAll($this->data)) {
                $id = $this->Pedidosproveedore->id;
                $data = array();
                foreach ($this->data['ArticulosPresupuestosproveedore'] as $articulo_presupuestosproveedore) {
                    if ($articulo_presupuestosproveedore['id'] != 0) {
                        $articulo_presupuestosproveedore = $this->Pedidosproveedore->Presupuestosproveedore->ArticulosPresupuestosproveedore->find('first', array('contain' => '', 'conditions' => array('ArticulosPresupuestosproveedore.id' => $articulo_presupuestosproveedore['id'])));
                        $articulo_pedidoproveedore = array();
                        $articulo_pedidoproveedore['ArticulosPedidosproveedore']['pedidosproveedore_id'] = $id;
                        $articulo_pedidoproveedore['ArticulosPedidosproveedore']['tarea_id'] = $articulo_presupuestosproveedore['ArticulosPresupuestosproveedore']['tarea_id'];
                        $articulo_pedidoproveedore['ArticulosPedidosproveedore']['articulo_id'] = $articulo_presupuestosproveedore['ArticulosPresupuestosproveedore']['articulo_id'];
                        $articulo_pedidoproveedore['ArticulosPedidosproveedore']['cantidad'] = $articulo_presupuestosproveedore['ArticulosPresupuestosproveedore']['cantidad'];
                        $articulo_pedidoproveedore['ArticulosPedidosproveedore']['precio_proveedor'] = $articulo_presupuestosproveedore['ArticulosPresupuestosproveedore']['precio_proveedor'];
                        $articulo_pedidoproveedore['ArticulosPedidosproveedore']['descuento'] = $articulo_presupuestosproveedore['ArticulosPresupuestosproveedore']['descuento'];
                        $articulo_pedidoproveedore['ArticulosPedidosproveedore']['neto'] = $articulo_presupuestosproveedore['ArticulosPresupuestosproveedore']['neto'];
                        $articulo_pedidoproveedore['ArticulosPedidosproveedore']['total'] = $articulo_presupuestosproveedore['ArticulosPresupuestosproveedore']['total'];
                        $data[] = $articulo_pedidoproveedore;
                    }
                }
                $this->Pedidosproveedore->ArticulosPedidosproveedore->saveAll($data);
                /* Fin paso */
                /* Guarda fichero */
                if ($this->FileUpload->finalFile != null) {
                    $this->Pedidosproveedore->saveField('pedidoescaneado', $this->FileUpload->finalFile);
                }
                /* FIn Guardar Fichero */
                $this->Session->setFlash(__('El Pedido a Proveedor ha sido guardado', true));
                $this->redirect(array('action' => 'view', $this->Pedidosproveedore->id));
            } else {
                $this->flashWarnings(__('El Pedido a Proveedor NO ha podido ser guardado. Inténtalo de nuevo.', true));
            }
        }
        if (empty($presupuestosproveedore_id)) {
            $this->flashWarnings(__('No se puede crear un Pedido a Proveedor sin venir desde un Presupuesto a Proveedor.', true));
            $this->redirect(array('action' => 'index'));
        }

        $this->set('numero', $this->Pedidosproveedore->dime_siguiente_numero());
        $this->set('transportistas', $this->Pedidosproveedore->Transportista->find('list'));
        $presupuestosproveedore = $this->Pedidosproveedore->Presupuestosproveedore->find(
                'first', array('contain' =>
            array(
                'Pedidosproveedore',
                'Presupuestoscliente',
                'Pedidoscliente',
                'Ordene',
                'Avisostallere',
                'Avisosrepuesto',
                'ArticulosPresupuestosproveedore' => array('Articulo', 'Tarea')),
            'conditions' => array('Presupuestosproveedore.id' => $presupuestosproveedore_id)));
        $this->set('estadospedidosproveedores', $this->Pedidosproveedore->Estadospedidosproveedore->find('list'));

        $this->set(compact('presupuestosproveedore'));
    }

    function devolucion($albaranesproveedore_id = null, $presupuestosproveedore_id = null) {
        if (!empty($this->data)) {
            $presupuestosproveedore_id = $this->data['Pedidosproveedore']['presupuestosproveedore_id'];
            $this->Pedidosproveedore->create();
            if ($this->Pedidosproveedore->saveAll($this->data)) {
                $id = $this->Pedidosproveedore->id;
                $data = array();
                foreach ($this->data['ArticulosAlbaranesproveedore'] as $articulo_albaranesproveedore) {
                    if ($articulo_albaranesproveedore['id'] != 0) {
                        $this->Pedidosproveedore->Albaranesproveedore->ArticulosAlbaranesproveedore->recursive = -1;
                        $articulo_albaranesproveedore = $this->Pedidosproveedore->Albaranesproveedore->ArticulosAlbaranesproveedore->find('first', array('conditions' => array('ArticulosAlbaranesproveedore.id' => $articulo_albaranesproveedore['id'])));
                        $articulo_pedidoproveedore = array();
                        $articulo_pedidoproveedore['ArticulosPedidosproveedore']['pedidosproveedore_id'] = $id;
                        $articulo_pedidoproveedore['ArticulosPedidosproveedore']['articulo_id'] = $articulo_albaranesproveedore['ArticulosAlbaranesproveedore']['articulo_id'];
                        $articulo_pedidoproveedore['ArticulosPedidosproveedore']['cantidad'] = $articulo_albaranesproveedore['ArticulosAlbaranesproveedore']['cantidad'] * -1;
                        $articulo_pedidoproveedore['ArticulosPedidosproveedore']['precio_proveedor'] = $articulo_albaranesproveedore['ArticulosAlbaranesproveedore']['precio_proveedor'];
                        $articulo_pedidoproveedore['ArticulosPedidosproveedore']['descuento'] = $articulo_albaranesproveedore['ArticulosAlbaranesproveedore']['descuento'];
                        $articulo_pedidoproveedore['ArticulosPedidosproveedore']['neto'] = $articulo_albaranesproveedore['ArticulosAlbaranesproveedore']['neto'] * -1;
                        $articulo_pedidoproveedore['ArticulosPedidosproveedore']['total'] = $articulo_albaranesproveedore['ArticulosAlbaranesproveedore']['total'] * -1;
                        $data[] = $articulo_pedidoproveedore;
                    }
                }
                $this->Pedidosproveedore->ArticulosPedidosproveedore->saveAll($data);
                /* Fin paso */
                $id = $this->Pedidosproveedore->id;
                $this->Pedidosproveedore->saveField('pedidoescaneado', $this->FileUpload->finalFile);
                $this->Session->setFlash(__('El Pedido a Proveedor ha sido guardado', true));
                $this->redirect(array('action' => 'view', $this->Pedidosproveedore->id));
            } else {
                $this->flashWarnings(__('El Pedido a Proveedor NO ha podido ser guardado. Inténtalo de nuevo.', true));
            }
        }
        if (empty($albaranesproveedore_id)) {
            $this->flashWarnings(__('No se puede crear un Pedido a Proveedor sin venir desde un Presupuesto a Proveedor.', true));
            $this->redirect(array('action' => 'index'));
        }
        $this->set('transportistas', $this->Pedidosproveedore->Transportista->find('list'));
        $albaranesproveedore = $this->Pedidosproveedore->Albaranesproveedore->find('first', array('contain' => array('Pedidosproveedore' => array('Presupuestosproveedore' => array('Proveedore', 'Almacene', 'Avisosrepuesto' => array('Cliente', 'Maquina', 'Centrostrabajo'), 'Avisostallere' => array('Cliente', 'Maquina', 'Centrostrabajo')))), 'conditions' => array('Albaranesproveedore.id' => $albaranesproveedore_id))); //findById($albaranesproveedore_id);
        $presupuestosproveedore = $this->Pedidosproveedore->Presupuestosproveedore->find('first', array('contain' => array('Pedidosproveedore' => array('Presupuestosproveedore' => array('Proveedore', 'Almacene', 'Avisosrepuesto' => array('Cliente', 'Maquina', 'Centrostrabajo'), 'Avisostallere' => array('Cliente', 'Maquina', 'Centrostrabajo')))), 'conditions' => array('Presupuestosproveedore.id' => $presupuestosproveedore_id))); //findById($presupuestosproveedore_id);
        $this->set(compact('albaranesproveedore', 'presupuestosproveedore'));
    }

}

?>