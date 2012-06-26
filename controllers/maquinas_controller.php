<?php

class MaquinasController extends AppController {

    var $name = 'Maquinas';

    function index() {
        $maquinas = $this->paginate('Maquina');
        $this->paginate = array('limit' => 20,'contain' => array('Centrostrabajo' => 'Cliente', 'Cliente'));
        $this->set('maquinas', $this->paginate());
    }

    function view($id = null) {
        if (!$id) {
            $this->flashWarnings(__('Invalid maquina', true));
            $this->redirect($this->referer());
        }
        $this->set('maquina', $this->Maquina->find('first', array('contain' => array('Articulosparamantenimiento' => 'Articulo', 'Otrosrepuesto' => 'Articulo', 'Centrostrabajo' => 'Cliente', 'Cliente'), 'conditions' => array('Maquina.id' => $id))));
    }

    function add() {
        if (!empty($this->data)) {
            $this->Maquina->create();
            if ($this->Maquina->save($this->data)) {
                $this->Session->setFlash(__('The maquina has been saved', true));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The maquina could not be saved. Please, try again.', true));
            }
        }
        $centrostrabajos = $this->Maquina->Centrostrabajo->find('list');
        $clientes = $this->Maquina->Cliente->find('list');
        $this->set(compact('centrostrabajos', 'clientes'));
    }

    function edit($id = null) {
        if (!$id && empty($this->data)) {
            $this->Session->setFlash(__('Invalid maquina', true));
            $this->redirect(array('action' => 'index'));
        }
        if (!empty($this->data)) {
            if ($this->Maquina->save($this->data)) {
                $this->Session->setFlash(__('The maquina has been saved', true));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The maquina could not be saved. Please, try again.', true));
            }
        }
        if (empty($this->data)) {
            $this->data = $this->Maquina->read(null, $id);
        }
        $maquina = $this->Maquina->find('first', array('contain' => array('Centrostrabajo' => 'Cliente'), 'conditions' => array('Maquina.id' => $id)));
        $centrostrabajos = $this->Maquina->Centrostrabajo->find('list', array('conditions' => array('Centrostrabajo.cliente_id' => $maquina['Centrostrabajo']['cliente_id'])));
        $this->set(compact('maquina', 'centrostrabajos'));
    }

    function delete($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Invalid id for maquina', true));
            $this->redirect(array('action' => 'index'));
        }
        if ($this->Maquina->delete($id)) {
            $this->Session->setFlash(__('Maquina deleted', true));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Maquina was not deleted', true));
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
        // Operaciones que deseamos realizar y variables que pasaremos a la vista.
        $this->set('maquinas', $this->paginate());
        $this->render();
    }

    function selectAvisostalleres() {
        $maquinas = $this->Maquina->find('list', array('conditions' => array('Maquina.centrostrabajo_id' => $this->data['Avisostallere']['centrostrabajo_id'])));
        $this->set(compact('maquinas'));
    }

    function selectAvisosrepuestos() {
        $maquinas = $this->Maquina->find('list', array('conditions' => array('Maquina.centrostrabajo_id' => $this->data['Avisosrepuesto']['centrostrabajo_id'])));
        $this->set(compact('maquinas'));
    }

    function beforeFilter() {
        $this->checkPermissions('Maquina', $this->params['action']);
    }

}

?>
