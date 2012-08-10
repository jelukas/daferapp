<div class="centrostrabajos">
    <?php echo $this->Form->create('Centrostrabajo'); ?>
    <fieldset>
        <legend>
            <?php __('Nuevo Centro de Trabajo'); ?>
            <?php echo $this->Html->link(__('Listar Centros Trabajo', true), array('action' => 'index'), array('class' => 'button_link')); ?>
        </legend>
        <table class="edit">
            <tr>
                <td class="required"><span>Centro de Trabajo</span></td>
                <td><?php echo $this->Form->input('centrotrabajo', array('label' => false)); ?></td>
                <td class="required"><span>Cliente</span></td>
                <td colspan="3"><?php echo $this->Autocomplete->replace_select('Cliente', null, true, null); ?></td>
                <td class="required"><span>Responsable</span></td>
                <td><?php echo $this->Form->input('responsable', array('label' => false)); ?></td>
            </tr>
            <tr>
                <td><span>Dirección</span></td>
                <td><?php echo $this->Form->input('direccion', array('label' => false)); ?></td>
                <td><span>Población</span></td>
                <td><?php echo $this->Form->input('poblacion', array('label' => false)); ?></td>
                <td><span>Provincia</span></td>
                <td><?php echo $this->Form->input('provincia', array('label' => false)); ?></td>
                <td><span>Código Postal</span></td>
                <td><?php echo $this->Form->input('cp', array('label' => false)); ?></td>
            </tr>
            <tr>
                <td class="required"><span>Teléfono Principal</span></td>
                <td><?php echo $this->Form->input('telefono', array('label' => false)); ?></td>
                <td><span>Fax</span></td>
                <td><?php echo $this->Form->input('fax', array('label' => false)); ?></td>
                <td><span>Email</span></td>
                <td colspan="3"><?php echo $this->Form->input('email', array('label' => false)); ?></td>
            </tr>
            <tr>
                <td colspan="2"><span>Facturación por Precio KM o por Precio Fijo de Desplazamiento</span></td>
                <td colspan="6"><?php echo $this->Form->input('modofacturacion', array('label' => false, 'type' => 'select' , 'options' =>array('preciokm' => 'Por Precio del Km','preciofijio' => 'Por Precio  Fijo de Desplazamiento'))); ?></td>
            </tr>
            <tr>
                <td colspan="2"><span>Observaciones</span></td>
                <td colspan="6"><?php echo $this->Form->input('observaciones', array('label' => false)); ?></td>
            </tr>
        </table>
        <table style="border: 1px solid black" class="edit">
            <tr>
                <td><span>Kilometros al Centro de Trabajo</span></td>
                <td><?php echo $this->Form->input('distancia', array('label' => false)); ?></td>
                <td><span>Precio Hora Trabajo en el Centro</span></td>
                <td><?php echo $this->Form->input('preciohoraencentro', array('label' => false)); ?></td>
                <td><span>Precio Desplazamiento</span></td>
                <td><?php echo $this->Form->input('preciofijodesplazamiento', array('label' => false)); ?></td>
                <td><span>Descuento Material</span></td>
                <td><?php echo $this->Form->input('descuentomaterial', array('label' => false)); ?></td>
            </tr>
            <tr>
                <td><span>Tiempo Desplazamiento al Centro</span></td>
                <td><?php echo $this->Form->input('tiempodesplazamiento', array('label' => false)); ?></td>
                <td><span>Precio Hora Trabajo en Taller</span></td>
                <td><?php echo $this->Form->input('preciohoraentraller', array('label' => false)); ?></td>
                <td><span>Dieta</span></td>
                <td><?php echo $this->Form->input('dietas', array('label' => false)); ?></td>
                <td><span>Descuento Mano de Obra</span></td>
                <td><?php echo $this->Form->input('descuentomanoobra', array('label' => false)); ?></td>
            </tr>
            <tr>
                <td><span>Precio Hora Desplazamiento</span></td>
                <td><?php echo $this->Form->input('preciohoradesplazamiento', array('label' => false)); ?></td>
                <td><span>Precio Km</span></td>
                <td><?php echo $this->Form->input('preciokm', array('label' => false)); ?></td>
            </tr>
        </table>
    </fieldset>
    <?php echo $this->Form->end(__('Guardar', true)); ?>
</div>
