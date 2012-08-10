<?php

class MaquinasController extends AppController {

    var $name = 'Maquinas';
    var $components = array('FileUpload');

    function index() {
        $maquinas = $this->paginate('Maquina');
        $this->paginate = array('limit' => 20, 'contain' => array('Centrostrabajo' => 'Cliente', 'Cliente'));
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
                $this->Session->setFlash(__('La Máquina ha sido guardada', true));
                $this->redirect(array('action' => 'view', $this->id));
            } else {
                $this->flashWarnings(__('La Máquina no ha podido ser guardada. Inténtalo de nuevo.', true));
            }
        }
        $centrostrabajos = $this->Maquina->Centrostrabajo->find('list');
        $clientes = $this->Maquina->Cliente->find('list');
        $this->set(compact('centrostrabajos', 'clientes'));
    }

    function add_popup($cliente_id = null, $centrostrabajo_id = null) {
        if (!empty($this->data)) {
            $this->Maquina->create();
            if ($this->Maquina->save($this->data)) {
                /* Guarda fichero */
                if ($this->FileUpload->finalFile != null) {
                    $this->Maquina->saveField('maquinaescaneada', $this->FileUpload->finalFile);
                }
                /* Fin de Guarda Fichero */
                $this->Session->setFlash(__('La Máquina ha sido guardada', true));
                $this->redirect($this->referer());
            } else {
                $this->flashWarnings(__('La Máquina no ha podido ser guardada. Inténtalo de nuevo.', true));
                $this->redirect($this->referer());
            }
        }
        $centrostrabajos = $this->Maquina->Centrostrabajo->find('list');
        $clientes = $this->Maquina->Cliente->find('list');
        if (!empty($cliente_id)) {
            $this->data = array('Maquina' => array('cliente_id' => $cliente_id));
            $centrostrabajos = $this->Maquina->Centrostrabajo->find('list', array('conditions' => array('Centrostrabajo.cliente_id' => $cliente_id)));
            if (!empty($centrostrabajo_id))
                $this->data['Maquina']['centrostrabajo_id'] = $centrostrabajo_id;
        }
        $this->set(compact('centrostrabajos', 'clientes'));
    }

    function edit($id = null) {
        if (!$id && empty($this->data)) {
            $this->Session->setFlash(__('Máquina no Válida', true));
            $this->redirect(array('action' => 'index'));
        }
        if (!empty($this->data)) {
            if ($this->Maquina->save($this->data)) {
                /* Edicion de  fichero */
                $id = $this->Maquina->id;
                $upload = $this->Maquina->findById($id);
                if (!empty($this->data['Maquina']['remove_file'])) {
                    $this->FileUpload->RemoveFile($upload['Maquina']['maquinaescaneada']);
                    $this->Maquina->saveField('maquinaescaneada', null);
                }
                if ($this->FileUpload->finalFile != null) {
                    $this->FileUpload->RemoveFile($upload['Maquina']['maquinaescaneada']);
                    $this->Maquina->saveField('maquinaescaneada', $this->FileUpload->finalFile);
                }
                /* Fin de Edicion Fichero */
                $this->Session->setFlash(__('La Máquina ha sido guardada', true));
                $this->redirect(array('action' => 'view', $id));
            } else {
                $this->flashWarnings(__('La Máquina no ha podido ser guardada. Inténtalo de nuevo.', true));
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
            $this->flashWarnings(__('Id de Máquina no válido', true));
            $this->redirect(array('action' => 'index'));
        }
        $upload = $this->Maquina->findById($id);
        if ($this->Maquina->delete($id)) {
            $this->FileUpload->RemoveFile($upload['Maquina']['maquinaescaneada']);
            $this->Session->setFlash(__('Máquina borrada', true));
            $this->redirect(array('action' => 'index'));
        }
        $this->flashWarnings(__('No se ha podido borrar la máquina', true));
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

    function selectAlbaranesclientesreparaciones() {
        $maquinas = $this->Maquina->find('list', array('conditions' => array('Maquina.centrostrabajo_id' => $this->data['Albaranesclientesreparacione']['centrostrabajo_id'])));
        $this->set(compact('maquinas'));
    }

    function selectAlbaranesclientes() {
        $maquinas = $this->Maquina->find('list', array('conditions' => array('Maquina.centrostrabajo_id' => $this->data['Albaranescliente']['centrostrabajo_id'])));
        $this->set(compact('maquinas'));
    }

    function selectPresupuestosclientes() {
        $maquinas = $this->Maquina->find('list', array('conditions' => array('Maquina.centrostrabajo_id' => $this->data['Presupuestoscliente']['centrostrabajo_id'])));
        $this->set(compact('maquinas'));
    }

    function beforeFilter() {
        parent::beforeFilter();
        $this->checkPermissions('Maquina', $this->params['action']);
        if ($this->params['action'] == 'edit' || $this->params['action'] == 'add'|| $this->params['action'] == 'add_popup') {
            $this->FileUpload->fileModel = 'Maquina';
            $this->FileUpload->uploadDir = 'files/maquina';
            $this->FileUpload->fields = array('name' => 'file_name', 'type' => 'file_type', 'size' => 'file_size');
        }
    }

}

?>
