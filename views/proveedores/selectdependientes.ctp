    <style type="text/css">
    div.select{
    float:left;
    width:100px;
    }
    select{
    width:120px;
    }
     
    div.labels {
    float:left;
    margin: 2px 2px 2px 2px;
    width:100px;
    text-align:center;
    }
    div.text{
    margin: 2px 2px 2px 2px;
    }
    div.th{
    float:left;
    margin: 2px 2px 2px 2px ;
    border: 1px solid gray;
    text-align:center;
    width:133px;
    color:white;
    background:gray;
    }
     
    </style>
    <?php
    echo $this->Html->tag('div', 'Finca.', array('class' => 'labels'));
    echo $this->Form->input('Farm.farm',array('options'=>$farms,'label'=>false,'empty'=>'Elije Finca'));
    echo $this->Html->tag('div', 'Lote.', array('class' => 'labels'));
    echo $this->Form->input('Lot.lot',array('options'=>'','label'=>false));
    echo $this->Html->tag('div', 'Ciclo.', array('class' => 'labels'));
    echo $this->Form->input('Table.cycle',array('options'=>$cycles,'label'=>false));
    echo '<br><br>';
     
     
     
     
     
    echo '<div id="contempty" style="float:left;border:1px solid gray;height:300px;">';
    echo $this->Html->tag('div', '# Melga', array('class' => 'th'));
    echo $this->Html->tag('div', 'Ciclo', array('class' => 'th'));
    echo $this->Html->tag('div', 'Area', array('class' => 'th'));
    echo $this->Html->tag('div', 'Densidad', array('class' => 'th'));
    echo $this->Html->tag('div', '# Plantas', array('class' => 'th'));
    echo '<div id="edit"></div>';
    echo '<div>';
     
     
     
    ?>
     
    <script type="text/javascript">
    jQuery(document).ready(function() {
        jQuery("#TableCycle").html("");
        jQuery('#FarmFarm').change(function(){
            jQuery("#edit").html("");
            jQuery.ajax({
            type: "POST",
            url: "<?php echo $this->base; ?>/tables/lots/"+jQuery("#FarmFarm").val(),
            //data: data,
            dataType: "json",
            success: function(response, status) {
             if (response.success == true){
                        //jAlert(response.lots);
                        jQuery("#TableCycle").html("");
                        jQuery("#LotLot").html("");
                        jQuery("#LotLot").append('<option value="">Elije un lote</option>');
                        jQuery.each(response.lots,function (k,v){
                        jQuery("#LotLot").append('<option value='+k+'>'+v+'</option>');
                    });
                }else {
                    jQuery("#LotLot").html("");
                    jAlert("Selecciona una finca");
                    }
           
                },
           error: function(response, status) {
                    jAlert("error inesperado");
                }
            });
        });
     
        jQuery('#LotLot').change(function(){
            jQuery("#edit").html("");
            jQuery.ajax({
            type: "POST",
            url: "<?php echo $this->base; ?>/tables/cycles/"+jQuery("#LotLot").val(),
            //data: data,
            dataType: "json",
            success: function(response, status) {
             if (response.success == true){
                        jQuery("#TableCycle").html("");
                        jQuery("#TableCycle").append('<option value="">Elije un lote</option>');
                        jQuery.each(response.cycles,function (k,v){
                        jQuery("#TableCycle").append('<option value='+k+'>'+v+'</option>');
                    });
                }else {
                    jQuery("#TableCycle").html("");
                    jAlert("No hay ciclos en este lote");
                    }
           
                },
           error: function(response, status) {
                    jAlert("criterio no válido");
                }
            });
        });
     
        jQuery('#TableCycle').change(function() {
            jQuery.ajax({
            type: "POST",
          url: "<?php echo $this->base ?>/tables/edit/"+jQuery("#LotLot").val()+"/"+jQuery("#TableCycle").val(),
        success: function(msg){
            jQuery('#edit').html(msg);
                }
            });
        });
     
    });
    </script>
