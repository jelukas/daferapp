<div class="articulos">
    <h2>
        <?php __('Ficha de Artículo Ref. ' . $articulo['Articulo']['ref']); ?>
        <?php echo $this->Html->link(__('Editar Artículo', true), array('action' => 'edit',$articulo['Articulo']['id']), array('class' => 'button_link')); ?>
        <?php echo $this->Html->link(__('Nuevo Artículo', true), array('action' => 'add'), array('class' => 'button_link')); ?>
        <?php echo $this->Html->link(__('Listar Artículos', true), array('action' => 'index'), array('class' => 'button_link')); ?>
    </h2>
    <table class="view">
        <tr>
            <td><span>Referencia</span></td>
            <td><?php echo $articulo['Articulo']['ref']; ?></td>
            <td><span>Descripción</span></td>
            <td><?php echo $articulo['Articulo']['nombre']; ?></td>
            <td><span>Código de Barras</span></td>
            <td><?php echo $articulo['Articulo']['codigobarras']; ?></td>
        </tr>
        <tr>
            <td colspan="2"><span>Familia</span></td>
            <td><?php echo $this->Html->link($articulo['Familia']['nombre'], array('controller' => 'familias', 'action' => 'view', $articulo['Familia']['id'])); ?></td>
            <td><span>Imágen</span></td>
            <td colspan="2"><?php echo $this->Html->link(__($articulo['Articulo']['articuloescaneado'], true), '/files/articulo/' . $articulo['Articulo']['articuloescaneado']); ?></td>
        </tr>
        <tr>
            <td><span>Observaciones</span></td>
            <td><?php echo $articulo['Articulo']['observaciones']; ?></td>
            <td><span>Proveedor habitual</span></td>
            <td><?php echo $this->Html->link($articulo['Proveedore']['nombre'], array('controller' => 'proveedores', 'action' => 'view', $articulo['Proveedore']['id'])); ?></td>
        </tr>
    </table>
    <hr/>
    <table class="view">
        <tr>
            <th>Almacén</th>
            <th>Existencias</th>
            <th>Localización</th>
            <th>Precio Coste (* Último)</th>
            <th>PVP</th>
            <th>Stock Mínimo</th>
            <th>Stock Máximo</th>
            <th class="actions">Acciones</th>
        </tr>
        <?php foreach ($articulos_misma_ref as $articuloref): ?>
            <tr>
                <td><?php echo $articuloref['Almacene']['nombre'] ?></td>
                <td><?php echo $articuloref['Articulo']['existencias'] ?></td>
                <td><?php echo $articuloref['Articulo']['localizacion'] ?></td>
                <td><?php echo $articuloref['Articulo']['ultimopreciocompra'] ?></td>
                <td><?php echo $articuloref['Articulo']['precio_sin_iva'] ?></td>
                <td><?php echo $articuloref['Articulo']['stock_minimo'] ?></td>
                <td><?php echo $articuloref['Articulo']['stock_maximo'] ?></td>
                <td class="actions"><?php echo $this->Html->link(_('Editar'), array('action' => 'edit', $articuloref['Articulo']['id'])); ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <p style="text-align: center; margin-top: 40px;margin-bottom: 25px;">
        <?php echo $this->Html->link(__('Ref. Intercambiables', true), '#?', array('class' => 'button_link', 'id' => 'show-referencias')); ?>
        <?php echo $this->Html->link(__('Nueva Referencia Intercambiable', true), array('controller' => 'referenciasintercambiables', 'action' => 'add', $articulo['Articulo']['id']), array('class' => 'button_link popup')); ?>
    </p>

    <?php if (!empty($articulo['Referido'])): ?>
        <table id="referenciasintercambiables" style="display: none">
            <tr>
                <th>Ref.</th>
                <th>Descripción</th>
                <th>Existencias</th>
                <th>Precio Coste</th>
                <th>PVP</th>
                <th>Stock Mínimo</th>
                <th>Almacen</th>
                <th>Proveedor Habitual</th>
                <th>Acciones</th>
            </tr>
            <?php foreach ($articulo['Referido'] as $referencia): ?>
                <tr>
                    <td><?php echo $this->Html->link($referencia['Articulo_referido']['ref'], array('action' => 'edit',$referencia['Articulo_referido']['id'])); ?></td>
                    <td><?php echo $referencia['Articulo_referido']['nombre'] ?></td>
                    <td><?php echo $referencia['Articulo_referido']['existencias'] ?></td>
                    <td><?php echo $referencia['Articulo_referido']['ultimopreciocompra'] ?></td>
                    <td><?php echo $referencia['Articulo_referido']['precio_sin_iva'] ?></td>
                    <td><?php echo $referencia['Articulo_referido']['stock_minimo'] ?></td>
                    <td><?php echo $referencia['Articulo_referido']['Almacene']['nombre'] ?></td>
                    <td><?php echo!empty($referencia['Articulo_referido']['Proveedore']['nombre']) ? $referencia['Articulo_referido']['Proveedore']['nombre'] : '' ?></td>
                    <td class="actions"><?php echo $this->Html->link(_('Delete'), array('controller'=>'referenciasintercambiables','action' => 'delete', $referencia['id']), null, sprintf(__('Seguro que quieres borrar la Referencia Intercambiable ?', true))); ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
</div>
<script type="text/javascript">
    $('#show-referencias').click(function(){
        $('#referenciasintercambiables').fadeToggle("slow", "linear");
    });
</script>