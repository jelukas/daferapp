<div class="centrostrabajos">
    <h2>
        <?php __('Ficha de Centro de Trabajo'); ?>
        <?php echo $this->Html->link(__('Editar Centro Trabajo', true), array('action' => 'edit', $centrostrabajo['Centrostrabajo']['id']), array('class' => 'button_link')); ?>
        <?php echo $this->Html->link(__('Nuevo Centro Trabajo', true), array('action' => 'add'), array('class' => 'button_link')); ?>
        <?php echo $this->Html->link(__('Listar Centros Trabajo', true), array('action' => 'index'), array('class' => 'button_link')); ?>
    </h2>
    <table class="view">
        <tr>
            <td><span>Centro de Trabajo</span></td>
            <td><?php echo $centrostrabajo['Centrostrabajo']['centrotrabajo']; ?></td>
            <td><span>Cliente</span></td>
            <td colspan="3"><?php echo $this->Html->link($centrostrabajo['Cliente']['nombre'], array('controller' => 'clientes', 'action' => 'view', $centrostrabajo['Cliente']['id'])); ?></td>
            <td><span>Responsable</span></td>
            <td><?php echo $centrostrabajo['Centrostrabajo']['responsable']; ?></td>
        </tr>
        <tr>
            <td><span>Dirección</span></td>
            <td><?php echo $centrostrabajo['Centrostrabajo']['direccion']; ?></td>
            <td><span>Población</span></td>
            <td><?php echo $centrostrabajo['Centrostrabajo']['poblacion']; ?></td>
            <td><span>Provincia</span></td>
            <td><?php echo $centrostrabajo['Centrostrabajo']['provincia']; ?></td>
            <td><span>Código Postal</span></td>
            <td><?php echo $centrostrabajo['Centrostrabajo']['cp']; ?></td>
        </tr>
        <tr>
            <td><span>Teléfono</span></td>
            <td><?php echo $centrostrabajo['Centrostrabajo']['telefono']; ?></td>
            <td><span>Fax</span></td>
            <td><?php echo $centrostrabajo['Centrostrabajo']['fax']; ?></td>
            <td><span>Email</span></td>
            <td colspan="3"><?php echo $centrostrabajo['Centrostrabajo']['email']; ?></td>
        </tr>
        <tr>
            <td colspan="2"><span>Facturación por Precio KM o por Precio Fijo de Desplazamiento</span></td>
            <td colspan="6"><?php echo $centrostrabajo['Centrostrabajo']['modofacturacion']; ?></td>
        </tr>
        <tr>
            <td colspan="2">
                <span>Máquinas</span>
            </td>
            <td colspan="6">
                <?php echo $this->Form->input('vermaquina', array('label' => 'Selecione que Máquina desea Ver', 'type' => 'select', 'options' => $maquinas, 'empty' => '-- Elije la Maquina para Ver --')); ?>
            </td>
        </tr>
        <tr>
            <td colspan="2"><span>Observaciones</span></td>
            <td colspan="6"><?php echo $centrostrabajo['Centrostrabajo']['observaciones']; ?></td>
        </tr>
    </table>
    <table style="border: 1px solid black">
        <tr>
            <td><span>Kilometros al Centro de Trabajo</span></td>
            <td><?php echo $centrostrabajo['Centrostrabajo']['distancia']; ?></td>
            <td><span>Precio Hora Trabajo en el Centro</span></td>
            <td><?php echo $centrostrabajo['Centrostrabajo']['preciohoraencentro']; ?></td>
            <td><span>Precio Desplazamiento</span></td>
            <td><?php echo $centrostrabajo['Centrostrabajo']['preciofijodesplazamiento']; ?></td>
            <td><span>Descuento Material</span></td>
            <td><?php echo $centrostrabajo['Centrostrabajo']['descuentomaterial']; ?></td>
        </tr>
        <tr>
            <td><span>Tiempo Desplazamiento al Centro</span></td>
            <td><?php echo $centrostrabajo['Centrostrabajo']['tiempodesplazamiento']; ?></td>
            <td><span>Precio Hora Trabajo en Taller</span></td>
            <td><?php echo $centrostrabajo['Centrostrabajo']['preciohoraentraller']; ?></td>
            <td><span>Dieta</span></td>
            <td><?php echo $centrostrabajo['Centrostrabajo']['dietas']; ?></td>
            <td><span>Descuento Mano de Obra</span></td>
            <td><?php echo $centrostrabajo['Centrostrabajo']['descuentomanoobra']; ?></td>
        </tr>
        <tr>
            <td><span>Precio Hora Desplazamiento</span></td>
            <td><?php echo $centrostrabajo['Centrostrabajo']['preciohoradesplazamiento']; ?></td>
            <td><span>Precio Km</span></td>
            <td><?php echo $centrostrabajo['Centrostrabajo']['preciokm']; ?></td>
        </tr>
    </table>
</div>
<script type="text/javascript">
    $('#vermaquina').change(function(){
        window.open('/daferapp/maquinas/view/'+$(this).val())  ;
    });   
</script>