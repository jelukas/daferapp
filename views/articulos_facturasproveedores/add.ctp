<?php echo $this->Form->create('ArticulosFacturasproveedore', array('action' => 'add')); ?>
<fieldset>
    <legend><?php __('Add Articulos Facturasproveedore'); ?></legend>
    <?php
    echo $this->Autocomplete->replace_select('Articulo', null, true, $facturasproveedore['Albaranesproveedore']['Pedidosproveedore']['Presupuestosproveedore']['almacene_id']);
    echo $this->Form->input('facturasproveedore_id', array('type' => 'hidden', 'value' => $facturasproveedores_id));
    echo $this->Form->input('cantidad', array('value' => 0));
    echo $this->Form->input('precio_proveedor', array('value' => 0));
    echo $this->Form->input('descuento', array('value' => 0));
    echo $this->Form->input('neto', array('value' => 0, 'readonly' => true));
    echo $this->Form->input('total', array('value' => 0, 'readonly' => true));
    ?>
</fieldset>
<?php echo $this->Ajax->submit(__('Guardar y Nuevo', true), array('url' => array('controller' => 'articulos_facturasproveedores', 'action' => 'add_ajax', $facturasproveedores_id), 'update' => 'dialog-modal')); ?>
<?php echo $this->Form->end(__('Guardar y Cerrar', true)); ?>
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