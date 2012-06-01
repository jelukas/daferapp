<?php
/* Presupuestosproveedore Test cases generated on: 2011-10-16 19:10:23 : 1318784603*/
App::import('Model', 'Presupuestosproveedore');

class PresupuestosproveedoreTestCase extends CakeTestCase {
	var $fixtures = array('app.presupuestosproveedore', 'app.proveedore', 'app.articulo', 'app.familia', 'app.almacene', 'app.referenciasintercambiable', 'app.articulos_referenciasintercambiable', 'app.avisostallere', 'app.cliente', 'app.comerciale', 'app.formapago', 'app.centrostrabajo', 'app.maquina', 'app.articulos_avisostallere', 'app.facturas_cliente', 'app.articulos_facturas_cliente');

	function startTest() {
		$this->Presupuestosproveedore =& ClassRegistry::init('Presupuestosproveedore');
	}

	function endTest() {
		unset($this->Presupuestosproveedore);
		ClassRegistry::flush();
	}

}
?>