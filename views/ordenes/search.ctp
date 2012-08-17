<?php
/*
  echo $this->element('sql_dump');
  debug($ordenes);
 * 
 */
?>
<div class="ordenes">
    <h2>
        <?php __('Ordenes PRUEBA DE BUSCADOR'); ?>
    </h2>
    <div id="search_form">
        <?php echo $this->Form->create('Ordene', array('type' => 'get')) ?>
        <table class="view">
            <tr>
                <td><?php echo $this->Form->input('Search.numero') ?></td>
                <td><?php echo $this->Form->input('Search.cliente_id', array('empty' => 'Cliente...', 'class' => 'chzn-select-not-required')) ?></td>
                <td><?php echo $this->Form->input('Search.articulo_id', array('label' => 'Articulo', 'type' => 'text', 'class' => 'articulos_select', 'style' => 'width: 600px;')) ?></td>
            </tr>
        </table>
        <?php echo $this->Form->end('Buscar') ?>
    </div>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?php echo $this->Paginator->sort('Nº', 'numero'); ?></th>
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
            <td><?php echo $this->Time->format('d-m-Y', $ordene['Ordene']['fecha']); ?></td>
            <td><?php echo $this->Html->link($ordene['Avisostallere']['numero'], array('controller' => 'avisostalleres', 'action' => 'view', $ordene['Avisostallere']['id'])); ?></td>
            <td><?php echo!empty($ordene['Avisostallere']['Cliente']['nombre']) ? $this->Html->link($ordene['Avisostallere']['Cliente']['nombre'], array('controller' => 'clientes', 'action' => 'view', $ordene['Avisostallere']['Cliente']['id'])) : ''; ?></td>
            <td><?php echo!empty($ordene['Avisostallere']['Centrostrabajo']) ? $this->Html->link($ordene['Avisostallere']['Centrostrabajo']['centrotrabajo'], array('controller' => 'centrostrabajos', 'action' => 'view', $ordene['Avisostallere']['Centrostrabajo']['id'])) : ''; ?></td>
            <td><?php echo!empty($ordene['Avisostallere']['Maquina']['nombre']) ? $this->Html->link($ordene['Avisostallere']['Maquina']['nombre'], array('controller' => 'maquinas', 'action' => 'view', $ordene['Avisostallere']['Maquina']['id'])) : ''; ?></td>
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
    <?php
    array_shift($this->params['url']);
    array_shift($this->params['url']);
    if (!empty($this->params['url'])) {
        $this->Paginator->options(array('url' => $this->params['url']));
    }
    ?>
    <p>
        <?php
        echo $this->Paginator->counter(array(
            'format' => __('Página %page% de %pages%, mostrando %current% filas de %count% total, starting on record %start%, finalizando en %end%', true)
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

<script>
    
    
    function articuloFormatResult(articulo) {
        var markup = articulo.ref +" --- "+ articulo.nombre;
        return markup;
    }

    function articuloFormatSelection(articulo) {
        console.log(articulo);
        return articulo.ref +" --- "+ articulo.nombre;
    }
    
    $(document).ready(function() {
        $(".articulos_select").select2({
            placeholder: "Selecionar un Artículo...",
            allowClear: true,
            minimumInputLength: 3,
            ajax: { // instead of writing the function to execute the request we use Select2's convenient helper
                url: "/daferapp/articulos/json_basico",
                dataType: 'json',
                data: function (term) {
                    return {
                        q: term // search term
                    };
                },
                results: function (data) { 
                    return {results: data.articulos};
                }
            },
            formatResult: articuloFormatResult, // omitted for brevity, see the source of this page
            formatSelection: articuloFormatSelection  // omitted for brevity, see the source of this page
        });
    });
</script>