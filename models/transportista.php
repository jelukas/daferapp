<?php
class Transportista extends AppModel {
	var $name = 'Transportista';
        var $displayField='nombre';
        
        var $hasMany = array(
          'Telefono',  
        );
}
?>