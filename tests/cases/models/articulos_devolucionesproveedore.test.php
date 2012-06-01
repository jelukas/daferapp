<?php
/* ArticulosDevolucionesproveedore Test cases generated on: 2011-12-19 10:12:24 : 1324288224*/
App::import('Model', 'ArticulosDevolucionesproveedore');

class ArticulosDevolucionesproveedoreTestCase extends CakeTestCase {
	var $fixtures = array('app.articulos_devolucionesproveedore', 'app.articulo', 'app.familia', 'app.almacene', 'app.proveedore', 'app.referenciasintercambiable', 'app.articulos_referenciasintercambiable', 'app.parte', 'app.tarea', 'app.ordene', 'app.avisostallere', 'app.cliente', 'app.comerciale', 'app.formapago', 'app.centrostrabajo', 'app.avisosrepuesto', 'app.maquina', 'app.estadosaviso', 'app.presupuestosproveedore', 'app.presupuestos_cliente', 'app.transportista', 'app.pedidoscliente', 'app.pedidosproveedore', 'app.albaranesproveedore', 'app.facturasproveedore', 'app.tiposiva', 'app.albaranescliente', 'app.facturas_cliente', 'app.articulos_facturas_cliente', 'app.albaranesclientes_facturas_cliente', 'app.articulos_avisosrepuesto', 'app.estadosavisostallere', 'app.estadosordene', 'app.partestallere', 'app.articulos_partestallere', 'app.mecanico', 'app.mecanicos_parte', 'app.mecanicos_partestallere', 'app.articulos_parte', 'app.devolucionesproveedore');

	function startTest() {
		$this->ArticulosDevolucionesproveedore =& ClassRegistry::init('ArticulosDevolucionesproveedore');
	}

	function endTest() {
		unset($this->ArticulosDevolucionesproveedore);
		ClassRegistry::flush();
	}

}
?>