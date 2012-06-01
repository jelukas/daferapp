<?php echo $this->Form->create('ArticulosFacturasproveedore');?>
	<fieldset>
 		<legend><?php __('Edit Articulos Facturasproveedore'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('articulo',array('type'=>'text','disabled'=>true,'value'=>$articulo['Articulo']['ref'].' ---- '.$articulo['Articulo']['nombre']));
		echo $this->Form->input('articulo_id',array('type'=>'hidden'));
		echo $this->Form->input('facturasproveedore_id', array('type' => 'hidden'));
		echo $this->Form->input('cantidad');
		echo $this->Form->input('precio_proveedor');
		echo $this->Form->input('descuento');
		echo $this->Form->input('neto', array('readonly' => true));
		echo $this->Form->input('total', array('readonly' => true));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
<script type="text/javascript">
    $(document).delegate("#ArticulosFacturasproveedoreCantidad", "change", function(){
        calcular(this);
    });
    $(document).delegate("#ArticulosFacturasproveedorePrecioProveedor", "change", function(){
        calcular(this);
    });
    $(document).delegate(".#ArticulosFacturasproveedoreDescuento", "change", function(){
        calcular(this);
    });
    $(document).delegate("#ArticulosFacturasproveedoreTotal", "change", function(){
        calcular(this);
    });
    $(document).delegate("#ArticulosFacturasproveedoreNeto", "change", function(){
        calcular(this);
    });   
    
    $(document).delegate("#ArticulosFacturasproveedoreCantidad", "keyup", function(){
        calcular(this);
    });
    $(document).delegate("#ArticulosFacturasproveedorePrecioProveedor", "keyup", function(){
        calcular(this);
    });
    $(document).delegate("#ArticulosFacturasproveedoreDescuento", "keyup", function(){
        calcular(this);
    });
    $(document).delegate("#ArticulosFacturasproveedoreTotal", "keyup", function(){
        calcular(this);
    });
    $(document).delegate("#ArticulosFacturasproveedoreNeto", "keyup", function(){
        calcular(this);
    });  
    function calcular(element){
        cantidad =  parseFloat($('#ArticulosFacturasproveedoreCantidad').val()); 
        precio_proveedor =  parseFloat($('#ArticulosFacturasproveedorePrecioProveedor').val()); 
        descuento =  parseFloat($('#ArticulosFacturasproveedoreDescuento').val()); 
        total =  parseFloat($('#ArticulosFacturasproveedoreTotal').val()); 
        /*Calculo del Neto*/
        $('#ArticulosFacturasproveedoreNeto').val(precio_proveedor-(precio_proveedor*descuento/100)); 
        neto =  $('#ArticulosFacturasproveedoreNeto').val(); 
        /*Calculo del total*/
        $('#ArticulosFacturasproveedoreTotal').val(parseFloat(neto)*parseFloat(cantidad));
    }
    
</script>