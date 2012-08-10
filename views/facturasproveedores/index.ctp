<div class="facturasproveedores">
    <h2>
        <?php __('Facturas de proveedores'); ?>
        <?php echo $this->Html->link(__('Listar Facturas de Proveedores', true), array('controller' => 'facturasproveedores', 'action' => 'index'), array('class' => 'button_link')); ?>
    </h2>
    <?php echo $this->Form->create('Facturasproveedore', array('type' => 'get', 'action' => 'index')); ?>
    <?php echo $this->Form->input('buscar', array('type' => 'text')); ?>
    <?php echo $this->Form->end(__('Buscar', true)); ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?php echo $this->Paginator->sort('numero'); ?></th>
            <th><?php echo $this->Paginator->sort('Fecha','fechafactura'); ?></th>
            <th><?php echo $this->Paginator->sort('Proveedor','proveedore_id'); ?></th>
            <th><?php echo $this->Paginator->sort('Base imponible','baseimponible'); ?></th>
            <th>Impuestos</th>
            <th>Total</th>
            <th><?php echo $this->Paginator->sort('Observaciones'); ?></th>
            <th><?php echo $this->Paginator->sort('Fecha limite de pago','fechalimitepago'); ?></th>
            <th><?php echo $this->Paginator->sort('Fecha de pago','fechapagada'); ?></th>
            <th><?php echo $this->Paginator->sort('Factura escaneada'); ?></th>
            <th><?php echo $this->Paginator->sort('Estado','estadosfacturasproveedore_id'); ?></th>
            <th class="actions"><?php __('Acciones'); ?></th>
        </tr>
        <?php
        $i = 0;
        foreach ($facturasproveedores as $facturasproveedore):
            $class = null;
            if ($i++ % 2 == 0) {
                $class = ' class="altrow"';
            }
            ?>
            <tr<?php echo $class; ?>>
                <td><?php echo $facturasproveedore['Facturasproveedore']['numero']; ?>&nbsp;</td>
                <td><?php echo $this->Time->format('d-m-Y',$facturasproveedore['Facturasproveedore']['fechafactura']); ?>&nbsp;</td>
                <td><?php echo $facturasproveedore['Proveedore']['nombre']; ?>&nbsp;</td>
                <td><?php echo redondear_dos_decimal($facturasproveedore['Facturasproveedore']['baseimponible']); ?>&nbsp;</td>
                <td><?php echo redondear_dos_decimal($facturasproveedore['Facturasproveedore']['baseimponible'] * ($facturasproveedore['Tiposiva']['porcentaje_aplicable']/100)); ?>&nbsp;</td>
                <td><?php echo redondear_dos_decimal($facturasproveedore['Facturasproveedore']['baseimponible'])+redondear_dos_decimal($facturasproveedore['Facturasproveedore']['baseimponible'] * ($facturasproveedore['Tiposiva']['porcentaje_aplicable']/100)); ?>&nbsp;</td>
                <td><?php echo $facturasproveedore['Facturasproveedore']['observaciones']; ?>&nbsp;</td>
                <td><?php echo $this->Time->format('d-m-Y',$facturasproveedore['Facturasproveedore']['fechalimitepago']); ?>&nbsp;</td>
                <td><?php echo $this->Time->format('d-m-Y',$facturasproveedore['Facturasproveedore']['fechapagada']); ?>&nbsp;</td>
                <td><?php echo $this->Html->link(__($facturasproveedore['Facturasproveedore']['facturaescaneada'], true), '/files/facturasproveedore/' . $facturasproveedore['Facturasproveedore']['facturaescaneada']); ?></td>
                <td><?php echo $facturasproveedore['Estadosfacturasproveedore']['estado']; ?>&nbsp;</td>
                <td class="actions">
                    <?php echo $this->Html->link(__('Ver', true), array('action' => 'view', $facturasproveedore['Facturasproveedore']['id'])); ?>
                    <?php echo $this->Html->link(__('Eliminar', true), array('action' => 'delete', $facturasproveedore['Facturasproveedore']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $facturasproveedore['Facturasproveedore']['id'])); ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <p>
        <?php
        echo $this->Paginator->counter(array(
            'format' => __('Página %page% de %pages%, mostrando %current% filas de %count% total, empezando en la fila %start%, finalizando en %end%', true)
        ));
        ?>	</p>

    <div class="paging">
        <?php echo $this->Paginator->prev('<< ' . __('Anterior', true), array(), null, array('class' => 'disabled')); ?>
        | 	<?php echo $this->Paginator->numbers(); ?>
        |
        <?php echo $this->Paginator->next(__('Siguiente', true) . ' >>', array(), null, array('class' => 'disabled')); ?>
    </div>
</div>