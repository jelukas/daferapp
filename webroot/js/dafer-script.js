jQuery(document).ready(function() {
    /*Autocompletes lives*/
    $(".autocomplete_input").live("click", function(){
        $(this).val("");
    });
    
    $(".delete_articulo_img").live("click", function(){
        $(this).parent().parent().remove();
    });
    
    /*Primer Autocomplete: Avisosrepueso*/
    if($( "#autocomplete-avisosrepuesto" ).length != 0){
        var auto1 = 0;
        if($('#auto1').val() != null ){
            auto1 = parseInt($('#auto1').val()) + 1;
        }
        var autocomplete1 = $( "#autocomplete-avisosrepuesto" ).autocomplete({
            source: "/daferapp/articulos/auto_complete",
            minLength: 5,
            select: function( event, ui ) {
                var articulo_id = ui.item.id;
                $(this).nextAll('.cantidad').remove();
                $("#articulos_autotable").append('<tr><td>Ref.' + ui.item.ref + ' ····· ' + ui.item.label +'<input type="hidden" name="data[ArticulosAvisosrepuesto]['+auto1+'][articulo_id]" class="articulo_id" value="'+articulo_id+'"></td><td><input type="text" class="cantidad" style="width: 50px" name="data[ArticulosAvisosrepuesto]['+auto1+'][cantidad]" value="1"/></td><td><img src="/daferapp/img/delete.png" class="delete_articulo_img" alt=""></td></tr>');
                auto1 = auto1 +1;
            }

        });
        autocomplete1.data( "autocomplete" )._renderItem = function( ul, item ) {
            return $( "<li></li>" )
            .data( "item.autocomplete", item )
            .append( "<a>Ref." + item.ref + " ····· " + item.label + "</a>" )
            .appendTo( ul );
        };

    }
    /*Segundo Autocomplete: Tareas*/
    if($( "#autocomplete-tarea" ).length != 0){
        var auto2 = 0;
        if($('#auto2').val() != null ){
            auto2 = parseInt($('#auto2').val()) + 1;
        }
        var autocomplete2 = $( "#autocomplete-tarea" ).autocomplete({
            source: "/daferapp/articulos/auto_complete",
            minLength: 5,
            select: function( event, ui ) {
                var articulo_id = ui.item.id;
                $(this).nextAll('.cantidad').remove();
                $("#articulos_autotable").append('<tr><td>Ref.' + ui.item.ref + ' ····· ' + ui.item.label +'<input type="hidden" name="data[ArticulosTarea]['+auto2+'][articulo_id]" class="articulo_id" value="'+articulo_id+'"></td><td><input type="text" class="cantidad" style="width: 50px" name="data[ArticulosTarea]['+auto2+'][cantidad]" value="1"/></td><td><img src="/daferapp/img/delete.png" class="delete_articulo_img" alt=""></td></tr>');
                auto2 = auto2 + 1;
            }
        });
        autocomplete2.data( "autocomplete" )._renderItem = function( ul, item ) {
            return $( "<li></li>" )
            .data( "item.autocomplete", item )
            .append( "<a>Ref." + item.ref + " ····· " + item.label + "</a>" )
            .appendTo( ul );
        }
    }
    /*Tercer Autocomplete: En Presupuestos de Proveedores DIRECTO*/
    if($( "#autocomplete-presupuestoproveedor-directo" ).length != 0){
        var auto3 = 0;
        if($('#auto3').val() != null ){
            auto3 = parseInt($('#auto3').val()) + 1;
        }
        var autocomplete3 = $( "#autocomplete-presupuestoproveedor-directo" ).autocomplete({
            source: "/daferapp/articulos/auto_complete",
            minLength: 5,
            select: function( event, ui ) {
                var articulo_id = ui.item.id;
                var articulo_ref = ui.item.ref;
                var articulo_nombre = ui.item.label;
                var html ='<tr class="altrow"> \
                                <td>'+articulo_ref+'<input type="hidden" name="data[ArticulosPresupuestosproveedore]['+auto3+'][articulo_id]" value="'+articulo_id+'" id="ArticulosPresupuestosproveedore'+auto3+'ArticuloId"/>   </td> \
                                <td>'+articulo_nombre+'</td> \
                                <td><div class="input text"><input name="data[ArticulosPresupuestosproveedore]['+auto3+'][cantidad]" type="text" value="0" class="input_cantidad" maxlength="11" id="ArticulosPresupuestosproveedore'+auto3+'Cantidad"></div></td> \
                                <td><div class="input text"><input name="data[ArticulosPresupuestosproveedore]['+auto3+'][precio_proveedor]" type="text" value="0" class="input_precio_proveedor" id="ArticulosPresupuestosproveedore'+auto3+'PrecioProveedor"></div></td> \
                                <td><div class="input text"><input name="data[ArticulosPresupuestosproveedore]['+auto3+'][descuento]" type="text" value="0" class="input_descuento" id="ArticulosPresupuestosproveedore'+auto3+'Descuento"></div></td> \
                                <td><div class="input text"><input name="data[ArticulosPresupuestosproveedore]['+auto3+'][neto]" type="text" value="0" class="input_neto" id="ArticulosPresupuestosproveedore'+auto3+'Neto"></div></td> \
                                <td><div class="input text"><input name="data[ArticulosPresupuestosproveedore]['+auto3+'][total]" type="text" value="0" class="input_total" id="ArticulosPresupuestosproveedore'+auto3+'Total"></div></td> \
                                <td><div class="input checkbox"><input type="hidden" name="data[ArticulosPresupuestosproveedore]['+auto3+'][marcado]" id="ArticulosPresupuestosproveedore'+auto3+'Marcado_" value="0"><input type="checkbox" name="data[ArticulosPresupuestosproveedore]['+auto3+'][marcado]" value="1" id="ArticulosPresupuestosproveedore'+auto3+'Marcado"></div></td> \
                                <td class="actions"><img src="/daferapp/img/delete.png" class="delete_articulo_img" alt=""/>\
                                </td> \
                            </tr>';
                $('#articulos-presupuestoproveedor-directo').append(html);
                auto3 = auto3 +1;
            }
        });
        autocomplete3.data( "autocomplete" )._renderItem = function( ul, item ) {
            return $( "<li></li>" )
            .data( "item.autocomplete", item )
            .append( "<a>Ref." + item.ref + " ····· " + item.label + "</a>" )
            .appendTo( ul );
        };

    }
    
    /*Autcocomplete de Proveedores*/
    if($( "#autocomplete-proveedores" ).length != 0){
        var autocomplete_proveedor = $( "#autocomplete-proveedores" ).autocomplete({
            source: "/daferapp/proveedores/autocomplete",
            minLength: 3,
            select: function( event, ui ) {
                $("#PresupuestosproveedoreProveedoreId").val(ui.item.id);
            }

        });
        autocomplete_proveedor.data( "autocomplete" )._renderItem = function( ul, item ) {
            return $( "<li></li>" )
            .data( "item.autocomplete", item )
            .append( "<a>Id." + item.id + " ····· " + item.label + "</a>" )
            .appendTo( ul );
        };
    }
    /*Autcocomplete basico de Articulos de Tareas en sustitucion del select de articulos*/
    if($( "#autocomplete-articulotarea" ).length != 0){
        var autocomplete_arttarea =$( "#autocomplete-articulotarea" ).autocomplete({
            source: "/daferapp/articulos/auto_complete",
            minLength: 4,
            select: function( event, ui ) {
                $("#ArticulosTareaArticuloId").val(ui.item.id);
            }
        });
        autocomplete_arttarea.data( "autocomplete" )._renderItem = function( ul, item ) {
            return $( "<li></li>" )
            .data( "item.autocomplete", item )
            .append( "<a>Ref. " + item.ref + " ····· " + item.label + "</a>" )
            .appendTo( ul );
        };
    }
    
    /*Autcocomplete basico de Articulos de Tareas en sustitucion del select de articulos*/
    if($( "#autocomplete-articuloavisosrepuestos" ).length != 0){
        var autocomplete_artavrepu =$( "#autocomplete-articuloavisosrepuestos" ).autocomplete({
            source: "/daferapp/articulos/auto_complete",
            minLength: 4,
            select: function( event, ui ) {
                $("#ArticulosAvisosrepuestoArticuloId").val(ui.item.id);
            }
        });
        autocomplete_artavrepu.data( "autocomplete" )._renderItem = function( ul, item ) {
            return $( "<li></li>" )
            .data( "item.autocomplete", item )
            .append( "<a>Ref. " + item.ref + " ····· " + item.label + "</a>" )
            .appendTo( ul );
        };
    }   
      
   
    /*Popups DHTML*/
    $( "#dialog:ui-dialog" ).dialog( "destroy" );
    $( "#dialog-modal" ).dialog({
        autoOpen: false,
        close: function(event, ui) { 
            $.post(location.href, function(data) {
                $('#content').html(data);
            });
        /* window.location.reload(); */
        },
        width: '60%',
        height: 'auto',
        modal: true
    });
    $(".popup").live("click", function(event){
        $( "#dialog-modal" ).load($(this).attr('href'),function(){
            $( "#dialog-modal" ).dialog('open');
        });
        return false;
    });
    
    /* Animacion cuando se carga contenido por AJAX */
    $("#loading_background").hide();
    $("#loading_background").ajaxStart(function(){
        $(this).show();
    });
    $("#loading_background").ajaxStop(function(){
        $(this).hide();
        $(".chzn-select").chosen();
        $(".chzn-select-not-required").chosen({
            allow_single_deselect: true
        });
        $(".chzn-select-required").chosen();
    });
    
    /*Selects con autocomplete NO AJAX*/
    $(".chzn-select").chosen();
    $(".chzn-select-not-required").chosen({
        allow_single_deselect: true
    });
    $(".chzn-select-required").chosen();
});