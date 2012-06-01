<div class="ordenes index">
    <h2><?php __('Ordenes'); ?></h2>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?php echo $this->Paginator->sort('ID'); ?></th>
            <th><?php echo $this->Paginator->sort('Urgente'); ?></th>
            <th><?php echo $this->Paginator->sort('Aviso de taller'); ?></th>
            <th><?php echo $this->Paginator->sort('Estado'); ?></th>
            <th><?php echo $this->Paginator->sort('Fecha prevista de reparación'); ?></th>
            <th class="actions"><?php __('Acciones'); ?></th>
        </tr>
        <?php
        $i = 0;
        foreach ($ordenes as $ordene):
            $class = null;
            if ($i++ % 2 == 0) {
                $class = ' class="altrow"';
            }
            ?>
            <tr<?php echo $class; ?>>
                <td><?php echo $ordene['Ordene']['id']; ?>&nbsp;</td>
                <td><?php
        if ($ordene['Ordene']['urgente'])
            echo "Sí";
        else
            echo "No";
        ?>
                </td>
                <td>
    <?php echo $this->Html->link($ordene['Avisostallere']['id'], array('controller' => 'avisostalleres', 'action' => 'view', $ordene['Avisostallere']['id'])); ?>
                </td>
                <td><?php echo $ordene['Estadosordene']['estado']; ?>&nbsp;</td>
                <td><?php echo $ordene['Ordene']['fecha_prevista_reparacion']; ?>&nbsp;</td>
                <td class="actions">
                    <?php echo $this->Html->link(__('Ver', true), array('action' => 'view', $ordene['Ordene']['id'])); ?>
                    <?php echo $this->Html->link(__('Editar', true), array('action' => 'edit', $ordene['Ordene']['id'])); ?>
                    <?php echo $this->Html->link(__('Eliminar', true), array('action' => 'delete', $ordene['Ordene']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $ordene['Ordene']['id'])); ?>
    <?php echo $this->Html->link(__('Pdf', true), array('action' => 'pdf', $ordene['Ordene']['id'])); ?>
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
<div class="actions">
    <h3><?php __('Acciones'); ?></h3>
    <ul>
        <li><a href="#?">Buscar Ordenes</a></li>
        <li><?php echo $this->Html->link(__('Listar Ordenes', true), array('controller' => 'ordenes', 'action' => 'index')); ?> </li>
        <li><a href="#?">Nueva Orden Directa?</a></li>
    </ul>
</div>
