<?php

class AvisostalleresController extends AppController {

    var $name = 'Avisostalleres';
    var $helpers = array('Html', 'Form', 'Ajax', 'Js','Time','Autocomplete');
    var $components = array('RequestHandler', 'FileUpload');

    function beforeFilter() {
        parent::beforeFilter();
        $this->checkPermissions('Avisostallere', $this->params['action']);
        if ($this->params['action'] == 'edit' || $this->params['action'] == 'add') {
            $this->FileUpload->fileModel = 'Avisostallere';
            $this->FileUpload->uploadDir = 'files/avisostallere';
            $this->FileUpload->fields = array('name' => 'file_name', 'type' => 'file_type', 'size' => 'file_size');
        }
    }

    function index() {
        $this->Avisostallere->recursive = 1;
        $this->set('avisostalleres', $this->paginate());
    }

    function view($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Invalid avisostallere', true));
            $this->redirect(array('action' => 'index'));
        }
        $estadosavisostalleres = $this->Avisostallere->Estadosavisostallere->find('list');
        $this->set('avisostallere', $this->Avisostallere->find('first',array('contain'=>array('Cliente','Centrostrabajo','Maquina','Estadosavisostallere','Ordene','Presupuestoscliente'=>'Cliente','Presupuestosproveedore' => 'Proveedore'),'conditions'=>array('Avisostallere.id' => $id))));
        $numOrdenes = $this->Avisostallere->Ordene->find('count', array('conditions' => array('Ordene.avisostallere_id' => $id)));
        $this->set('numOrdenes', $numOrdenes);
    }

    function add() {
        if (!empty($this->data)) {
            $this->Avisostallere->create();
            if ($this->Avisostallere->save($this->data)) {
                /* Guarda fichero */
                if ($this->FileUpload->finalFile != null) {
                    $this->Avisostallere->saveField('documento', $this->FileUpload->finalFile);
                }
                /* FIn Guardar Fichero */
                $this->Session->setFlash(__('El aviso de taller ha sido creado correctamente', true));
                $this->redirect(array('action' => 'view', $this->Avisostallere->id));
            } else {
                $this->Session->setFlash(__('El aviso de taller no ha podido ser creado. Vuelva a intentarlo.', true));
            }
        }
        $estadosavisostalleres = $this->Avisostallere->Estadosavisostallere->find('list');
        $numero = $this->Avisostallere->dime_siguiente_numero();
        $this->set(compact( 'estadosavisostalleres', 'numero'));
    }

    function edit($id = null) {
        if (!$id && empty($this->data)) {
            $this->Session->setFlash(__('Aviso de Taller inválido', true));
            $this->redirect(array('action' => 'index'));
        }
        if (!empty($this->data)) {
            if ($this->Avisostallere->save($this->data)) {
                $id = $this->Avisostallere->id;
                $upload = $this->Avisostallere->findById($id);
                if (!empty($this->data['Avisostallere']['remove_file'])) {
                    $this->FileUpload->RemoveFile($upload['Avisostallere']['documento']);
                    $this->Avisostallere->saveField('documento', null);
                }
                if ($this->FileUpload->finalFile != null) {
                    $this->FileUpload->RemoveFile($upload['Avisostallere']['documento']);
                    $this->Avisostallere->saveField('documento', $this->FileUpload->finalFile);
                }
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
        $upload = $this->Avisostallere->findById($id);
        $this->FileUpload->RemoveFile($upload['Avisostallere']['documento']);
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
        $this->Avisostallere->id = $id;
        $this->Avisostallere->saveField('estadosavisostallere_id', 4);
        $this->redirect(array('action' => 'mapa'));
    }
    function aceptar($id = null) {
        $this->Avisostallere->id = $id;
        $this->Avisostallere->saveField('fechaaceptacion', date('Y-m-d'));
        $this->redirect(array('action' => 'mapa'));
    }

}

?>
