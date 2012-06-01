<div class="avisosrepuestos index">
    <h2><?php __('Avisos de repuestos'); ?></h2>
    <?php
    echo $crumb->getHtml('Home Page', 'reset');
    echo '<br /><br />';
    ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?php echo $this->Paginator->sort('Fecha'); ?></th>
            <th><?php echo $this->Paginator->sort('Cliente'); ?></th>
            <th><?php echo $this->Paginator->sort('Centro de trabajo'); ?></th>
            <th><?php echo $this->Paginator->sort('Máquina'); ?></th>
            <th><?php echo $this->Paginator->sort('Estado'); ?></th>
            <th><?php echo $this->Paginator->sort('Fecha de aceptación'); ?></th>
            <th class="actions"><?php __('Acciones'); ?></th>
        </tr>
        <?php
        $i = 0;
        foreach ($avisosrepuestos as $avisosrepuesto):
            $class = null;
            if ($i++ % 2 == 0) {
                $class = ' class="altrow"';
            }
            ?>
            <tr<?php echo $class; ?>>

                <td><?php echo $avisosrepuesto['Avisosrepuesto']['fechahora']; ?>&nbsp;</td>

                <td>
                    <?php echo $this->Html->link($avisosrepuesto['Cliente']['nombre'], array('controller' => 'clientes', 'action' => 'view', $avisosrepuesto['Cliente']['id'])); ?>
                </td>
                <td>
                    <?php echo $this->Html->link($avisosrepuesto['Centrostrabajo']['centrotrabajo'], array('controller' => 'centrostrabajos', 'action' => 'view', $avisosrepuesto['Centrostrabajo']['id'])); ?>
                </td>
                <td>
                    <?php echo $this->Html->link($avisosrepuesto['Maquina']['nombre'], array('controller' => 'maquinas', 'action' => 'view', $avisosrepuesto['Maquina']['id'])); ?>
                </td>
                <td>
                    <?php echo $this->Html->link($avisosrepuesto['Estadosaviso']['estado'], array('controller' => 'estadosavisos', 'action' => 'view', $avisosrepuesto['Estadosaviso']['id'])); ?>
                </td>

                <td><?php echo $avisosrepuesto['Avisosrepuesto']['fechaaceptacion']; ?>&nbsp;</td>
                <td class="actions">
                    <?php echo $this->Html->link(__('Ver', true), array('action' => 'view', $avisosrepuesto['Avisosrepuesto']['id'])); ?>
                    <?php echo $this->Html->link(__('Editar', true), array('action' => 'edit', $avisosrepuesto['Avisosrepuesto']['id'])); ?>
                    <?php echo $this->Html->link(__('Eliminar', true), array('action' => 'delete', $avisosrepuesto['Avisosrepuesto']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $avisosrepuesto['Avisosrepuesto']['id'])); ?>
                    <?php echo $this->Html->link(__('Pdf', true), array('action' => 'pdf', $avisosrepuesto['Avisosrepuesto']['id'])); ?>
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
        <li><a href="#?">Buscar Aviso de Repuestos ¿?</a></li>
        <li style="margin-top: 40px"><?php echo $this->Html->link(__('Nuevo Aviso de repuesto', true), array('action' => 'add')); ?></li>
        <li><?php echo $this->Html->link(__('Listar Clientes', true), array('controller' => 'clientes', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('Nuevo Cliente', true), array('controller' => 'clientes', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('Listar Centros de trabajos', true), array('controller' => 'centrostrabajos', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('Nuevo Centro de trabajo', true), array('controller' => 'centrostrabajos', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('Listar Máquinas', true), array('controller' => 'maquinas', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('Nueva Máquina', true), array('controller' => 'maquinas', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('Listar Artículos', true), array('controller' => 'articulos', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('Nuevo Artículo', true), array('controller' => 'articulos', 'action' => 'add')); ?> </li>
    </ul>
</div>
