<fieldset>
    <?php echo $this->Form->create('Ordene', array('action' => 'imputar_albaranproveedor')); ?>
    <legend><?php __('IMPUTACIÓN A LA ORDEN ' . $ordene['Ordene']['numero']); ?></legend>
    <h2><?php __('Albaran de Proveedor ' . ' ' . $albaranesproveedore['Albaranesproveedore']['numero']); ?></h2>
    <dl>
        <?php
        $i = 0;
        $class = ' class="altrow"';
        ?>
        <dt<?php if ($i % 2 == 0) echo $class; ?>><?php __('Id'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class; ?>>
            <?php echo $this->Html->link($albaranesproveedore['Albaranesproveedore']['numero'], array('controller' => 'albaranesproveedores', 'action' => 'view', $albaranesproveedore['Albaranesproveedore']['id'])); ?>
            &nbsp;
        </dd>
    </dl>
    <?php echo $this->Form->input('id', array('value' => $ordene['Ordene']['id'])) ?>
    <div class="related">
        <h3>Articulos a Imputar</h3>
        <?php if (!empty($albaranesproveedore['ArticulosAlbaranesproveedore'])): ?>
            <table cellpadding = "0" cellspacing = "0">
                <tr>
                    <th><?php __('Ref'); ?></th>
                    <th><?php __('Nombre'); ?></th>
                    <th><?php __('Tarea de la Orden'); ?></th>
                    <th><?php __('Cantidad'); ?></th>
                    <th><?php __('Precio Proveedor €'); ?></th>
                    <th><?php __('Descuento %'); ?></th>
                    <th><?php __('Neto €'); ?></th>
                    <th><?php __('Total €'); ?></th>
                    <th class="actions"><?php __('Validar'); ?></th>
                </tr>
                <?php
                if (!empty($albaranesproveedore['ArticulosAlbaranesproveedore'])) {
                    $l = 0;
                    foreach ($albaranesproveedore['ArticulosAlbaranesproveedore'] as $articulo_albaranesproveedore):
                        $class = null;
                        if ($l++ % 2 == 0) {
                            $class = ' class="altrow"';
                        }
                        ?>
                        <tr<?php echo $class; ?>>
                            <td><?php echo $articulo_albaranesproveedore['Articulo']['ref']; ?></td>
                            <td><?php echo $articulo_albaranesproveedore['Articulo']['nombre']; ?></td>
                            <td><?php echo $articulo_albaranesproveedore['Tarea']['descripcion']; ?></td>
                            <td><?php echo $articulo_albaranesproveedore['cantidad']; ?></td>
                            <td><?php echo $articulo_albaranesproveedore['precio_proveedor']; ?></td>
                            <td><?php echo $articulo_albaranesproveedore['descuento']; ?></td>
                            <td><?php echo $articulo_albaranesproveedore['neto']; ?></td>
                            <td><?php echo $articulo_albaranesproveedore['total'] ?></td>
                            <td class="actions">
                               <?php echo $this->Form->input('ArticulosAlbaranesproveedore.' . $l . '.id', array('label' => '', 'type' => 'checkbox', 'checked' => true, 'value' => $articulo_albaranesproveedore['id'])) ?>
                            </td>
                        </tr>
                        <?php
                    endforeach;
                }
                ?>
            </table>
        <?php endif; ?>
    </div>
</div>
<?php echo $this->Form->end(__('Imputar', true)); ?>
</fieldset>