<?php
/* ArticulosPartestallere Test cases generated on: 2011-11-15 18:11:32 : 1321377632*/
App::import('Model', 'ArticulosPartestallere');

class ArticulosPartestallereTestCase extends CakeTestCase {
	var $fixtures = array('app.articulos_partestallere', 'app.articulo', 'app.familia', 'app.almacene', 'app.proveedore', 'app.referenciasintercambiable', 'app.articulos_referenciasintercambiable', 'app.facturas_cliente', 'app.cliente', 'app.comerciale', 'app.formapago', 'app.centrostrabajo', 'app.maquina', 'app.avisosrepuesto', 'app.estadosaviso', 'app.presupuestosproveedore', 'app.avisostallere', 'app.presupuestos_cliente', 'app.transportista', 'app.ordene', 'app.estadosordene', 'app.tarea', 'app.pedidoscliente', 'app.pedidosproveedore', 'app.albaranesproveedore', 'app.facturasproveedore', 'app.tiposiva', 'app.albaranescliente', 'app.articulos_avisosrepuesto', 'app.articulos_facturas_cliente', 'app.partestallere');

	function startTest() {
		$this->ArticulosPartestallere =& ClassRegistry::init('ArticulosPartestallere');
	}

	function endTest() {
		unset($this->ArticulosPartestallere);
		ClassRegistry::flush();
	}

}
?>