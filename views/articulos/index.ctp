<div class="articulos">
    <h2>
        <?php __('Maestro de Artículos'); ?>
        <?php echo $this->Html->link(__('Nuevo Artículo', true), array('action' => 'add'), array('class' => 'button_link')); ?>
        <?php echo $this->Html->link(__('Listar Artículos', true), array('action' => 'index'), array('class' => 'button_link')); ?>
        <?php echo $this->Html->link(__('Regularizar Almacén', true), '#?', array('class' => 'button_link', 'id' => 'regularizar')); ?>
    </h2>
    <?php
    echo $form->create('', array('action' => 'search'));
    echo $form->input('Buscar', array('type' => 'text'));
    echo $form->end('Buscar');
    ?>
    <?php echo $this->Form->create('Presupuestosproveedore', array('action' => 'add')) ?>
    <?php echo $this->Form->submit('Nuevo Presupuesto Directo', array('div' => false, 'style' => 'font-size: 16px;')); ?>
    <table cellpadding="0" cellspacing="0" class="view">
        <tr>
            <th><?php echo $paginator->sort('Referencia', 'ref'); ?></th>
            <th><?php echo $paginator->sort('Descripción', 'nombre'); ?></th>
            <th><?php echo $paginator->sort('Código barras', 'codigobarras'); ?></th>
            <th><?php echo $paginator->sort('Precio Coste (* Ultimo)', 'ultimopreciocompra'); ?></th>
            <th><?php echo $paginator->sort('Valoración', 'valoracion'); ?></th>
            <th><?php echo $paginator->sort('PVP', 'precio_sin_iva'); ?></th>
            <th><?php echo $paginator->sort('Almacén', 'almacene_id'); ?></th>
            <th><?php echo $paginator->sort('Localización', 'localizacion'); ?></th>
            <th><?php echo $paginator->sort('Existencias', 'existencias'); ?></th>
            <th><?php echo $paginator->sort('Stock Min.', 'stock_minimo'); ?></th>
            <th><?php echo $paginator->sort('Stock Max.', 'stock_maximo'); ?></th>
            <th><?php echo __('A Pedir'); ?></th>
            <th><?php echo __('Validar'); ?></th>
            <th><?php echo $paginator->sort('Familia', 'familia_id'); ?></th>
            <th class="actions"><?php __('Acciones'); ?></th>
        </tr>
        <?php
        $i = 0;
        foreach ($articulos as $articulo):
            $class = null;
            if ($i++ % 2 == 0) {
                $class = ' class="altrow"';
            }
            ?>
            <tr<?php echo $class; ?>>
                <td><?php echo $articulo['Articulo']['ref']; ?>&nbsp;</td>
                <td><?php echo $articulo['Articulo']['nombre']; ?>&nbsp;</td>
                <td><?php echo $articulo['Articulo']['codigobarras']; ?>&nbsp;</td>
                <td><?php echo $articulo['Articulo']['ultimopreciocompra']; ?>&nbsp;</td>
                <td><?php echo $articulo['Articulo']['valoracion']; ?>&nbsp;</td>
                <td><?php echo $articulo['Articulo']['precio_sin_iva']; ?>&nbsp;</td>
                <td><?php echo $articulo['Almacene']['nombre']; ?>&nbsp;</td>
                <td><?php echo $articulo['Articulo']['localizacion']; ?>&nbsp;</td>
                <td id="<?php echo $articulo['Articulo']['id']; ?>" class="existencias-field"><?php echo $articulo['Articulo']['existencias']; ?>&nbsp;</td>
                <td><?php echo $articulo['Articulo']['stock_minimo']; ?>&nbsp;</td>
                <td><?php echo $articulo['Articulo']['stock_maximo']; ?>&nbsp;</td>
                <td><?php echo ($articulo['Articulo']['stock_maximo'] - $articulo['Articulo']['existencias']) < 0 ? 0 : $articulo['Articulo']['stock_maximo'] - $articulo['Articulo']['existencias']; ?>&nbsp;</td>
                <td><?php echo $this->Form->input('validar', array('name' => 'data[articulos_validados][]', 'type' => 'checkbox', 'value' => $articulo['Articulo']['id'], 'hiddenField' => false, 'label' => false)) ?></td>
                <td><?php echo $this->Html->link($articulo['Familia']['nombre'], array('controller' => 'familias', 'action' => 'view', $articulo['Familia']['id'])); ?></td>
                <td class="actions">
                    <?php echo $this->Html->link(__('Ver', true), array('action' => 'view', $articulo['Articulo']['id'])); ?>
                    <?php echo $this->Html->link(__('Eliminar', true), array('action' => 'delete', $articulo['Articulo']['id']), null, sprintf(__('¿Desea borrar el artículo %s?', true), $articulo['Articulo']['id'])); ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <?php echo $this->Form->end(); ?>
    <p>
        <?php
        echo $this->Paginator->counter(array(
            'format' => __('Página %page% de %pages%, mostrando %current% registros de un total de %count%, empezando en registro %start%, finalizando en el registro %end%', true)
        ));
        ?>	</p>

    <div class="paging">
        <?php echo $this->Paginator->prev('<< ' . __('Anterior', true), array(), null, array('class' => 'disabled')); ?>
        | 	<?php echo $this->Paginator->numbers(); ?>
        |
        <?php echo $this->Paginator->next(__('Siguiente', true) . ' >>', array(), null, array('class' => 'disabled')); ?>
    </div>
</div>
<script type="text/javascript">
    $(function(){
        var regularizar_activado = 0;
        $('#regularizar').click(function(){
            var rows = $('.existencias-field');
            if(regularizar_activado == 0){
                rows.each(function(index) {
                    var existencias = $(this).html();
                    if(isNaN(parseInt(existencias))){
                        existencias = 0;
                    }
                    html = '<input type="text" value="'+parseInt(existencias)+'" class="regularizar-input" />';
                    $(this).html(html);
                });
                regularizar_activado = 1;
            }else{
                rows.each(function(index) {
                    $(this).html($(this).children().val());
                });
                regularizar_activado = 0;
            }
            
        });
    
        $('.regularizar-input').live("change", function(){
            var id = $(this).parent().attr('id');
            $.post("/daferapp/articulos/regularizar/"+id, { nueva_existencia: $(this).val()},
            function(data) {
                alert(data);
            });
        });
    });
</script>