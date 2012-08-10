<?php

class ClientesController extends AppController {

    var $name = 'Clientes';
    var $helpers = array('Autocomplete');
    
    function index() {
        $this->Cliente->recursive = 0;
        $this->set('clientes', $this->paginate());
    }

    function view($id = null) {
        if (!$id) {
            $this->flashWarnings(__('Cliente no válido', true));
            $this->redirect($this->referer());
        }
        $this->set('cliente', $this->Cliente->read(null, $id));
    }

    function add() {
        if (!empty($this->data)) {
            $this->Cliente->create();
            if ($this->Cliente->saveAll($this->data)) {
                $this->Session->setFlash(__('El cliente ha sido salvado correctamente', true));
                $this->redirect(array('action' => 'view', $this->Cliente->id));
            } else {
                $this->flashWarnings(__('El cliente no ha podido ser salvado. Por favor, inténtelo de nuevo.', true));
            }
        }
        $comerciales = $this->Cliente->Comerciale->find('list');
        $this->set(compact('comerciales', 'formapagos'));
    }

    function edit($id = null) {
        if (!$id && empty($this->data)) {
            $this->flashWarnings(__('Cliente no válido', true));
            $this->redirect($this->referer());
        }
        if (!empty($this->data)) {
            if ($this->Cliente->saveAll($this->data)) {
                $this->Session->setFlash(__('El cliente ha sido salvado correctamente', true));
                $this->redirect($this->referer());
            } else {
                $this->flashWarnings(__('El cliente no ha podido ser salvado. Por favor, inténtelo de nuevo.', true));
            }
        }
        if (empty($this->data)) {
            $this->data = $this->Cliente->find('first',array('contain'=>array('Cuentascontable','Cuentasbancaria','Formapago'),'conditions'=>array('Cliente.id' => $id)));
        }
        $comerciales = $this->Cliente->Comerciale->find('list');
        $this->set(compact('comerciales'));
    }

    function delete($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('ID de cliente no válido', true));
            $this->redirect($this->referer());
        }
        if ($this->Cliente->delete($id)) {
            $this->Session->setFlash(__('Cliente eliminado', true));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('El cliente no ha sido eliminado', true));
        $this->redirect($this->referer());
    }

    function search() {
        $this->autoRender = false;
        $search = $this->data[$this->modelClass]['Buscar'];
        $search = explode(' ', $search);
        $cond = "";
        $i = 0;
        foreach ($this->{$this->modelClass}->_schema as $field => $value) {
            //debug($field);
            if ($i > 0) {
                $cond = $cond . " OR ";
            }
            $n = 0;
            foreach ($search as $word) {
                if ($n > 0) {
                    $cond = $cond . " AND ";
                }
                $cond = $cond . " " . $this->modelClass . "." . $field . " LIKE '%" . $word . "%' ";
                $n++;
            }
            $i++;
        }
        $conditions = array('limit' => 500, 'conditions' => $cond);
        $this->paginate = $conditions;
        $_SESSION["last_search"] = $conditions;
        array_shift($_SESSION["last_search"]);
        $this->set(strtolower($this->name), $this->paginate());
        $this->render('index');
    }

    function pdf() {
        Configure::write('debug', 0);
        $this->layout = 'pdf'; //this will use the pdf.ctp layout
        if (isset($_SESSION["last_search"])) {
            $this->set('clientes', $this->Cliente->find('all', $_SESSION["last_search"]));
        } else {
            $this->set('clientes', $this->Cliente->find('all', array('limit' => 200)));
        }
        unset($_SESSION["last_search"]);
        $this->render();
    }

    function beforeFilter() {
        $this->checkPermissions('Cliente', $this->params['action']);
    }

    function ajax_centrostrabajo() {
        $this->set('options', $this->Cliente->Centrostrabajo->find('list', array(
                    'conditions' => array(
                        'Centrostrabajo.cliente_id' => $this->data['Cliente']['id']
                    )
                        )
                )
        );
        $this->render('/elements/ajax_dropdown');
    }

    function select_albaranes1() {
        $this->Cliente->recursive = 2;
        $cliente_id = $this->data['FacturasCliente']['cliente_id'];
        $avisosrepuestos = $this->Cliente->Avisosrepuesto->find('list', array('conditions' => array('Avisosrepuesto.cliente_id' => $cliente_id)));
        $avisostalleres = $this->Cliente->Avisostallere->find('list', array('conditions' => array('Avisostallere.cliente_id' => $cliente_id)));
        $albaranesclientes = array();
        if (!empty($avisosrepuestos)) {
            foreach ($avisosrepuestos as $avisosrepuesto_id) {
                $albaran = $this->Cliente->Avisosrepuesto->Albaranescliente->find('list', array('conditions' => array('Albaranescliente.avisosrepuesto_id' => $avisosrepuesto_id)));
                if (!empty($albaran))
                    $albaranesclientes[] = $albaran;
            }
        }
        elseif (!empty($avisostalleres)) {
            foreach ($avisostalleres as $avisostaller_id) {
                $albaran = $this->Cliente->Avisostallere->Albaranescliente->find('list', array('conditions' => array('Albaranescliente.avisostallere_id' => $avisostaller_id)));
                if (!empty($albaran))
                    $albaranesclientes[] = $albaran;
            }
        }
        if (!empty($albaranesclientes[0]))
            $albaranesclientes = $albaranesclientes[0];
        $this->set(compact('albaranesclientes'));
    }

    function select_albaranes() {
        $this->Cliente->recursive = 2;
        $cliente_id = $this->data['FacturasCliente']['cliente_id'];
        $avisos = $this->Cliente->Avisostallere->findByClienteId($cliente_id);
        pr($avisos);
        die();
    }

}

?>
