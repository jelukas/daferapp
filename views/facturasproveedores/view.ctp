<div class="facturasproveedores">
    <h2><?php __('Factura de proveedor'); ?></h2>
    <dl>
        <dt><?php __('Id'); ?></dt>
        <dd>
            <?php echo $facturasproveedore['Facturasproveedore']['id']; ?>
            &nbsp;
        </dd>
        <dt><?php __('Fecha de factura'); ?></dt>
        <dd>
            <?php echo $facturasproveedore['Facturasproveedore']['fechafactura']; ?>
            &nbsp;
        </dd>
        <dt><?php __('Base imponible'); ?></dt>
        <dd>
            <?php echo $facturasproveedore['Facturasproveedore']['baseimponible']; ?>
            &nbsp;
        </dd>
        <dt><?php __('Tipo de iva'); ?></dt>
        <dd>
            <?php echo $this->Html->link($facturasproveedore['Tiposiva']['tipoiva'], array('controller' => 'tiposivas', 'action' => 'view', $facturasproveedore['Tiposiva']['id'])); ?>
            &nbsp;
        </dd>
        <dt><?php __('Observaciones'); ?></dt>
        <dd>
            <?php echo $facturasproveedore['Facturasproveedore']['observaciones']; ?>
            &nbsp;
        </dd>
        <dt><?php __('Fecha límite de pago'); ?></dt>
        <dd>
            <?php echo $facturasproveedore['Facturasproveedore']['fechalimitepago']; ?>
            &nbsp;
        </dd>
        <dt><?php __('Fecha de pago'); ?></dt>
        <dd>
            <?php echo $facturasproveedore['Facturasproveedore']['fechapagada']; ?>
            &nbsp;
        </dd>
        <dt><?php __('Factura escaneada'); ?></dt>
        <dd>
            <?php echo $facturasproveedore['Facturasproveedore']['facturaescaneada']; ?>
            &nbsp;
        </dd>
    </dl>
</div>