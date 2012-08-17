<?php echo $this->Form->create('Articulo') ?> 
<input id="articulos_select" name="articulos_select" data-placeholder="Selecionar un Artículo..." style="width: 500px" />
<input id="articulos_select_default" name="articulos_select_default" data-placeholder="Selecionar un Artículo..." style="width: 500px" value="1,refrencia,nombre" />
<input id="articulos_select_infinite" name="articulos_select_infinite" data-placeholder="Selecionar un Artículo..." style="width: 500px" />
<?php echo $this->Form->input('id',array('label'=>'Desde $this->Form','type'=>'text','class'=>'articulos_select')) ?>
<?php echo $this->Form->end('Enviar') ?> 
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
        $("#articulos_select").select2({
            placeholder: "Selecionar un Artículo...",
            minimumInputLength: 3,
            ajax: { // instead of writing the function to execute the request we use Select2's convenient helper
                url: "<?php echo $this->Html->url(array('controller'=>'articulos','action'=>'json_basico')) ?>",
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
        $(".articulos_select").select2({
            placeholder: "Selecionar un Artículo...",
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
        $("#articulos_select_default").select2({
            placeholder: "Selecionar un Artículo...",
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
            initSelection : function (element, callback) {
                var data;
                var splits = $(element.val().split(","));
                data = {id: splits[0].valueOf(), ref: splits[1].valueOf() , nombre: splits[2].valueOf()};
                callback(data);
            },
            formatResult: articuloFormatResult, // omitted for brevity, see the source of this page
            formatSelection: articuloFormatSelection  // omitted for brevity, see the source of this page
        });
        $("#articulos_select_infinite").select2({
            placeholder: "Selecionar un Artículo...",
            minimumInputLength: 3,
            ajax: { // instead of writing the function to execute the request we use Select2's convenient helper
                url: "/daferapp/articulos/json_infinite",
                dataType: 'json',
                quietMillis: 100,
                data: function (term, page) {
                    return {
                        q: term, // search term
                        page: page,
                        page_limit: 5
                    };
                },
                results: function (data, page) { 
                    var more = (page * 10) < data.total; // whether or not there are more results available
                    // notice we return the value of more so Select2 knows if more results can be loaded
                    return {results: data.articulos, more: more};
                }
            },
            formatResult: articuloFormatResult, // omitted for brevity, see the source of this page
            formatSelection: articuloFormatSelection  // omitted for brevity, see the source of this page
        });
    });
</script>