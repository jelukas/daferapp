<div class="pedidosclientes">
    <?php echo $this->Form->create('Pedidoscliente', array('type' => 'file')); ?>
    <fieldset>
        <legend>
            <?php __('Añadir Pedido de Cliente'); ?>
        </legend>
        <table class="edit">
            <tr>
                <td><span><?php __('Número'); ?></span></td>
                <td><?php echo $this->Form->input('numero', array('label' => false ,'value' =>$numero)); ?></td>
                <td><span><?php __('Fecha'); ?></span></td>
                <td><?php echo $this->Form->input('fecha', array('label' => false)); ?></td>
            </tr>
            <tr>
                <td><span><?php __('Confirmado'); ?></span></td>
                <td><?php echo $this->Form->input('confirmado', array('label' => false)); ?></td>
                <td colspan="4"></td>
                <td><span><?php __('Nº Aceptación aportado por el cliente'); ?></span></td>
                <td><?php echo $this->Form->input('numero_aceptacion_aportado', array('label' => false)); ?></td>
            </tr>
            <tr>
                <td  colspan="6">
                    <?php
                    echo $this->Form->input('file', array('type' => 'file', 'label' => 'Pedido Escaneado'));
                    ?>
                </td>
                <td><span><?php __('Recepcion'); ?></span></td>
                <td><?php echo $this->Form->input('recepcion', array('label' => false)); ?></td>
            </tr>
            <tr>
                <td><span><?php __('Observaciones'); ?></span></td>
                <td  colspan="5"><?php echo $this->Form->input('observaciones', array('label' => false)); ?></td>
                <td><span><?php __('Plazo de Entrega'); ?></span></td>
                <td><?php echo $this->Form->input('fecha_plazo', array('label' => false)); ?></td>
            </tr>
        </table>
        <div class="related">
            <h3>Tareas a realizar </h3>
            <table style="background-color: #FFE6CC;">
                <thead><th>Asunto</th><th>Validar</th></thead>
                <?php $i = 0; ?>
                <?php foreach ($presupuestoscliente['Tareaspresupuestocliente'] as $indice => $tarea): ?>
                    <tr>
                        <td style="background-color: #FFE6CC">Tarea <?php echo $indice + 1 ?> - <?php echo $tarea['asunto'] ?></td>                  
                        <td class="actions"  style="background-color: #FFE6CC"><?php echo $this->Form->input('Tareaspresupuestocliente.' . $i . '.id', array('label' => 'Validar', 'class' => 'validartarea', 'type' => 'checkbox', 'checked' => true, 'value' => $tarea['id'])) ?></td>
                    </tr>
                    <tr class="tarea-relations">
                        <td colspan="4">
                            <?php if (!empty($tarea['Manodeobra'])): ?>
                                <?php $j = 0; ?>
                                <h4>Mano de Obra</h4>
                                <table>
                                    <tr><th>Descripcion</th><th>Horas</th><th>Precio Hora</th><th>Descuento</th><th>Importe</th><th>Validar</th></tr>
                                    <?php foreach ($tarea['Manodeobra'] as $manodeobra): ?>
                                        <tr>
                                            <td><?php echo $manodeobra['descripcion'] ?></td>
                                            <td><?php echo $manodeobra['horas'] ?></td>
                                            <td><?php echo $manodeobra['precio_hora'] ?></td>
                                            <td><?php echo $manodeobra['descuento'] ?> %</td>
                                            <td><?php echo $manodeobra['importe'] ?></td>
                                            <td class="actions"><?php echo $this->Form->input('Tareaspresupuestocliente.' . $i . '.Manodeobra.' . $j . '.id', array('class' => 'childcheckbox', 'label' => '', 'type' => 'checkbox', 'checked' => true, 'value' => $manodeobra['id'])) ?></td></tr>
                                        <?php $j++ ?>
                                    <?php endforeach; ?>
                                </table>
                                <p style="background-color: #fff; text-align: right;font-weight: bold;">Total de Mano de Obra</p>
                                <p style="background-color: #fff; text-align: right;"><?php echo $tarea['mano_de_obra'] ?> &euro;</p>
                            <?php endif; ?>
                            <?php if (!empty($tarea['TareaspresupuestoclientesOtrosservicio'])): ?>
                                <?php $k = 0; ?>
                                <h4>Otros Servicios</h4>
                                <table>
                                    <tr><th>Desplazamiento</th><th>M.O.D</th><th>Km</th><th>Dietas</th><th>Varios</th><th>Total</th><th>Validar</th></tr>
                                    <?php if (!empty($tarea['TareaspresupuestoclientesOtrosservicio'])): ?>
                                        <tr>
                                            <td><?php echo $tarea['TareaspresupuestoclientesOtrosservicio']['desplazamiento'] ?> &euro;</td>
                                            <td><?php echo $tarea['TareaspresupuestoclientesOtrosservicio']['manoobradesplazamiento'] ?> &euro;</td>
                                            <td><?php echo $tarea['TareaspresupuestoclientesOtrosservicio']['kilometraje'] ?> Km.</td>
                                            <td><?php echo $tarea['TareaspresupuestoclientesOtrosservicio']['dietas'] ?></td>
                                            <td><?php echo $tarea['TareaspresupuestoclientesOtrosservicio']['varios'] ?> &euro;</td>
                                            <td><?php echo $tarea['TareaspresupuestoclientesOtrosservicio']['total'] ?> &euro;</td>
                                            <td><?php echo $this->Form->input('Tareaspresupuestocliente.' . $i . '.TareaspresupuestoclientesOtrosservicio.' . $k . '.id', array('class' => 'childcheckbox', 'label' => '', 'type' => 'checkbox', 'checked' => true, 'value' => $tarea['TareaspresupuestoclientesOtrosservicio']['id'])) ?></td>
                                        </tr>
                                    <?php endif; ?>
                                </table>
                                <p style="background-color: #fff; text-align: right;font-weight: bold;">Otros Servicios</p>
                                <p style="background-color: #fff; text-align: right;"><?php echo!empty($tarea['TareaspresupuestoclientesOtrosservicio']['total']) ? $tarea['TareaspresupuestoclientesOtrosservicio']['total'] : 0 ?> &euro;</p>
                            <?php endif; ?>
                            <h4>Materiales</h4>
                            <div id="ajax_message"></div>
                            <table>
                                <tr>
                                    <th>Articulo</th>
                                    <th>Cantidad</th>
                                    <th>Precio Ud.</th>
                                    <th>Descuento</th>
                                    <th>Importe</th>
                                    <th>Validar</th>
                                </tr>
                                <?php $l = 0; ?>
                                <?php foreach ($tarea['Materiale'] as $materiale): ?>
                                    <tr>
                                        <td><?php echo $materiale['Articulo']['nombre'] ?></td>
                                        <td><?php echo $materiale['cantidad'] ?></td>
                                        <td><?php echo $materiale['precio_unidad'] ?></td>
                                        <td><?php echo $materiale['descuento'] ?> %</td>
                                        <td><?php echo $materiale['importe'] ?></td>
                                        <td><?php echo $this->Form->input('Tareaspresupuestocliente.' . $i . '.Materiale.' . $l . '.id', array('class' => 'childcheckbox', 'label' => '', 'type' => 'checkbox', 'checked' => true, 'value' => $materiale['id'])) ?></td>
                                    </tr>
                                    <?php $l++; ?>
                                <?php endforeach; ?>
                            </table>
                            <p style="background-color: #fff; text-align: right;font-weight: bold;">Total de Materiales</p>
                            <p style="background-color: #fff; text-align: right;"><?php echo $tarea['materiales'] ?> &euro;</p>                        
                            <p style="background-color: #FFE6CC; text-align: right;font-weight: bold;font-size: 15px;">Total Tarea</p>
                            <p style="background-color: #FFE6CC; text-align: right;"><?php echo $tarea['total']; ?> &euro;</p>
                        </td>
                    </tr>
                    <?php $i++; ?>
                <?php endforeach; ?>
            </table>
        </div>
    </fieldset>
    <?php echo $this->Form->end(__('Guardar', true)); ?>
</div>
<script type="text/javascript">
    $('.validartarea').change(function(){
        tr = $(this).parent().parent().parent();
        tr_hermano = tr.next('tr');
        if($(this).attr('checked') != 'checked'){
            tr_hermano.find('input:checked').attr('checked', false);
        }else{
            tr_hermano.find('input:checkbox').attr('checked', true);
        }
    });
    $('.childcheckbox').change(function(){
        tr = $(this).parent().parent().parent().parent().parent().parent().parent().prev('tr');
        if(tr.find('.validartarea').is(':checked') == false ){
            tr.find('.validartarea').attr('checked', true);
        };
    });
</script>