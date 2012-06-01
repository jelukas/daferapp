<?php

class AppController extends Controller {

    var $helpers = array('Html', 'Form', 'Ajax', 'Javascript', 'Session', 'Js');
    var $components = array('RequestHandler', 'Session', 'Auth');

    function beforeFilter() {
        Configure::write('Config.language', 'spa');
        $this->RequestHandler->setContent('json', 'text/x-json');
    }

    function checkPermissions($model, $action) {
        $this->loadModel('User');
        $this->loadModel('Restriccione');

        $user = $this->User->findById($this->Auth->user("id"));
        $role_id = $user['Role']["id"];

        $restricciones = $this->Restriccione->find("all", array("conditions" => array('role_id' => $role_id, 'modelo' => $model, 'accion' => $action)));
        if (count($restricciones) > 0) {
            $this->Session->setFlash('No tiene permisos para realizar esta accion.' . $action);
            $this->redirect($this->referer());
        }
    }

    /**
     * -mensaje de Error para las Vistas
     * @param string $msg
     * @param string $url 
     */
    function flashWarnings($msg, $url = null) {
        $this->Session->setFlash(__($msg, true), 'warning');
        if (!empty($url)) {
            $this->redirect($url, null, true);
        }
    }

    /**
     * Get the String of all Validation Errors
     * @param array $errors 
     */
    function getStockErrors($errors) {
        $messages = '';
        foreach ($errors as $error) {
            foreach ($error as $error_field) {
                $messages .= '<br/>' . $error_field['cantidad'];
            }
        }
        return $messages;
    }

    public function autocomplete() {
        $model_class = $this->modelClass;
        if ($this->$model_class->hasField('autocomplete', true))
            $fields = array('nombre', 'id', 'autocomplete');
        else
            $fields = array('nombre', 'id');

        if ($this->$model_class->hasField('ref', false)) {
            $fields = array('nombre', 'id', 'ref', 'autocomplete');

            $objects = $this->$model_class->find('all', array(
                'conditions' => array(
                    $model_class . '.almacene_id' => $this->params['pass'][0],
                    'OR' => array(
                        $model_class . '.nombre LIKE' => $this->params['url']['term'] . '%',
                        $model_class . '.ref LIKE' => $this->params['url']['term'] . '%'
                    )
                ),
                'fields' => $fields,
                'recursive' => -1,
                    ));
        } else {
            $objects = $this->$model_class->find('all', array(
                'conditions' => array(
                    'OR' => array(
                        $model_class . '.nombre LIKE' => $this->params['url']['term'] . '%',
                        $model_class . '.id LIKE' => $this->params['url']['term'] . '%'
                    )
                ),
                'fields' => $fields,
                'recursive' => -1,
                    ));
        }
        
        $objects_array = array();
        foreach ($objects as $object) {
            if (isset($object[$model_class]["autocomplete"]))
                $objects_array[] = array("id" => $object[$model_class]["id"], "value" => $object[$model_class]["autocomplete"]);
            else
                $objects_array[] = array("id" => $object[$model_class]["id"], "value" => $object[$model_class]["nombre"]);
        }

        $this->set('objects', $objects_array);
        $this->layout = 'ajax';
        $this->render('/autocomplete/autocomplete');
    }

}
?>
	
