<?php
/* MecanicosParte Test cases generated on: 2011-11-15 02:11:47 : 1321320647*/
App::import('Model', 'MecanicosParte');

class MecanicosParteTestCase extends CakeTestCase {
	var $fixtures = array('app.mecanicos_parte', 'app.mecanico', 'app.parte', 'app.ordene', 'app.avisostallere', 'app.cliente', 'app.comerciale', 'app.formapago', 'app.centrostrabajo', 'app.maquina', 'app.presupuestosproveedore', 'app.proveedore', 'app.articulo', 'app.familia', 'app.almacene', 'app.referenciasintercambiable', 'app.articulos_referenciasintercambiable', 'app.facturas_cliente', 'app.avisosrepuesto', 'app.presupuestos_cliente', 'app.transportista', 'app.pedidoscliente', 'app.pedidosproveedore', 'app.albaranesproveedore', 'app.facturasproveedore', 'app.tiposiva', 'app.albaranescliente', 'app.articulos_avisosrepuesto', 'app.articulos_facturas_cliente', 'app.estadosordene', 'app.tarea');

	function startTest() {
		$this->MecanicosParte =& ClassRegistry::init('MecanicosParte');
	}

	function endTest() {
		unset($this->MecanicosParte);
		ClassRegistry::flush();
	}

}
?>