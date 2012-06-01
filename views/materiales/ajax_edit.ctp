<div style="background-color: #CEF6CE" id="message_ajax">Material <?php echo $materiale_id ?> Actualizado Correctamente</div>
<script type="text/javascript">
    function ocultar_ajax_message(){
        $('#message_ajax').fadeOut('slow', function() {
            // Animation complete.
        });
    }
    setTimeout("ocultar_ajax_message()",3000);
</script>