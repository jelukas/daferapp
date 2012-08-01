<?php echo $this->Form->create('ArticulosPedidosproveedore');?>
	<fieldset>
 		<legend><?php __('Edit Articulos Pedidosproveedore'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('articulo',array('type'=>'text','disabled'=>true,'value'=>$articulo['Articulo']['ref'].' ---- '.$articulo['Articulo']['nombre']));
		echo $this->Form->input('articulo_id',array('type'=>'hidden'));
		echo $this->Form->input('pedidosproveedore_id', array('type' => 'hidden'));
                echo $this->Form->input('tarea_id',array('empty' =>'-- Seleciona la Tarea de la Orden --'));
		echo $this->Form->input('cantidad');
		echo $this->Form->input('precio_proveedor');
		echo $this->Form->input('descuento');
		echo $this->Form->input('neto', array('readonly' => true));
		echo $this->Form->input('total', array('readonly' => true));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Guardar', true));?>
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