<div class="clientes">
    <?php echo $form->create('Cliente'); ?>
    <fieldset>
        <legend>
            <?php __('Editar Cliente'); ?>
            <?php echo $html->link(__('Ver', true), array('action' => 'view',$form->value('Cliente.id')), array('class' => 'button_link')); ?>
            <?php echo $html->link(__('Listar Clientes', true), array('action' => 'index'), array('class' => 'button_link')); ?>
        </legend>
        <table class="edit">
            <tr>
                <td><span>Denomicación Comercial</span></td>
                <td><?php echo $form->input('nombre', array('label' => false)); ?><?php echo $form->input('id', array('label' => false)); ?></td>
                <td><span>Nombre Fiscal</span></td>
                <td><?php echo $form->input('nombrefiscal', array('label' => false)); ?></td>
                <td><span>CIF</span></td>
                <td><?php echo $form->input('cif', array('label' => false)); ?></td>
            </tr>
            <tr>
                <td><span>Teléfono</span></td>
                <td><?php echo $form->input('telefono', array('label' => false)); ?></td>
                <td><span>Dirección Fiscal</span></td>
                <td colspan="3"><?php echo $form->input('direccion_fiscal', array('label' => false)); ?></td>
            </tr>
            <tr>
                <td><span>Fax</span></td>
                <td><?php echo $form->input('fax', array('label' => false)); ?></td>
                <td><span>Dirección Postal</span></td>
                <td colspan="3"><?php echo $form->input('direccion_postal', array('label' => false)); ?></td>
            </tr>
            <tr>
                <td><span>Web</span></td>
                <td><?php echo $form->input('web', array('label' => false)); ?></td>
                <td><span>Email</span></td>
                <td colspan="3"><?php echo $form->input('email', array('label' => false)); ?></td>
            </tr>
            <tr>
                <td><span>Personas de Contacto</span></td>
                <td><?php echo $form->input('personascontacto', array('label' => false)); ?></td>
                <td><span>Modo Envio Factura</span></td>
                <td colspan="3"><?php echo $form->input('modoenviofactura', array('type' => 'select', 'options' => array('direccionfiscal' => 'Dirección Fiscal', 'direccionpostal' => 'Dirección Postal', 'email' => 'Email'), 'label' => false)); ?></td>
            </tr>
            <tr>
                <td><span>Forma de Pago</span></td>
                <td><?php echo $form->input('formapago_id', array('label' => false)); ?></td>
                <td><span>Cuenta Bancaria</span></td>
                <td colspan="3"><?php echo $form->input('cuentabancaria', array('label' => false)); ?></td>
            </tr>
            <tr>
                <td><span>Riesgos</span></td>
                <td><?php echo $form->input('riesgos', array('label' => false)); ?></td>
                <td><span>Modo Facturación</span></td>
                <td><?php echo $form->input('modo_facturacion', array('type' => 'select', 'options' => array('maquina' => 'Por Máquina', 'centrotrabajo' => 'Por Centro de Trabajo', 'albaran' => 'Por Alabrán'),'label' => false)); ?></td>
                <td><span>Comercial</span></td>
                <td><?php echo $form->input('comerciale_id', array('label' => false)); ?></td>
            </tr>
        </table>
    </fieldset>
    <?php echo $form->end('Guardar'); ?>
</div>