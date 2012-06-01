<?php

/* /app/views/helpers/autocomplete.php (using other helpers) */

class AutocompleteHelper extends AppHelper {

    var $helpers = array('Html', 'Form');

    function replace_select($model, $label = null, $required = false, $almacene_id = null) {
        $required_text = "";
        if ($required == true)
            $required_text = "required";
        $label_text = "";
        if (!empty($label))
            $label_text = $label;
        else
            $label_text = $model;
        if($this->model())
            $field_id = $model . 'Id';
        else
            $field_id = strtolower($model) . '_id';
        $output = '
       <div class="autocompletador input select ' . $required_text . '">
            <label for="' . $this->model() . $model . 'Id">' . $label_text . '</label>'
                . $this->Form->input(strtolower($model) . '_id', array('type' => 'hidden')) .
                '<p><input id="autocomplete-' . $model . '" type="text" value="" /></p>
        </div>
        <script type="text/javascript">
               if($( "#autocomplete-' . $model . '" ).length != 0){
        var autocomplete_' . $model . ' = $( "#autocomplete-' . $model . '" ).autocomplete({';
        if (!empty($almacene_id))
            $output .= 'source: "/daferapp/' . strtolower($model) . 's/autocomplete/' . $almacene_id . '",';
        else
            $output .= 'source: "/daferapp/' . strtolower($model) . 's/autocomplete",';
        
        $output .= 'minLength: 3,
            select: function( event, ui ) {
                $(\'.autocompletador input[type="hidden"]\').val(ui.item.id);
            }
        });
        autocomplete_' . $model . '.data( "autocomplete" )._renderItem = function( ul, item ) {
            return $( "<li></li>" )
            .data( "item.autocomplete", item )
            .append( "<a>" + item.label + "</a>" )
            .appendTo( ul );
        };
    }
            </script>';
        return $output;
    }

}

?>
