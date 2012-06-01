<?php echo $this->Form->create('ArticulosAlbaranesproveedore', array('action' => 'add')); ?>
<fieldset>
    <legend><?php __('Add Articulos Albaranesproveedore'); ?></legend>
    <?php
    echo $this->Autocomplete->replace_select('Articulo', null, true, $albaranesproveedore['Pedidosproveedore']['Presupuestosproveedore']['almacene_id']);
    echo $this->Form->input('albaranesproveedore_id', array('type' => 'hidden', 'value' => $albaranesproveedore_id));
    echo $this->Form->input('cantidad', array('value' => 0));
    echo $this->Form->input('precio_proveedor', array('value' => 0));
    echo $this->Form->input('descuento', array('value' => 0));
    echo $this->Form->input('neto', array('value' => 0, 'readonly' => true));
    echo $this->Form->input('total', array('value' => 0, 'readonly' => true));
    ?>
</fieldset>
<?php echo $this->Ajax->submit(__('Guardar y Nuevo', true), array('url' => array('controller' => 'articulos_albaranesproveedores', 'action' => 'add_ajax', $albaranesproveedore_id), 'update' => 'dialog-modal')); ?>
<?php echo $this->Form->end(__('Guardar y Cerrar', true)); ?>
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