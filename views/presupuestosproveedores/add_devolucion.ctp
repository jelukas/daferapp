<div class="presupuestosproveedores">
    <?php echo $this->Form->create('Presupuestosproveedore', array('type' => 'file')); ?>
    <fieldset>
        <legend><?php __('Añadir Presupuesto de Devolución'); ?></legend>     
        <table class="view">
            <tr>
                <td>
                    <?php echo $this->Form->input('numero', array('label' => 'Número', 'value' => $numero)); ?>
                </td>
            </tr>
            <tr>
                <td>
                    <?php echo $this->Autocomplete->replace_select('Proveedore', 'Proveedor', true); ?>
                </td>
                <td colspan="2">
                    <?php echo $this->Form->input('fecha', array('label' => 'Fecha', 'dateFormat' => 'DMY', 'timeFormat' => '24')); ?>
                </td>
                <td>
                    <?php echo $this->Form->input('almacene_id', array('label' => 'Almacén')); ?>
                </td>
            </tr>
            <tr>
                <td colspan="4">
                    <?php echo $this->Form->input('observaciones', array('label' => 'Observaciones')); ?>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <?php echo $this->Form->input('file', array('type' => 'file', 'label' => 'Presupuesto escaneado')); ?>
                </td>
                <td>
                    <?php echo $this->Form->input('estadospresupuestosproveedore_id', array('label' => 'Estado del Presupuesto')); ?>
                </td>
                <td>
                    <?php echo $this->Form->input('fechaplazo', array('label' => 'Plazo de Entrega', 'dateFormat' => 'DMY','empty'=>'--')); ?>
                    <?php echo $this->Form->input('Albaranesproveedore.albaranesproveedore_id', array('type'=> 'hidden','value'=>$albaranesproveedore_id));?>
                </td>
            </tr>
        </table>
    </fieldset>
    <?php echo $this->Form->end(__('Guardar', true)); ?>
</div>