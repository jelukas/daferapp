<?php echo $this->Form->create('ManodeobrasTareaspedidoscliente'); ?>
<fieldset>
    <legend><?php __('Añadir Mano de Obra a la Tarea ' . $tareaspedidoscliente_id . ' del Pedido de Cliente'); ?></legend>
    <?php
    echo $this->Form->input('tareaspedidoscliente_id', array('type' => 'hidden', 'value' => $tareaspedidoscliente_id));
    echo $this->Form->input('horas', array('value' => 0));
    if ($tareaspedidosclientecliente['tipo'] == 'centro')
        echo $this->Form->input('precio_hora', array('label' => 'Precio Hora en Centro', 'value' => $centrostrabajo['preciohoraencentro']));
    elseif ($tareaspedidosclientecliente['tipo'] == 'taller')
        echo $this->Form->input('precio_hora', array('label' => 'Precio Hora en Taller', 'value' => $centrostrabajo['preciohoraentraller']));
    else
        echo $this->Form->input('precio_hora', array('label' => 'Precio Hora', 'value' => 0));
    if (!empty($centrostrabajo['descuentomanoobra']))
        echo $this->Form->input('descuento', array('value' => $centrostrabajo['descuentomanoobra'], 'label' => 'Descuento de Mano de Obra  %'));
    else
        echo $this->Form->input('descuento', array('value' => 0, 'label' => 'Descuento de Mano de Obra %'));
    echo $this->Form->input('importe', array('value' => 0, 'readonly' => true));
    echo $this->Form->input('descripcion', array('placeholder' => 'Inserta aquí una descripción'));
    ?>
</fieldset>
<?php echo $this->Form->end(__('Añadir', true)); ?>
<script type="text/javascript">
    //Calculo automático
    function calcular_manodeobras(){
        var importe = parseFloat($('#ManodeobrasTareaspedidosclienteHoras').val())*parseFloat($('#ManodeobrasTareaspedidosclientePrecioHora').val());
        importe = importe - (importe * (parseFloat($('#ManodeobrasTareaspedidosclienteDescuento').val())/100));
        $('#ManodeobrasTareaspedidosclienteImporte').val(importe);
    }
    $('#ManodeobrasTareaspedidosclienteHoras').keyup(function(){
        calcular_manodeobras();
    });
    $('#ManodeobrasTareaspedidosclientePrecioHora').keyup(function(){
        calcular_manodeobras();
    });
    $('#ManodeobrasTareaspedidosclienteDescuento').keyup(function(){
        calcular_manodeobras();
    });
</script>