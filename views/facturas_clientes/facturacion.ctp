<div class="facturasClientes">
    <h2><?php __('Filtro de Facturación'); ?></h2>
    <?php echo $this->Form->create('FacturasCliente'); ?>
    <fieldset>
        <legend><?php __('Clientes'); ?></legend>
        <p style="margin-bottom: 30px">Todos los clientes <?php echo $this->Form->checkbox('Filtro.todos', array('hiddenField' => false)); ?></p>
        <div id="clientes-seleccionar">
            <a href="#" class="linkbutton" id="add_cliente_to_list">Añadir Cliente al Filtro +</a>
            <table id="cliente_list">
                <tr>
                    <th>Cliente</th>
                    <th>Borrar</th>
                </tr>
            </table>
        </div>
    </fieldset>
    <fieldset>
        <legend><?php __('Intervalo de  Facturación'); ?></legend>
        <label>Fecha de Inicio</label>
        <?php echo $this->Form->day('Filtro.fecha_inicio', null, array('empty' => false)); ?> 
        <?php echo $this->Form->month('Filtro.fecha_inicio', null, array('empty' => false)); ?> 
        <?php echo $this->Form->year('Filtro.fecha_inicio', 1994, date('Y'), null, array('empty' => false)); ?> 
        <label>Fecha de Fin</label>
        <?php echo $this->Form->day('Filtro.fecha_fin', null, array('empty' => false)); ?> 
        <?php echo $this->Form->month('Filtro.fecha_fin', null, array('empty' => false)); ?> 
        <?php echo $this->Form->year('Filtro.fecha_fin', 1994, date('Y'), null, array('empty' => false)); ?> 
    </fieldset>
    <?php echo $this->Form->end(__('Albaranes Posibles de Facturar', true)); ?>
    <div id="add-cliente-popup"  title="Añadir Cliente al Filtro">
        <?php echo $this->Autocomplete->replace_select('Cliente', 'Cliente', true, null); ?>
    </div>
</div>
<script type="text/javascript">
    $(function(){
        $( "#dialog:ui-dialog" ).dialog( "destroy" );
        $( "#add-cliente-popup" ).dialog({
            autoOpen: false,
            width: '400',
            height: 'auto',
            buttons: {
                Ok: function() {
                    $(this).dialog( "close" );
                    html = '<tr><td>'+$('#autocomplete-Cliente').val()+'<input type="hidden" name="data[Filtro][Cliente][]" value="'+$('#cliente_id').val()+'" /></td><td><a href="#" class="borrar-cliente-from-list">Borrar</a></td></tr>'
                    $('#cliente_list').append(html);
                }
            },
            modal: true
        });
        $('#add_cliente_to_list').click(function(){
            $( "#add-cliente-popup" ).dialog('open');
            $('#autocomplete-Cliente').val('');
            $('#cliente_id').val('');
            return false;
        });
        $('.borrar-cliente-from-list').live('click',function(event){
            $(this).parent().parent().remove();
            return false;
        });
        $('#FiltroTodos').change(function(){
            if($(this).is(':checked')){
                $('#clientes-seleccionar').hide();
            }else{
                $('#clientes-seleccionar').show();
            }
        }); 
    });
</script>