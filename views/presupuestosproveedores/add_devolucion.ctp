<div class="presupuestosproveedores">
    <?php echo $this->Form->create('Presupuestosproveedore', array('type' => 'file')); ?>
    <fieldset>
        <legend><?php __('Añadir Presupuesto de Devolución'); ?></legend>
        <?php
        echo $this->Autocomplete->replace_select('Proveedore','Proveedor',true);
        echo $this->Form->input('almacene_id', array('label' => 'Almacén', 'empty' => '--- Seleccione un almacén ---'));
        echo $this->Form->input('fechaplazo', array('label' => 'Fecha', 'dateFormat' => 'DMY'));
        echo $this->Form->input('observaciones', array('label' => 'Observaciones'));
        echo $this->Form->input('confirmado', array('Confirmado'));
        echo $this->Form->input('Albaranesproveedore.albaranesproveedore_id', array('type'=> 'hidden','value'=>$albaranesproveedore_id));
        echo $this->Form->input('file', array('type' => 'file', 'label' => 'Presupuesto escaneado'));
        ?>
    </fieldset>
    <?php echo $this->Form->end(__('Añadir', true)); ?>
</div>
<div class="actions">
    <h3><?php __('Acciones'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('Listar Presupuestos de proveedores', true), array('action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('Listar Proveedores', true), array('controller' => 'proveedores', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('Nuevo Proveedor', true), array('controller' => 'proveedores', 'action' => 'add')); ?> </li>
        <li><a href="#?">Buscar</a></li>
    </ul>
</div>