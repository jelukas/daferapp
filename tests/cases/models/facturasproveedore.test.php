<?php
/* Facturasproveedore Test cases generated on: 2011-10-16 19:10:29 : 1318786769*/
App::import('Model', 'Facturasproveedore');

class FacturasproveedoreTestCase extends CakeTestCase {
	var $fixtures = array('app.facturasproveedore', 'app.proveedore', 'app.articulo', 'app.familia', 'app.almacene', 'app.referenciasintercambiable', 'app.articulos_referenciasintercambiable', 'app.avisostallere', 'app.cliente', 'app.comerciale', 'app.formapago', 'app.centrostrabajo', 'app.maquina', 'app.articulos_avisostallere', 'app.facturas_cliente', 'app.articulos_facturas_cliente', 'app.tiposiva', 'app.albaranesproveedore', 'app.pedidosproveedore');

	function startTest() {
		$this->Facturasproveedore =& ClassRegistry::init('Facturasproveedore');
	}

	function endTest() {
		unset($this->Facturasproveedore);
		ClassRegistry::flush();
	}

}
?>