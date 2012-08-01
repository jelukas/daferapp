<div class="albaranesclientes">
    <?php echo $this->Form->create('Albaranescliente', array('type' => 'file')); ?>
    <fieldset>
        <legend><?php __('Nuevo Albaran de Cliente proveniente del Pedido de Cliente ' . $pedidoscliente['Pedidoscliente']['id']); ?></legend>
        <?php
        echo "<h3>Cliente: " . $pedidoscliente['Presupuestoscliente']['Cliente']['nombre'] . '</h3>';
        if (!empty($pedidoscliente['Presupuestoscliente']['Centrostrabajo']['centrotrabajo']))
            echo "<h3>Centros de Trabajo: " . $pedidoscliente['Presupuestoscliente']['Centrostrabajo']['centrotrabajo'] . '</h3>';
        if (!empty($pedidoscliente['Presupuestoscliente']['Maquina']['nombre']))
            echo "<h3>Máquina: " . $pedidoscliente['Presupuestoscliente']['Maquina']['nombre'] . '</h3>';
        echo $this->Form->input('fecha');
        echo $this->Form->input('numero',array('value' => $numero));
        echo $this->Form->input('observaciones');
        echo $this->Form->input('file', array('type' => 'file', 'label' => 'Albaran Escaneado'));
        echo $this->Form->input('pedidoscliente_id', array('type' => 'hidden', 'value' => $pedidoscliente['Pedidoscliente']['id']));
        echo $this->Form->input('cliente_id', array('type' => 'hidden', 'value' => $pedidoscliente['Presupuestoscliente']['cliente_id']));
        echo $this->Form->input('centrostrabajo_id', array('type' => 'hidden', 'value' => $pedidoscliente['Presupuestoscliente']['centrostrabajo_id']));
        echo $this->Form->input('maquina_id', array('type' => 'hidden', 'value' => $pedidoscliente['Presupuestoscliente']['maquina_id']));
        echo $this->Form->input('tiposiva_id');
        echo $this->Form->input('facturable');
        ?>
    </fieldset>
    <div class="related">
        <h3>Tareas a realizar </h3>
        <table style="background-color: #FFE6CC;">
            <thead><th>Asunto</th><th>Validar</th></thead>
            <?php $i = 0; ?>
            <?php foreach ($pedidoscliente['Tareaspedidoscliente'] as $indice => $tarea): ?>
                <tr>
                    <td style="background-color: #FFE6CC">Tarea <?php echo $indice + 1 ?> - <?php echo $tarea['asunto'] ?></td>                  
                    <td class="actions"  style="background-color: #FFE6CC"><?php echo $this->Form->input('Tareaspedidoscliente.' . $i . '.id', array('label' => 'Validar', 'class' => 'validartarea', 'type' => 'checkbox', 'checked' => true, 'value' => $tarea['id'])) ?></td>
                </tr>
                <tr class="tarea-relations">
                    <td colspan="4">
                        <?php if (!empty($tarea['ManodeobrasTareaspedidoscliente'])): ?>
                            <?php $j = 0; ?>
                            <h4>Mano de Obra</h4>
                            <table>
                                <tr><th>Descripcion</th><th>Horas</th><th>Precio Hora</th><th>Descuento</th><th>Importe</th><th>Validar</th></tr>
                                <?php foreach ($tarea['ManodeobrasTareaspedidoscliente'] as $manodeobra): ?>
                                    <tr>
                                        <td><?php echo $manodeobra['descripcion'] ?></td>
                                        <td><?php echo $manodeobra['horas'] ?></td>
                                        <td><?php echo $manodeobra['precio_hora'] ?></td>
                                        <td><?php echo $manodeobra['descuento'] ?> %</td>
                                        <td><?php echo $manodeobra['importe'] ?></td>
                                        <td class="actions"><?php echo $this->Form->input('Tareaspedidoscliente.' . $i . '.ManodeobrasTareaspedidoscliente.' . $j . '.id', array('class' => 'childcheckbox', 'label' => '', 'type' => 'checkbox', 'checked' => true, 'value' => $manodeobra['id'])) ?></td></tr>
                                    <?php $j++ ?>
                                <?php endforeach; ?>
                            </table>
                            <p style="background-color: #fff; text-align: right;font-weight: bold;">Total de Mano de Obra</p>
                            <p style="background-color: #fff; text-align: right;"><?php echo $tarea['mano_de_obra'] ?> &euro;</p>
                        <?php endif; ?>
                        <?php if (!empty($tarea['TareaspedidosclientesOtrosservicio'])): ?>
                            <?php $k = 0; ?>
                            <h4>Otros Servicios</h4>
                            <table>
                                <tr><th>Desplazamiento</th><th>M.O.D</th><th>Km</th><th>Dietas</th><th>Varios</th><th>Total</th><th>Validar</th></tr>
                                <?php if (!empty($tarea['TareaspedidosclientesOtrosservicio'])): ?>
                                    <tr>
                                        <td><?php echo $tarea['TareaspedidosclientesOtrosservicio']['desplazamiento'] ?> &euro;</td>
                                        <td><?php echo $tarea['TareaspedidosclientesOtrosservicio']['manoobradesplazamiento'] ?> &euro;</td>
                                        <td><?php echo $tarea['TareaspedidosclientesOtrosservicio']['kilometraje'] ?> Km.</td>
                                        <td><?php echo $tarea['TareaspedidosclientesOtrosservicio']['dietas'] ?></td>
                                        <td><?php echo $tarea['TareaspedidosclientesOtrosservicio']['varios'] ?> &euro;</td>
                                        <td><?php echo $tarea['TareaspedidosclientesOtrosservicio']['total'] ?> &euro;</td>
                                        <td><?php echo $this->Form->input('Tareaspedidoscliente.' . $i . '.TareaspedidosclientesOtrosservicio.' . $k . '.id', array('class' => 'childcheckbox', 'label' => '', 'type' => 'checkbox', 'checked' => true, 'value' => $tarea['TareaspedidosclientesOtrosservicio']['id'])) ?></td>
                                    </tr>
                                <?php endif; ?>
                            </table>
                            <p style="background-color: #fff; text-align: right;font-weight: bold;">Otros Servicios</p>
                            <p style="background-color: #fff; text-align: right;"><?php echo!empty($tarea['TareaspedidosclientesOtrosservicio']['total']) ? $tarea['TareaspedidosclientesOtrosservicio']['total'] : 0 ?> &euro;</p>
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
                            <?php foreach ($tarea['MaterialesTareaspedidoscliente'] as $materiale): ?>
                                <tr>
                                    <td><?php echo $materiale['Articulo']['nombre'] ?></td>
                                    <td><?php echo $materiale['cantidad'] ?></td>
                                    <td><?php echo $materiale['precio_unidad'] ?></td>
                                    <td><?php echo $materiale['descuento'] ?> %</td>
                                    <td><?php echo $materiale['importe'] ?></td>
                                    <td><?php echo $this->Form->input('Tareaspedidoscliente.' . $i . '.MaterialesTareaspedidoscliente.' . $l . '.id', array('class' => 'childcheckbox', 'label' => '', 'type' => 'checkbox', 'checked' => true, 'value' => $materiale['id'])) ?></td>
                                </tr>
                                <?php $l++; ?>
                            <?php endforeach; ?>
                        </table>
                        <p style="background-color: #fff; text-align: right;font-weight: bold;">Total de MaterialesTareaspedidosclientes</p>
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
        // MIRAR QUE PONER AQUI
    });
</script>