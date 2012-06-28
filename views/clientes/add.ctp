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
                <td>
                    <h4>Forma de Pago<?php echo $html->link(__('Editar Forma de Pago', true), '#?', array('class' => 'button_link editar_formapago')); ?></h4>
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
                                echo $form->radio('Formapago.tipodepago', $options, $attributes);
                                ?>
                            </td>
                            <td>
                                <?php
                                $options = array(1 => '1', 2 => '2', 3 => '3', 4 => '4', 5 => '5');
                                $attributes = array('legend' => false, 'label' => false, 'separator' => '  ', 'class' => 'horizontal_radio');
                                echo $form->radio('Formapago.numero_vencimientos', $options, $attributes);
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span>Diferencia entre vencimientos:</span>
                                <?php echo $form->input('Formapago.dias_entre_vencimiento', array('label' => false)); ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span>Fecha Fija de Vencimiento:</span>
                                <?php echo $form->input('Formapago.dia_mes_fijo_vencimiento', array('label' => false)); ?>
                            </td>                
                        </tr>
                        <tr>
                            <td>
                                <span>Nombre:</span>
                                <?php echo $form->input('Formapago.nombre', array('label' => false)); ?>
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
    <?php echo $form->end('Añadir'); ?>
</div>

<script type="text/javascript">
    $(function(){
        $('.editar_formapago').click(function(){
            $('#formapago_row').fadeToggle("slow", "linear");
        });
    });
</script>