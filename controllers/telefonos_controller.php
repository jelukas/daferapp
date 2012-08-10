<?php

class TelefonosController extends AppController {

    var $name = 'Telefonos';
    var $helpers = array('Form', 'Ajax', 'Js', 'Autocomplete');
    var $components = array('RequestHandler', 'Session');

    function add($tipo = null,$id = null) {
        if (!empty($this->data)) {
            $this->Telefono->create();
            if ($this->Telefono->save($this->data)) {
                $this->Session->setFlash(__('El Telefono ha sido añadido correctamente', true));
                $this->redirect($this->referer());
            } else {
                $this->flashWarnings(__('El Telefono no ha podido ser guardado. Por favor prueba de nuevo.', true));
                $this->redirect($this->referer());
            }
        }
        switch ($tipo) {
            case 'transportista':
                    $this->set('transportista_id',$id);
                break;
            case 'centrostrabajo':
                    $this->set('centrostrabajo_id',$id);
                break;
            case 'cliente':
                    $this->set('cliente_id',$id);
                break;
            case 'proveedore':
                    $this->set('proveedore_id',$id);
                break;
            default:
                break;
        }
    }

    function delete($id = null) {
        if (!$id) {
            $this->flashWarnings(__('Id de teléfono No válido', true));
        }
        if ($this->Telefono->delete($id)) {
            $this->Session->setFlash(__('Telefono borrado', true));
        } else {
            $this->flashWarnings(__('El teléfono no ha sido borrado', true));
        }
        $this->redirect($this->referer());
    }

}

?>