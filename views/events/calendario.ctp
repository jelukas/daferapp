<?php

    echo $javascript->link('jquery-1.6.2.min');
    echo $javascript->link('fullcalendar');
    echo $html->css('fullcalendar');
    //Note: to use $html->css as above, the fullcalendar.css 
    //file must be in your app/webroot/css folder.
?>
<script type='text/javascript'>

	jQuery(document).ready(function() {
		jQuery('#calendar').fullCalendar({
                    defaultView: 'basicWeek',
                    events: "/daferapp/events/feed"
                });
	});

</script>
<div id='calendar' style="width: 900px;margin: 0 auto;"></div>
