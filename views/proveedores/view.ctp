<div class="proveedores">
    <h2>
        <?php __('Ficha de proveedor'); ?>
        <?php echo $this->Html->link(__('Editar Proveedor', true), array('action' => 'edit', $proveedore['Proveedore']['id']), array('class' => 'button_link')); ?> 
        <?php echo $this->Html->link(__('Eliminar Proveedor', true), array('action' => 'delete', $proveedore['Proveedore']['id']), array('class' => 'button_link'), sprintf(__('Are you sure you want to delete # %s?', true), $proveedore['Proveedore']['id'])); ?> 
        <?php echo $this->Html->link(__('Listar Proveedores', true), array('action' => 'index'), array('class' => 'button_link')); ?> 
    </h2>
    <table class="view edit">
        <tr>
            <td><span><?php __('Denominación Comercial'); ?></span></td>
            <td><?php echo $proveedore['Proveedore']['nombre']; ?></td>
            <td><span><?php __('Nombre Fiscal'); ?></span></td>
            <td><?php echo $proveedore['Proveedore']['nombrefiscal']; ?></td>
            <td><span><?php __('CIF'); ?></span></td>
            <td><?php echo $proveedore['Proveedore']['cif']; ?></td>
            <td><span><?php __('Tipo de IVA'); ?></span></td>
            <td><?php echo $proveedore['Tiposiva']['tipoiva']; ?> - <?php echo $proveedore['Tiposiva']['porcentaje_aplicable']; ?> &percnt;</td>
            <td><span><?php __('Cuenta Contable'); ?></span></td>
            <td><?php echo $proveedore['Proveedore']['cuentacontable']; ?></td>
        </tr>
        <tr>
            <td><span><?php __('Población'); ?></span></td>
            <td><?php echo $proveedore['Proveedore']['poblacion']; ?></td>
            <td><span><?php __('Provincia'); ?></span></td>
            <td><?php echo $proveedore['Proveedore']['provincia']; ?></td>
            <td><span><?php __('Código Postal'); ?></span></td>
            <td><?php echo $proveedore['Proveedore']['cp']; ?></td>
            <td><span><?php __('Pais'); ?></span></td>
            <td><?php echo $proveedore['Proveedore']['pais']; ?></td>
        </tr>
        <tr>
            <td><span><?php __('Teléfono'); ?></span></td>
            <td colspan="3"><?php echo $proveedore['Proveedore']['telefono']; ?></td>
            <td><span><?php __('Dirección Fiscal'); ?></span></td>
            <td colspan="5"><?php echo $proveedore['Proveedore']['direccionfiscal']; ?></td>
        </tr>
        <tr>
            <td><span><?php __('Fax'); ?></span></td>
            <td colspan="3"><?php echo $proveedore['Proveedore']['fax']; ?></td>
            <td><span><?php __('Dirección Postal'); ?></span></td>
            <td colspan="5"><?php echo $proveedore['Proveedore']['direccion']; ?></td>
        </tr>
        <tr>
            <td><span><?php __('Email: '); ?></span></td>
            <td><?php echo $proveedore['Proveedore']['email']; ?></td>
            <td><span><?php __('Web: '); ?></span></td>
            <td><a href="<?php echo $proveedore['Proveedore']['web']; ?>"><?php echo $proveedore['Proveedore']['web']; ?></a></td>
            <td><span><?php __('Dirección Almacen'); ?></span></td>
            <td colspan="5"><?php echo $proveedore['Proveedore']['direccionalmacen']; ?></td>
        </tr>
        <tr>
            <td><span><?php __('Comercial/es'); ?></span></td>
            <td colspan="3"><?php echo $proveedore['Proveedore']['comercial']; ?></td>
            <td><span><?php __('Proveedores de(material)'); ?></span></td>
            <td colspan="5"><?php echo $proveedore['Proveedore']['proveedoresde']; ?></td>
        </tr>
        <tr>
            <td><span><?php __('Personas de Contacto'); ?></span></td>
            <td colspan="2"><?php echo $proveedore['Proveedore']['personascontacto']; ?></td>
            <td><span><?php __('Forma de Pedido'); ?></span></td>
            <td colspan="2"><?php echo $proveedore['Proveedore']['formapedido']; ?></td>
            <td><span><?php __('Tipo de Transporte'); ?></span></td>
            <td colspan="2"><?php echo $proveedore['Proveedore']['tipotransporte']; ?></td>
        </tr>
        <tr>
            <td colspan="2"><span><?php __('E-commerce Enlace'); ?></span></td>
            <td><?php echo $proveedore['Proveedore']['ecommerce']; ?></td>
            <td colspan="2"><span><?php __('Usuario E-commerce'); ?></span></td>
            <td><?php echo $proveedore['Proveedore']['usuario']; ?></td>
            <td colspan="2"><span><?php __('Contraseña'); ?></span></td>
            <td><input type="password" value="<?php echo $proveedore['Proveedore']['contrasenia']; ?>" readonly="true" id="password"/><a href="#?" id="show-password">Ver</a></td>
        </tr>
        <tr>
            <td><span><?php __('Observaciones'); ?></span></td>
            <td colspan="9"><?php echo $proveedore['Proveedore']['observaciones']; ?></td>
        </tr>
    </table>
    <table class="view">
        <tr>
            <td><h4>Forma de Pago</h4></td>
            <td><h4>Datos Bancarios</h4></td>
        </tr>
        <tr>
            <td><?php echo $proveedore['Formapago']['nombre']; ?></td>
            <td>
                <table class="edit">
                    <tr>
                        <td><span>Nombre</span><br/><?php echo $proveedore['Cuentasbancaria']['nombre']; ?></td>
                        <td><span>Nº Entidad</span><br/><?php echo $proveedore['Cuentasbancaria']['numero_entidad']; ?></td>
                        <td><span>Nº Sucursal</span><br/><?php echo $proveedore['Cuentasbancaria']['numero_sucursal']; ?></td>
                        <td><span>D.C</span><br/><?php echo $proveedore['Cuentasbancaria']['numero_dc']; ?></td>
                        <td><span>Nº CCC</span><br/><?php echo $proveedore['Cuentasbancaria']['numero_cuenta']; ?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td colspan="2"><span>BIC/SWIFT</span><br/><?php echo $proveedore['Cuentasbancaria']['numero_bicswift']; ?></td>
                        <td colspan="2"><span>IBAN</span><br/><?php echo $proveedore['Cuentasbancaria']['numero_iban']; ?></td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</div>
<script type="text/javascript">
    $(function(){
        $('#show-password').click(function(){
            alert($('#password').val());
        });
    });
</script>