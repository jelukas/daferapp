<?php
/* MecanicosPartestallere Test cases generated on: 2011-11-15 18:11:35 : 1321377695*/
App::import('Model', 'MecanicosPartestallere');

class MecanicosPartestallereTestCase extends CakeTestCase {
	var $fixtures = array('app.mecanicos_partestallere', 'app.mecanico', 'app.partestallere', 'app.ordene', 'app.avisostallere', 'app.cliente', 'app.comerciale', 'app.formapago', 'app.centrostrabajo', 'app.maquina', 'app.presupuestosproveedore', 'app.proveedore', 'app.articulo', 'app.familia', 'app.almacene', 'app.referenciasintercambiable', 'app.articulos_referenciasintercambiable', 'app.facturas_cliente', 'app.avisosrepuesto', 'app.estadosaviso', 'app.presupuestos_cliente', 'app.transportista', 'app.pedidoscliente', 'app.pedidosproveedore', 'app.albaranesproveedore', 'app.facturasproveedore', 'app.tiposiva', 'app.albaranescliente', 'app.articulos_avisosrepuesto', 'app.articulos_facturas_cliente', 'app.estadosordene', 'app.tarea', 'app.articulos_partestallere');

	function startTest() {
		$this->MecanicosPartestallere =& ClassRegistry::init('MecanicosPartestallere');
	}

	function endTest() {
		unset($this->MecanicosPartestallere);
		ClassRegistry::flush();
	}

}
?>