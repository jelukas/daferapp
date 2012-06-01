//Cosas que se hacen al acabar de cargar la pagina
$(document).ready(function(){
    //Para las fechas selecionablees
    $(".fecha_selecionable").datepicker({
        showOn: 'button',
        dateFormat: 'dd-mm-yy',
        buttonImage: 'img/calendar.gif',
        buttonImageOnly: true
    });

    //Desactivar Enter en los input Text
    $('form').keypress(function(e){
        if(e == 13){
            return false;
        }
    });

    $('input').keypress(function(e){
        if(e.which == 13){
            return false;
        }
    });

    //Autocompletado de clientes input
    $(".clienteSuggest").autocomplete({
        minLength: 2,
        source: "suggest/clienteSuggest.php",
        focus: function( event, ui ) {
        $(this).val(ui.item.codigo + " - " + ui.item.nombre);
        return false;
        },
        select: function( event, ui ) {
	        $("#cliente_id").val(ui.item.id);
        	escribirCentros(ui.item.id,0);
	        return false;
        }
        }).data( "autocomplete" )._renderItem = function( ul, item ) {
        return $( "<li></li>" ).data( "item.autocomplete", item ).append( "<a>" + item.codigo + " - " + item.nombre  + "</a>" ).appendTo( ul );
    };


    $(".transportistasSuggest").autocomplete({
        minLength: 2,
        source: "suggest/transportistasSuggest.php",
        focus: function( event, ui ) {
        		$(this).val( ui.item.empresa );
		        return false;
        	},
        select: function( event, ui ) {
		        $("#transportista_id").val(ui.item.id);
        		return false;
        	}
        }).data( "autocomplete" )._renderItem = function( ul, item ) {
        return $( "<li></li>" ).data( "item.autocomplete", item ).append( "<a>" + item.empresa + "</a>" ).appendTo( ul );
    };
   

});

//Funciones
function nuevaLineaDescripcionAviso(){
    var today = new Date();
    var dia = today.getDate();
    if(dia<10){
        dia='0'+dia;
    }
    var mes = today.getMonth()+1;
    if(mes<10){
        mes='0'+mes;
    }
    var hora = today.getHours();
    if(hora<10){
        hora='0'+hora;
    }
    var min = today.getMinutes();
    if(min<10){
        min='0'+min;
    }
    var html='<tr><td><input type="text" name="fecha_lineadesc" class="fecha_lineadesc" disabled="disabled" value="'+dia+'/'+mes+'/'+today.getFullYear()+'"/></td><td><input type="text" name="hora_lineadesc" class="fecha_lineadesc" disabled="disabled" size="4" value="'+hora+':'+min+'"/></td><td colspan="2"><input type="text" name="lineadescripcion" class="lineadescripcion" size="55" value=""/></td></tr>';
    $("table").append(html);
}

function nuevaLineaReparacionAviso(){
    var today = new Date();
    var dia = today.getDate();
    if(dia<10){
        dia='0'+dia;
    }
    var mes = today.getMonth()+1;
    if(mes<10){
        mes='0'+mes;
    }
    var hora = today.getHours();
    if(hora<10){
        hora='0'+hora;
    }
    var min = today.getMinutes();
    if(min<10){
        min='0'+min;
    }
    var html='<tr><td><input type="text" name="fecha_linearev" class="fecha_linearev" disabled="disabled" value="'+dia+'/'+mes+'/'+today.getFullYear()+'"/></td><td><input type="text" name="hora_linearev" class="hora_linearev" disabled="disabled" size="4" value="'+hora+':'+min+'"/></td><td><input type="text" name="linearevision" class="linearevision" size="55" value=""/></td></tr>';
    $("table").append(html);
}

function nuevaLineaDireccion()
{
    var html='<tr><td></td><td><input type="text" name="aviso_repuesto_direccion" id="aviso_repuesto_direccion" value="c/ sin nombre, S/N"/></td></tr>';
    $("table").append(html);
}

function nuevaLineaOperacion()
{
    var html='<tr><td colspan="3"><input type="text" name="orden_descripcion" id="orden_descripcion" value="Descripci&oacute;n"/></td><td colspan="3"><input type="text" name="orden_operacion" id="orden_operacion" value="Operaci&oacute;n"/></td></tr>';
    $("table").append(html);
}

function nuevaLineaParte()
{
    var html='<tr><td colspan="3"><input type="text" name="parte_tarea" id="parte_tarea" value="Tarea"/></td><td colspan="3"><input type="text" name="parte_operacion" id=parte_operacion" value="Operaci&oacute;n"/></td></tr><tr><td colspan="3"><input type="text" name="parte_observacion" id="parte_observacion" value="Observaci&oacute;n"/></td></tr>';
    $("table").append(html);
}

function nuevaLineaComentarioDestino()
{
    var html='<tr><td><input type="text" name="comentario_destino_presu" id="comentario_destino_presu" value=""/></td></tr>';
    $("table").append(html);
}

function nuevaLineaObservacion()
{
    var html='<tr><td><input type="hidden" value="0" name="observaciones_id[]"/><textarea name="observaciones[]" cols="80" rows="2"></textarea></td><td align="right"><a href="#" onclick="$(this).parent().parent().remove();return false;"><img src="img/delete.jpg" alt="borrar" /></a></td></tr>';
    $("#tablaObservaciones").append(html);
}

function cargarCalendario(){
    $(document).ready(function() {

        var date = new Date();
        var d = date.getDate();
        var m = date.getMonth();
        var y = date.getFullYear();

        $('#calendario').fullCalendar({
            theme: true,
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            editable: true,
            events: [
            {
                title: '<b class="titulo_orden">Orden 1</b>  <br> Francisco',
                start: new Date(y, m, 1)
            },
            {
                title: 'Orden 23',
                start: new Date(y, m, d-5),
                end: new Date(y, m, d-2)
            },
            {
                id: 999,
                title: 'Orden 66',
                start: new Date(y, m, d-3, 16, 0),
                allDay: false
            }
            ],
            eventClick: function(calEvent, jsEvent, view) {
                window.location='ordenes.php?opt=edit';
            },
            eventMouseover: function(calEvent, jsEvent, view) {
                $(this).css('border', '2px solid red');
            },
            eventMouseout: function(calEvent, jsEvent, view) {
                $(this).css('border', '2px solid #3366CC');
                $(this).css('border-width', '1px 0');
            }
        });

    });
}

function cargarAgenda(){
    $(document).ready(function() {

        var date = new Date();
        var d = date.getDate();
        var m = date.getMonth();
        var y = date.getFullYear();

        $('#agenda').fullCalendar({
            theme: true,
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            editable: true,
            events: [
            {
                title: '<b class="titulo_orden">Cita 1</b>',
                className: 'cita',
                start: new Date(y, m, 1)
            },
            {
                title: '<b class="titulo_orden">Orden 878</b>',
                className: 'cita',
                start: new Date(y, m, 1)
            },
            {
                title: '<b class="titulo_orden">Cita 6</b>',
                className: 'cita',
                start: new Date(y, m, 1)
            },
            {
                title: '<b class="titulo_orden">Cita 4</b>',
                className: 'cita',
                start: new Date(y, m, d-5),
                end: new Date(y, m, d-2)
            },
            {
                id: 999,
                title: '<b class="titulo_orden">Aviso 8</b>',
                start: new Date(y, m, d-3, 16, 0),
                allDay: false
            }
            ]
        });

    });
}

function popup (pagina) {
    var opciones="toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=yes, width=508, height=365, top=85, left=140";
    window.open(pagina,"",opciones);
}

function logon(){
    var username = $('#username').val();
    var password = $.md5($('#password').val());
    $.post('logon.php',
    {
        username: username,
        password: password,
        login: 1
    },

    function(data){
        if(data=='<h3>Acceso denegado</h3>'){
            $("#login_mensaje").html(data);
            $("#username").focus();
        }else{
            window.location.href="index2.php";
        }
    });
}

//Funcion Confirmar Borrado para mostrar el mensaje de confirmacion
function confirmarBorrado(){
    if(!confirm("¿Seguro que desea borrar este aviso?")){
        return false;
    }
}

function confirmarBorradoOrden(){
    if(!confirm("¿Seguro que desea borrar esta orden?")){
        return false;
    }
}

function confirmarBorradoAvisoRepuesto(){
    if(!confirm("¿Seguro que desea borrar este Repuesto?")){
        return false;
    }
}
function confirmarBorradoOperacion(){
    if(!confirm("¿Seguro que desea borrar esta Operación?")){
        return false;
    }
}
function confirmarBorradoComercial(){
    if(!confirm("¿Seguro que desea borrar este Comercial?")){
        return false;
    }
}

//Funcion para ir a la vista de edicion de aviso al pinchar en el TD de la lista de avisos
function irVistaEdicion(aviso_id){
    document.location="avisosController.php?action=editar&aviso_id="+aviso_id;
}

function irVistaEdicionAvisoRepuesto(aviso_id){
    document.location="avisosRepuestosController.php?action=editar&aviso_id="+aviso_id;
}

function irVistaEdicionOrden(orden_id){
    document.location="ordenesController.php?action=editar&orden_id="+orden_id;
}

function irVistaVerUsuario(user_id){
    document.location="usersController.php?action=editar&users_id="+user_id;
}
function irVistaEdicionPresupuesto(id){
    document.location="presupuestosClientesController.php?action=editar&presupuesto_id="+id;
}

function irVistaEdicionMecha(id){
    document.location="mecanicosController.php?action=editar&id="+id;
}

function irVistaEdicionProveedor(proveedor_id){
    document.location="proveedoresController.php?action=editar&proveedor_id="+proveedor_id;
}
function irVistaEdicionComercial(id){
    document.location="comercialesController.php?action=editar&comercial_id="+id;
}
function irVistaEdicionCliente(cliente_id){
    document.location="clientesController.php?action=editar&cliente_id="+cliente_id;
}
function irPresupuestoProveedor(presupuesto_id){
    document.location="presupuestosProveedoresController.php?action=editar&presupuesto_id="+presupuesto_id;
}
function irPedidoProveedor(presupuesto_id){
    document.location="pedidosProveedoresController.php?action=editar&pedido_id="+presupuesto_id;
}
function irPedidoProveedor(presupuesto_id){
    document.location="pedidosProveedoresController.php?action=editar&pedido_id="+presupuesto_id;
}
function borrarOrden(orden_id){
	document.location="ordenesController.php?action=delete&orden_id="+orden_id;
}
//Confirmar Borrado
function confirmar(msg){
    if(!confirm(msg)){
        return false;
    }else{
        return true;
    }
}

function iSubmitEnter(oEvento, oFormulario){
    var iAscii;

    if (oEvento.keyCode)
        iAscii = oEvento.keyCode;
    else if (oEvento.which)
        iAscii = oEvento.which;
    else
        return false;

    if (iAscii == 13) oFormulario.submit();

    return true;
}

function permuta(dis){
    if(dis == 1){
        $(".noedicion").css("display", "none");
        $(".edicion").css("display", "inline");
    }else{
        $(".edicion").css("display", "none");
        $(".noedicion").css("display", "inline");
    }
}

function displayById(id){
    $("#"+id).show();
}

function observatorio(id){
    var fuera = jQuery("#observa" + id).css("display");
    jQuery(".observados").slideUp();
    if(fuera == "none"){
        jQuery("#observa" + id).slideDown();
    }
}

function addMaquinaCentro(id,obj){
    var html = "%3Ctr%3E%3Ctd%3E%3Cinput%20type%3D%27hidden%27%20name%3D%27maquinas_id%5B%5D%27%20value%3D%270%27%2F%3E%0A%3Cinput%20type%3D%27hidden%27%20name%3D%27maquinas_centrostrabajo_id%5B%5D%27%20value%3D%27"+id+"%27%2F%3E%0A%3Cspan%20class%3D%22datos%22%3ENombre%3C%2Fspan%3E%3C%2Ftd%3E%0A%3Ctd%3E%3Cinput%20name%3D%27maquinas_nombre%5B%5D%27%20value%3D%27%27%20type%3D%27text%27%2F%3E%3C%2Ftd%3E%0A%3Ctr%20class%3D%22datos%22%3E%0A%3Ctd%3ESerie%20Maquina%3A%20%3Cinput%20%20type%3D%22text%22%20name%3D%22maquinas_serie_maquina%5B%5D%22%20value%3D%22%22%20type%3D%22text%22%2F%3E%3C%2Ftd%3E%0A%3Ctd%3ESerie%20Motor%3A%20%3Cinput%20%20type%3D%22text%22%20name%3D%22maquinas_serie_motor%5B%5D%22%20%20value%3D%22%22%20type%3D%22text%22%2F%3E%3C%2Ftd%3E%0A%3C%2Ftr%3E%0A%3Ctr%20class%3D%22datos%22%3E%0A%3Ctd%3EModelo%20Transmision%3A%20%3Cinput%20%20type%3D%22text%22%20name%3D%22maquinas_modelo_transmision%5B%5D%22%20value%3D%22%22%20%2F%3E%3C%2Ftd%3E%0A%3Ctd%3ESerie%20Transmision%3A%20%3Cinput%20%20type%3D%22text%22%20name%3D%22maquinas_serie_transmision%5B%5D%22%20value%3D%22%22%20%2F%3E%3C%2Ftd%3E%0A%3C%2Ftr%3E%0A%3Ctr%3E%0A%3Ctd%3E%3Cspan%20class%3D%22%20datos%22%3EObservaciones%3C%2Fspan%3E%3C%2Ftd%3E%0A%3Ctd%3E%3Cinput%20%20type%3D%22text%22%20name%3D%22maquinas_observaciones%5B%5D%22%20value%3D%22%22%20%2F%3E%3C%2Ftd%3E%0A%3C%2Ftr%3E";
    //$(".maquinas_centro + "+obj).append(unescape(html));
    $(obj).parent().parent().next('tr').children('.maquinas_centro').append(unescape(html));
}

function addCentroCliente(){
    var html = "%3Ctable%20class%3D%27resumen%27%3E%0A%3Ctr%3E%0A%09%3Ctd%20colspan%3D%274%27%20class%3D%27labelia2%27%3E%3Cinput%20type%3D%27hidden%27%20name%3D%27centros_id%5B%5D%27%20value%3D%270%27%2F%3E%3Clabel%3ECentro%20de%20Trabajo%3C%2Flabel%3E%3Cinput%20type%3D%27button%27%20value%3D%27Borrar%20centro%20de%20trabajo%27%20%2F%3E%3C%2Ftd%3E%0A%3C%2Ftr%3E%0A%3Ctr%3E%0A%09%3Ctd%3E%3Clabel%3ECalle%3A%3C%2Flabel%3E%3C%2Ftd%3E%0A%09%3Ctd%3E%20%3Cinput%20type%3D%27text%27%20name%3D%27centros_direcciones%5B%5D%27%20size%3D%2725%27%20value%3D%27%27%20%2F%3E%3C%2Ftd%3E%0A%09%3Ctd%3E%3Clabel%3EPoblacion%3A%3C%2Flabel%3E%3C%2Ftd%3E%0A%09%3Ctd%3E%20%3Cinput%20type%3D%27text%27%20name%3D%27centros_poblaciones%5B%5D%27%20size%3D%2725%27%20value%3D%27%27%20%2F%3E%3C%2Ftd%3E%0A%3C%2Ftr%3E%0A%3Ctr%3E%0A%09%3Ctd%3E%3Clabel%3EProvincia%3A%3C%2Flabel%3E%3C%2Ftd%3E%0A%09%3Ctd%3E%20%3Cinput%20type%3D%27text%27%20name%3D%27centros_provincias%5B%5D%27%20size%3D%2725%27%20value%3D%27%27%20%2F%3E%3C%2Ftd%3E%0A%09%3Ctd%3E%3Clabel%3ETelefono%3A%3C%2Flabel%3E%3C%2Ftd%3E%0A%09%3Ctd%3E%20%3Cinput%20type%3D%27text%27%20name%3D%27centros_telefonos%5B%5D%27%20size%3D%2725%27%20value%3D%27%27%20%2F%3E%0A%09%3C%2Ftd%3E%0A%3C%2Ftr%3E%0A%3Ctr%3E%0A%09%3Ctd%20rowspan%3D%274%27%20colspan%3D%272%27%20style%3D%27vertical-align%3A%20top%27%20%3E%3Clabel%3EObservaciones%3A%3C%2Flabel%3E%3Cp%20%3E%3Cbr%2F%3E%3Ctextarea%20name%3D%27centros_observaciones%5B%5D%27%20cols%3D%2755%27%20rows%3D%275%27%3E%3C%2Ftextarea%3E%3C%2Fp%3E%3C%2Ftd%3E%0A%09%3Ctr%3E%3Ctd%3E%3Clabel%3EPrecio%20de%20desplazamiento%3A%3C%2Flabel%3E%3C%2Ftd%3E%0A%09%3Ctd%3E%3Cinput%20type%3D%27text%27%20name%3D%27centros_desplazamientos%5B%5D%27%20size%3D%2725%27%20%20value%3D%27%27%20%2F%3E%0A%09%3C%2Ftd%3E%0A%3C%2Ftr%3E%0A%3C%2Ftable%3E";
    $("#centros").append(unescape(html));
}

function encodeMyHtml() {
    encodedHtml = escape(encodeHtml.htmlToEncode.value);
    encodedHtml = encodedHtml.replace(/\//g,"%2F");
    encodedHtml = encodedHtml.replace(/\?/g,"%3F");
    encodedHtml = encodedHtml.replace(/=/g,"%3D");
    encodedHtml = encodedHtml.replace(/&/g,"%26");
    encodedHtml = encodedHtml.replace(/@/g,"%40");
    encodeHtml.htmlEncoded.value = encodedHtml;
} 

function borrarTarea(idTarea) {
	if(!confirm("¿Seguro que desea borrar esta Tarea?")){
		return false;
	}else{
		$("#tarea"+idTarea).hide();
		$.post("ordenesController.php?action=deleteTarea",{ tarea_id: idTarea},function(data){
			alert(data);
		});
	}
}

//alert("The following tables are unreachable: facturas_clientes, permisos");

