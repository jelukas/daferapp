<fieldset>
    <?php echo $this->Form->create('Ordene', array('action' => 'imputar')); ?>
    <legend><?php __('IMPUTACIÓN A LA ORDEN'); ?><?php echo (!empty($ordene_id)) ? ' '.$ordene_id : '' ?></legend>
    <h2><?php __('Pedido cliente'.' '.$pedidoscliente['Pedidoscliente']['id']); ?></h2>
    <dl>
        <?php
        $i = 0;
        $class = ' class="altrow"';
        ?>
        <dt<?php if ($i % 2 == 0) echo $class; ?>><?php __('Id'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class; ?>>
            <?php echo $this->Html->link($pedidoscliente['Pedidoscliente']['id'],array('controller'=>'pedidosclientes','action'=>'view',$pedidoscliente['Pedidoscliente']['id'])); ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class; ?>><?php __('Fecha Plazo'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class; ?>>
            <?php echo $pedidoscliente['Pedidoscliente']['fecha_plazo']; ?>
            &nbsp;
        </dd>
    </dl>
    <?php echo (!empty($ordene_id)) ? $this->Form->input('id', array('value' => $ordene_id)) : '' ?>
    <?php
    if (!empty($avisostallere_id)) {
        echo '<h3>Se va ha crear una Orden nueva para el Aviso '.$avisostallere_id.'</h3>';
        echo $this->Form->input('avisostallere_id', array('type' => 'hidden', 'value' => $avisostallere_id));
        echo $this->Form->input('almacene_id', array('type' => 'hidden', 'value' => $almacene_id));
        echo $this->Form->input('fecha_prevista_reparacion');
        echo $this->Form->input('observaciones');
    }
    ?>
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
    <?php echo $this->Form->end(__('Imputar', true)); ?>
</fieldset>
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