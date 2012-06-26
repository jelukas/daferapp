<div class="clientes">
    <?php echo $form->create('Cliente'); ?>
    <fieldset>
        <legend>
            <?php __('Añadir Cliente'); ?>
            <?php echo $html->link(__('Listar Clientes', true), array('action' => 'index'), array('class' => 'button_link')); ?>
        </legend>
        <table class="edit">
            <tr>
                <td><span>Denomicación Comercial</span></td>
                <td><?php echo $form->input('nombre', array('label' => false)); ?></td>
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
                <td><span>Riesgos</span></td>
                <td><?php echo $form->input('riesgos', array('label' => false)); ?></td>
                <td><span>Modo Facturación</span></td>
                <td><?php echo $form->input('modo_facturacion', array('type' => 'select', 'options' => array('maquina' => 'Por Máquina', 'centrotrabajo' => 'Por Centro de Trabajo', 'albaran' => 'Por Alabrán'), 'label' => false)); ?></td>
                <td><span>Comercial</span></td>
                <td><?php echo $form->input('comerciale_id', array('label' => false)); ?></td>
            </tr>
        </table>
        <table class="view">
            <tr>
                <td><h4>Forma de Pago</h4></td>
                <td><h4>Datos Bancarios</h4></td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <table class="edit">
                        <tr>
                            <td><?php echo $form->input('Cuentasbancaria.nombre'); ?></td>
                            <td><?php echo $form->input('Cuentasbancaria.numero_entidad', array('label' => 'Nº Entidad', 'maxlenth' => 4)); ?></td>
                            <td><?php echo $form->input('Cuentasbancaria.numero_sucursal', array('label' => 'Nº Sucursal', 'maxlenth' => 4)); ?></td>
                            <td><?php echo $form->input('Cuentasbancaria.numero_dc', array('label' => 'D.C', 'maxlenth' => 2)); ?></td>
                            <td><?php echo $form->input('Cuentasbancaria.numero_cuenta', array('label' => 'Nº CCC', 'maxlenth' => 10)); ?></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td colspan="2"><?php echo $form->input('Cuentasbancaria.numero_bicswift', array('label' => 'BIC/SWIFT')); ?></td>
                            <td colspan="2"><?php echo $form->input('Cuentasbancaria.numero_iban', array('label' => 'IBAN')); ?></td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </fieldset>

    <?php echo $form->end('Añadir'); ?>
</div>