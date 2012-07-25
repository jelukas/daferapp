<?php

class CentrostrabajosController extends AppController {

    var $name = 'Centrostrabajos';
    var $helpers = array('Form', 'MultipleRecords', 'Ajax', 'Js');

    function index() {
        $this->Centrostrabajo->recursive = 0;
        $this->set('centrostrabajos', $this->paginate());
    }

    function view($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Invalid centrostrabajo', true));
            $this->redirect(array('action' => 'index'));
        }
        $centrostrabajo = $this->Centrostrabajo->read(null, $id);
        $this->set('centrostrabajo', $centrostrabajo);
        $maquinas = $this->Centrostrabajo->Maquina->find('list',array('conditions'=>array('Maquina.centrostrabajo_id' => $id)));
        $this->set('maquinas', $maquinas);
    }

    function add() {
        if (!empty($this->data)) {
            $this->Centrostrabajo->create();
            if ($this->Centrostrabajo->save($this->data)) {
                $this->Session->setFlash(__('The centrostrabajo has been saved', true));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The centrostrabajo could not be saved. Please, try again.', true));
            }
        }
        $clientes = $this->Centrostrabajo->Cliente->find('list');
        $this->set(compact('clientes'));
    }

    function edit($id = null) {
        if (!$id && empty($this->data)) {
            $this->Session->setFlash(__('Invalid centrostrabajo', true));
            $this->redirect($this->referer());
        }
        if (!empty($this->data)) {
            if ($this->Centrostrabajo->save($this->data)) {
                $this->Session->setFlash(__('The centrostrabajo has been saved', true));
                $this->redirect(array('action' => 'view',$this->Centrostrabajo->id));
            } else {
                $this->Session->setFlash(__('The centrostrabajo could not be saved. Please, try again.', true));
            }
        }
        if (empty($this->data)) {
            $this->data = $this->Centrostrabajo->read(null, $id);
        }
        $clientes = $this->Centrostrabajo->Cliente->find('list');
        $this->set(compact('clientes'));
    }

    function delete($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Invalid id for centrostrabajo', true));
            $this->redirect($this->referer());
        }
        if ($this->Centrostrabajo->delete($id)) {
            $this->Session->setFlash(__('Centrostrabajo deleted', true));
            $this->redirect($this->referer());
        }
        $this->Session->setFlash(__('Centrostrabajo was not deleted', true));
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

    function pdf() {
        Configure::write('debug', 0);
        $this->layout = 'pdf'; //this will use the pdf.ctp layout
        if (isset($_SESSION["last_search"])) {
            $this->set('centrostrabajos', $this->Centrostrabajo->find('all', $_SESSION["last_search"]));
        } else {
            $this->set('centrostrabajos', $this->Centrostrabajo->find('all', array('limit' => 200)));
        }
        unset($_SESSION["last_search"]);
        $this->render();
    }

    function selectAvisostalleres() {
        $centrostrabajos = $this->Centrostrabajo->find('list', array('conditions' => array('Centrostrabajo.cliente_id' => $this->data['Avisostallere']['cliente_id'])));
        $this->set(compact('centrostrabajos'));
    }
    function selectAlbaranesclientesreparaciones() {
        $centrostrabajos = $this->Centrostrabajo->find('list', array('conditions' => array('Centrostrabajo.cliente_id' => $this->data['Albaranesclientesreparacione']['cliente_id'])));
        $this->set(compact('centrostrabajos'));
    }
    function selectPresupuestoscliente() {
        $centrostrabajos = $this->Centrostrabajo->find('list', array('conditions' => array('Centrostrabajo.cliente_id' => $this->data['Presupuestoscliente']['cliente_id'])));
        $this->set(compact('centrostrabajos'));
    }

    function selectAvisosrepuestos() {
        $centrostrabajos = $this->Centrostrabajo->find('list', array('conditions' => array('Centrostrabajo.cliente_id' => $this->data['Avisosrepuesto']['cliente_id'])));
        $this->set(compact('centrostrabajos'));
    }
    function selectMaquina() {
        $centrostrabajos = $this->Centrostrabajo->find('list', array('conditions' => array('Centrostrabajo.cliente_id' => $this->data['Maquina']['cliente_id'])));
        $this->set(compact('centrostrabajos'));
    }

    function beforeFilter() {
        $this->checkPermissions('Centrostrabajo', $this->params['action']);
    }

}

?>
