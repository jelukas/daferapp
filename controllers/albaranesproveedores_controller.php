<?php

class AlbaranesproveedoresController extends AppController {

    var $name = 'Albaranesproveedores';
    var $components = array('FileUpload', 'Session');
    var $helpers = array('Form', 'MultipleRecords', 'Ajax', 'Js', 'Autocomplete','Time');

    function beforeFilter() {
        parent::beforeFilter();
        if ($this->params['action'] == 'edit' || $this->params['action'] == 'add') {
            $this->FileUpload->fileModel = 'Albaranesproveedore';
            $this->FileUpload->uploadDir = 'files/albaranesproveedore';
            $this->FileUpload->fields = array('name' => 'file_name', 'type' => 'file_type', 'size' => 'file_size');
        }
        if ($this->params['action'] == 'index') {
            $this->__list();
        }
    }

    function index() {
        $conditions = array();
        $this->paginate = array('conditions' => $conditions, 'limit' => 20, 'contain' => array('Proveedore'=>'Tiposiva','Estadosalbaranesproveedore', 'Pedidosproveedore' => array('Presupuestosproveedore' => array('Proveedore', 'Almacene'))));
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
        $albaranesproveedore = $this->Albaranesproveedore->find('first', array('conditions' => array('Albaranesproveedore.id' => $id),
            'contain' => array(
                'Proveedore' => array('Tiposiva','Formapago'),
                'Estadosalbaranesproveedore',
                'Centrosdecoste',
                'Pedidosproveedore' => array(
                    'Presupuestosproveedore' => array(
                        'Proveedore' => array('Tiposiva','Formapago'),
                        'Almacene',
                        'Avisostallere' => array('Cliente', 'Centrostrabajo', 'Maquina', 'Estadosavisostallere'),
                        'Avisosrepuesto' => array('Cliente', 'Centrostrabajo', 'Maquina', 'Estadosaviso'),
                        'Ordene' => array('Avisostallere' => array('Cliente', 'Centrostrabajo', 'Maquina')))))));

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

                /* Guarda fichero */
                if ($this->FileUpload->finalFile != null) {
                    $this->Albaranesproveedore->saveField('albaranescaneado', $this->FileUpload->finalFile);
                }
                /* FIn Guardar Fichero */
                $data = array();
                foreach ($this->data['ArticulosPedidosproveedore'] as $articulo_pedidosproveedore) {
                    if ($articulo_pedidosproveedore['id'] != 0) {
                        $articulo_albaranesproveedore = array();
                        $this->Albaranesproveedore->Pedidosproveedore->ArticulosPedidosproveedore->recursive = -1;
                        $articulo_pedidosproveedore = $this->Albaranesproveedore->Pedidosproveedore->ArticulosPedidosproveedore->find('first', array('conditions' => array('ArticulosPedidosproveedore.id' => $articulo_pedidosproveedore['id'])));
                        $articulo_albaranesproveedore['ArticulosAlbaranesproveedore']['albaranesproveedore_id'] = $id;
                        $articulo_albaranesproveedore['ArticulosAlbaranesproveedore']['tarea_id'] = $articulo_pedidosproveedore['ArticulosPedidosproveedore']['tarea_id'];
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
            $pedidosproveedore = $this->Albaranesproveedore->Pedidosproveedore->find('first', array('contain' => array('ArticulosPedidosproveedore' => array('Articulo', 'Tarea'), 'Presupuestosproveedore'), 'conditions' => array('Pedidosproveedore.id' => $pedidosproveedore_id)));
        }
        $numero = $this->Albaranesproveedore->dime_siguiente_numero();
        $estadosalbaranesproveedores = $this->Albaranesproveedore->Estadosalbaranesproveedore->find('list');
        $centrosdecostes = $this->Albaranesproveedore->Centrosdecoste->find('list');
        $this->set(compact('pedidosproveedore_id', 'pedidosproveedore', 'numero', 'estadosalbaranesproveedores','centrosdecostes'));
    }

    function edit($id = null) {
        if (!$id && empty($this->data)) {
            $this->flashWarnings(__('Albarán a Proveedor No válido', true));
            $this->redirect($this->referer());
        }
        if (!empty($this->data)) {
            if ($this->Albaranesproveedore->saveAll($this->data)) {
                $id = $this->Albaranesproveedore->id;
                $upload = $this->Albaranesproveedore->findById($id);
                if (!empty($this->data['Albaranesproveedore']['remove_file'])) {
                    $this->FileUpload->RemoveFile($upload['Albaranesproveedore']['albaranescaneado']);
                    $this->Albaranesproveedore->saveField('albaranescaneado', null);
                }
                if ($this->FileUpload->finalFile != null) {
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
            $albaranesproveedore = $this->Albaranesproveedore->find('first', array('conditions' => array('Albaranesproveedore.id' => $id),
                'contain' => array('Pedidosproveedore' =>
                    array('Presupuestosproveedore' =>
                        array('Proveedore',
                            'Almacene',
                            'Avisostallere' => array('Cliente', 'Centrostrabajo', 'Maquina', 'Estadosavisostallere'),
                            'Avisosrepuesto' => array('Cliente', 'Centrostrabajo', 'Maquina', 'Estadosaviso'),
                            'Ordene' => array('Avisostallere' => array('Cliente', 'Centrostrabajo', 'Maquina')))))));
            $this->set('albaranesproveedore', $albaranesproveedore);
            $this->data = $this->Albaranesproveedore->read(null, $id);
        }

        $estadosalbaranesproveedores = $this->Albaranesproveedore->Estadosalbaranesproveedore->find('list');
        $pedidosproveedores = $this->Albaranesproveedore->Pedidosproveedore->find('list');
        $centrosdecostes = $this->Albaranesproveedore->Centrosdecoste->find('list');
        $this->set(compact('pedidosproveedores', 'estadosalbaranesproveedores','centrosdecostes'));
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

    function facturacion() {
        if (!empty($this->data)) {
            $fecha_inicio = date('Y-m-d', strtotime($this->data['Filtro']['fecha_inicio']['year'] . '-' . $this->data['Filtro']['fecha_inicio']['month'] . '-' . $this->data['Filtro']['fecha_inicio']['day']));
            $fecha_fin = date('Y-m-d', strtotime($this->data['Filtro']['fecha_fin']['year'] . '-' . $this->data['Filtro']['fecha_fin']['month'] . '-' . $this->data['Filtro']['fecha_fin']['day']));
            if (!empty($this->data['Filtro']['todos'])) {
                /* Obtenemos los alabranes de todos los proveedores comprendidos en el rango de fecha
                 * y que se PUEDAN FACTURAR 
                 */
                $albaranesproveedores = $this->Albaranesproveedore->find('all', array('conditions' => array('Albaranesproveedore.confirmado' => 1, 'Albaranesproveedore.fecha BETWEEN ? AND ?' => array($fecha_inicio, $fecha_fin), 'Albaranesproveedore.facturasproveedore_id' => NULL), 'contain' => 'Proveedore', 'order' => 'Albaranesproveedore.proveedore_id'));
                $proveedore_list = array();
                foreach ($albaranesproveedores as $albaranesproveedore) {
                    $proveedore_list[$albaranesproveedore['Proveedore']['nombre']][] = $albaranesproveedore;
                }
            } elseif (!empty($this->data['Filtro']['Proveedore'])) {
                /* Obtenemos los alabranes de los proveedore comprendidos en el rango de fecha
                 * y que se PUEDAN FACTURAR 
                 */
                $albaranesproveedores = $this->Albaranesproveedore->find('all', array('conditions' => array('Albaranesproveedore.confirmado' => 1, 'Albaranesproveedore.fecha BETWEEN ? AND ?' => array($fecha_inicio, $fecha_fin), 'Albaranesproveedore.proveedore_id' => $this->data['Filtro']['Proveedore']), 'contain' => 'Proveedore', 'order' => 'Albaranesproveedore.proveedore_id'));
                $proveedore_list = array();
                foreach ($albaranesproveedores as $albaranesproveedore) {
                    $proveedore_list[$albaranesproveedore['Proveedore']['nombre']][] = $albaranesproveedore;
                }
            }
            $this->set(compact('proveedore_list'));
            $this->render('facturacion_list');
        }
    }

}

?>