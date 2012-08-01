<?php echo $this->Form->create('ArticulosPedidosproveedore', array('action' => 'add'));?>
	<fieldset>
 		<legend><?php __('Add Articulos Pedidosproveedore'); ?></legend>
	<?php
		echo $this->Autocomplete->replace_select('Articulo', null, true,$pedidosproveedore['Presupuestosproveedore']['almacene_id']);
		echo $this->Form->input('pedidosproveedore_id', array('type' => 'hidden', 'value' => $pedidosproveedore_id));
		echo $this->Form->input('tarea_id',array('empty' =>'-- Seleciona la Tarea de la Orden --'));
		echo $this->Form->input('cantidad',array('value'=>0));
		echo $this->Form->input('precio_proveedor',array('value'=>0));
		echo $this->Form->input('descuento',array('value'=>0));
		echo $this->Form->input('neto',array('value'=>0,'readonly'=>true));
		echo $this->Form->input('total',array('value'=>0,'readonly'=>true));
	?>
	</fieldset>
<?php echo $this->Ajax->submit(__('Guardar y Nuevo', true), array('url'=> array('controller'=>'articulos_pedidosproveedores', 'action'=>'add_ajax',$pedidosproveedore_id), 'update' => 'dialog-modal'));?>
<?php echo $this->Form->end(__('Guardar y Cerrar', true));?>
<script type="text/javascript">
    $(document).delegate("#ArticulosPedidosproveedoreCantidad", "change", function(){
        calcular(this);
    });
    $(document).delegate("#ArticulosPedidosproveedorePrecioProveedor", "change", function(){
        calcular(this);
    });
    $(document).delegate(".#ArticulosPedidosproveedoreDescuento", "change", function(){
        calcular(this);
    });
    $(document).delegate("#ArticulosPedidosproveedoreTotal", "change", function(){
        calcular(this);
    });
    $(document).delegate("#ArticulosPedidosproveedoreNeto", "change", function(){
        calcular(this);
    });   
    
    $(document).delegate("#ArticulosPedidosproveedoreCantidad", "keyup", function(){
        calcular(this);
    });
    $(document).delegate("#ArticulosPedidosproveedorePrecioProveedor", "keyup", function(){
        calcular(this);
    });
    $(document).delegate("#ArticulosPedidosproveedoreDescuento", "keyup", function(){
        calcular(this);
    });
    $(document).delegate("#ArticulosPedidosproveedoreTotal", "keyup", function(){
        calcular(this);
    });
    $(document).delegate("#ArticulosPedidosproveedoreNeto", "keyup", function(){
        calcular(this);
    });  
    function calcular(element){
        cantidad =  parseFloat($('#ArticulosPedidosproveedoreCantidad').val()); 
        precio_proveedor =  parseFloat($('#ArticulosPedidosproveedorePrecioProveedor').val()); 
        descuento =  parseFloat($('#ArticulosPedidosproveedoreDescuento').val()); 
        total =  parseFloat($('#ArticulosPedidosproveedoreTotal').val()); 
        /*Calculo del Neto*/
        $('#ArticulosPedidosproveedoreNeto').val(precio_proveedor-(precio_proveedor*descuento/100)); 
        neto =  $('#ArticulosPedidosproveedoreNeto').val(); 
        /*Calculo del total*/
        $('#ArticulosPedidosproveedoreTotal').val(parseFloat(neto)*parseFloat(cantidad));
    }
    
</script>