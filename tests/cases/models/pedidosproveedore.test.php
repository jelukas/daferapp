<?php
/* Pedidosproveedore Test cases generated on: 2011-10-16 19:10:03 : 1318785123*/
App::import('Model', 'Pedidosproveedore');

class PedidosproveedoreTestCase extends CakeTestCase {
	var $fixtures = array('app.pedidosproveedore', 'app.proveedore', 'app.articulo', 'app.familia', 'app.almacene', 'app.referenciasintercambiable', 'app.articulos_referenciasintercambiable', 'app.avisostallere', 'app.cliente', 'app.comerciale', 'app.formapago', 'app.centrostrabajo', 'app.maquina', 'app.articulos_avisostallere', 'app.facturas_cliente', 'app.articulos_facturas_cliente');

	function startTest() {
		$this->Pedidosproveedore =& ClassRegistry::init('Pedidosproveedore');
	}

	function endTest() {
		unset($this->Pedidosproveedore);
		ClassRegistry::flush();
	}

}
?>