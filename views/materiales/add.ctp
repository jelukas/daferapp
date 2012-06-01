<?php echo $this->Form->create('Materiale'); ?>
<fieldset>
    <legend><?php __('Añadir Material a la Tarea ' . $tareaspresupuestocliente_id . ' del Presupuesto'); ?></legend>
    <div class="input required">
        <label for="autocomplete-materiales">Articulo</label>
        <input type="text" id="autocomplete-materiales" />
        <?php
        echo $this->Form->input('articulo_id', array('type' => 'hidden'));
        ?>
    </div>
    <?php
    echo $this->Form->input('tareaspresupuestocliente_id', array('type' => 'hidden', 'value' => $tareaspresupuestocliente_id));
    echo $this->Form->input('cantidad', array('value' => 0));
    echo $this->Form->input('descuento', array('value' => 0, 'label' => 'Descuento %'));
    echo $this->Form->input('precio_unidad', array('value' => 0, 'readonly' => true));
    echo $this->Form->input('importe', array('value' => 0, 'readonly' => true));
    ?>
    <span>Precios sin IVA</span>
</fieldset>
<?php echo $this->Form->end(__('Guardar', true)); ?>
<script type="text/javascript">
    /*Autcocomplete basico de Articulos en los MAteriales de los Presupuestos en sustitucion del select de articulos*/
    if($( "#autocomplete-materiales" ).length != 0){
        var autocomplete_materiales =$( "#autocomplete-materiales" ).autocomplete({
            source: "/daferapp/articulos/auto_complete/<?php echo $tareaspresupuestocliente['Presupuestoscliente']['almacene_id'] ?>",
            minLength: 4,
            select: function( event, ui ) {
                $("#MaterialeArticuloId").val(ui.item.id);
                $("#MaterialePrecioUnidad").val(ui.item.precio_sin_iva);
            }
        });
        autocomplete_materiales.data( "autocomplete" )._renderItem = function( ul, item ) {
            return $( "<li></li>" )
            .data( "item.autocomplete", item )
            .append( "<a>Ref. " + item.ref + " ····· " + item.label + "</a>" )
            .appendTo( ul );
        };
    }
    //Calculo automático
    function calcular_materiale(){
        var importe = $('#MaterialeCantidad').val()*$('#MaterialePrecioUnidad').val();
        importe = importe - (importe * (parseFloat($('#MaterialeDescuento').val())/100));
        $('#MaterialeImporte').val(importe);
    }
    $('#MaterialeCantidad').keyup(function(){
        calcular_materiale();
    });
    $('#MaterialeDescuento').keyup(function(){
        calcular_materiale();
    });
</script>