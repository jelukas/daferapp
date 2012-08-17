<?php

class ArticulosController extends AppController {

    var $name = 'Articulos';
    var $components = array('FileUpload', 'Session');
    var $helpers = array('Html', 'Ajax', 'Javascript');

    function __construct($id = false, $table = null, $ds = null) {
        if (empty($this->alias))
            $this->alias = 'Articulo';
        parent::__construct($id, $table, $ds);
        $this->virtualFields['autocomplete'] = sprintf("CONCAT(" . $this->alias . ".ref, ' --- '," . $this->alias . ".nombre)");
    }

    function beforeFilter() {
        parent::beforeFilter();
        if ($this->params['action'] == 'edit' || $this->params['action'] == 'add') {
            $this->FileUpload->fileModel = 'Articulo';
            $this->FileUpload->uploadDir = 'files/articulo';
            $this->FileUpload->fields = array('name' => 'file_name', 'type' => 'file_type', 'size' => 'file_size');
        }
    }

    function index() {
        $this->paginate = array(
            'limit' => 60,
            'contain' => array('Familia', 'Almacene'),
            'order' => array('ref' => 'asc'),
        );
        $articulos = $this->paginate('Articulo');
        $this->set('articulos', $this->paginate());
    }

    function view($id = null) {
        if (!$id) {
            $this->flashWarnings(__('Artículo no válido', true));
            $this->redirect($this->referer());
        }
        $articulo = $this->Articulo->find('first', array('contain' => array('Almacene', 'Familia', 'Proveedore', 'Referido' => array('Articulo_referido' => array('Proveedore', 'Almacene'))), 'conditions' => array('Articulo.id' => $id)));
        $articulos_misma_ref = $this->Articulo->find('all', array('contain' => array('Almacene'), 'conditions' => array('Articulo.ref' => $articulo["Articulo"]["ref"])));
        $this->set(compact('articulo', 'articulos_misma_ref'));
    }

    function add() {
        if (!empty($this->data)) {
            $this->Articulo->create();
            $cantidad = $this->Articulo->find('count', array('conditions' => array('Articulo.ref' => $this->data['Articulo']['ref'],'Articulo.almacene_id' => $this->data['Articulo']['almacene_id'])));
            if ($cantidad > 0) {
                $this->flashWarnings(__('No se ha guardado el Artículo: Ya existe un Artículo con la misma referencia en este almacén.', true));
            } else {
                if ($this->Articulo->save($this->data)) {
                    /* Guarda fichero */
                    if ($this->FileUpload->finalFile != null) {
                        $this->Articulo->saveField('articuloescaneado', $this->FileUpload->finalFile);
                    }
                    /* FIn Guardar Fichero */
                    $this->Session->setFlash(__('The articulo has been saved', true));
                    $this->redirect($this->referer());
                } else {
                    $this->flashWarnings(__('The articulo could not be saved. Please, try again.', true));
                    $this->redirect($this->referer());
                }
            }
        }
        $familias = $this->Articulo->Familia->find('list');
        $this->set(compact('familias'));
        $almacenes = $this->Articulo->Almacene->find('list');
        $this->set(compact('almacenes'));
        $proveedores = $this->Articulo->Proveedore->find('list');
        $this->set(compact('proveedores'));
    }

    function edit($id = null) {
        if (!$id && empty($this->data)) {
            $this->flashWarnings(__('Invalid articulo', true));
            $this->redirect($this->referer());
        }
        if (!empty($this->data)) {
            if ($this->Articulo->save($this->data)) {
                $id = $this->Articulo->id;
                $upload = $this->Articulo->findById($id);
                if (!empty($this->data['Articulo']['remove_file'])) {
                    $this->FileUpload->RemoveFile($upload['Articulo']['articuloescaneado']);
                    $this->Articulo->saveField('articuloescaneado', null);
                }
                if ($this->FileUpload->finalFile != null) {
                    $this->FileUpload->RemoveFile($upload['Articulo']['articuloescaneado']);
                    $this->Articulo->saveField('articuloescaneado', $this->FileUpload->finalFile);
                }
                $this->Session->setFlash(__('The articulo has been saved', true));
                $this->redirect($this->referer());
            } else {
                $this->flashWarnings(__('The articulo could not be saved. Please, try again.', true));
            }
        }
        if (empty($this->data)) {
            $this->data = $this->Articulo->read(null, $id);
        }
        $familias = $this->Articulo->Familia->find('list');
        $this->set(compact('familias'));
        $almacenes = $this->Articulo->Almacene->find('list');
        $this->set(compact('almacenes'));
        $proveedores = $this->Articulo->Proveedore->find('list');
        $this->set(compact('proveedores'));
    }

    function delete($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('ID no válida', true));
            $this->redirect($this->referer());
        }
        $id = $this->Articulo->id;
        $upload = $this->Articulo->findById($id);
        $this->FileUpload->RemoveFile($upload['Articulo']['articuloescaneado']);
        if ($this->Articulo->delete($id)) {
            $this->Session->setFlash(__('Artículo borrado', true));
            $this->redirect($this->referer());
        }
        $this->Session->setFlash(__('El artículo no ha podido ser eliminado', true));
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
        if (isset($_SESSION["last_search"])) {
            $this->set('articulos', $this->Articulo->find('all', $_SESSION["last_search"]));
        } else {
            $this->set('articulos', $this->Articulo->find('all', array('limit' => 200)));
        }
        unset($_SESSION["last_search"]);
        $this->render();
    }

    function auto_complete() {
        if (!empty($this->params['pass'][0])) {
            $articulos = $this->Articulo->find('all', array(
                'conditions' => array(
                    'Articulo.almacene_id' => $this->params['pass'][0],
                    'OR' => array(
                        'Articulo.nombre LIKE' => $this->params['url']['term'] . '%',
                        'Articulo.ref LIKE' => $this->params['url']['term'] . '%'
                    ),
                ),
                'fields' => array('nombre', 'ref', 'id', 'precio_sin_iva'),
                'recursive' => -1,
                    ));
        } else {
            $articulos = $this->Articulo->find('all', array(
                'conditions' => array(
                    'OR' => array(
                        'Articulo.nombre LIKE' => $this->params['url']['term'] . '%',
                        'Articulo.ref LIKE' => $this->params['url']['term'] . '%'
                    ),
                ),
                'fields' => array('nombre', 'ref', 'id', 'precio_sin_iva'),
                'recursive' => -1,
                    ));
        }
        $articulos_array = array();
        foreach ($articulos as $articulo) {
            $articulos_array[] = array("id" => $articulo["Articulo"]["id"], "value" => $articulo["Articulo"]["nombre"], "ref" => $articulo["Articulo"]["ref"], "precio_sin_iva" => $articulo["Articulo"]["precio_sin_iva"]);
        }

        $this->set('articulos', $articulos_array);
        $this->layout = 'ajax';
    }

    function regularizar($id) {
        $this->layout = 'ajax';
        $nueva_existencias = $this->params['form']['nueva_existencia'];
        $this->Articulo->id = $id;
        if (!$this->Articulo->saveField('existencias', $nueva_existencias)) {
            die('No se puedo cambiar las existencias');
        }
        $this->set(compact('nueva_existencias'));
    }

    function json_infinite() {
        Configure::write('debug', 0);
        $this->layout = 'ajax';
        $articulos = $this->Articulo->find('all', array(
            'fields' => array('id', 'ref', 'nombre'),
            'contain' => '',
            'limit' => $this->params['url']['page_limit'],
            'page' => $this->params['url']['page'],
            'conditions' => array(
                'OR' => array('Articulo.nombre LIKE' => '%' . $this->params['url']['q'] . '%', 'Articulo.ref LIKE' => '%' . $this->params['url']['q'] . '%')
            ),
                ));
        $total = $this->Articulo->find('count', array(
            'conditions' => array(
                'OR' => array('Articulo.nombre LIKE' => '%' . $this->params['url']['q'] . '%', 'Articulo.ref LIKE' => '%' . $this->params['url']['q'] . '%')
            ),
                ));
        $articulos_array = array();
        foreach ($articulos as $articulo) {
            $articulos_array[] = array("id" => $articulo["Articulo"]["id"], "nombre" => $articulo["Articulo"]["nombre"], "ref" => $articulo["Articulo"]["ref"]);
        }
        $json['articulos'] = $articulos_array;
        $json['total'] = $total;
        $this->set('articulos', $json);
        $this->render('json');
    }

    function json_basico() {
        Configure::write('debug', 0);
        $this->layout = 'ajax';
        $articulos = $this->Articulo->find('all', array(
            'fields' => array('id', 'ref', 'nombre'),
            'contain' => '',
            'conditions' => array(
                'OR' => array('Articulo.nombre LIKE' => '%' . $this->params['url']['q'] . '%', 'Articulo.ref LIKE' => '%' . $this->params['url']['q'] . '%')
            ),
                ));
        $articulos_array = array();
        foreach ($articulos as $articulo) {
            $articulos_array[] = array("id" => $articulo["Articulo"]["id"], "nombre" => $articulo["Articulo"]["nombre"], "ref" => $articulo["Articulo"]["ref"]);
        }
        $json['articulos'] = $articulos_array;
        $this->set('articulos', $json);
        $this->render('json');
    }

    function prueba() {
        if (!empty($_POST)) {
            die(pr($_POST));
        }
    }

}

?>
