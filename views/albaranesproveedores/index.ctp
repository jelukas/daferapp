<div class="albaranesproveedores">
    <h2>
        <?php __('Albaranes de proveedores'); ?>
    </h2>
    <?php echo $this->Form->create('Albaranesproveedore', array('type' => 'get', 'action' => 'index')); ?>
    <?php echo $this->Form->input('buscar', array('type' => 'text')); ?>
    <?php echo $this->Form->end(__('Buscar', true)); ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?php echo $this->Paginator->sort('Número', 'numero'); ?></th>
            <th><?php echo $this->Paginator->sort('Proveedor', 'proveedore_id'); ?></th>
            <th><?php echo $this->Paginator->sort('Fecha', 'Albaranesproveedore.fecha'); ?></th>
            <th><?php echo $this->Paginator->sort('Aviso de repuesto', 'Presupuestosproveedore.avisosrepuesto_id'); ?></th>
            <th><?php echo $this->Paginator->sort('Aviso de taller', 'Presupuestosproveedore.avisostallere_id'); ?></th>
            <th><?php echo $this->Paginator->sort('Orden', 'Presupuestosproveedore.ordene_id'); ?></th>
            <th><?php echo $this->Paginator->sort('Base Imp.', 'baseimponible'); ?></th>
            <th>Impuestos</th>
            <th>Total</th>
            <th><?php echo $this->Paginator->sort('Observaciones', 'Albaranesproveedore.observaciones'); ?></th>
            <th><?php echo $this->Paginator->sort('Estado', 'estadosalbaranesproveedore_id'); ?></th>
            <th><?php echo $this->Paginator->sort('albaranescaneado'); ?></th>
            <th class="actions"><?php __('Actions'); ?></th>
        </tr>
        <?php
        $i = 0;
        foreach ($albaranesproveedores as $albaranesproveedore):
            $class = null;
            if ($i++ % 2 == 0) {
                $class = ' class="altrow"';
            }
            ?>
            <tr<?php echo $class; ?>>
                <td><?php echo $albaranesproveedore['Albaranesproveedore']['numero']; ?>&nbsp;</td>
                <td><?php echo $this->Html->link($albaranesproveedore['Proveedore']['nombre'], array('controller' => 'proveedores', 'action' => 'view', $albaranesproveedore['Proveedore']['id'])); ?></td>
                <td style="width: 100px;"><?php echo $this->Time->format('d-m-Y', $albaranesproveedore['Albaranesproveedore']['fecha']); ?>&nbsp;</td>
                <td><?php echo $this->Html->link($albaranesproveedore['Pedidosproveedore']['Presupuestosproveedore']['avisosrepuesto_id'], array('controller' => 'avisosrepuestos', 'action' => 'view', $albaranesproveedore['Pedidosproveedore']['Presupuestosproveedore']['avisosrepuesto_id'])); ?></td>    
                <td><?php echo $this->Html->link($albaranesproveedore['Pedidosproveedore']['Presupuestosproveedore']['avisostallere_id'], array('controller' => 'avisostalleres', 'action' => 'view', $albaranesproveedore['Pedidosproveedore']['Presupuestosproveedore']['avisostallere_id'])); ?></td>   
                <td><?php echo $this->Html->link($albaranesproveedore['Pedidosproveedore']['Presupuestosproveedore']['ordene_id'], array('controller' => 'ordenes', 'action' => 'view', $albaranesproveedore['Pedidosproveedore']['Presupuestosproveedore']['ordene_id'])); ?></td>
                <td><?php echo redondear_dos_decimal($albaranesproveedore['Albaranesproveedore']['baseimponible']); ?>&nbsp;</td>
                <td><?php echo redondear_dos_decimal($albaranesproveedore['Albaranesproveedore']['baseimponible']*($albaranesproveedore['Proveedore']['Tiposiva']['porcentaje_aplicable']/100)); ?>&nbsp;</td>
                <td><?php echo redondear_dos_decimal($albaranesproveedore['Albaranesproveedore']['baseimponible'])+redondear_dos_decimal($albaranesproveedore['Albaranesproveedore']['baseimponible']*($albaranesproveedore['Proveedore']['Tiposiva']['porcentaje_aplicable']/100)); ?>&nbsp;</td>
                <td style="width: 28%"><?php echo $albaranesproveedore['Albaranesproveedore']['observaciones']; ?>&nbsp;</td>
                <td><?php echo $albaranesproveedore['Estadosalbaranesproveedore']['estado']; ?></td>
                <td><?php echo $this->Html->link(__($albaranesproveedore['Albaranesproveedore']['albaranescaneado'], true), '/files/albaranesproveedore/' . $albaranesproveedore['Albaranesproveedore']['albaranescaneado']); ?></td>
                <td class="actions">
                    <?php echo $this->Html->link(__('Ver', true), array('action' => 'view', $albaranesproveedore['Albaranesproveedore']['id'])); ?>
                    <?php echo $this->Html->link(__('Eliminar', true), array('action' => 'delete', $albaranesproveedore['Albaranesproveedore']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $albaranesproveedore['Albaranesproveedore']['id'])); ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <p>
        <?php
        echo $this->Paginator->counter(array(
            'format' => __('Página %page% de %pages%, mostrando %current% filas de %count% total, starting on record %start%, finalizando en %end%', true)
        ));
        ?>	</p>

    <div class="paging">
        <?php echo $this->Paginator->prev('<< ' . __('Anterior', true), array(), null, array('class' => 'disabled')); ?>
        | 	<?php echo $this->Paginator->numbers(); ?>
        |
        <?php echo $this->Paginator->next(__('Siguiente', true) . ' >>', array(), null, array('class' => 'disabled')); ?>
    </div>
</div>