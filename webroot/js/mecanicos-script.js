$(function() {
    $( ".autocomplete" ).autocomplete({
        source: "/daferapp/mecanicos/auto_complete",
        minLength: 3,
        select: function( event, ui ) {
            var articulo_id = ui.item.id;
            $(this).next(".mecanico_id").val(mecanico_id);
            $(this).nextAll('.mecanico_id').remove();
            
        }
    });
    
    $('.add_articulo_img').click(function(){
        var html = '<div><img src="/daferapp/img/delete.png" class="delete_articulo_img" alt=""><input type="text" class="autocomplete" value="Inserte el nombre del mecánico"/><input type="hidden" name="data[Mecanico][Mecanico][]" class="mecanico_id" value=""/></div>';
        var script = '<script type="text/javascript">$(".delete_articulo_img").click(function(){$(this).parent().remove();});$( ".autocomplete" ).autocomplete({\
        source: "/daferapp/mecanicos/auto_complete",\
        minLength: 3,\
        select: function( event, ui ) {\
            var articulo_id = ui.item.id;\
            $(this).next(".mecanico_id").val(mecanico_id);\
            $(this).remove();\
            />\');\
        }\
    });\n\</script>';
        $('#add_mecanicos_partestallere').append(html+script);
    });
    
    $(".delete_articulo_img").live("click", function(){
        $(this).parent().remove();
    });

});