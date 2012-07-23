<div class="configs">
<?php echo $this->Form->create('Config');?>
	<fieldset>
 		<legend><?php __('Configuración'); ?></legend>
                <table class="view edit">
                    <tr>
                        <td><span><?php __('Costo de Hora de Desplazamiento') ?></span></td>
                        <td><?php echo $this->Form->input('costohoradesplazamiento',array('label' =>false)); ?></td>
                    </tr>
                    <tr>
                        <td><span><?php __('Costo del KM de Desplazamiento') ?></span></td>
                        <td><?php echo $this->Form->input('costokmdesplazamiento',array('label' =>false)); ?></td>
                    </tr>
                    <tr>
                        <td><span><?php __('Costo Hora del Mecánico en Centro de Trabajo del Cliente') ?></span></td>
                        <td><?php echo $this->Form->input('costo_hora_en_centrotrabajo',array('label' =>false)); ?></td>
                    </tr>
                    <tr>
                        <td><span><?php __('Costo Hora del Mecánico en Taller') ?></span></td>
                        <td><?php echo $this->Form->input('costo_hora_en_taller',array('label' =>false)); ?></td>
                    </tr>
                    <tr>
                        <td><span><?php __('Costo Hora Extra del Mecánico') ?></span></td>
                        <td><?php echo $this->Form->input('costo_hora_extra',array('label' =>false)); ?></td>
                    </tr>
                </table>
	<?php
		echo $this->Form->input('id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Guardar', true));?>
</div>