<?php

class MaterialesTareasalbaranesclientesController extends AppController {

    var $name = 'MaterialesTareasalbaranesclientes';
    var $layout = 'ajax';

    function index() {
        $this->MaterialesTareasalbaranescliente->recursive = 0;
        $this->set('materialesTareasalbaranesclientes', $this->paginate());
    }

    function view($id = null) {
        if (!$id) {
            $this->flashWarnings(__('Id incorrecto de Material del Albararán de Repuestos', true));
            $this->redirect($this->referer());
        }
        $this->set('materialesTareasalbaranescliente', $this->MaterialesTareasalbaranescliente->read(null, $id));
    }

    function add($tareasalbaranescliente_id = null) {
        if (!empty($this->data)) {
            $this->MaterialesTareasalbaranescliente->create();
            if ($this->MaterialesTareasalbaranescliente->save($this->data)) {
                $this->Session->setFlash(__('The materiales tareasalbaranescliente has been saved', true));
                $this->redirect($this->referer());
            } else {
                $this->flashWarnings(__('El Material para el Albarán de Repuestos no ha podido ser guardado.'.$this->MaterialesTareasalbaranescliente->session_message, true));
                $this->MaterialesTareasalbaranescliente->session_message = null;
                $this->redirect($this->referer());
            }
        }
        $tareasalbaranescliente = $this->MaterialesTareasalbaranescliente->Tareasalbaranescliente->find('first', array('contain' => array('Albaranescliente' => array('Pedidoscliente' => 'Presupuestoscliente')), 'conditions' => array('Tareasalbaranescliente.id' => $tareasalbaranescliente_id)));
        $this->set(compact('tareasalbaranescliente_id', 'tareasalbaranescliente'));
    }

    function add_ajax($tareasalbaranescliente_id) {
        $this->layout = 'ajax';
        if (!empty($this->data)) {
            $this->MaterialesTareasalbaranescliente->create();
            if ($this->MaterialesTareasalbaranescliente->save($this->data)) {
                $this->Session->setFlash(__('El material ha sido añadido', true));
            } else {
                $this->flashWarnings(__('El material no se pudo añadir. Prueba de nuevo.'.$this->MaterialesTareasalbaranescliente->session_message, true));
                $this->MaterialesTareasalbaranescliente->session_message = null;
            }
        }
        $tareasalbaranescliente = $this->MaterialesTareasalbaranescliente->Tareasalbaranescliente->find('first', array('contain' => 'Albaranescliente', 'conditions' => array('Tareasalbaranescliente.id' => $tareasalbaranescliente_id)));
        $this->set(compact('tareasalbaranescliente_id', 'tareasalbaranescliente'));
        $this->render('add');
    }

    function edit($id = null) {
        if (!$id && empty($this->data)) {
            $this->flashWarnings(__('Id incorrecto de Material del Albararán de Repuestos', true));
            $this->redirect($this->referer());
        }
        if (!empty($this->data)) {
            if ($this->MaterialesTareasalbaranescliente->save($this->data)) {
                $this->Session->setFlash(__('The materiales tareasalbaranescliente has been saved', true));
                $this->redirect($this->referer());
            } else {
                $this->flashWarnings(__('El Material para el Albarán de Repuestos no ha podido ser guardado.'.$this->MaterialesTareasalbaranescliente->session_message, true));
                $this->MaterialesTareasalbaranescliente->session_message = null;
                $this->redirect($this->referer());
            }
        }
        if (empty($this->data)) {
            $this->data = $this->MaterialesTareasalbaranescliente->read(null, $id);
        }
    }

    function delete($id = null) {
        if (!$id) {
            $this->flashWarnings(__('Invalid id for materiales tareasalbaranescliente', true));
        }
        if ($this->MaterialesTareasalbaranescliente->delete($id)) {
            $this->Session->setFlash(__('Materiales tareasalbaranescliente deleted', true));
        } else {
            $this->flashWarnings(__('Materiales tareasalbaranescliente was not deleted', true));
        }
        $this->redirect($this->referer());
    }

    function ver_ultima_venta($id) {
        $materiale = $this->MaterialesTareasalbaranescliente->find('first', array(
            'contain' => array('Tareasalbaranescliente' => 'Albaranescliente'),
            'conditions' => array('MaterialesTareasalbaranescliente.id' => $id)
                ));
        $cliente_id = $materiale['Tareasalbaranescliente']['Albaranescliente']['cliente_id'];
        $albaranescliente_id = $materiale['Tareasalbaranescliente']['Albaranescliente']['id'];
        $articulo_id = $materiale['MaterialesTareasalbaranescliente']['articulo_id'];

        $ultimo_precio_venta = 0;
        $sql = "SELECT * FROM materiales_tareasalbaranesclientes as MaterialesTareasalbaranescliente WHERE MaterialesTareasalbaranescliente.articulo_id = '" . $articulo_id . "' AND  MaterialesTareasalbaranescliente.tareasalbaranescliente_id IN (SELECT Tareasalbaranescliente.id FROM tareasalbaranesclientes as Tareasalbaranescliente WHERE Tareasalbaranescliente.albaranescliente_id IN (SELECT Albaranescliente.id FROM albaranesclientes as Albaranescliente WHERE Albaranescliente.cliente_id = '" . $cliente_id . "' AND Albaranescliente.id != '" . $albaranescliente_id . "')) ORDER BY  MaterialesTareasalbaranescliente.id DESC;";
        $materiales_ultimo_vendidos = $this->MaterialesTareasalbaranescliente->query($sql);
        $materiale = array_shift($materiales_ultimo_vendidos);
        $materiale = $this->MaterialesTareasalbaranescliente->find('first', array(
            'contain' => array('Tareasalbaranescliente' => 'Albaranescliente'),
            'conditions' => array('MaterialesTareasalbaranescliente.id' => $materiale['MaterialesTareasalbaranescliente']['id'])
                ));
        $this->set(compact('materiale'));
    }


}

?>