<div class="albaranesclientes form">
    <?php echo $this->Form->create('Albaranescliente', array('type' => 'file')); ?>
    <fieldset>
        <legend><?php __('Nuevo Albaran de Cliente proveniente de la Orden ' . $ordene['Ordene']['id']); ?></legend>
        <?php
        echo "<h3>Cliente: ".$ordene['Avisostallere']['Cliente']['nombre'].'</h3>';
        echo $this->Form->input('fecha');
        echo $this->Form->input('numeroalbaran');
        echo $this->Form->input('observaciones');
        echo $this->Form->input('albaranescaneado'); 
        echo $this->Form->input('ordene_id', array('type' => 'hidden', 'value' => $ordene['Ordene']['id']));
        echo $this->Form->input('cliente_id', array('type' => 'hidden', 'value' => $ordene['Avisostallere']['cliente_id']));
        echo $this->Form->input('tiposiva_id');
        echo $this->Form->input('facturable');
        ?>
    </fieldset>
    <div class="related">
        <h3>Tareas a realizar </h3>
        <table style="background-color: #FFE6CC;">
            <thead><th>Asunto</th><th>Validar</th></thead>
            <?php $i = 0; ?>
            <?php foreach ($ordene['Tarea'] as $indice => $tarea): ?>
                <tr>
                    <td style="background-color: #FFE6CC">Tarea <?php echo $indice + 1 ?> - <?php echo $tarea['descripcion'] ?></td>                  
                    <td class="actions"  style="background-color: #FFE6CC"><?php echo $this->Form->input('Tarea.' . $i . '.id', array('label' => 'Validar', 'class' => 'validartarea', 'type' => 'checkbox', 'checked' => true, 'value' => $tarea['id'])) ?></td>
                </tr>
                <tr class="tarea-relations">
                    <td colspan="4">
                        <h4>Materiales</h4>
                        <table>
                            <tr>
                                <th>Articulo</th>
                                <th>Cantidad</th>
                                <th>Validar</th>
                            </tr>
                            <?php $l = 0; ?>
                            <?php foreach ($tarea['ArticulosTarea'] as $materiale): ?>
                                <tr>
                                    <td><?php echo $materiale['Articulo']['nombre'] ?></td>
                                    <td><?php echo $materiale['cantidad'] ?></td>
                                    <td><?php echo $this->Form->input('Tarea.' . $i . '.ArticulosTarea.' . $l . '.id', array('class' => 'childcheckbox', 'label' => '', 'type' => 'checkbox', 'checked' => true, 'value' => $materiale['id'])) ?></td>
                                </tr>
                                <?php $l++; ?>
                            <?php endforeach; ?>
                        </table>
                        <h4>Partes en el Centro de Trabajo del Cliente</h4>
                        <table>
                            <tr>
                                <th>Fecha</th>
                                <th>Centro de Trabajo</th>
                                <th>Horas Imputables</th>
                                <th>Operación</th>
                                <th>Mécanicos</th>
                                <th>Validar</th>
                            </tr>
                            <?php $j = 0; ?>
                            <?php foreach ($tarea['Parte'] as $parte): ?>
                                <tr>
                                    <td><?php echo $parte['fecha'] ?></td>
                                    <td><?php echo $parte['Centrostrabajo']['centrotrabajo'] ?></td>
                                    <td><?php echo $parte['horasimputables'] ?></td>
                                    <td><?php echo $parte['operacion'] ?></td>
                                    <td><?php foreach ($parte['Mecanico'] as $mecanico): echo $mecanico['nombre'].'<br/>'; endforeach; ?></td>
                                    <td><?php echo $this->Form->input('Tarea.' . $i . '.Parte.' . $j . '.id', array('class' => 'childcheckbox', 'label' => '', 'type' => 'checkbox', 'checked' => true, 'value' => $parte['id'])) ?></td>
                                </tr>
                                <?php $j++; ?>
                            <?php endforeach; ?>
                        </table>
                        <h4>Partes de Taller</h4>
                        <table>
                            <tr>
                                <th>Fecha</th>
                                <th>Horas Imputables</th>
                                <th>Operación</th>
                                <th>Mécanicos</th>
                                <th>Validar</th>
                            </tr>
                            <?php $k = 0; ?>
                            <?php foreach ($tarea['Partestallere'] as $partestallere): ?>
                                <tr>
                                    <td><?php echo $partestallere['fecha'] ?></td>
                                    <td><?php echo $partestallere['horasimputables'] ?></td>
                                    <td><?php echo $partestallere['operacion'] ?></td>
                                    <td><?php foreach ($partestallere['Mecanico'] as $mecanico): echo $mecanico['nombre'].'<br/>'; endforeach; ?></td>
                                    <td><?php echo $this->Form->input('Tarea.' . $i . '.Partestallere.' . $k . '.id', array('class' => 'childcheckbox', 'label' => '', 'type' => 'checkbox', 'checked' => true, 'value' => $partestallere['id'])) ?></td>
                                </tr>
                                <?php $k++; ?>
                            <?php endforeach; ?>
                        </table>
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