<div class="ordenes">
    <h2>
        <?php __('Ordenes'); ?>
        <?php echo $this->Html->link(__('Listar Ordenes', true), array('controller' => 'ordenes', 'action' => 'index'), array('class' => 'button_link')); ?>
    </h2>
    <?php echo $this->Form->create('Ordene', array('type' => 'get', 'action' => 'index')); ?>
    <?php echo $this->Form->input('buscar', array('type' => 'text')); ?>
    <?php echo $this->Form->end(__('Buscar', true)); ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?php echo $this->Paginator->sort('Nº','numero'); ?></th>
            <th style="width: 6.5em;"><?php echo $this->Paginator->sort('Fecha'); ?></th>
            <th><?php echo $this->Paginator->sort('Nº Aviso de taller', 'avisostallere_id'); ?></th>
            <th><?php echo $this->Paginator->sort('Cliente'); ?></th>
            <th><?php echo $this->Paginator->sort('Centros de Trabajo'); ?></th>
            <th><?php echo $this->Paginator->sort('Máquina'); ?></th>
            <th style="width: 25%"><?php echo $this->Paginator->sort('Descripción'); ?></th>
            <th><?php echo $this->Paginator->sort('Estado'); ?></th>
            <th><?php echo $this->Paginator->sort('Urgente'); ?></th>
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
                <td><a href="#" class="selecionado" id="<?php echo $ordene['Ordene']['id']; ?>"><?php echo $ordene['Ordene']['numero']; ?></a></td>
            <script type="text/javascript">
                $('.selecionado').click(function(){
                    if(window.opener){
                        window.opener.$('#AlbaranesclientesreparacioneOrdeneId').val($(this).attr('id'));
                        window.opener.$('#OrdeneNumero').val($(this).html());
                        window.close();
                    }
                });
        </script>
                <td><?php echo $this->Time->format('d-m-Y',$ordene['Ordene']['fecha']); ?></td>
                <td><?php echo $this->Html->link($ordene['Avisostallere']['numero'], array('controller' => 'avisostalleres', 'action' => 'view', $ordene['Avisostallere']['id'])); ?></td>
                <td><?php echo !empty($ordene['Avisostallere']['Cliente']['nombre'])? $this->Html->link($ordene['Avisostallere']['Cliente']['nombre'], array('controller' => 'clientes', 'action' => 'view', $ordene['Avisostallere']['Cliente']['id'])) : ''; ?></td>
                <td><?php echo !empty($ordene['Avisostallere']['Centrostrabajo'])? $this->Html->link($ordene['Avisostallere']['Centrostrabajo']['centrotrabajo'], array('controller' => 'centrostrabajos', 'action' => 'view', $ordene['Avisostallere']['Centrostrabajo']['id'])) : ''; ?></td>
                <td><?php echo !empty($ordene['Avisostallere']['Maquina']['nombre'])? $this->Html->link($ordene['Avisostallere']['Maquina']['nombre'], array('controller' => 'maquinas', 'action' => 'view', $ordene['Avisostallere']['Maquina']['id'])) : ''; ?></td>
                <td><?php echo $ordene['Ordene']['descripcion']; ?></td>
                <td><?php echo $this->Html->link($ordene['Estadosordene']['estado'], array('controller' => 'avisostalleres', 'action' => 'view', $ordene['Avisostallere']['id'])); ?></td>
                <td><?php echo!empty($ordene['Ordene']['urgente']) ? 'Sí' : 'No' ?></td>
                <td><?php echo $ordene['Ordene']['fecha_prevista_reparacion']; ?></td>
                <td class="actions">
                    <?php echo $this->Html->link(__('Ver', true), array('action' => 'view', $ordene['Ordene']['id'])); ?>
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