<?php
class GridHelper extends AppHelper {
	/*la funcion principal devuelve a la vista el javascript que utiliza jquery y jqgrid para generar la grilla
	con la que vamos a trabajar, con una grilla secundaria o una subgrilla dentro de la primera
	Para la funcion simple solo recibimos $consulta con los datos necesarios. Si utilizamos doble grilla
	debemos recibir $consulta y $consulta2 para la grilla secundaria
	Si vamos a utilizar una subgrilla solamente debemos incorporar en index.ctp la llamada a este helper pasandole
	como parametro $consulta y $consulta2 que deben ser los array de datos para la grilla principal y la
	subgrilla respectivamente y los tags html del div y la tabla (ver index.ctp de ej) solo de la grilla primaria
	Si vamos a utilizar una grilla secundaria separada necesitamos incorporar en index.ctp la llamada al helper
	con los dos parametros $consulta y $consulta2 que deben ser los array de datos para la grilla principal y la
	secundaria respectivamente y los tags para las dos grillas (la secundaria se actualiza con los detalles
	 de la primaria)*/
	function principal($consulta=array(), $consulta2=null){
		if(empty($consulta)){
			return $this->output($consulta);
		}else{
			//primero aplicamos opciones traidas de la bd para la grilla unica o principal
			$out[] = "var modelid=0;
			var ".$consulta['Grilla']['nombre']."= $('#".$consulta['Grilla']['nombre']."').jqGrid({
			url:'".$consulta['Grilla']['url']."',
			datatype: '".$consulta['Grilla']['datatype']."',
			cellEdit:".$consulta['Grilla']['celledit'].",
			mtype: '".$consulta['Grilla']['mtype']."',
			colModel :[";
			foreach($consulta['Columna'] as $col){
				//por cada una de las columnas que existen para la grilla aplicamos las opciones de la bd
				if($col['modelo']!=$consulta['Grilla']['modelo']){
					$out[] = "{name:'".$col['name']."_id', index:'".$col['name']."', label:'".$col['label']."', width:".$col['width'].", search:".$col['search'].", sortable:".$col['sortable'].", editable:".$col['editable'].", hidden:".$col['hidden'].", align:'".$col['align']."'";
				}else{
					$out[] = "{name:'".$col['name']."', index:'".$col['name']."', label:'".$col['label']."', width:".$col['width'].", search:".$col['search'].", sortable:".$col['sortable'].", editable:".$col['editable'].", hidden:".$col['hidden'].", align:'".$col['align']."'";
				}
				// solamente añadimos opciones extra si existen
				if(!empty($col['edittype'])){
					$out[] = ", edittype:'".$col['edittype']."'";
				}
				if(!empty($col['editoptions'])){
					$out[] = ", editoptions:".$col['editoptions'];
				}
				if(!empty($col['editrules'])){
					$out[] = ", editrules:'".$col['editrules']."'";
				}
				if(!empty($col['classes'])){
					$out[] = ", classes:'".$col['classes']."'";
				}
				if(!empty($col['formatter'])){
					if($col['formatter']=='number'){
						$out[] = ", formatter:'".$col['formatter']."', formatoptions:{decimalPlaces:".$col['decimalplaces'].", decimalSeparator:'".$col['decimalseparator']."', thousandsSeparator:'".$col['thousandsseparator']."'}";
					}else{
						$out[] = ", formatter:'".$col['formatter']."'";
					}
				}
				if(next($consulta['Columna'])){
					$out[] = "}, ";
				}else{
					$out[] = "}";
				}
			}
			//continuamos con las opciones de la grilla
			$out[] = "],        
			pager: $('#p_".$consulta['Grilla']['nombre']."'),
			postData:{grilla:'".$consulta['Grilla']['nombre']."'},
			rowNum:".$consulta['Grilla']['rownum'].",
			rowList:[".$consulta['Grilla']['rowlist']."],
			sortname:'".$consulta['Grilla']['sortname']."',
			sortorder:'".$consulta['Grilla']['sortorder']."',
			multiselect:".$consulta['Grilla']['multiselect'].",
			scroll:".$consulta['Grilla']['scroll'].",
			altRows:".$consulta['Grilla']['altrows'].",";
			if ($consulta['Grilla']['rownumbers']=='true'){
				$out[] = "rownumbers:".$consulta['Grilla']['rownumbers'].",
				rownumWidth:".$consulta['Grilla']['rownumwidth'].",";
			}
			$out[] = "viewrecords:".$consulta['Grilla']['viewrecords'].",";
			if ($consulta['Grilla']['toolbar']!='false'){
				$out[] = "toolbar : [true,'".$consulta['Grilla']['toolbar']."'],";
			}
			$out[] = "caption: '".$consulta['Grilla']['caption']."',
			cellurl:'".$consulta['Grilla']['cellurl']."/".$consulta['Grilla']['modelo']."',
			editurl:'".$consulta['Grilla']['editurl']."/".$consulta['Grilla']['modelo']."',
			loadui:'block',
			width:'".$consulta['Grilla']['width']."',
			height:'".$consulta['Grilla']['height']."',";
			// SUBGRILLA
			//si existe la opcion subgrilla insertamos la funcion correspondiente para mostrarla con el evento correspondiente
			if ($consulta['Grilla']['grillasecun']=='subgrid'){
				$out[]="subGrid: true,
				subGridRowExpanded: function(subgrid_id, row_id) {
				modelid=row_id;
				var subgrid_table_id;
				subgrid_table_id = subgrid_id+'_t';
				var subgrilla = subgrid_id+'_g';
				$('#'+subgrid_id).html('<table id=\"'+subgrid_table_id+'\" class=\"scroll\"></table><div id=\"p_'+subgrid_table_id+'\" class=\"scroll\" ></div>');
				$('#'+subgrid_table_id).jqGrid({
				url:'".$consulta2['Grilla']['url']."',
				datatype: '".$consulta2['Grilla']['datatype']."',
				cellEdit:".$consulta2['Grilla']['celledit'].",
				mtype: '".$consulta2['Grilla']['mtype']."',
				colModel :[";
				//por cada una de las columnas existentes para la grilla secundaria aplicamos opciones
				foreach($consulta2['Columna'] as $col){
					if($col['modelo']!=$consulta2['Grilla']['modelo']){
						$out[] = "{name:'".$col['name']."_id', index:'".$col['name']."', label:'".$col['label']."', width:".$col['width'].", search:".$col['search'].", sortable:".$col['sortable'].", editable:".$col['editable'].", hidden:".$col['hidden'].", align:'".$col['align']."'";
					}else{
						$out[] = "{name:'".$col['name']."', index:'".$col['name']."', label:'".$col['label']."', width:".$col['width'].", search:".$col['search'].", sortable:".$col['sortable'].", editable:".$col['editable'].", hidden:".$col['hidden'].", align:'".$col['align']."'";
					}
					if(!empty($col['edittype'])){
						$out[] = ", edittype:'".$col['edittype']."'";
					}
					if(!empty($col['editoptions'])){
						$out[] = ", editoptions:".$col['editoptions'];
					}
					if(!empty($col['editrules'])){
						$out[] = ", editrules:'".$col['editrules']."'";
					}
					if(!empty($col['classes'])){
						$out[] = ", classes:'".$col['classes']."'";
					}
					if(!empty($col['formatter'])){
						if($col['formatter']=='number'){
							$out[] = ", formatter:'".$col['formatter']."', formatoptions:{decimalPlaces:".$col['decimalplaces'].", decimalSeparator:'".$col['decimalseparator']."', thousandsSeparator:'".$col['thousandsseparator']."'}";
						}else{
							$out[] = ", formatter:'".$col['formatter']."'";
						}
					}
					if(next($consulta2['Columna'])){
						$out[] = "}, ";
					}else{
						$out[] = "}";
					}
				}
				$out[] = "],        
				pager: $('#p_'+subgrid_table_id),
				postData:{grilla:'".$consulta2['Grilla']['nombre']."', secun:true, model:'".$consulta['Grilla']['modelo']."', ".low($consulta['Grilla']['modelo'])."_id:row_id},
				rowNum:".$consulta2['Grilla']['rownum'].",
				rowList:[".$consulta2['Grilla']['rowlist']."],
				sortname:'".$consulta2['Grilla']['sortname']."',
				sortorder:'".$consulta2['Grilla']['sortorder']."',
				multiselect:".$consulta2['Grilla']['multiselect'].",
				scroll:".$consulta2['Grilla']['scroll'].",
				altRows:".$consulta2['Grilla']['altrows'].",";
				if ($consulta2['Grilla']['rownumbers']=='true'){
					$out[] = "rownumbers:".$consulta2['Grilla']['rownumbers'].",
					rownumWidth:".$consulta2['Grilla']['rownumwidth'].",";
				}
				$out[] = "viewrecords:".$consulta2['Grilla']['viewrecords'].",";
				if ($consulta2['Grilla']['toolbar']!='false'){
					$out[] = "toolbar : [true,'".$consulta2['Grilla']['toolbar']."'],";
				}
				$out[] = "caption: '".$consulta2['Grilla']['caption']."',
				cellurl:'".$consulta2['Grilla']['cellurl']."/".$consulta2['Grilla']['modelo']."',
				editurl:'".$consulta2['Grilla']['editurl']."/".$consulta2['Grilla']['modelo']."',
				width:".$consulta2['Grilla']['width'].",
				loadui:'block',
				})";
				// opciones de botones y de pager de subgrilla
				$out[] = ".jqGrid('navGrid', '#p_'+subgrid_table_id,{
				edit:".$consulta2['Grilla']['edit'].",
				add:".$consulta2['Grilla']['add'].",
				del:".$consulta2['Grilla']['del'].",
				search:".$consulta2['Grilla']['search'].",
				refresh:".$consulta2['Grilla']['refresh']."
				}";
				if ($consulta2['Grilla']['edit'] == 'true'){
					// si el boton de editar esta presente aplicamos opciones de formulario
					$out[] = ",{top:'10', left: '300', dataheight: '380', savekey: [true,13]}";
				}else{
					$out[] = ",{}";
				}	
				// si el boton de insertar esta presente aplicamos opciones de formulario
				if ($consulta2['Grilla']['add'] == 'true'){
					$out[] = ",{top:'10', left: '300', dataheight: '380', savekey: [true,13], beforeSubmit: function(postdata,formid){ postdata.".low($consulta['Grilla']['modelo'])."_id=modelid;
					return[true];}}";
				}else{
					$out[] = ",{}";
				}
				if ($consulta2['Grilla']['search'] == 'true'){
					$out[] = ",{},{multipleSearch:true, sopt:['eq','ne','lt','le','gt','ge','bw','bn','ew','en','cn','nc']}";
				}
				$out[] = ").jqGrid('filterToolbar', {beforeSearch: function(){ $('#+subgrid_table_id+').jqGrid('setGridParam',{postData:{".low($consulta['Grilla']['modelo'])."_id:+modelid}})}});},";
			}
			// FIN SUBGRILLA
			// si la opcion de grilla secundaria no es subgrilla sino true en el evento seleccion celda pasamos parametros a la grilla secundaria
			if ($consulta['Grilla']['grillasecun']=='true'){
				$out[] = "onCellSelect: function(ids) { 
				if(ids == null) { 
					ids=0;
					if($('#".$consulta['Grilla']['nombresecun']."').jqGrid('getGridParam', 'records') >0 ) {
						$('#".$consulta['Grilla']['nombresecun']."').jqGrid('clearGridData').trigger('clearToolbar');
						$('#".$consulta['Grilla']['nombresecun']."').jqGrid('setGridParam',{postData:{".low($consulta['Grilla']['modelo'])."_id:0}}).trigger('reloadGrid');
						modelid=ids;
					}
				} else {
					$('#".$consulta['Grilla']['nombresecun']."').jqGrid('clearGridData').trigger('clearToolbar');
					$('#".$consulta['Grilla']['nombresecun']."').jqGrid('setGridParam',{postData:{".low($consulta['Grilla']['modelo'])."_id:+ids}}).trigger('reloadGrid');
					modelid=ids;
				}
				},";
			}
			$out[] = "loadError : function(xhr,st,err) { $('#rsperror').html('Tipo: '+st+'; Respuesta: '+ xhr.status + ' '+xhr.statusText); }
			})";
			// opciones de botones y pager de grilla principal
			$out[] = ".jqGrid('navGrid', '#p_".$consulta['Grilla']['nombre']."',{
			edit:".$consulta['Grilla']['edit'].",
			add:".$consulta['Grilla']['add'].",
			del:".$consulta['Grilla']['del'].",
			search:".$consulta['Grilla']['search'].",
			refresh:".$consulta['Grilla']['refresh']."
			}";
			if ($consulta['Grilla']['edit'] == 'true'){
				$out[] = ",{top:'10', left: '300', dataheight: '380', savekey: [true,13]}";
			}else{
				$out[] = ",{}";
			}	
			if ($consulta['Grilla']['add'] == 'true'){
				$out[] = ",{top:'10', left: '300', dataheight: '380', savekey: [true,13]}";
			}else{
				$out[] = ",{}";
			}
			if ($consulta['Grilla']['search'] == 'true'){
				$out[] = ",{},{multipleSearch:true, sopt:['eq','ne','lt','le','gt','ge','bw','bn','ew','en','cn','nc']}";
			}
			$out[] = ");".$consulta['Grilla']['nombre'].".jqGrid('filterToolbar');";
			// FIN GRILLA PRINCIPAL
			// GRILLA SECUNDARIA si existe
			if ($consulta['Grilla']['grillasecun']=='true'){
				$out[] = "var ".$consulta2['Grilla']['nombre']."= $('#".$consulta2['Grilla']['nombre']."').jqGrid({
				url:'".$consulta2['Grilla']['url']."',
				datatype: '".$consulta2['Grilla']['datatype']."',
				cellEdit:".$consulta2['Grilla']['celledit'].",
				mtype: '".$consulta2['Grilla']['mtype']."',
				colModel :[";
				// opciones de columnas de la grilla secundaria
				foreach($consulta2['Columna'] as $col){
					if($col['modelo']!=$consulta2['Grilla']['modelo']){
						$out[] = "{name:'".$col['name']."_id', index:'".$col['name']."', label:'".$col['label']."', width:".$col['width'].", search:".$col['search'].", sortable:".$col['sortable'].", editable:".$col['editable'].", hidden:".$col['hidden'].", align:'".$col['align']."'";
					}else{
						$out[] = "{name:'".$col['name']."', index:'".$col['name']."', label:'".$col['label']."', width:".$col['width'].", search:".$col['search'].", sortable:".$col['sortable'].", editable:".$col['editable'].", hidden:".$col['hidden'].", align:'".$col['align']."'";
					}
					if(!empty($col['edittype'])){
						$out[] = ", edittype:'".$col['edittype']."'";
					}
					if(!empty($col['editoptions'])){
						$out[] = ", editoptions:".$col['editoptions'];
					}
					if(!empty($col['editrules'])){
						$out[] = ", editrules:'".$col['editrules']."'";
					}
					if(!empty($col['classes'])){
						$out[] = ", classes:'".$col['classes']."'";
					}
					if(!empty($col['formatter'])){
						if($col['formatter']=='number'){
							$out[] = ", formatter:'".$col['formatter']."', formatoptions:{decimalPlaces:".$col['decimalplaces'].", decimalSeparator:'".$col['decimalseparator']."', thousandsSeparator:'".$col['thousandsseparator']."'}";
						}else{
							$out[] = ", formatter:'".$col['formatter']."'";
						}
					}
					if(next($consulta2['Columna'])){
						$out[] = "}, ";
					}else{
						$out[] = "}";
					}
				}
				$out[] = "],        
				pager: $('#p_".$consulta2['Grilla']['nombre']."'),
				postData:{grilla:'".$consulta2['Grilla']['nombre']."', secun:true, model:'".$consulta['Grilla']['modelo']."', ".low($consulta['Grilla']['modelo'])."_id:0},
				rowNum:".$consulta2['Grilla']['rownum'].",
				rowList:[".$consulta2['Grilla']['rowlist']."],
				sortname:'".$consulta2['Grilla']['sortname']."',
				sortorder:'".$consulta2['Grilla']['sortorder']."',
				multiselect:".$consulta2['Grilla']['multiselect'].",
				scroll:".$consulta2['Grilla']['scroll'].",
				altRows:".$consulta2['Grilla']['altrows'].",";
				if ($consulta2['Grilla']['rownumbers']=='true'){
					$out[] = "rownumbers:".$consulta2['Grilla']['rownumbers'].",
					rownumWidth:".$consulta2['Grilla']['rownumwidth'].",";
				}
				$out[] = "viewrecords:".$consulta2['Grilla']['viewrecords'].",";
				if ($consulta2['Grilla']['toolbar']!='false'){
					$out[] = "toolbar : [true,'".$consulta2['Grilla']['toolbar']."'],";
				}
				$out[] = "caption: '".$consulta2['Grilla']['caption']."',
				cellurl:'".$consulta2['Grilla']['cellurl']."/".$consulta2['Grilla']['modelo']."',
				editurl:'".$consulta2['Grilla']['editurl']."/".$consulta2['Grilla']['modelo']."',
				loadui:'block',
				width:'".$consulta2['Grilla']['width']."',
				height:'".$consulta2['Grilla']['height']."',
				loadError : function(xhr,st,err) { $('#rsperror').html('Tipo: '+st+'; Respuesta: '+ xhr.status + ' '+xhr.statusText); }
				})";
				// opciones de botones y pager de la grilla secundaria
				$out[] = ".jqGrid('navGrid', '#p_".$consulta2['Grilla']['nombre']."',{
				edit:".$consulta2['Grilla']['edit'].",
				add:".$consulta2['Grilla']['add'].",
				del:".$consulta2['Grilla']['del'].",
				search:".$consulta2['Grilla']['search'].",
				refresh:".$consulta2['Grilla']['refresh']."
				}";
				if ($consulta2['Grilla']['edit'] == 'true'){
					$out[] = ",{top:'10', left: '300', dataheight: '380', savekey: [true,13]}";
				}else{
					$out[] = ",{}";
				}	
				if ($consulta2['Grilla']['add'] == 'true'){
					// si el boton insertar existe aplicamos opciones de formulario y agregamos el id de la grilla principal al enviar el form
					$out[] = ",{top:'10', left: '300', dataheight: '380', savekey: [true,13], beforeSubmit: function(postdata,formid){ postdata.".low($consulta['Grilla']['modelo'])."_id=modelid;
					return[true];}}";
				}else{
					$out[] = ",{}";
				}
				if ($consulta2['Grilla']['search'] == 'true'){
					$out[] = ",{},{multipleSearch:true, sopt:['eq','ne','lt','le','gt','ge','bw','bn','ew','en','cn','nc']}";
				}
				$out[] = ");".$consulta2['Grilla']['nombre'].".jqGrid('filterToolbar', {beforeSearch: function(){ $('#".$consulta['Grilla']['nombresecun']."').jqGrid('setGridParam',{postData:{".low($consulta['Grilla']['modelo'])."_id:+modelid}})}});";
				//FIN GRILLA SECUNDARIA
			}
			//retornamos a la grilla todo el codigo generado
			return $this->output(implode($out));
		}
	}
	
	function inicio($page=null, $totalpages=null, $count=null){
		if (stristr($_SERVER['HTTP_ACCEPT'],'application/xhtml+xml') ) {
			$out[] = header('Content-type: application/xhtml+xml;charset=utf-8'); 
		} else {
			$out[] = header('Content-type: text/xml;charset=utf-8');
		}
		$out[] = "<?xml version='1.0' encoding='utf-8'?>
		<rows>
		<page>".$page."</page>
		<total>".$totalpages."</total>
		<records>".$count."</records>";
		return $this->output(implode($out));
	}
		
	function abrereg($id=null){
		return $this->output("<row id='".$id."'>");
	}
		
	function cierrareg(){
		return $this->output("</row>");
	}
	
	function datonum($num=null){
		return $this->output("<cell>".$num."</cell>");
	}
	
	function datochar($char=null){
		return $this->output("<cell><![CDATA[".$char."]]></cell>");
	}

	function fin(){
		return $this->output("</rows>");
	}
	
	function botonp($grilla, $boton=null, $titulo=null, $funcion=null, $icono=null){
		$out = "$('#".$grilla."').jqGrid('navButtonAdd', '#p_".$grilla."',{
		caption:'".$boton."',
		title:'".$titulo."',
		buttonicon :'".$icono."',
		onClickButton:function(){
			".$funcion."
		}});";
		return $this->output($out);
	}
}