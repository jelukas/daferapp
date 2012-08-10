<div class="avisostalleres">
    <h2>
        <?php __('Avisos de Taller'); ?>
        <?php echo $this->Html->link(__('Nuevo Aviso de Taller', true), array('action' => 'add'), array('class' => 'button_link')); ?>
    </h2>

    <div class="buscador">
        <?php echo $this->Form->create(null, array('url' => array('controller' => 'avisostallere', 'action' => 'search'))); ?>
        <?php echo $this->Form->input('query', array('type' => 'text', 'label' => 'Buscar')) ?>
        <?php echo $this->Form->end('Buscar') ?>
    </div>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?php echo $this->Paginator->sort('Número','numero'); ?></th>
            <th><?php echo $this->Paginator->sort('Fecha de Aviso','fechaaviso'); ?></th>
            <th><?php echo $this->Paginator->sort('Cliente','cliente_id'); ?></th>
            <th><?php echo $this->Paginator->sort('Centro de Trabajo','centrostrabajo_id'); ?></th>
            <th><?php echo $this->Paginator->sort('Maquina','maquina_id'); ?></th>
            <th><?php echo $this->Paginator->sort('Descripcion'); ?></th>
            <th><?php echo $this->Paginator->sort('Urgente','marcarurgente'); ?></th>
            <th><?php echo $this->Paginator->sort('Estado','estadosavisostallere_id'); ?></th>
            <th><?php __('Orden'); ?></th>
            <th class="actions"><?php __('Acciones'); ?></th>
        </tr>
        <?php
        $i = 0;
        foreach ($avisostalleres as $avisostallere):
            $class = null;
            if ($i++ % 2 == 0) {
                $class = ' class="altrow"';
            }
            ?>
            <tr<?php echo $class; ?>>
                <td><?php echo $avisostallere['Avisostallere']['numero']; ?></td>
                <td><?php echo $this->Time->format('d-m-Y', $avisostallere['Avisostallere']['fechaaviso']); ?></td>
                <td><?php echo $this->Html->link($avisostallere['Cliente']['nombre'], array('controller' => 'clientes', 'action' => 'view', $avisostallere['Cliente']['id'])); ?></td>
                <td><?php echo $this->Html->link($avisostallere['Centrostrabajo']['centrotrabajo'], array('controller' => 'centrostrabajos', 'action' => 'view', $avisostallere['Centrostrabajo']['id'])); ?></td>
                <td><?php echo $this->Html->link($avisostallere['Maquina']['nombre'], array('controller' => 'maquinas', 'action' => 'view', $avisostallere['Maquina']['id'])); ?></td>
                <td><?php echo $avisostallere['Avisostallere']['descripcion']; ?></td>
                <td><?php echo !empty($avisostallere['Avisostallere']['marcarurgente']) ? 'Sí' : 'No'; ?></td>
                <td><?php echo $avisostallere['Estadosavisostallere']['estado']; ?></td>
                <td>
                    <?php foreach($avisostallere['Ordene'] as $ordene): ?>
                        <?php echo $this->Html->link($ordene['numero'], array('controller' => 'ordenes', 'action' => 'view', $ordene['id'])); ?> | 
                    <?php endforeach; ?>
                </td>
                <td class="actions">
                    <?php echo $this->Html->link(__('Ver', true), array('action' => 'view', $avisostallere['Avisostallere']['id'])); ?>
                    <?php echo $this->Html->link(__('Pdf', true), array('action' => 'pdf', $avisostallere['Avisostallere']['id'])); ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <p>
        <?php
        echo $this->Paginator->counter(array(
            'format' => __('Página %page% de %pages%, mostrando %current% registros de un total de %count%, empezando en registro %start%, finalizando en el registro %end%', true)
        ));
        ?>	
    </p>
    <div class="paging">
        <?php echo $this->Paginator->prev('<< ' . __('Anterior', true), array(), null, array('class' => 'disabled')); ?>
        | 	<?php echo $this->Paginator->numbers(); ?>
        |
        <?php echo $this->Paginator->next(__('Siguiente', true) . ' >>', array(), null, array('class' => 'disabled')); ?>
    </div>
</div>