<?php
/* echo $this->Form->input('Devolucionesproveedore.albaranesproveedore_id', array(
  'label' => 'Albaranes de proveedor',
  'div' => null,
  'empty' => '--- Seleccione Albaran ---')
  ); */
?>
<div id="AlbaranesproveedoreSelectDiv">
<?php
foreach ($albaranesproveedores as $albaran) 
{
    echo '<h3>Albarán número: ' . $albaran['Albaranesproveedore']['numeroalbaran'] . '</h3>';
?>
        <fieldset id="add_articulo">
            <legend>Artículos</legend>
            <div>  
                <input type="text" id="autocomplete_input" class="autocomplete" value="Inserta el nombre o referencia del artículo"/>
                <input type="hidden" class="id_albaran" value="<?php echo $albaran['Albaranesproveedore']['id']; ?>"/>
            </div>
            <div>
                <table class="articulos_autotable">
                    <thead><tr><td>Articulo</td><td>Cantidad</td><td>Eliminar</td></tr></thead>
                </table>
            </div>
        </fieldset>
<?php   
}
?>
</div>
<script type="text/javascript">
    $( ".autocomplete" ).autocomplete({
        source: "/daferapp/articulos/auto_complete",
        minLength: 5,
        select: function( event, ui ) {
            var articulo_id = ui.item.id;
            //$(this).next(".articulo_id").val(articulo_id);
            $(this).nextAll('.cantidad').remove();
            //$(".articulos_autotable").append('<tr><td>Ref.' + ui.item.ref + ' ····· ' + ui.item.label +'<input type="hidden" name="data[Articulo][Articulo][]" class="articulo_id" value="'+articulo_id+'"></td><td><input type="text" class="cantidad" style="width: 50px" name="data[articulo_cantidad]['+articulo_id+']" value="1"/></td><td><img src="/daferapp/img/delete.png" class="delete_articulo_img" alt=""></td></tr>');
            var papa = $(this).parent().parent();
            var id_albaran =  $(this).next(".id_albaran").val();
            papa.children("div").children(".articulos_autotable").append('<tr><td>Ref.' + ui.item.ref + ' ····· ' + ui.item.label +'</td><td><input type="text" class="cantidad" style="width: 50px" name="data[devolver]['+id_albaran+']['+articulo_id+']" class="articulo_id" value="1"></td><td><img src="/daferapp/img/delete.png" class="delete_articulo_img" alt=""></td></tr>');
        }
    }).data( "autocomplete" )._renderItem = function( ul, item ) {
        return $( "<li></li>" )
        .data( "item.autocomplete", item )
        .append( "<a>Ref." + item.ref + " ····· " + item.label + "</a>" )
        .appendTo( ul );
    };
</script>