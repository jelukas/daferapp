<div class="albaranesclientesreparaciones">
    <h2>
        <?php __('Albaranes de Reparaciones'); ?>
        <?php // echo $this->Html->link(__('Nuevo', true), array('action' => 'add'), array('class' => 'button_link')); ?>
    </h2>
    <?php echo $this->Form->create('Albaranesclientesreparacione', array('type' => 'get', 'action' => 'index')); ?>
    <?php echo $this->Form->input('buscar', array('type' => 'text')); ?>
    <?php echo $this->Form->end(__('Buscar', true)); ?>
    <table cellpadding="0" cellspacing="0">
        <tr>  
            <th><?php echo $this->Paginator->sort('Nº', 'numero'); ?></th>
            <th><?php echo $this->Paginator->sort('fecha'); ?></th>
            <th><?php echo $this->Paginator->sort('cliente_id'); ?></th>
            <th><?php echo $this->Paginator->sort('observaciones'); ?></th>
            <th>Precio<br/>Mat.</th>
            <th>Precio<br/>Obra.</th>
            <th>Base<br/>Imponible</th>
            <th>Impuestos</th>
            <th>Total</th>
            <th><?php echo $this->Paginator->sort('Aviso<br/>Taller', 'Ordene.avisostallere_id', array('escape' => False)); ?></th>
            <th><?php echo $this->Paginator->sort('Orden', 'ordene_id'); ?></th>
            <th><?php echo $this->Paginator->sort('comerciale_id'); ?></th>
            <th><?php echo $this->Paginator->sort('Albarán<br/>Escaneado', 'albaranescaneado', array('escape' => False)); ?></th>
            <th><?php echo $this->Paginator->sort('Estado', 'estadosalbaranesclientesreparacione_id'); ?></th>
            <th><?php echo $this->Paginator->sort('facturable'); ?></th>
            <th><?php echo $this->Paginator->sort('facturas_cliente_id'); ?></th>
            <th><?php echo $this->Paginator->sort('centrosdecoste_id'); ?></th>
            <th class="actions"><?php __('Acciones'); ?></th>
        </tr>
        <?php
        $i = 0;
        foreach ($albaranesclientesreparaciones as $albaranesclientesreparacione):
            $class = null;
            if ($i++ % 2 == 0) {
                $class = ' class="altrow"';
            }
            ?>
            <tr<?php echo $class; ?>>
                <td><?php echo $albaranesclientesreparacione['Albaranesclientesreparacione']['numero']; ?>&nbsp;</td>
                <td><?php echo $albaranesclientesreparacione['Albaranesclientesreparacione']['fecha']; ?>&nbsp;</td>
                <td>
                    <?php echo $this->Html->link($albaranesclientesreparacione['Cliente']['nombre'], array('controller' => 'clientes', 'action' => 'view', $albaranesclientesreparacione['Cliente']['id'])); ?>
                </td>
                <td><?php echo $albaranesclientesreparacione['Albaranesclientesreparacione']['observaciones']; ?></td>
                <td><?php echo $albaranesclientesreparacione['Albaranesclientesreparacione']['total_materiales']; ?>&nbsp;</td>
                <td><?php echo $albaranesclientesreparacione['Albaranesclientesreparacione']['total_manoobra']; ?></td>
                <td><?php echo $albaranesclientesreparacione['Albaranesclientesreparacione']['baseimponible']; ?></td>
                <td><?php echo redondear_dos_decimal($albaranesclientesreparacione['Albaranesclientesreparacione']['baseimponible'] * $albaranesclientesreparacione['Tiposiva']['porcentaje_aplicable'] / 100); ?></td>
                <td><?php echo redondear_dos_decimal($albaranesclientesreparacione['Albaranesclientesreparacione']['baseimponible'] + ($albaranesclientesreparacione['Albaranesclientesreparacione']['baseimponible'] * $albaranesclientesreparacione['Tiposiva']['porcentaje_aplicable'] / 100)); ?></td>
                <td><?php echo $this->Html->link($albaranesclientesreparacione['Ordene']['numero'], array('controller' => 'ordenes', 'action' => 'view', $albaranesclientesreparacione['Ordene']['id'])); ?></td>
                <td><?php echo $this->Html->link($albaranesclientesreparacione['Ordene']['Avisostallere']['numero'], array('controller' => 'avisostalleres', 'action' => 'view', $albaranesclientesreparacione['Ordene']['avisostallere_id'])); ?></td>
                <td><?php echo $this->Html->link($albaranesclientesreparacione['Comerciale']['nombre'], array('controller' => 'comerciales', 'action' => 'view', $albaranesclientesreparacione['Comerciale']['id'])); ?></td>
                <td><?php if (!empty($albaranesclientesreparacione['Albaranesclientesreparacione']['albaranescaneado'])) echo $this->Html->image('clip.png', array('url' => '/files/albaranesclientesreparacione/' . $albaranesclientesreparacione['Albaranesclientesreparacione']['albaranescaneado'])); ?>&nbsp;</td>
                <td><?php echo $albaranesclientesreparacione['Estadosalbaranesclientesreparacione']['estado']; ?>&nbsp;</td>
                <td><?php echo $albaranesclientesreparacione['Albaranesclientesreparacione']['facturable'] == 1 ? 'Sí' : 'No'; ?>&nbsp;</td>
                <td>
                    <?php echo $this->Html->link($albaranesclientesreparacione['FacturasCliente']['numero'], array('controller' => 'facturas_clientes', 'action' => 'view', $albaranesclientesreparacione['FacturasCliente']['id'])); ?>
                </td>
                <td>
                    <?php echo $this->Html->link($albaranesclientesreparacione['Centrosdecoste']['denominacion'], array('controller' => 'centrosdecostes', 'action' => 'view', $albaranesclientesreparacione['Centrosdecoste']['id'])); ?>
                </td>
                <td class="actions">
                    <?php echo $this->Html->link(__('Ver', true), array('action' => 'view', $albaranesclientesreparacione['Albaranesclientesreparacione']['id'])); ?>
                    <?php echo $this->Html->link(__('Eliminar', true), array('action' => 'delete', $albaranesclientesreparacione['Albaranesclientesreparacione']['id']), array('class' => 'button_link'), sprintf(__('¿Seguro que quieres borrar el Albaran de Reparación Nº # %s?', true), $albaranesclientesreparacione['Albaranesclientesreparacione']['numero'])); ?> 
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <p>
        <?php
        echo $this->Paginator->counter(array(
            'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
        ));
        ?>	</p>

    <div class="paging">
        <?php echo $this->Paginator->prev('<< ' . __('anterior', true), array(), null, array('class' => 'disabled')); ?>
        | 	<?php echo $this->Paginator->numbers(); ?>
        |
        <?php echo $this->Paginator->next(__('siguiente', true) . ' >>', array(), null, array('class' => 'disabled')); ?>
    </div>
</div>