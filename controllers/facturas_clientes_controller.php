<?php

class FacturasClientesController extends AppController {

    var $name = 'FacturasClientes';
    var $components = array('FileUpload');
    var $helpers = array('Autocomplete');

    function beforeFilter() {
        parent::beforeFilter();
        if ($this->params['action'] == 'edit' || $this->params['action'] == 'add') {
            $this->FileUpload->fileModel = 'FacturasCliente';
            $this->FileUpload->uploadDir = 'files/facturascliente';
            $this->FileUpload->fields = array('name' => 'file_name', 'type' => 'file_type', 'size' => 'file_size');
        }
    }

    function index() {
        $this->FacturasCliente->recursive = 2;

        $conditions = array();
        if (!empty($this->params['url']['cliente_id'])) {
            $conditions['FacturasCliente.cliente_id ='] = $this->params['url']['cliente_id'];
        }
        if (!empty($this->params['url']['numero'])) {
            $conditions['FacturasCliente.numero ='] = $this->params['url']['numero'];
        }
        if (!empty($this->params['url']['day_factura_f']) && !empty($this->params['url']['month_factura_f']) && !empty($this->params['url']['year_factura_f'])) {
            $conditions['FacturasCliente.fecha >='] = $this->params['url']['year_factura_f'] . '-' . $this->params['url']['month_factura_f'] . '-' . $this->params['url']['day_factura_f'];
        }
        if (!empty($this->params['url']['day_factura_t']) && !empty($this->params['url']['month_factura_t']) && !empty($this->params['url']['year_factura_t'])) {
            $conditions['FacturasCliente.fecha <='] = $this->params['url']['year_factura_t'] . '-' . $this->params['url']['month_factura_t'] . '-' . $this->params['url']['day_factura_t'];
        }

        if (!empty($this->params['url']['tiposiva_id'])) {
            $conditions['FacturasCliente.tiposiva_id ='] = $this->params['url']['tiposiva_id'];
        }


        $facturasClientes = $this->paginate('FacturasCliente', $conditions);
        $this->set('facturasClientes', $facturasClientes);
        if (!empty($this->params['url']['pdf'])) {
            $this->layout = 'pdf';
            $this->render('/facturas_clientes/pdfFilter');
        }
    }

    function view($id = null) {
        if (!$id) {
            $this->flashWarnings(__('Invalid facturas cliente', true));
            $this->redirect($this->referer());
        }
        $this->set('facturasCliente', $this->FacturasCliente->find('first', array('contain' => array('Cliente', 'Albaranescliente'), 'conditions' => array('FacturasCliente.id' => $id))));
    }

    function add() {
        $this->FacturasCliente->recursive = 2;
        if (!empty($this->data)) {
            $this->FacturasCliente->create();
            if ($this->FacturasCliente->save($this->data)) {
                $id = $this->FacturasCliente->id;
                if ($this->FileUpload->finalFile != null) {
                    $this->FacturasCliente->saveField('facturaescaneada', $this->FileUpload->finalFile);
                }
                $this->Session->setFlash(__('The facturas cliente has been saved', true));
                $this->redirect(array('action' => 'view', $this->FacturasCliente->id));
            } else {
                $this->flashWarnings(__('The facturas cliente could not be saved. Please, try again.', true));
            }
        }
        $albaranesclientes = $this->FacturasCliente->Albaranescliente->find('list');
        $this->set(compact('albaranesclientes'));
    }

    function edit($id = null) {
        if (!$id && empty($this->data)) {
            $this->flashWarnings(__('Invalid facturas cliente', true));
            $this->redirect($this->referer());
        }
        if (!empty($this->data)) {
            if ($this->FacturasCliente->save($this->data)) {
                $id = $this->FacturasCliente->id;
                $upload = $this->FacturasCliente->findById($id);
                if (!empty($this->data['FacturasCliente']['remove_file'])) {
                    $this->FileUpload->RemoveFile($upload['FacturasCliente']['facturaescaneada']);
                    $this->FacturasCliente->saveField('facturaescaneada', null);
                }
                if ($this->FileUpload->finalFile != null) {
                    $this->FileUpload->RemoveFile($upload['FacturasCliente']['facturaescaneada']);
                    $this->FacturasCliente->saveField('facturaescaneada', $this->FileUpload->finalFile);
                }
                $this->Session->setFlash(__('The facturas cliente has been saved', true));
                $this->redirect($this->referer());
            } else {
                $this->flashWarnings(__('The facturas cliente could not be saved. Please, try again.', true));
            }
        }
        if (empty($this->data)) {
            $this->data = $this->FacturasCliente->read(null, $id);
        }
    }

    function delete($id = null) {
        if (!$id) {
            $this->flashWarnings(__('Invalid id for facturas cliente', true));
            $this->redirect($this->referer());
        }
        $id = $this->FacturasCliente->id;
        $upload = $this->FacturasCliente->findById($id);
        $this->FileUpload->RemoveFile($upload['FacturasCliente']['facturaescaneada']);
        if ($this->FacturasCliente->delete($id)) {
            $this->Session->setFlash(__('Facturas cliente deleted', true));
            $this->redirect(array('action' => 'index'));
        }
        $this->flashWarnings(__('No se pudo borrar la factura cliente', true));
        $this->redirect($this->referer());
    }

    function facturar() {
        if (!empty($this->data)) {
            $facturascliente_ids = array();
            foreach ($this->data['facturable'] as $factura_id => $albaranes_id) {
                $this->FacturasCliente->create();
                $facturas_cliente = array();
                $cliente_id = null;
                $fecha = date('Y-m-d H:i:s');
                $total = 0;
                $facturas_cliente['FacturasCliente']['fecha'] = $fecha;
                $facturas_cliente['FacturasCliente']['total'] = $total;
                $this->FacturasCliente->save($facturas_cliente);
                foreach ($albaranes_id as $albarane_id) {
                    $albranescliente = $this->FacturasCliente->Albaranescliente->find('first', array('contain' => array(), 'conditions' => array('Albaranescliente.id' => $albarane_id)));
                    $this->FacturasCliente->Albaranescliente->id = $albranescliente['Albaranescliente']['id'];
                    $this->FacturasCliente->Albaranescliente->saveField('facturas_cliente_id', $this->FacturasCliente->id);
                    $cliente_id = $albranescliente['Albaranescliente']['cliente_id'];
                    $total += $albranescliente['Albaranescliente']['precio'];
                }
                $this->FacturasCliente->saveField('cliente_id', $cliente_id);
                $this->FacturasCliente->saveField('total', number_format($total, 5, '.', ''));
                $facturascliente_ids[] = $this->FacturasCliente->id;
            }
            $facturasClientes = $this->FacturasCliente->find('all', array('contain' => array('Cliente'), 'conditions' => array('FacturasCliente.id' => $facturascliente_ids)));
            $this->set(compact('facturasClientes'));
        } else {
            $this->flashWarnings(__('La Facturacion no puede ser realizada', true));
            $this->redirect($this->referer());
        }
    }

    function quitar_albaran($albaranescliente_id) {
        $albaranescliente = $this->FacturasCliente->Albaranescliente->find('first', array('contain' => array(), 'conditions' => array('Albaranescliente.id' => $albaranescliente_id)));
        $facturasClientes = $this->FacturasCliente->find('first', array('contain' => array(), 'conditions' => array('FacturasCliente.id' => $albaranescliente['Albaranescliente']['facturas_cliente_id'])));
        $this->FacturasCliente->id = $facturasClientes['FacturasCliente']['id'];
        $this->FacturasCliente->saveField('total', redondear_dos_decimal($facturasClientes['FacturasCliente']['total'] - $albaranescliente['Albaranescliente']['precio']));
        $this->FacturasCliente->Albaranescliente->id = $albaranescliente['Albaranescliente']['id'];
        $this->FacturasCliente->Albaranescliente->saveField('facturas_cliente_id', null);
        $this->redirect($this->referer());
    }

    function facturacion() {
        if (!empty($this->data)) {
            $fecha_inicio = date('Y-m-d', strtotime($this->data['Filtro']['fecha_inicio']['year'] . '-' . $this->data['Filtro']['fecha_inicio']['month'] . '-' . $this->data['Filtro']['fecha_inicio']['day']));
            $fecha_fin = date('Y-m-d', strtotime($this->data['Filtro']['fecha_fin']['year'] . '-' . $this->data['Filtro']['fecha_fin']['month'] . '-' . $this->data['Filtro']['fecha_fin']['day']));
            if (!empty($this->data['Filtro']['todos'])) {
                /* Obtenemos los alabranes de todos los clientes comprendidos en el rango de fecha
                 * y que se PUEDAN FACTURAR 
                 */
                $albaranesreparacion_list = $this->FacturasCliente->Albaranesclientesreparacione->find(
                        'all', array(
                    'contain' => '',
                    'conditions' => array(
                        'Albaranesclientesreparacione.facturable' => 1,
                        'Albaranesclientesreparacione.facturas_cliente_id' => null,
                        'Albaranesclientesreparacione.fecha BETWEEN ? AND ?' => array($fecha_inicio, $fecha_fin)
                    )
                        ));
                 $albaranesrepuestos_list = $this->FacturasCliente->Albaranescliente->find(
                        'all', array(
                    'contain' => '',
                    'conditions' => array(
                        'Albaranescliente.facturable' => 1,
                        'Albaranescliente.facturas_cliente_id' => null,
                        'Albaranescliente.fecha BETWEEN ? AND ?' => array($fecha_inicio, $fecha_fin)
                    )
                        ));
                 die(pr($albaranesrepuestos_list));
            } elseif (!empty($this->data['Filtro']['Cliente'])) {
                /* Obtenemos los alabranes de los clientes selecionados comprendidos en el rango de fecha
                 * y que se PUEDAN FACTURAR 
                 */
            }
            $this->set(compact('cliente_list'));
            $this->render('facturacion_list');
        }
    }

}

?>