<div class="avisosrepuestos">
    <h2>
        <?php __('Avisos de repuestos'); ?>
        <?php echo $this->Html->link(__('Nuevo Aviso de Repuestos', true), array('action' => 'add'), array('class' => 'button_link')); ?>
    </h2>
    <div class="buscador">
        <?php echo $this->Form->create(null, array('url' => array('controller' => 'avisosrepuestos', 'action' => 'search'))); ?>
        <?php echo $this->Form->input('query',array('type'=>'text','label'=>'Buscar')) ?>
        <?php echo $this->Form->end('Buscar') ?>
    </div>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?php echo $this->Paginator->sort('Numero'); ?></th>
            <th><?php echo $this->Paginator->sort('Fecha'); ?></th>
            <th><?php echo $this->Paginator->sort('Cliente'); ?></th>
            <th><?php echo $this->Paginator->sort('Centro de trabajo'); ?></th>
            <th><?php echo $this->Paginator->sort('Máquina'); ?></th>
            <th><?php echo $this->Paginator->sort('Descripción'); ?></th>
            <th><?php echo $this->Paginator->sort('Estado'); ?></th>
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
                <td><?php echo $avisosrepuesto['Avisosrepuesto']['numero']; ?>&nbsp;</td>
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
                <td><?php echo $avisosrepuesto['Avisosrepuesto']['descripcion']; ?></td>
                <td>
                    <?php echo $this->Html->link($avisosrepuesto['Estadosaviso']['estado'], array('controller' => 'estadosavisos', 'action' => 'view', $avisosrepuesto['Estadosaviso']['id'])); ?>
                </td>
                <td class="actions">
                    <?php echo $this->Html->link(__('Ver', true), array('action' => 'view', $avisosrepuesto['Avisosrepuesto']['id'])); ?>
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