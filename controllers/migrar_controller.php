<?php

class MigrarController extends AppController {

    var $name = 'Migrar';
    var $helpers = array('Autocomplete', 'Ajax', 'Javascript');
    var $components = array('Session', 'RequestHandler');
    var $uses = null;

    function familias() {
        $path = '../csvs/FAMILIA.csv';
        $primera_fila = true;
        if (($handle = fopen($path, "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
                /* Por cada fila insertar en base de datos */
                /*
                 *  0 => CODFAM
                 *  1 => DESFAM
                 */
                //Si no es la primera fila
                if (!$primera_fila) {
                    $this->loadModel('Familia');
                    $this->Familia->create();
                    $familia = array();
                    $familia['Familia']['codigo'] = $data[0];
                    $familia['Familia']['nombre'] = $data[1];
                    $familia['Familia']['descripcion'] = "";
                    $this->Familia->save($familia);
                } else {
                    $primera_fila = false;
                }
            }
            fclose($handle);
        }
        die('Migracion de Familias Completada');
    }

    function proveedores() {
        $path = '../csvs/PROVEED.csv';
        $primera_fila = true;
        if (($handle = fopen($path, "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
                /* Por cada fila insertar en base de datos */
                /*
                  [0] => CODPRO
                  [1] => NOMPRO
                  [2] => APEPRO
                  [3] => CTACON
                  [4] => DOMPRO
                  [5] => POBPRO
                  [6] => PROPRO
                  [7] => DPOPRO
                  [8] => ACOPRO
                  [9] => TELEF1
                  [10] => TELEF2
                  [11] => TELEF3
                  [12] => FAXPRO
                  [13] => CONPRO
                  [14] => DTOCAB
                  [15] => DTODET
                  [16] => DIAPA1
                  [17] => DIAPA2
                  [18] => CIFPRO
                  [19] => CODTIP
                  [20] => CODPAG
                  [21] => CODMON
                 */
                //Si no es la primera fila
                if (!$primera_fila) {
                    $this->loadModel('Proveedore');
                    $this->Proveedore->create();
                    $familia = array();
                    $familia['Proveedore']['cif'] = $data[18];
                    $familia['Proveedore']['nombre'] = $data[1] . ' ' . $data[2];
                    $familia['Proveedore']['nombrefiscal'] = $data[1] . ' ' . $data[2];
                    $familia['Proveedore']['direccion'] = $data[4];
                    $familia['Proveedore']['direccionfiscal'] = $data[4];
                    $familia['Proveedore']['direccionalmacen'] = "";
                    $familia['Proveedore']['telefono'] = $data[9];
                    $familia['Proveedore']['fax'] = $data[12];
                    $familia['Proveedore']['web'] = "";
                    $familia['Proveedore']['proveedoresde'] = "";
                    $familia['Proveedore']['email'] = "";
                    $familia['Proveedore']['comercial'] = "";
                    $familia['Proveedore']['personascontacto'] = $data[13];
                    $familia['Proveedore']['observaciones'] = "";
                    $familia['Proveedore']['poblacion'] = $data[5];
                    $familia['Proveedore']['provincia'] = $data[6];
                    $familia['Proveedore']['cp'] = $data[7];
                    $familia['Proveedore']['pais'] = "";
                    $familia['Proveedore']['tipotransporte'] = "";
                    $familia['Proveedore']['formapedido'] = "";
                    $familia['Proveedore']['ecommerce'] = "";
                    $familia['Proveedore']['usuario'] = "";
                    $familia['Proveedore']['contrasenia'] = "";
                    $familia['Proveedore']['tiposiva_id'] = 7;
                    $familia['Proveedore']['cuentascontable_id'] = null;
                    $familia['Proveedore']['apartadocorreos'] = $data[8];
                    $familia['Proveedore']['codpro'] = $data[0];
                    $this->Proveedore->save($familia);
                } else {
                    $primera_fila = false;
                }
            }
            fclose($handle);
        }
        die('Migracion de Proveedores Completada');
    }

    function almacenes() {
        $path = '../csvs/ALMACEN.csv';
        $primera_fila = true;
        if (($handle = fopen($path, "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
                /* Por cada fila insertar en base de datos */
                /*
                  [0] => CODALM
                  [1] => DESALM
                 */
                //Si no es la primera fila
                if (!$primera_fila) {
                    $this->loadModel('Almacene');
                    $this->Almacene->create();
                    $familia = array();
                    $familia['Almacene']['nombre'] = $data[1];
                    $familia['Almacene']['direccion'] = "";
                    $familia['Almacene']['telefono'] = "";
                    $familia['Almacene']['codalm'] = $data[0];
                    $this->Almacene->save($familia);
                } else {
                    $primera_fila = false;
                }
            }
            fclose($handle);
        }
        die('Migracion de Almacenes Completada');
    }

    function articulos() {
        $path = '../csvs/ARTICAL.csv';
        $primera_fila = true;
        if (($handle = fopen($path, "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ";") ) !== FALSE) {
                /* Por cada fila insertar en base de datos */
                /*
                 * [0] => CODALM
                  [1] => CODPDT
                  [2] => LOCALIZ
                  [3] => SISVAL
                  [4] => PVP1
                  [5] => PRESTA
                  [6] => PREULT
                  [7] => PREMED
                  [8] => CANEXI
                  [9] => CODPRV
                  [10] => STOCKMIN
                  [11] => STOCKMAX
                 */
                //Si no es la primera fila
                if (!$primera_fila) {
                    $this->loadModel('Articulo');
                    $this->Articulo->create();
                    $articulo = array();
                    $articulo['Articulo']['ref'] = $data[1];
                    $articulo['Articulo']['nombre'] = "";
                    $articulo['Articulo']['codigobarras'] = "";
                    $articulo['Articulo']['valoracion'] = 0;
                    $articulo['Articulo']['precio_sin_iva'] = str_replace(',', '.', $data[4]);
                    $articulo['Articulo']['ultimopreciocompra'] = str_replace(',', '.', $data[6]);
                    $articulo['Articulo']['familia_id'] = null;
                    $articulo['Articulo']['localizacion'] = $data[2];
                    $articulo['Articulo']['existencias'] = $data[8];
                    $almacene = $this->Articulo->Almacene->find('first', array('contain' => array(), 'conditions' => array('Almacene.codalm' => $data[0])));
                    $articulo['Articulo']['almacene_id'] = $almacene['Almacene']['id'];
                    $proveedore = $this->Articulo->Proveedore->find('first', array('contain' => array(), 'conditions' => array('Proveedore.codpro' => (int) $data[9])));
                    $articulo['Articulo']['proveedore_id'] = $proveedore['Proveedore']['id'];
                    $articulo['Articulo']['stock_minimo'] = $data[10];
                    $articulo['Articulo']['stock_maximo'] = $data[11];
                    $articulo['Articulo']['observaciones'] = "";
                    $articulo['Articulo']['articuloescaneado'] = "";
                    $this->Articulo->save($articulo);
                } else {
                    $primera_fila = false;
                }
            }
        }
        fclose($handle);

        $path = '../csvs/ARTICBA.csv';
        $primera_fila = true;
        if (($handle = fopen($path, "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
                if (!$primera_fila) {
                    $this->loadModel('Articulo');
                    $articulos = $this->Articulo->find('all', array('contain' => array(), 'conditions' => array('Articulo.ref' => $data[0])));
                    foreach ($articulos as $articulo) {
                        $familia = $this->Articulo->Familia->find('first', array('fields' => array('id'), 'contain' => array(), 'conditions' => array('Familia.codigo' => (int) $data[3])));
                        $articulo['Articulo']['familia_id'] = $familia['Familia']['id'];
                        $articulo['Articulo']['nombre'] = $data[1];
                        $articulo['Articulo']['codigobarras'] = $data[2];
                        pr($articulo);
                        $this->Articulo->save($articulo);
                    }
                } else {
                    $primera_fila = false;
                }
            }
            fclose($handle);
        }
        die('Migracion de Articulos Completada');
    }

    function cuentascontables() {
        $path = '../csvs/CUENTAS08.csv';
        $primera_fila = true;
        if (($handle = fopen($path, "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
                if (!$primera_fila) {
                    $this->loadModel('Cuentascontable');
                    $this->Cuentascontable->create();
                    $cuentascontable = array();
                    $cuentascontable['Cuentascontable']['codigo'] = $data[0];
                    $cuentascontable['Cuentascontable']['nombre'] = $data[1];
                    $cuentascontable['Cuentascontable']['nombre_cuenta_abierta'] = $data[2];
                    $cuentascontable['Cuentascontable']['nombre_cuenta_externa'] = $data[3];
                    $this->Cuentascontable->save($cuentascontable);
                } else {
                    $primera_fila = false;
                }
            }
            fclose($handle);
        }
        die('Migracion de Cuentas Contables Completada');
    }

    function clientes() {
        $path = '../csvs/CLIENTE.csv';
        $primera_fila = true;
        /*
         *     [0] => CODCLI
          [1] => NOMCLI
          [2] => CIFCLI
          [3] => APECLI
          [4] => CTACON
          [5] => DOMCLI
          [6] => POBCLI
          [7] => PROCLI
          [8] => DPOCLI
          [9] => ACOCLI
          [10] => TELEF1
          [11] => TELEF2
          [12] => TELEF3
          [13] => FAXCLI
          [14] => CONCLI
          [15] => TIPFAC
          [16] => TARIPR
          [17] => DTOCAB
          [18] => TIPIMP
          [19] => DTOOBR
          [20] => RECARG
          [21] => DTOMAT
          [22] => FORPAG
          [23] => DIAPA1
          [24] => DIAPA2
          [25] => CODBAN
          [26] => CODSUC
          [27] => DIGCON
          [28] => CODCUE
          [29] => TAROBR
          [30] => DESHOR
          [31] => PREHOR
          [32] => NUMKM
          [33] => PREKM
          [34] => CLAFAC
          [35] => DIETENT
          [36] => MONEDA
          [37] => CONTROLRIE
          [38] => RIECON
          [39] => IMPREF
          [40] => IMPHOR
          [41] => DTOREP
          [42] => TARIREP

         */
        if (($handle = fopen($path, "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
                if (!$primera_fila) {
                    $this->loadModel('Cliente');
                    $this->Cliente->create();
                    $cliente = array();
                    $cliente['Cliente']['cif'] = $data[2];
                    $cliente['Cliente']['nombrefiscal'] = $data[1] . " " . $data[3];
                    $cliente['Cliente']['nombre'] = $data[1] . " " . $data[3];
                    $cliente['Cliente']['personascontacto'] = $data[14];
                    $cliente['Cliente']['telefono'] = $data[10];
                    $cliente['Cliente']['fax'] = $data[13];
                    $cliente['Cliente']['web'] = "";
                    $cliente['Cliente']['email'] = "";
                    $cliente['Cliente']['direccion_postal'] = $data[5];
                    $cliente['Cliente']['direccion_fiscal'] = $data[5];
                    $cliente['Cliente']['modoenviofactura'] = "direccionpostal";
                    $cliente['Cliente']['riesgos'] = str_replace(',', '.', $data[38]);
                    $cliente['Cliente']['modo_facturacion'] = "";
                    $cuentascontable = $this->Cliente->Cuentascontable->find('first', array('contain' => array(), 'conditions' => array('Cuentascontable.codigo' => $data[4])));
                    $cliente['Cliente']['cuentascontable_id'] = $cuentascontable['Cuentascontable']['id'];
                    if ($data[39] == 'FALSO')
                        $cliente['Cliente']['imprimir_con_ref'] = 0;
                    if ($data[39] == 'VERDADERO')
                        $cliente['Cliente']['imprimir_con_ref'] = 1;
                    $cliente['Cliente']['comerciale_id'] = null;
                    $cliente['Cliente']['codigopostal'] = $data[8];
                    $cliente['Cliente']['codigopostalfiscal'] = $data[8];
                    $cliente['Cliente']['apartadocorreospostal'] = $data[9];
                    $cliente['Cliente']['apartadocorreosfiscal'] = $data[9];
                    $cliente['Cliente']['poblacionpostal'] = $data[6];
                    $cliente['Cliente']['poblacionfiscal'] = $data[6];
                    $cliente['Cliente']['provinciapostal'] = $data[7];
                    $cliente['Cliente']['provinciafiscal'] = $data[7];
                    if($this->Cliente->save($cliente)){
                        $this->Cliente->Centrostrabajo->create();
                        $centrostrabajo = array();
                         $centrostrabajo['Centrostrabajo']['centrotrabajo'] = $data[5];
                         $centrostrabajo['Centrostrabajo']['direccion'] = $data[5];
                         $centrostrabajo['Centrostrabajo']['poblacion'] = $data[6];
                         $centrostrabajo['Centrostrabajo']['provincia'] = $data[7];
                         $centrostrabajo['Centrostrabajo']['cp'] = $data[8];
                         $centrostrabajo['Centrostrabajo']['telefono'] = $data[10];
                         $centrostrabajo['Centrostrabajo']['cliente_id'] = $this->Cliente->id;
                         $centrostrabajo['Centrostrabajo']['observaciones'] = "";
                         $centrostrabajo['Centrostrabajo']['responsable'] = $data[14];
                         $centrostrabajo['Centrostrabajo']['modofacturacion'] = "";
                         $centrostrabajo['Centrostrabajo']['distancia'] = str_replace(',', '.', $data[32]);
                         $centrostrabajo['Centrostrabajo']['tiempodesplazamiento'] = str_replace(',', '.', $data[30]);
                         $centrostrabajo['Centrostrabajo']['preciohoradesplazamiento'] = str_replace(',', '.', $data[31]);
                         $centrostrabajo['Centrostrabajo']['preciokm'] = str_replace(',', '.', $data[33]);
                         $centrostrabajo['Centrostrabajo']['preciohoraencentro'] = 0;
                         $centrostrabajo['Centrostrabajo']['preciohoraentraller'] = 0;
                         $centrostrabajo['Centrostrabajo']['preciofijodesplazamiento'] = 0;
                         $centrostrabajo['Centrostrabajo']['dietas'] = str_replace(',', '.', $data[35]);
                         $centrostrabajo['Centrostrabajo']['descuentomaterial'] =  str_replace(',', '.', $data[31]);
                         $centrostrabajo['Centrostrabajo']['descuentomanoobra'] = 0;
                         $centrostrabajo['Centrostrabajo']['fax'] = $data[13];
                         $centrostrabajo['Centrostrabajo']['email'] = "";
                         $this->Cliente->Centrostrabajo->save($centrostrabajo);
                    }
                } else {
                    $primera_fila = false;
                }
            }
            fclose($handle);
        }
        die('Migracion de Cuentas Clientes Completada');
    }

}

?>
