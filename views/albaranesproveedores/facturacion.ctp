<div>
    <h2><?php __('Filtro de Facturación'); ?></h2>
    <?php echo $this->Form->create('Albaranesproveedore'); ?>
    <fieldset>
        <legend><?php __('Proveedores'); ?></legend>
        <p style="margin-bottom: 30px">Todos los Proveedores <?php echo $this->Form->checkbox('Filtro.todos', array('hiddenField' => false)); ?></p>
        <div id="proveedores-seleccionar">
            <a href="#" class="linkbutton" id="add_proveedore_to_list">Añadir Proveedor al Filtro +</a>
            <table id="proveedore_list">
                <tr>
                    <th>Proveedor</th>
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
    <div id="add-proveedore-popup"  title="Añadir Proveedor al Filtro">
        <?php echo $this->Autocomplete->replace_select('Proveedore', 'Proveedor', true, null); ?>
    </div>
</div>
<script type="text/javascript">
    $(function(){
        $( "#dialog:ui-dialog" ).dialog( "destroy" );
        $( "#add-proveedore-popup" ).dialog({
            autoOpen: false,
            width: '400',
            height: 'auto',
            buttons: {
                Ok: function() {
                    $(this).dialog( "close" );
                    html = '<tr><td>'+$('#autocomplete-Proveedore').val()+'<input type="hidden" name="data[Filtro][Proveedore][]" value="'+$('#proveedore_id').val()+'" /></td><td><a href="#" class="borrar-proveedore-from-list">Borrar</a></td></tr>'
                    $('#proveedore_list').append(html);
                }
            },
            modal: true
        });
        $('#add_proveedore_to_list').click(function(){
            $( "#add-proveedore-popup" ).dialog('open');
            $('#autocomplete-Proveedore').val('');
            $('#proveedore_id').val('');
            return false;
        });
        $('.borrar-proveedore-from-list').live('click',function(event){
            $(this).parent().parent().remove();
            return false;
        });
        $('#FiltroTodos').change(function(){
            if($(this).is(':checked')){
                $('#proveedores-seleccionar').hide();
            }else{
                $('#proveedores-seleccionar').show();
            }
        }); 
});
</script>