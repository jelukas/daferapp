<?php echo $this->Form->create('ArticulosAlbaranesproveedore');?>
	<fieldset>
 		<legend><?php __('Edit Articulos Albaranesproveedore'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('articulo',array('type'=>'text','disabled'=>true,'value'=>$articulo['Articulo']['ref'].' ---- '.$articulo['Articulo']['nombre']));
		echo $this->Form->input('articulo_id',array('type'=>'hidden'));
		echo $this->Form->input('albaranesproveedore_id', array('type' => 'hidden'));
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
    $(document).delegate("#ArticulosAlbaranesproveedoreCantidad", "change", function(){
        calcular(this);
    });
    $(document).delegate("#ArticulosAlbaranesproveedorePrecioProveedor", "change", function(){
        calcular(this);
    });
    $(document).delegate(".#ArticulosAlbaranesproveedoreDescuento", "change", function(){
        calcular(this);
    });
    $(document).delegate("#ArticulosAlbaranesproveedoreTotal", "change", function(){
        calcular(this);
    });
    $(document).delegate("#ArticulosAlbaranesproveedoreNeto", "change", function(){
        calcular(this);
    });   
    
    $(document).delegate("#ArticulosAlbaranesproveedoreCantidad", "keyup", function(){
        calcular(this);
    });
    $(document).delegate("#ArticulosAlbaranesproveedorePrecioProveedor", "keyup", function(){
        calcular(this);
    });
    $(document).delegate("#ArticulosAlbaranesproveedoreDescuento", "keyup", function(){
        calcular(this);
    });
    $(document).delegate("#ArticulosAlbaranesproveedoreTotal", "keyup", function(){
        calcular(this);
    });
    $(document).delegate("#ArticulosAlbaranesproveedoreNeto", "keyup", function(){
        calcular(this);
    });  
    function calcular(element){
        cantidad =  parseFloat($('#ArticulosAlbaranesproveedoreCantidad').val()); 
        precio_proveedor =  parseFloat($('#ArticulosAlbaranesproveedorePrecioProveedor').val()); 
        descuento =  parseFloat($('#ArticulosAlbaranesproveedoreDescuento').val()); 
        total =  parseFloat($('#ArticulosAlbaranesproveedoreTotal').val()); 
        /*Calculo del Neto*/
        $('#ArticulosAlbaranesproveedoreNeto').val(precio_proveedor-(precio_proveedor*descuento/100)); 
        neto =  $('#ArticulosAlbaranesproveedoreNeto').val(); 
        /*Calculo del total*/
        $('#ArticulosAlbaranesproveedoreTotal').val(parseFloat(neto)*parseFloat(cantidad));
    }
    
</script>