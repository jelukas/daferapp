<?php

class AlbaranesproveedoresController extends AppController {

    var $name = 'Albaranesproveedores';
    var $components = array('FileUpload','Session');
    var $helpers = array('Form', 'MultipleRecords', 'Ajax', 'Js');

    function beforeFilter() {
        parent::beforeFilter();
        //defaults to 'files', will be webroot/files, make sure webroot/files exists and is chmod 777 
        $this->FileUpload->fileModel = 'Albaranesproveedore';
        $this->FileUpload->uploadDir = 'files';
        $this->FileUpload->fields = array('name' => 'file_name', 'type' => 'file_type', 'size' => 'file_size');
        if ($this->params['action'] == 'index') {
            $this->__list();
        }
    }

    function index() {
        $this->Albaranesproveedore->recursive = 2;
        $conditions = array();
        $albaranesproveedores = $this->paginate('Albaranesproveedore', $conditions);
        $this->set('albaranesproveedores', $albaranesproveedores);

        if (!empty($this->params['url']['pdf'])) {
            $this->layout = 'pdf';
            $this->render('/albaranesproveedores/pdfFilter');
        }
    }

    function view($id = null) {
        if (!$id) {
            $this->flashWarnings(__('Albarán Inválido', true));
            $this->redirect($this->referer());
        }
        $this->Albaranesproveedore->recursive = 2;
        $this->Albaranesproveedore->ArticulosAlbaranesproveedore->recursive = 3;

        $albaranesproveedore = $this->Albaranesproveedore->read(null, $id);
        $articulos_albaranesproveedore = $this->Albaranesproveedore->ArticulosAlbaranesproveedore->findAllByAlbaranesproveedoreId($id);
        $presupuestosproveedore = $this->Albaranesproveedore->Pedidosproveedore->Presupuestosproveedore->findById($albaranesproveedore['Pedidosproveedore']['Presupuestosproveedore']['id']);
        $this->set('albaranesproveedore', $albaranesproveedore);
        $this->set('presupuestosproveedore', $presupuestosproveedore);
        $this->set('articulos_albaranesproveedore', $articulos_albaranesproveedore);
    }

    function add($pedidosproveedore_id = null) {
        $this->Albaranesproveedore->recursive = 2;
        if (!empty($this->data)) {
            $this->Albaranesproveedore->create();
            if ($this->Albaranesproveedore->save($this->data)) {
                $pedidosproveedore_id = $this->data['Albaranesproveedore']['pedidosproveedore_id'];
                $id = $this->Albaranesproveedore->id;
                $this->Albaranesproveedore->saveField('albaranescaneado', $this->FileUpload->finalFile);
                $data = array();
                foreach ($this->data['ArticulosPedidosproveedore'] as $articulo_pedidosproveedore) {
                    if ($articulo_pedidosproveedore['id'] != 0) {
                        $articulo_albaranesproveedore = array();
                        $this->Albaranesproveedore->Pedidosproveedore->ArticulosPedidosproveedore->recursive = -1;
                        $articulo_pedidosproveedore = $this->Albaranesproveedore->Pedidosproveedore->ArticulosPedidosproveedore->find('first', array('conditions' => array('ArticulosPedidosproveedore.id' => $articulo_pedidosproveedore['id'])));
                        $articulo_albaranesproveedore['ArticulosAlbaranesproveedore']['albaranesproveedore_id'] = $id;
                        $articulo_albaranesproveedore['ArticulosAlbaranesproveedore']['articulo_id'] = $articulo_pedidosproveedore['ArticulosPedidosproveedore']['articulo_id'];
                        $articulo_albaranesproveedore['ArticulosAlbaranesproveedore']['cantidad'] = $articulo_pedidosproveedore['ArticulosPedidosproveedore']['cantidad'];
                        $articulo_albaranesproveedore['ArticulosAlbaranesproveedore']['precio_proveedor'] = $articulo_pedidosproveedore['ArticulosPedidosproveedore']['precio_proveedor'];
                        $articulo_albaranesproveedore['ArticulosAlbaranesproveedore']['descuento'] = $articulo_pedidosproveedore['ArticulosPedidosproveedore']['descuento'];
                        $articulo_albaranesproveedore['ArticulosAlbaranesproveedore']['neto'] = $articulo_pedidosproveedore['ArticulosPedidosproveedore']['neto'];
                        $articulo_albaranesproveedore['ArticulosAlbaranesproveedore']['total'] = $articulo_pedidosproveedore['ArticulosPedidosproveedore']['total'];
                        $data[] = $articulo_albaranesproveedore;
                    }
                }
                $this->Albaranesproveedore->ArticulosAlbaranesproveedore->saveAll($data);
                // Fin de la validación de articulos a ArticulosAlbaranesProveedore 

                $this->Session->setFlash(__('El Albarán a proveedor ha sido guardado', true));
                $this->redirect(array('action' => 'view', $this->Albaranesproveedore->id));
            } else {
                $this->flashWarnings(__('El albaran de Proveedor nor ha podido ser guardado. Por favor intentalo de nuevo.', true));
            }
        }
        if (!empty($pedidosproveedore_id)) {
            $pedidosproveedore = $this->Albaranesproveedore->Pedidosproveedore->find('first', array('contain' => array('ArticulosPedidosproveedore' => 'Articulo'), 'conditions' => array('Pedidosproveedore.id' => $pedidosproveedore_id)));
        }

        $this->set(compact('pedidosproveedore_id', 'pedidosproveedore'));
    }

    function edit($id = null) {
        if (!$id && empty($this->data)) {
            $this->flashWarnings(__('Albarán a Proveedor No válido', true));
            $this->redirect($this->referer());
        }
        if (!empty($this->data)) {
            if ($this->Albaranesproveedore->saveAll($this->data)) {
                if ($this->FileUpload->finalFile != null) {
                    $id = $this->Albaranesproveedore->id;
                    $upload = $this->Albaranesproveedore->findById($id);
                    $this->FileUpload->RemoveFile($upload['Albaranesproveedore']['albaranescaneado']);
                    $this->Albaranesproveedore->saveField('albaranescaneado', $this->FileUpload->finalFile);
                }
                $this->Session->setFlash(__('El Albarán a Proveedor ha sido guardado', true));
                $this->redirect(array('action' => 'view', $id));
            } else {
                $this->flashWarnings(__('El Albarán de Proveedor no ha podido ser guardado. Por favor, inténtalo de nuvo.', true));
            }
        }
        if (empty($this->data)) {
            $this->Albaranesproveedore->recursive = 2;
            $albaranesproveedore = $this->Albaranesproveedore->read(null, $id);
            $articulos_albaranesproveedore = $this->Albaranesproveedore->ArticulosAlbaranesproveedore->findAllByAlbaranesproveedoreId($id);
            $presupuestosproveedore = $this->Albaranesproveedore->Pedidosproveedore->Presupuestosproveedore->findById($albaranesproveedore['Pedidosproveedore']['Presupuestosproveedore']['id']);

            $this->set('albaranesproveedore', $albaranesproveedore);
            $this->set('presupuestosproveedore', $presupuestosproveedore);
            $this->data = $this->Albaranesproveedore->read(null, $id);
        }
        $pedidosproveedores = $this->Albaranesproveedore->Pedidosproveedore->find('list');
        $this->Albaranesproveedore->ArticulosAlbaranesproveedore->recursive = 3;
        $articulos_albaranesproveedore = $this->Albaranesproveedore->ArticulosAlbaranesproveedore->findAllByAlbaranesproveedoreId($id);
        $this->set(compact('pedidosproveedores', 'articulos_albaranesproveedore'));
    }

    function delete($id = null) {
        if (!$id) {
            $this->flashWarnings(__('Id inválida para el Albrán de Proveedor', true));
            $this->redirect(array('action' => 'index'));
        }
        $id = $this->Albaranesproveedore->id;
        $upload = $this->Albaranesproveedore->findById($id);
        $this->FileUpload->RemoveFile($upload['Albaranesproveedore']['albaranescaneado']);
        if ($this->Albaranesproveedore->delete($id)) {
            $this->Session->setFlash(__('Albrán de Proveedor Guardado', true));
            $this->redirect(array('action' => 'index'));
        }
        $this->flashWarnings(__('El Albarán de Proveedor no ha podido ser Guardado.', true));
        $this->redirect(array('action' => 'index'));
    }

    function downloadFile($id = null) {
        if (!$id) {
            $this->flashWarnings(__('Id No válida para Albarán de proveedor', true));
            $this->redirect(array('action' => 'index'));
        } else {
            $id = $this->Albaranesproveedore->id;
            $upload = $this->Albaranesproveedore->findById($id);
            $name = $upload['Albaranesproveedore']['albaranescaneado'];
            $ruta = '../webroot/files/' . $name;
            header("Content-disposition: attachment; filename=$name");
            header("Content-type: application/octet-stream");
            readfile($ruta);
        }
    }

    function pdf($id = null) {
        if ($id != null) {
            $this->Albaranesproveedore->recursive = 2;
            $this->layout = 'pdf';
            $albaran = $this->Albaranesproveedore->read(null, $id);
            if ($albaran['Albaranesproveedore']['avisosrepuesto_id'] != null) {
                $this->set('albaran', $albaran);
                $this->render('/albaranesproveedores/pdfAvisosrepuestos');
            } elseif ($albaran['Albaranesproveedore']['avisostallere_id'] != null) {
                $centrotrabajo = $albaran['Avisostallere']['Centrostrabajo'];
                $this->set('centrotrabajo', $centrotrabajo);
                $this->loadModel('Ordene');
                $this->Ordene->recursive = 2;
                $orden = $this->Ordene->findByAvisostallere_id($albaran['Albaranesproveedore']['avisostallere_id']);
                $this->set('orden', $orden);
                $this->set('cliente', $orden['Avisostallere']['Cliente']);
                $this->Ordene->Tarea->recursive = 2;
                $tareas = $this->Ordene->Tarea->findAllByOrdene_id($orden['Ordene']['id']);
                $this->set('tareas', $tareas);
                $this->set('albaran', $albaran);
                $this->render('/albaranesproveedores/pdfAvisostalleres');
            }
        }
    }

    private function __list() {
        /* $pedidosproveedores = $this->Albaranesproveedore->Pedidosproveedore->find('list');
          $facturasproveedores = $this->Albaranesproveedore->Facturasproveedore->find('list');
          $proveedores = $this->Albaranesproveedore->Pedidosproveedore->Proveedore->find('list');
          $this->set(compact('pedidosproveedores', 'facturasproveedores', 'proveedores')); */
    }

    function select() {
        $this->Albaranesproveedore->recursive = 2;
        $albaranesproveedores = $this->Albaranesproveedore->find('all', array('conditions' => array('Albaranesproveedore.facturasproveedore_id' => $this->data['Devolucionesproveedore']['facturasproveedore_id'])));
        $this->set(compact('albaranesproveedores'));
    }

}

?>