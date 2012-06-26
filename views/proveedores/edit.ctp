<div class="proveedores">
    <?php echo $this->Form->create('Proveedore'); ?>
    <fieldset>
        <legend><?php __('Editar Proveedor'); ?></legend>
        <?php
        echo $this->Form->input('id');
        echo $this->Form->input('cif', array('label' => __('CIF', true)));
        echo $this->Form->input('nombre', array('label' => __('Nombre', true)));
        echo $this->Form->input('direccion', array('label' => __('Dirección', true)));
        echo $this->Form->input('direccionalmacen', array('label' => __('Dirección Almacén', true)));
        echo $this->Form->input('provincia', array('label' => __('Provincia', true)));
        echo $this->Form->input('poblacion', array('label' => __('Población', true)));
        echo $this->Form->input('cp', array('label' => __('Código Postal', true)));
        echo $this->Form->input('pais', array('label' => __('Pais', true)));
        echo $this->Form->input('telefono', array('label' => __('Teléfono', true)));
        echo $this->Form->input('fax', array('label' => __('Fax', true)));
        echo $this->Form->input('web', array('label' => __('Página WEB', true)));
        echo $this->Form->input('email', array('label' => __('E-Mail', true)));
        echo $this->Form->input('comercial', array('label' => __('Comercial/es', true)));
        echo $this->Form->input('impuestos', array('label' => __('Impuestos', true)));
        echo $this->Form->input('cuentacontable', array('label' => __('Cuenta Contable', true)));
        echo $this->Form->input('observaciones', array('label' => __('Observaciones', true)));

        echo $this->Form->input('tipomaterial', array('label' => __('Materiales que provee', true)));
        echo $this->Form->input('tipotransporte', array('label' => __('Transporte', true)));
        echo $this->Form->input('formapedido', array('label' => __('Forma de Pedido', true)));
        echo $this->Form->input('ecommerce', array('label' => __('E-Commerce', true)));
        echo $this->Form->input('usuario', array('label' => __('Usuario E-Commerce', true)));
        echo $this->Form->input('contrasenia', array('label' => __('Contraseña E-Commerce', true)));
        ?>
    </fieldset>

    <table class="view">
        <tr>
            <td></td>
            <td>
                <table class="edit">
                    <tr>
                        <td><?php echo $form->input('Cuentasbancaria.nombre'); ?><?php echo $form->input('Cuentasbancaria.id'); ?></td>
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
    <?php echo $this->Form->end(__('Guardar', true)); ?>
</div>
<div class="actions">
    <h3><?php __('Acciones'); ?></h3>
    <ul>

        <li><?php echo $this->Html->link(__('Eliminar', true), array('action' => 'delete', $this->Form->value('Proveedore.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Proveedore.id'))); ?></li>
        <li><?php echo $this->Html->link(__('Listar Proveedores', true), array('action' => 'index')); ?></li>

    </ul>
</div>
