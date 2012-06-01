<?php

class AvisosrepuestosController extends AppController {

    var $name = 'Avisosrepuestos';
    var $helpers = array('Form', 'MultipleRecords', 'Ajax', 'Js','Crumb');
    var $components = array('RequestHandler', 'Session');

    function index() {
        $this->Avisosrepuesto->recursive = 0;
        $this->set('avisosrepuestos', $this->paginate());
    }

    function view($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Invalid avisosrepuesto', true));
            $this->redirect(array('action' => 'index'));
        }
        $articulo_aviso_repuesto = $this->Avisosrepuesto->ArticulosAvisosrepuesto->id;
        $estadosavisos = $this->Avisosrepuesto->Estadosaviso->find('list');
        $this->set('avisosrepuesto', $this->Avisosrepuesto->find('first', array('contain' => array('ArticulosAvisosrepuesto' =>'Articulo','Cliente','Centrostrabajo','Maquina','Almacene','Estadosaviso' ), 'conditions' => array('Avisosrepuesto.id' => $id))), 'estadosaviso');
        $this->Session->write('idAvisorepuesto', $this->Avisosrepuesto->id);
    }

    function add() {
        if (!empty($this->data)) {
            $this->Avisosrepuesto->create();
            $valid = $this->comprobarExistencias();
            if ($this->Avisosrepuesto->save($this->data)) {
                $this->Session->setFlash(__('El Aviso de repuestos ha sido guardado' . $valid, true));
                $this->redirect(array('action' => 'view', $this->Avisosrepuesto->id));
            } else {
                $this->Session->setFlash(__('No se pudo guardar el aviso de repuestos' . $valid, true));
            }
        }
        $clientes = $this->Avisosrepuesto->Cliente->find('list');
        $centrostrabajos = $this->Avisosrepuesto->Centrostrabajo->find('list');
        $maquinas = $this->Avisosrepuesto->Maquina->find('list');
        $almacenes = $this->Avisosrepuesto->Almacene->find('list');
        $estadosavisos = $this->Avisosrepuesto->Estadosaviso->find('list');

        $this->set(compact('clientes', 'centrostrabajos', 'maquinas', 'estadosavisos','almacenes'));
    }

    function edit($id = null) {
        $valid = "";
        if (!$id && empty($this->data)) {
            $this->Session->setFlash(__('Invalid avisosrepuesto', true));
            $this->redirect(array('action' => 'index'));
        }
        if (!empty($this->data)) {
            $valid = $this->comprobarExistencias();
            if ($this->Avisosrepuesto->save($this->data)) {
                $this->Session->setFlash(__('El Aviso de repuestos ha sido guardado' . $valid, true));
                $this->redirect(array('action' => 'view', $this->Avisosrepuesto->id));
            }else{
                $this->Session->setFlash(__('El aviso de repuesto no ha podido ser salvado.Inténtelo de nuevo.' . $valid, true));
            }
            $this->redirect(array('action' => 'index'));
        } else {
            
        }
        if (empty($this->data)) {
            $this->data = $this->Avisosrepuesto->read(null, $id);
        }
        $almacenes = $this->Avisosrepuesto->Almacene->find('list');
        $clientes = $this->Avisosrepuesto->Cliente->find('list');
        $centrostrabajos = $this->Avisosrepuesto->Centrostrabajo->find('list');
        $maquinas = $this->Avisosrepuesto->Maquina->find('list');
        $avisorepuesto = $this->Avisosrepuesto->findById($id);
        $articulos_aviso = $avisorepuesto['ArticulosAvisosrepuesto'];
        $this->Avisosrepuesto->ArticulosAvisosrepuesto->Articulo->recursive = -1;
        foreach ($articulos_aviso as $key => $articulo_aviso) {
            $articulo = $this->Avisosrepuesto->ArticulosAvisosrepuesto->Articulo->find('first', array('conditions' => array('Articulo.id' => $articulo_aviso['articulo_id'])));
            $articulos_aviso[$key]['Articulo'] = $articulo['Articulo'];
        }
        $estadosavisos = $this->Avisosrepuesto->Estadosaviso->find('list');
        $this->set(compact('clientes', 'centrostrabajos', 'maquinas','almacenes', 'estadosavisos', 'articulos_aviso'));
    }

    function delete($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Invalid id for avisosrepuesto', true));
            $this->redirect(array('action' => 'index'));
        }
        if ($this->Avisosrepuesto->delete($id)) {
            $this->Session->setFlash(__('Avisosrepuesto deleted', true));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Avisosrepuesto was not deleted', true));
        $this->redirect(array('action' => 'index'));
    }

    function select_albaranes() {
        $cliente_id = $this->data['FacturasCliente']['cliente_id'];
        $avisosrepuestos = $this->Avisosrepuesto->find('list', array('conditions' => array('Avisosrepuesto.cliente_id' => $cliente_id)));
        $albaranesclientes = array();
        foreach ($avisosrepuestos as $avisosrepuesto_id) {
            $albaran = $this->Avisosrepuesto->Albaranescliente->find('list', array('conditions' => array('Albaranescliente.avisosrepuesto_id' => $avisosrepuesto_id)));
            if (!empty($albaran))
                $albaranesclientes[] = $albaran;
        }
        $this->loadModel('Avisostallere');
        $avisostalleres = $this->Avisostallere->find('list', array('conditions' => array('Avisostallere.cliente_id' => $cliente_id)));
        foreach ($avisostalleres as $avisostallere_id) {
            $albaran = $this->Avisostallere->Albaranescliente->find('list', array('conditions' => array('Albaranescliente.avisostallere_id' => $avisostallere_id)));
            if (!empty($albaran))
                $albaranesclientes[] = $albaran;
        }
        $aux1 = array_shift($albaranesclientes);
        $aux2 = array_shift($albaranesclientes);
        $albaranesclientes = $aux1 + $aux2;
        $this->set(compact('albaranesclientes'));
    }

    function mapa() {
        $this->Avisosrepuesto->recursive = 1;
        $avisosrepuestos = $this->Avisosrepuesto->findAllByEstadosaviso_id(array("1", "2", "3", "4"));
        $estadosavisos = $this->Avisosrepuesto->Estadosaviso->find('all');

        $this->set('avisosrepuestos', $avisosrepuestos);
        $this->set(compact('avisosrepuestos'));
    }

    function pdf($id = null) {
        if ($id != null) {
            //Configure::write('debug',0);
            $this->layout = 'pdf';

            $aviso = $this->Avisosrepuesto->read(null, $id);
            $this->set('aviso', $aviso);
            $this->render();
        }
    }

    function descartar($id = null) {
        $this->Avisosrepuesto->saveField('estadosaviso_id', 7);
        $this->redirect(array('action' => 'mapa'));
    }

    /**
     * Comprueba las existencias y devuelve un String con los mensages de aviso.
     * @param array $errors 
     */
    private function comprobarExistencias() {
        /* Comprobacion de Stock */
        $warnings = "";
        foreach ($this->data['ArticulosAvisosrepuesto'] as $articulo_aviso) {
            $articulo = $this->Avisosrepuesto->ArticulosAvisosrepuesto->Articulo->find('first', array('conditions' => array('Articulo.id' => $articulo_aviso['articulo_id'])));
            $existencias_al_final = intval($articulo['Articulo']['existencias']) - intval($articulo_aviso['cantidad']);
            if ($existencias_al_final < 0) {
                $warnings .= '<br/> No hay existencias suficientes del articulo ' . $articulo['Articulo']['ref'] . ' ---- ' . $articulo['Articulo']['nombre'];
            }
        }
        /* Fin de comprobación de Stock */
        return $warnings;
    }

}

?>