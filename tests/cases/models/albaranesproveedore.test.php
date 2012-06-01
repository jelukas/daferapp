<?php
/* Albaranesproveedore Test cases generated on: 2011-10-16 19:10:50 : 1318786490*/
App::import('Model', 'Albaranesproveedore');

class AlbaranesproveedoreTestCase extends CakeTestCase {
	var $fixtures = array('app.albaranesproveedore', 'app.pedidosproveedore', 'app.proveedore', 'app.articulo', 'app.familia', 'app.almacene', 'app.referenciasintercambiable', 'app.articulos_referenciasintercambiable', 'app.avisostallere', 'app.cliente', 'app.comerciale', 'app.formapago', 'app.centrostrabajo', 'app.maquina', 'app.articulos_avisostallere', 'app.facturas_cliente', 'app.articulos_facturas_cliente', 'app.facturasproveedore');

	function startTest() {
		$this->Albaranesproveedore =& ClassRegistry::init('Albaranesproveedore');
	}

	function endTest() {
		unset($this->Albaranesproveedore);
		ClassRegistry::flush();
	}

}
?>