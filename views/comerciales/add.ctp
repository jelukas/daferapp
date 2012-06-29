<div class="comerciales">
<?php echo $form->create('Comerciale');?>
	<fieldset>
 		<legend>
                    <?php __('Añadir Comercial');?>
                    <?php echo $html->link(__('Listar Comerciales', true), array('action' => 'index'),array('class'=>'button_link'));?>
                </legend>
            <table class="edit">
                <tr>
                    <td><span>Nombre</span></td>
                    <td><?php echo $form->input('nombre',array('label' =>false)); ?></td>
                    <td><span>Apellidos</span></td>
                    <td><?php echo $form->input('apellidos',array('label' =>false)); ?></td>
                    <td><span>Teléfono</span></td>
                    <td><?php echo $form->input('telefono',array('label' =>false)); ?></td>
                    <td><span>Email</span></td>
                    <td><?php echo $form->input('email',array('label' =>false)); ?></td>
                </tr>
                <tr>
                    <td><span>Dirección</span></td>
                    <td colspan="3"><?php echo $form->input('direccion',array('label' =>false)); ?></td>
                    <td><span>Porcentaje Comisión</span></td>
                    <td><?php echo $form->input('porcentaje_comision',array('label' =>false)); ?></td>
                </tr>
            </table>
	</fieldset>
<?php echo $form->end('Guardar');?>
</div>