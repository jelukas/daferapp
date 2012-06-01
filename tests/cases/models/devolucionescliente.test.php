<?php
/* Devolucionescliente Test cases generated on: 2011-12-21 13:12:39 : 1324472019*/
App::import('Model', 'Devolucionescliente');

class DevolucionesclienteTestCase extends CakeTestCase {
	var $fixtures = array('app.devolucionescliente', 'app.cliente', 'app.comerciale', 'app.formapago', 'app.centrostrabajo', 'app.avisosrepuesto', 'app.maquina', 'app.estadosaviso', 'app.presupuestosproveedore', 'app.proveedore', 'app.articulo', 'app.familia', 'app.almacene', 'app.referenciasintercambiable', 'app.articulos_referenciasintercambiable', 'app.parte', 'app.tarea', 'app.ordene', 'app.avisostallere', 'app.estadosavisostallere', 'app.presupuestos_cliente', 'app.transportista', 'app.pedidoscliente', 'app.pedidosproveedore', 'app.albaranesproveedore', 'app.facturasproveedore', 'app.tiposiva', 'app.albaranescliente', 'app.facturas_cliente', 'app.articulos_facturas_cliente', 'app.albaranesclientes_facturas_cliente', 'app.estadosordene', 'app.partestallere', 'app.articulos_partestallere', 'app.mecanico', 'app.mecanicos_parte', 'app.mecanicos_partestallere', 'app.articulos_parte', 'app.devolucionesproveedore', 'app.articulos_devolucionesproveedore', 'app.articulos_avisosrepuesto', 'app.articulos_devolucionescliente');

	function startTest() {
		$this->Devolucionescliente =& ClassRegistry::init('Devolucionescliente');
	}

	function endTest() {
		unset($this->Devolucionescliente);
		ClassRegistry::flush();
	}

}
?>