<?php
/* ArticulosDevolucionescliente Test cases generated on: 2011-12-21 13:12:55 : 1324472035*/
App::import('Model', 'ArticulosDevolucionescliente');

class ArticulosDevolucionesclienteTestCase extends CakeTestCase {
	var $fixtures = array('app.articulos_devolucionescliente', 'app.articulo', 'app.familia', 'app.almacene', 'app.proveedore', 'app.referenciasintercambiable', 'app.articulos_referenciasintercambiable', 'app.parte', 'app.tarea', 'app.ordene', 'app.avisostallere', 'app.cliente', 'app.comerciale', 'app.formapago', 'app.centrostrabajo', 'app.avisosrepuesto', 'app.maquina', 'app.estadosaviso', 'app.presupuestosproveedore', 'app.presupuestos_cliente', 'app.transportista', 'app.pedidoscliente', 'app.pedidosproveedore', 'app.albaranesproveedore', 'app.facturasproveedore', 'app.tiposiva', 'app.albaranescliente', 'app.facturas_cliente', 'app.articulos_facturas_cliente', 'app.albaranesclientes_facturas_cliente', 'app.articulos_avisosrepuesto', 'app.estadosavisostallere', 'app.estadosordene', 'app.partestallere', 'app.articulos_partestallere', 'app.mecanico', 'app.mecanicos_parte', 'app.mecanicos_partestallere', 'app.articulos_parte', 'app.devolucionesproveedore', 'app.articulos_devolucionesproveedore', 'app.devolucionescliente');

	function startTest() {
		$this->ArticulosDevolucionescliente =& ClassRegistry::init('ArticulosDevolucionescliente');
	}

	function endTest() {
		unset($this->ArticulosDevolucionescliente);
		ClassRegistry::flush();
	}

}
?>