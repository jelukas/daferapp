<div class="proveedores">
    <?php echo $this->Form->create('Proveedore'); ?>
    <fieldset>
        <legend>
            <?php __('Añadir Proveedor'); ?>
            <?php echo $this->Html->link(__('Listar Proveedores', true), array('action' => 'index'), array('class' => 'button_link')); ?></li>
        </legend>
        <table class="edit">
            <tr>
                <td><span><?php __('Denominación Comercial'); ?></span></td>
                <td><?php echo $this->Form->input('nombre', array('label' => false)) ?></td>
                <td><span><?php __('Nombre Fiscal'); ?></span></td>
                <td><?php echo $this->Form->input('nombrefiscal', array('label' => false)); ?></td>
                <td><span><?php __('CIF'); ?></span></td>
                <td><?php echo $this->Form->input('cif', array('label' => false)) ?></td>
                <td><span><?php __('Tipo de IVA'); ?></span></td>
                <td><?php echo $this->Form->input('tiposiva_id', array('label' => false)) ?></td>
                <td><span><?php __('Cuenta Contable'); ?></span></td>
                <td><?php echo $this->Form->input('cuentacontable', array('label' => false)) ?></td>
            </tr>
            <tr>
                <td><span><?php __('Población'); ?></span></td>
                <td><?php echo $this->Form->input('poblacion', array('label' => false)) ?></td>
                <td><span><?php __('Provincia'); ?></span></td>
                <td><?php echo $this->Form->input('provincia', array('label' => false)) ?></td>
                <td><span><?php __('Código Postal'); ?></span></td>
                <td><?php echo $this->Form->input('cp', array('label' => false)) ?></td>
                <td><span><?php __('Pais'); ?></span></td>
                <td><?php echo $this->Form->input('pais', array('label' => false)) ?></td>
            </tr>
            <tr>
                <td><span><?php __('Teléfono'); ?></span></td>
                <td colspan="3"><?php echo $this->Form->input('telefono', array('label' => false)) ?></td>
                <td><span><?php __('Dirección Fiscal'); ?></span></td>
                <td colspan="5"><?php echo $this->Form->input('direccionfiscal', array('label' => false)) ?></td>
            </tr>
            <tr>
                <td><span><?php __('Fax'); ?></span></td>
                <td colspan="3"><?php echo $this->Form->input('fax', array('label' => false)) ?></td>
                <td><span><?php __('Dirección Postal'); ?></span></td>
                <td colspan="5"><?php echo $this->Form->input('direccion', array('label' => false)) ?></td>
            </tr>
            <tr>
                <td><span><?php __('Email: '); ?></span></td>
                <td><?php echo $this->Form->input('email', array('label' => false)) ?></td>
                <td><span><?php __('Web: '); ?></span></td>
                <td><?php echo $this->Form->input('web', array('label' => false)) ?></td>
                <td><span><?php __('Dirección Almacen'); ?></span></td>
                <td colspan="5"><?php echo $this->Form->input('direccionalmacen', array('label' => false)) ?></td>
            </tr>
            <tr>
                <td><span><?php __('Comercial/es'); ?></span></td>
                <td colspan="3"><?php echo $this->Form->input('comercial', array('label' => false)) ?></td>
                <td><span><?php __('Proveedores de(material)'); ?></span></td>
                <td colspan="5"><?php echo $this->Form->input('proveedoresde', array('label' => false)) ?></td>
            </tr>
            <tr>
                <td><span><?php __('Personas de Contacto'); ?></span></td>
                <td colspan="2"><?php echo $this->Form->input('personascontacto', array('label' => false)) ?></td>
                <td><span><?php __('Forma de Pedido'); ?></span></td>
                <td colspan="2"><?php echo $this->Form->input('formapedido', array('label' => false)) ?></td>
                <td><span><?php __('Tipo de Transporte'); ?></span></td>
                <td colspan="2"><?php echo $this->Form->input('tipotransporte', array('label' => false)) ?></td>
            </tr>
            <tr>
                <td colspan="2"><span><?php __('E-commerce Enlace'); ?></span></td>
                <td><?php echo $this->Form->input('ecommerce', array('label' => false)) ?></td>
                <td colspan="2"><span><?php __('Usuario E-commerce'); ?></span></td>
                <td><?php echo $this->Form->input('usuario', array('label' => false)) ?></td>
                <td colspan="2"><span><?php __('Contraseña'); ?></span></td>
                <td><?php echo $this->Form->input('contrasenia', array('label' => false)) ?></td>
            </tr>
            <tr>
                <td><span><?php __('Observaciones'); ?></span></td>
                <td colspan="9"><?php echo $this->Form->input('observaciones', array('label' => false)) ?></td>
            </tr>
        </table>
        <table class="view">
            <tr>
                <td>
                    <h4>Forma de Pago: <?php echo $this->Form->value('Formapago.nombre'); ?><?php echo $html->link(__('Editar Forma de Pago', true), '#?', array('class' => 'button_link editar_formapago')); ?></h4>
                </td>
            </tr>
            <tr style="display: none" id="formapago_row">
                <td>
                    <table class="edit">
                        <tr>
                            <td><span>Tipos de Pagos</span></td>
                            <td><span>Nº Vencimientos</span></td>
                        </tr>
                        <tr>
                            <td rowspan="4">
                                <?php
                                $options = array('efectivo' => 'Efectivo', 'contado' => 'Contado', 'talon' => 'Talón', 'pagare' => 'Pagare', 'transferencia' => 'Transferencia', 'giro' => 'Giro', 'recibo' => 'Recibo', 'confirming' => 'Confirming', 'efecto' => 'Efecto');
                                $attributes = array('legend' => false);
                                echo $this->Form->radio('Formapago.tipodepago', $options, $attributes);
                                ?>
                            </td>
                            <td>
                                <?php
                                $options = array(1 => '1', 2 => '2', 3 => '3', 4 => '4', 5 => '5');
                                $attributes = array('legend' => false, 'label' => false, 'separator' => '  ', 'class' => 'horizontal_radio');
                                echo $this->Form->radio('Formapago.numero_vencimientos', $options, $attributes);
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span>Diferencia entre vencimientos:</span>
                                <?php echo $this->Form->input('Formapago.dias_entre_vencimiento', array('label' => false)); ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span>Fecha Fija de Vencimiento:</span>
                                <?php echo $this->Form->input('Formapago.dia_mes_fijo_vencimiento', array('label' => false)); ?>
                            </td>                
                        </tr>
                        <tr>
                            <td>
                                <span>Nombre:</span>
                                <?php echo $this->Form->input('Formapago.nombre', array('label' => false)); ?>
                            </td>                
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>             
                <td><h4>Datos Bancarios</h4></td>
            </tr>
            <tr>
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
    <?php echo $this->Form->end(__('Guardar', true)); ?>
</div>
<script type="text/javascript">
    $(function(){
        $('.editar_formapago').click(function(){
            $('#formapago_row').fadeToggle("slow", "linear");
        });
    });
</script>