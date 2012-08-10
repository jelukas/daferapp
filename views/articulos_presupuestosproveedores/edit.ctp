<?php echo $this->Form->create('ArticulosPresupuestosproveedore');?>
	<fieldset>
 		<legend><?php __('Editar Articulos Presupuestos Proveedor'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('articulo',array('type'=>'text','disabled'=>true,'value'=>$articulo['Articulo']['ref'].' ---- '.$articulo['Articulo']['nombre']));
		echo $this->Form->input('articulo_id',array('type'=>'hidden'));
		echo $this->Form->input('presupuestosproveedore_id', array('type' => 'hidden'));
                 echo $this->Form->input('tarea_id',array('empty' =>'-- Seleciona la Tarea de la Orden --'));
		echo $this->Form->input('cantidad');
		echo $this->Form->input('precio_proveedor');
		echo $this->Form->input('descuento');
		echo $this->Form->input('neto', array('readonly' => true));
		echo $this->Form->input('total', array('readonly' => true));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
<script type="text/javascript">
    $(document).delegate("#ArticulosPresupuestosproveedoreCantidad", "change", function(){
        calcular(this);
    });
    $(document).delegate("#ArticulosPresupuestosproveedorePrecioProveedor", "change", function(){
        calcular(this);
    });
    $(document).delegate(".#ArticulosPresupuestosproveedoreDescuento", "change", function(){
        calcular(this);
    });
    $(document).delegate("#ArticulosPresupuestosproveedoreTotal", "change", function(){
        calcular(this);
    });
    $(document).delegate("#ArticulosPresupuestosproveedoreNeto", "change", function(){
        calcular(this);
    });   
    
    $(document).delegate("#ArticulosPresupuestosproveedoreCantidad", "keyup", function(){
        calcular(this);
    });
    $(document).delegate("#ArticulosPresupuestosproveedorePrecioProveedor", "keyup", function(){
        calcular(this);
    });
    $(document).delegate("#ArticulosPresupuestosproveedoreDescuento", "keyup", function(){
        calcular(this);
    });
    $(document).delegate("#ArticulosPresupuestosproveedoreTotal", "keyup", function(){
        calcular(this);
    });
    $(document).delegate("#ArticulosPresupuestosproveedoreNeto", "keyup", function(){
        calcular(this);
    });  
    function calcular(element){
        cantidad =  parseFloat($('#ArticulosPresupuestosproveedoreCantidad').val()); 
        precio_proveedor =  parseFloat($('#ArticulosPresupuestosproveedorePrecioProveedor').val()); 
        descuento =  parseFloat($('#ArticulosPresupuestosproveedoreDescuento').val()); 
        total =  parseFloat($('#ArticulosPresupuestosproveedoreTotal').val()); 
        /*Calculo del Neto*/
        $('#ArticulosPresupuestosproveedoreNeto').val(precio_proveedor-(precio_proveedor*descuento/100)); 
        neto =  $('#ArticulosPresupuestosproveedoreNeto').val(); 
        /*Calculo del total*/
        $('#ArticulosPresupuestosproveedoreTotal').val(parseFloat(neto)*parseFloat(cantidad));
    }
    
</script>