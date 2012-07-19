<?php

class ConfigsController extends AppController {

    var $name = 'Configs';

    
    function edit($id = null) {
        if (!$id && empty($this->data)) {
            $this->flashWarnings(__('Invalid config', true));
            $this->redirect(array('action' => 'edit', 1));
        }
        if (!empty($this->data)) {
            if ($this->Config->save($this->data)) {
                $this->Session->setFlash(__('La configuración ha sido actualizada', true));
                $this->redirect(array('action' => 'edit', 1));
            } else {
                $this->flashWarnings(__('The config could not be saved. Please, try again.', true));
            }
        }
        if (empty($this->data)) {
            $this->data = $this->Config->read(null, $id);
        }
    }

}

?>