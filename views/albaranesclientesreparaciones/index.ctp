<div class="albaranesclientesreparaciones">
    <h2>
        <?php __('Albaranes de Reparaciones'); ?>
        <?php echo $this->Html->link(__('Nuevo', true), array('action' => 'add'), array('class' => 'button_link')); ?>
    </h2>
    <?php echo $this->Form->create('Albaranesclientesreparacione', array('type' => 'get', 'action' => 'index')); ?>
    <?php echo $this->Form->input('buscar', array('type' => 'text')); ?>
    <?php echo $this->Form->end(__('Buscar', true)); ?>
    <table cellpadding="0" cellspacing="0">
        <tr>  
            <th><?php echo $this->Paginator->sort('Nº','numero'); ?></th>
            <th><?php echo $this->Paginator->sort('fecha'); ?></th>
            <th><?php echo $this->Paginator->sort('cliente_id'); ?></th>
            <th><?php echo $this->Paginator->sort('Orden','ordene_id'); ?></th>
            <th><?php echo $this->Paginator->sort('albaranescaneado'); ?></th>
            <th><?php echo $this->Paginator->sort('facturable'); ?></th>
            <th><?php echo $this->Paginator->sort('tiposiva_id'); ?></th>
            <th><?php echo $this->Paginator->sort('almacene_id'); ?></th>
            <th><?php echo $this->Paginator->sort('facturas_cliente_id'); ?></th>
            <th><?php echo $this->Paginator->sort('es_devolucion'); ?></th>
            <th><?php echo $this->Paginator->sort('comerciale_id'); ?></th>
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
                <td>
                    <?php echo $this->Html->link($albaranesclientesreparacione['Ordene']['numero'], array('controller' => 'ordenes', 'action' => 'view', $albaranesclientesreparacione['Ordene']['id'])); ?>
                </td>
                <td><?php echo $this->Html->link(__($albaranesclientesreparacione['Albaranesclientesreparacione']['albaranescaneado'], true), '/files/albaranesclientesreparacione/' . $albaranesclientesreparacione['Albaranesclientesreparacione']['albaranescaneado']); ?>&nbsp;</td>
                <td><?php echo $albaranesclientesreparacione['Albaranesclientesreparacione']['facturable']; ?>&nbsp;</td>
                <td>
                    <?php echo $this->Html->link($albaranesclientesreparacione['Tiposiva']['tipoiva'], array('controller' => 'tiposivas', 'action' => 'view', $albaranesclientesreparacione['Tiposiva']['id'])); ?>
                </td>
                <td>
                    <?php echo $this->Html->link($albaranesclientesreparacione['Almacene']['nombre'], array('controller' => 'almacenes', 'action' => 'view', $albaranesclientesreparacione['Almacene']['id'])); ?>
                </td>
                <td>
                    <?php echo $this->Html->link($albaranesclientesreparacione['FacturasCliente']['id'], array('controller' => 'facturas_clientes', 'action' => 'view', $albaranesclientesreparacione['FacturasCliente']['id'])); ?>
                </td>
                <td><?php echo $albaranesclientesreparacione['Albaranesclientesreparacione']['es_devolucion']; ?>&nbsp;</td>
                <td>
                    <?php echo $this->Html->link($albaranesclientesreparacione['Comerciale']['nombre'], array('controller' => 'comerciales', 'action' => 'view', $albaranesclientesreparacione['Comerciale']['id'])); ?>
                </td>
                <td>
                    <?php echo $this->Html->link($albaranesclientesreparacione['Centrosdecoste']['denominacion'], array('controller' => 'centrosdecostes', 'action' => 'view', $albaranesclientesreparacione['Centrosdecoste']['id'])); ?>
                </td>
                <td class="actions">
                    <?php echo $this->Html->link(__('Ver', true), array('action' => 'view', $albaranesclientesreparacione['Albaranesclientesreparacione']['id'])); ?>
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