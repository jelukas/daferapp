<?php ?>

<input id="articulos_select" data-placeholder="buscar articulo" style="width: 100px"/>
<script>
    
    

    
    $(document).ready(function() {
        $("#articulos_select").select2({
            placeholder: "Search for a movie",
            minimumInputLength: 3,
            ajax: { // instead of writing the function to execute the request we use Select2's convenient helper
                url: "/daferapp/articulos/json",
                dataType: 'json',
                data: function (term, page) {
                    return {
                        q: term, // search term
                        p: page // search term
                    };
                },
                results: function (data, page) { // parse the results into the format expected by Select2.
                    // since we are using custom formatting functions we do not need to alter remote JSON data
                    return {results: data.results};
                },
                formatResult: function (item) {
                    var markup = "<ul>";
                    markup += "<li>"+ item.nombre +"</li>";
                    markup += "</ul>";
                    return markup;
                }, // omitted for brevity, see the source of this page
                formatSelection: function (item) {
                    return item.nombre;
                }
            }
        });
    });
</script>