<?php echo $this->Form->create('ManodeobrasTareasalbaranescliente'); ?>
<fieldset>
    <legend><?php __('Añadir Mano de Obra a la Tarea ' . $tareasalbaranescliente_id . ' del Albarán de Venta'); ?></legend>
    <?php
    echo $this->Form->input('tareasalbaranescliente_id', array('type' => 'hidden', 'value' => $tareasalbaranescliente_id));
    echo $this->Form->input('horas', array('value' => 0));
    echo $this->Form->input('precio_hora', array('value' => 0));
    echo $this->Form->input('descuento', array('value' => 0, 'label' => 'Descuento %'));
    echo $this->Form->input('importe', array('value' => 0, 'readonly' => true));
    echo $this->Form->input('descripcion', array('placeholder' => 'Inserta aquí una descripción'));
    ?>
</fieldset>
<?php echo $this->Form->end(__('Guardar', true)); ?>
<script type="text/javascript">
    //Calculo automático
    function calcular_manodeobras(){
        var importe = parseFloat($('#ManodeobrasTareasalbaranesclienteHoras').val())*parseFloat($('#ManodeobrasTareasalbaranesclientePrecioHora').val());
        importe = importe - (importe * (parseFloat($('#ManodeobrasTareasalbaranesclienteDescuento').val())/100));
        $('#ManodeobrasTareasalbaranesclienteImporte').val(importe);
    }
    $('#ManodeobrasTareasalbaranesclienteHoras').keyup(function(){
        calcular_manodeobras();
    });
    $('#ManodeobrasTareasalbaranesclientePrecioHora').keyup(function(){
        calcular_manodeobras();
    });
    $('#ManodeobrasTareasalbaranesclienteDescuento').keyup(function(){
        calcular_manodeobras();
    });
</script>

