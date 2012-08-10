<?php

class TareasController extends AppController {

    var $name = 'Tareas';

    function index() {
        $this->Tarea->recursive = 0;
        $this->set('tareas', $this->paginate());
    }

    function view($id = null) {
        $this->Tarea->recursive = 2;
        if (!$id) {
            $this->flashWarnings(__('Tarea Inválida', true));
            $this->redirect(array('action' => 'index'));
        }
        $this->set('tarea', $this->Tarea->read(null, $id));
    }

    function add($ordene_id = null) {
        if (!empty($this->data)) {
            $stock_message = $this->comprobarExistencias();
            $this->Tarea->create();
            if ($this->Tarea->save($this->data)) {
                $id = $this->Tarea->id;

                if (!empty($_POST["ordene_id"]))
                    $this->Tarea->saveField('ordene_id', $_POST["ordene_id"]);

                $this->Session->setFlash(__('La nueva tarea de taller ha sido creada correctamente' . $stock_message, true));
                $this->redirect($this->referer());
            } else {
                $this->flashWarnings(__('La tarea de taller no ha podido ser creada correctamente. Vuelva a intentarlo' . $stock_message, true));
                $this->redirect($this->referer());
            }
        }
        $ordene = $this->Tarea->Ordene->read(null, $ordene_id);

        $this->set('ordene', $ordene);

        if ($ordene_id != null && $ordene_id >= 0) {
            $this->loadModel('Ordene');
            $ordene = $this->Ordene->read(null, $ordene_id);

            $this->set('ordene', $ordene);
        }
        $this->set(compact('avisostalleres', 'estadosordenes'));
    }

    function edit($id = null) {
        $this->Tarea->recursive = 2;
        if (!$id && empty($this->data)) {
            $this->flashWarnings(__('Tarea inválida', true));
            $this->redirect(array('action' => 'index'));
        }
        if (!empty($this->data)) {
            $stock_message = $this->comprobarExistencias();
            if ($this->Tarea->saveAll($this->data)) {
                $this->Session->setFlash(__('La Tarea ha sido guardada' . $stock_message, true));
                $this->redirect(array('action' => 'edit', $id));
            } else {
                $this->flashWarnings(__('La Tarea no ha podido ser guardada. Intentalo de nuevo.' . $stock_message, true));
            }
        }
        if (empty($this->data)) {
            if (!$this->data = $this->Tarea->read(null, $id)) {
                $this->flashWarnings(__('Tarea inválida', true));
                $this->redirect(array('action' => 'index'));
            };
        }
    }

    function delete($id = null) {
        if (!$id) {
            $this->flashWarnings(__('Id inválida para la Tarea', true));
            $this->redirect($this->referer());
        }
        if ($this->Tarea->delete($id)) {
            $this->Session->setFlash(__('Tarea borrada', true));
            $this->redirect($this->referer());
        }
        $this->flashWarnings(__('La Tarea no puedo ser borrada'. pr($this->Tarea->invalidFields()), true));
        $this->redirect($this->referer());
    }

    function pdf($id = null) {
        if ($id != null) {
            $this->Tarea->recursive = 2;
            $this->layout = 'pdf';
            $tarea = $this->Tarea->read(null, $id);
            $this->Tarea->Ordene->recursive = 2;
            $orden = $this->Tarea->Ordene->findById($tarea['Ordene']['id']);
            $this->set('orden', $orden);
            $this->set('tarea', $tarea);
            $this->render();
        }
    }

    /**
     * Comprueba las existencias y devuelve un String con los mensages de aviso.
     * @param array $errors 
     */
    private function comprobarExistencias() {
        /* Comprobacion de Stock */
        $warnings = "";
        foreach ($this->data['ArticulosTarea'] as $articulo_tarea) {
            $articulo = $this->Tarea->ArticulosTarea->Articulo->find('first', array('conditions' => array('Articulo.id' => $articulo_tarea['articulo_id'])));
            $existencias_al_final = intval($articulo['Articulo']['existencias']) - intval($articulo_tarea['cantidad']);
            if ($existencias_al_final < 0) {
                $warnings .= '<br/> No hay existencias suficientes del articulo ' . $articulo['Articulo']['ref'] . ' ---- ' . $articulo['Articulo']['nombre'];
            }
        }
        /* Fin de comprobación de Stock */
        return $warnings;
    }

}

?>