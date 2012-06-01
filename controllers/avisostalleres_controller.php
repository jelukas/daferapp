<?php

class AvisostalleresController extends AppController {

    var $name = 'Avisostalleres';
    var $helpers = array('Html', 'Form', 'Ajax', 'Js');
    var $components = array('RequestHandler');

    function index() {
        $this->Avisostallere->recursive = -2;
        $this->set('avisostalleres', $this->paginate());
    }

    function view($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Invalid avisostallere', true));
            $this->redirect(array('action' => 'index'));
        }
        $estadosavisostalleres = $this->Avisostallere->Estadosavisostallere->find('list');
        $this->set('avisostallere', $this->Avisostallere->read(null, $id), 'estadosavisostallere');
        $this->loadModel('Ordene');
        $numOrdenes = $this->Ordene->find('count', array('conditions' => array('Ordene.avisostallere_id' => $id)));
        $this->set('numOrdenes', $numOrdenes);
    }

    function add() {
        if (!empty($this->data)) {

            $this->Avisostallere->create();
            if ($this->Avisostallere->save($this->data)) {
                $this->Session->setFlash(__('El aviso de taller ha sido creado correctamente', true));
                $this->redirect(array('action' => 'view', $this->Avisostallere->id));
            } else {
                $this->Session->setFlash(__('El aviso de taller no ha podido ser creado. Vuelva a intentarlo.', true));
            }
        }
        $clientes = $this->Avisostallere->Cliente->find('list');
        $maquinas = $this->Avisostallere->Maquina->find('list');
        $estadosavisostalleres = $this->Avisostallere->Estadosavisostallere->find('list');
        $centrostrabajos = $this->Avisostallere->Centrostrabajo->find('list');

        $this->set(compact('clientes', 'maquinas', 'centrostrabajos', 'estadosavisostalleres'));
    }

    function edit($id = null) {
        if (!$id && empty($this->data)) {
            $this->Session->setFlash(__('Aviso de Taller inválido', true));
            $this->redirect(array('action' => 'index'));
        }
        if (!empty($this->data)) {
            if ($this->Avisostallere->save($this->data)) {
                $this->Session->setFlash(__('El aviso de taller ha sido guardaddo correctamente.', true));
                $this->redirect($this->referer());
            } else {
                $this->Session->setFlash(__('El aviso de taller no ha podido ser guardado correctamente. Vuelva a intentarlo.', true));
            }
        }
        if (empty($this->data)) {
            $this->data = $this->Avisostallere->read(null, $id);
        }
        $clientes = $this->Avisostallere->Cliente->find('list');
        $maquinas = $this->Avisostallere->Maquina->find('list');
        $centrostrabajos = $this->Avisostallere->Centrostrabajo->find('list');
        $estadosavisostalleres = $this->Avisostallere->Estadosavisostallere->find('list');

        $this->set(compact('clientes', 'maquinas', 'centrostrabajos', 'estadosavisostalleres'));
    }

    function delete($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('ID no válido', true));
            $this->redirect(array('action' => 'index'));
        }
        if ($this->Avisostallere->delete($id)) {
            $this->Session->setFlash(__('Aviso de taller eliminado correctamente', true));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Aviso de taller no eliminado', true));
        $this->redirect(array('action' => 'index'));
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

    function mapa() {
        $this->Avisostallere->recursive = 1;

        $avisostalleres = $this->Avisostallere->findAllByEstadosavisostallere_id(array("1"));
        $estadosavisos = $this->Avisostallere->Estadosavisostallere->find('all');


        $this->set('avisostalleres', $avisostalleres);
        $this->set(compact('avisostalleres'));
    }

    function beforeFilter() {
        $this->checkPermissions('Avisostallere', $this->params['action']);
    }

    function getComboData($cntrl = null, $id = "id", $desc = "name") {
        // set autoRender to false for Ajax requests
        $this->autoRender = false;
        // set debug to 0 so debug information is not sent back to the application
        Configure::write('debug', 0);
        $result = $this->Requestor->$cntrl->find('all', array('fields' => array($cntrl . ".$id", $cntrl . ".$desc"), 'recursive' => -1));
        return json_encode($result);
    }

    function clientes() {
        $this->set('clientes', $this->Cliente->find('list'));
    }

    function ajax_centrostrabajo() {
        $this->set('options', $this->Cliente->Centrostrabajo->find('list', array(
                    'conditions' => array(
                        'Centrostrabajo.cliente_id' => $_GET['data']['Cliente']['id']
                    )
                        )
                )
        );
        $this->render('/elements/ajax_dropdown', 'ajax');
    }

    function pdf($id = null) {
        if ($id != null) {
            //Configure::write('debug',0);
            $this->layout = 'pdf';
            $this->Avisostallere->recursive = 2;
            $aviso = $this->Avisostallere->read(null, $id);
            //pr($aviso);die();
            $this->set('aviso', $aviso);
            $this->render();
        }
    }

    function descartar($id = null) {
        $this->Avisostallere->saveField('estadosavisostallere_id', 4);
        $this->redirect(array('action' => 'mapa'));
    }

}

?>
