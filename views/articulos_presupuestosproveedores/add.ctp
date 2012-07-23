<?php echo $this->Form->create('ArticulosPresupuestosproveedore', array('action' => 'add')); ?>
<fieldset>
    <legend><?php __('Add Articulos Presupuestosproveedore'); ?></legend>
    <?php
    echo $this->Autocomplete->replace_select('Articulo', null, true, $presupuestosproveedore['Presupuestosproveedore']['almacene_id']);
    if (!empty($presupuestosproveedore_id)) {
        echo $this->Form->input('presupuestosproveedore_id', array('type' => 'hidden', 'value' => $presupuestosproveedore_id));
    } else {
        echo $this->Form->input('presupuestosproveedore_id');
    }
    echo $this->Form->input('cantidad', array('value' => 0));
    echo $this->Form->input('precio_proveedor', array('value' => 0)); // Esto debe cambiarse al ultimo precio de compra
    echo $this->Form->input('descuento', array('value' => 0));
    echo $this->Form->input('neto', array('value' => 0, 'label' => 'Neto Ud.', 'readonly' => true));
    echo $this->Form->input('total', array('value' => 0, 'readonly' => true));
    ?>
</fieldset>
<?php echo $this->Ajax->submit(__('Guardar y Nuevo', true), array('url' => array('controller' => 'articulos_presupuestosproveedores', 'action' => 'add_ajax', $presupuestosproveedore_id), 'update' => 'dialog-modal')); ?>
<?php echo $this->Form->end(__('Guardar y Cerrar', true)); ?>
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