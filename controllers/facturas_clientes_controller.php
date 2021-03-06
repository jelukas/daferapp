<?php

class FacturasClientesController extends AppController {

    var $name = 'FacturasClientes';
    var $components = array('FileUpload');
    var $helpers = array('Autocomplete', 'Time');

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

        $this->paginate = array('limit' => 20, 'contain' => array('Estadosfacturascliente', 'Cliente'));
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
        $this->set('facturasCliente', $this->FacturasCliente->find(
                        'first', array(
                    'contain' => array(
                        'Estadosfacturascliente',
                        'Cliente' => array('Formapago', 'Cuentasbancaria'),
                        'Albaranescliente' => array('Tiposiva', 'Cliente'),
                        'Albaranesclientesreparacione' => array('Tiposiva', 'Cliente')
                    ),
                    'conditions' => array('FacturasCliente.id' => $id)
                        )
                )
        );
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
        $this->set('estadosfacturasclientes', $this->FacturasCliente->Estadosfacturascliente->find('list'));
        $this->set('clientes', $this->FacturasCliente->Cliente->find('list'));
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

    function facturacion() {
        if (!empty($this->data)) {
            $fecha_inicio = date('Y-m-d', strtotime($this->data['Filtro']['fecha_inicio']['year'] . '-' . $this->data['Filtro']['fecha_inicio']['month'] . '-' . $this->data['Filtro']['fecha_inicio']['day']));
            $fecha_fin = date('Y-m-d', strtotime($this->data['Filtro']['fecha_fin']['year'] . '-' . $this->data['Filtro']['fecha_fin']['month'] . '-' . $this->data['Filtro']['fecha_fin']['day']));
            $cliente_facturable_list = array();
            if (!empty($this->data['Filtro']['todos'])) {
                $conditions = array();
                $conditions [] = array('1' => '1 AND ( (SELECT COUNT(Albaranescliente.id) FROM albaranesclientes Albaranescliente WHERE Albaranescliente.cliente_id = Cliente.id AND Albaranescliente.facturable = 1 AND Albaranescliente.estadosalbaranescliente_id = 2 AND Albaranescliente.fecha BETWEEN "' . $fecha_inicio . '" AND "' . $fecha_fin . '") OR (SELECT COUNT(Albaranesclientesreparacione.id) FROM albaranesclientesreparaciones Albaranesclientesreparacione WHERE Albaranesclientesreparacione.cliente_id = Cliente.id  AND Albaranesclientesreparacione.facturable = 1 AND Albaranesclientesreparacione.estadosalbaranesclientesreparacione_id = 2 AND Albaranesclientesreparacione.fecha BETWEEN "' . $fecha_inicio . '" AND "' . $fecha_fin . '") ) > 0');
                $clientes = $this->FacturasCliente->Cliente->find('all', array('contain' => '', 'conditions' => $conditions));
                foreach ($clientes as $key => $cliente) {
                    $this->FacturasCliente->Cliente->id = $cliente['Cliente']['id'];
                    $cliente_facturable = $this->FacturasCliente->Cliente->get_cliente_facturable($fecha_inicio, $fecha_fin);
                    $cliente_facturable_list[] = $cliente_facturable;
                }
            } else {
                $conditions = array();
                $conditions [] = array('Cliente.id' => $this->data['Filtro']['Cliente']);
                $conditions [] = array('1' => '1 AND ( (SELECT COUNT(Albaranescliente.id) FROM albaranesclientes Albaranescliente WHERE Albaranescliente.cliente_id = Cliente.id AND Albaranescliente.facturable = 1 AND Albaranescliente.estadosalbaranescliente_id = 2 AND Albaranescliente.fecha BETWEEN "' . $fecha_inicio . '" AND "' . $fecha_fin . '") OR (SELECT COUNT(Albaranesclientesreparacione.id) FROM albaranesclientesreparaciones Albaranesclientesreparacione WHERE Albaranesclientesreparacione.cliente_id = Cliente.id  AND Albaranesclientesreparacione.facturable = 1 AND Albaranesclientesreparacione.estadosalbaranesclientesreparacione_id = 2 AND Albaranesclientesreparacione.fecha BETWEEN "' . $fecha_inicio . '" AND "' . $fecha_fin . '") ) > 0');
                $clientes = $this->FacturasCliente->Cliente->find('all', array('contain' => '', 'conditions' => $conditions));
                foreach ($clientes as $key => $cliente) {
                    $this->FacturasCliente->Cliente->id = $cliente['Cliente']['id'];
                    $cliente_facturable = $this->FacturasCliente->Cliente->get_cliente_facturable($fecha_inicio, $fecha_fin);
                    $cliente_facturable_list[] = $cliente_facturable;
                }
            }
            $siguiente_numero = $this->FacturasCliente->dime_siguiente_numero();
            $this->set(compact('cliente_facturable_list','siguiente_numero'));
            $this->render('facturacion_list');
        }
    }

    function facturar() {
        if (!empty($this->data)) {
            $facturascliente_ids = array();
            foreach ($this->data['facturable'] as $facturable) {
                $this->FacturasCliente->create();
                $facturas_cliente = array();
                $cliente_id = $facturable['cliente_id'];
                $fecha = date('Y-m-d H:i:s');
                $baseimponible = 0;
                $impuestos = 0;

                $facturas_cliente['FacturasCliente']['numero'] = $facturable['numero'];
                $facturas_cliente['FacturasCliente']['fecha'] = $fecha;
                $facturas_cliente['FacturasCliente']['baseimponible'] = 0;
                $facturas_cliente['FacturasCliente']['cliente_id'] = $cliente_id;
                $facturas_cliente['FacturasCliente']['impuestos'] = 0;
                $facturas_cliente['FacturasCliente']['total'] = 0;
                if (!empty($facturable['albaranescliente']) || !empty($facturable['albaranesclientesreparacione'])) {
                    $this->FacturasCliente->save($facturas_cliente);
                    if (!empty($facturable['albaranescliente']))
                        foreach ($facturable['albaranescliente'] as $albarane_id) {
                            $albranescliente = $this->FacturasCliente->Albaranescliente->find('first', array('contain' => array(), 'conditions' => array('Albaranescliente.id' => $albarane_id)));
                            $this->FacturasCliente->Albaranescliente->id = $albranescliente['Albaranescliente']['id'];
                            $this->FacturasCliente->Albaranescliente->saveField('facturas_cliente_id', $this->FacturasCliente->id);
                            $baseimponible += $albranescliente['Albaranescliente']['precio'];
                            $impuestos += $albranescliente['Albaranescliente']['impuestos'];
                        }
                    if (!empty($facturable['albaranesclientesreparacione']))
                        foreach ($facturable['albaranesclientesreparacione'] as $albaranereparacione_id) {
                            $albranescliente = $this->FacturasCliente->Albaranesclientesreparacione->find('first', array('contain' => array('Tiposiva'), 'conditions' => array('Albaranesclientesreparacione.id' => $albaranereparacione_id)));
                            $this->FacturasCliente->Albaranesclientesreparacione->id = $albranescliente['Albaranesclientesreparacione']['id'];
                            $this->FacturasCliente->Albaranesclientesreparacione->saveField('facturas_cliente_id', $this->FacturasCliente->id);
                            $baseimponible += $albranescliente['Albaranesclientesreparacione']['baseimponible'];
                            $impuestos += $albranescliente['Albaranesclientesreparacione']['baseimponible'] * $albranescliente['Tiposiva']['porcentaje_aplicable'] / 100;
                        }
                    $this->FacturasCliente->saveField('baseimponible', redondear_dos_decimal($baseimponible));
                    $this->FacturasCliente->saveField('impuestos', redondear_dos_decimal($impuestos));
                    $this->FacturasCliente->saveField('total', redondear_dos_decimal($baseimponible + $impuestos));
                    $facturascliente_ids[] = $this->FacturasCliente->id;
                }
            }
            $facturasClientes = $this->FacturasCliente->find('all', array('contain' => array('Cliente', 'Estadosfacturascliente'), 'conditions' => array('FacturasCliente.id' => $facturascliente_ids)));
            $this->set(compact('facturasClientes'));
        } else {
            $this->flashWarnings(__('La Facturacion no puede ser realizada', true));
            $this->redirect($this->referer());
        }
    }

    function quitar_albaran_repuestos($albaranescliente_id) {
        $albaranescliente = $this->FacturasCliente->Albaranescliente->find('first', array('contain' => array(), 'conditions' => array('Albaranescliente.id' => $albaranescliente_id)));
        $this->FacturasCliente->Albaranescliente->id = $albaranescliente['Albaranescliente']['id'];
        $this->FacturasCliente->Albaranescliente->saveField('facturas_cliente_id', null);
        $this->FacturasCliente->id = $albaranescliente['Albaranescliente']['facturas_cliente_id'];
        $this->FacturasCliente->recalcular_totales();
        $this->redirect($this->referer());
    }

    function quitar_albaran_reparacion($albaranesclientesreparacione_id) {
        $albaranescliente = $this->FacturasCliente->Albaranesclientesreparacione->find('first', array('contain' => array(), 'conditions' => array('Albaranesclientesreparacione.id' => $albaranesclientesreparacione_id)));
        $this->FacturasCliente->Albaranesclientesreparacione->id = $albaranescliente['Albaranesclientesreparacione']['id'];
        $this->FacturasCliente->Albaranesclientesreparacione->saveField('facturas_cliente_id', null);
        $this->FacturasCliente->id = $albaranescliente['Albaranesclientesreparacione']['facturas_cliente_id'];
        $this->FacturasCliente->recalcular_totales();
        $this->redirect($this->referer());
    }

}

?>