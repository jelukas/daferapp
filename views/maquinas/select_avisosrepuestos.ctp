<?php

echo $form->input('Avisosrepuesto.maquina_id', array(
    'label' => 'Máquina',
    'class' => 'chzn-select-required',
    'div' => null)
);
?>
<script type="text/javascript">
    $(".chzn-select-required").chosen();
</script>