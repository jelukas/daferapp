<div class="presupuestosproveedores">
    <h2>
        <?php __('Presupuestos de proveedores'); ?>
        <?php echo $this->Html->link(__('Nuevo Presupuesto Directo', true), array('controller' => 'presupuestosproveedores', 'action' => 'add'), array('class' => 'button_link')); ?>
        <?php echo $this->Html->link(__('Listar Presupuestos', true), array('controller' => 'presupuestosproveedores', 'action' => 'index'), array('class' => 'button_link')); ?>
    </h2>
    <?php echo $this->Form->create('Presupuestosproveedore', array('type' => 'get', 'action' => 'index')); ?>
    <?php echo $this->Form->input('buscar', array('type' => 'text')); ?>
    <?php echo $this->Form->end(__('Buscar', true)); ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?php echo $this->Paginator->sort('Nº', 'numero'); ?></th>
            <th style="min-width: 100px;"><?php echo $this->Paginator->sort('Fecha', 'fecha'); ?></th>
            <th style="width: 200px;"><?php echo $this->Paginator->sort('Proveedor'); ?></th>
            <th><?php echo $this->Paginator->sort('Almacén', 'almacene_id'); ?></th>
            <th><?php echo $this->Paginator->sort('Aviso de Repuesto', 'avisosrepuesto_id'); ?></th>
            <th><?php echo $this->Paginator->sort('Aviso de Taller', 'avisostallere_id'); ?></th>
            <th><?php echo $this->Paginator->sort('Orden', 'ordene_id'); ?></th>
            <th style="min-width: 150px;"><?php echo $this->Paginator->sort('Plazo de Entrega', 'fechaplazo'); ?></th>
            <th><?php echo $this->Paginator->sort('Observaciones', 'observaciones'); ?></th>
            <th><?php echo $this->Paginator->sort('Estado', 'confirmado'); ?></th>
            <th><?php echo $this->Paginator->sort('Presupuesto escaneado', 'presupuestoescaneado'); ?></th>
            <th class="actions"><?php __('Acciones'); ?></th>
        </tr>
        <?php
        $i = 0;
        foreach ($presupuestosproveedores as $presupuestosproveedore):
            $class = null;
            if ($i++ % 2 == 0) {
                $class = ' class="altrow"';
            }
            ?>
            <tr<?php echo $class; ?>>
                <td><?php echo $presupuestosproveedore['Presupuestosproveedore']['numero']; ?>&nbsp;</td>
                <td><?php echo $presupuestosproveedore['Presupuestosproveedore']['fecha']; ?>&nbsp;</td>
                <td><?php echo $this->Html->link($presupuestosproveedore['Proveedore']['nombre'], array('controller' => 'proveedores', 'action' => 'view', $presupuestosproveedore['Proveedore']['id'])); ?></td>
                <td><?php echo $this->Html->link($presupuestosproveedore['Almacene']['nombre'], array('controller' => 'almacenes', 'action' => 'view', $presupuestosproveedore['Almacene']['id'])); ?></td>     
                <td><?php echo $this->Html->link($presupuestosproveedore['Avisosrepuesto']['id'], array('controller' => 'avisosrepuestos', 'action' => 'view', $presupuestosproveedore['Avisosrepuesto']['id'])); ?></td>    
                <td><?php echo $this->Html->link($presupuestosproveedore['Avisostallere']['id'], array('controller' => 'avisostalleres', 'action' => 'view', $presupuestosproveedore['Avisostallere']['id'])); ?></td>   
                <td><?php echo $this->Html->link($presupuestosproveedore['Ordene']['id'], array('controller' => 'ordenes', 'action' => 'view', $presupuestosproveedore['Ordene']['id'])); ?></td>
                <td><?php echo $presupuestosproveedore['Presupuestosproveedore']['fechaplazo']; ?>&nbsp;</td>
                <td><?php echo $presupuestosproveedore['Presupuestosproveedore']['observaciones']; ?>&nbsp;</td>
                <td><?php echo $presupuestosproveedore['Presupuestosproveedore']['confirmado']; ?>&nbsp;</td>
                <td><?php echo $this->Html->link(__($presupuestosproveedore['Presupuestosproveedore']['presupuestoescaneado'], true), '/files/presupuestosproveedore/' . $presupuestosproveedore['Presupuestosproveedore']['presupuestoescaneado']); ?></td>
                <td class="actions">
                    <?php echo $this->Html->link(__('Ver', true), array('action' => 'view', $presupuestosproveedore['Presupuestosproveedore']['id'])); ?>
                    <?php echo $this->Html->link(__('Pdf', true), array('action' => 'pdf', $presupuestosproveedore['Presupuestosproveedore']['id'])); ?>
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