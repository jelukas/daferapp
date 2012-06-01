
/*--------------------------------------*/
/*--- Ajax Functions a Controladores ---*/
/*--------------------------------------*/

/*Funcion escribirCentros recibe un Id de un cliente y
 llama al controlador para que cargue la vista que escribe el select
con los centros de trabajo adecuado.*/

   

/* ========= Inicio Vista Add ============ */
function escribirCentros(id, valor){
    $("#centros").load("avisosController.php?action=escribirCentros", {
        cliente_id: id,
	valor: valor
    });
}

/*Funcion escribirMaquinas recibe un Id de un centro de trabajo y carga el select de las maquinas.*/
function escribirMaquinas(id, valor){
    $("#maquinas").load("avisosController.php?action=escribirMaquinas", {
        centro_id: id,
	valor: valor
    });
    if(valor != 0){
	$("#horas_maquina").load("view/ajax/escribirHorasMaquina.php", {
		valor: valor
	});
    }else{
	$("#horas_maquina").html('<input type="text" name="horas" size="4" value="0"/>');
    }
}

/*Funcion escribirContactos recibe un Id de un centro de trabajo y carga el select de las contactos de ese centro.*/
function escribirContactos(id, valor){
    $("#contactos").load("avisosController.php?action=escribirContactos", {
        centro_id: id,
	valor: valor
    });
}

function escribirOperacion(tarea){
    var html = '<tr><td><input type="hidden" name="tarea' + tarea + '_operaciones_id[]" value="0"/><textarea name="tarea' + tarea + '_operaciones[]" cols="60" rows="2"/></textarea></td><td><input type="checkbox" name="tarea' + tarea + '_realizadas[]" /></td><td><img src="img/delete.jpg" onclick="$(this).parent().parent().remove();return false;" alt="borrar" /></td></tr>';
    $('#operacionesOrden' + tarea).append(html);
}

function escribirMaterial(tarea){
    $.post('views/ajax/escribirArticulos.php', {
        tarea: tarea     
    },
    function(data) {
          $('#repuestosAviso' + tarea).append(data);
    });
}

function addTarea(){
	$.post('views/ajax/nuevatarea.php', 
	function(data) {
		$('#new_tarea').prepend(data);
	});
}


/* Funcion escribirAlmacenesArticulos */
function escribirAlmacenesArticulos(){
    $.post('avisosController.php?action=escribirAvisosRepuestos', function(data) {
        $('#repuestosAviso').append(data);
    });
}

/* Funcion escribirArticulosSuggest */
function escribirArticulosSuggest(){
    $.post('articulosController.php?action=escribirArticulosSuggest', function(data) {
        $('#alternativasArticulo').append(data);
    });
}

function escribirArticulosRepuestosSuggest(){
    $.post('articulosController.php?action=escribirArticulosRepuestosSuggest', function(data) {
        $('#alternativasArticulo').append(data);
    });
}

function escribirLineaDescripccion(){
    var html = '<tr><td><input type="hidden" name="descripciones_id[]" value="0" /><textarea name="lineadescripcion[]" cols="40" rows="2"></textarea></td><td><textarea name="lineareparacion[]" cols="40" rows="2"/></td><td><a href="#" onclick="$(this).parent().parent().remove();return false;"><img src="img/delete.jpg" alt="borrar" /></a></td></tr>';
    $('#descripcionesAviso').append(html);
}

function escribirLineaOperacion (){
    var html = '<tr><td><input type="hidden" name="operaciones_id[]" value="0"/><textarea name="operaciones[]" cols="60" rows="2"/></textarea></td><td><input type="checkbox" name="realizadas[]" /></td><td><a href="#" onclick="$(this).parent().parent().remove();return false;" disabled="disabled"><img src="img/delete.jpg" alt="borrar" /></a></td></tr>';
    $('#operacionesOrden').append(html);
}

function escribirSelecionaMecanico(){
    $.post('ordenesController.php?action=escribirSelectMecanicos', function(data) {
        $('#mecanicosorden').append(data);
    });
}
/* ========= FIN Vista Add ============ */

function escribirAlbaranes(modo, cliente_id, maquina_id, centro_id){
    $.post('albaranes.php', {
        cliente_id:  cliente_id,
        maquina_id: maquina_id,
        centro_id: centro_id,
        modo: modo
        },
      function(data) {
          $('#albacete').html(data);
      }
    );
}

