<?php
/*
 * views/full_calendar/index.ctp
 * CakePHP Full Calendar Plugin
 *
 * Copyright (c) 2010 Silas Montgomery
 * http://silasmontgomery.com
 *
 * Licensed under MIT
 * http://www.opensource.org/licenses/mit-license.php
 */

echo $this->Html->script(array('/js/jquery-1.5.min', '/js/jquery-ui-1.8.9.custom.min', '/js/fullcalendar.min', '/js/jquery.qtip-1.0.0-rc3.min', '/js/ready'), array('inline' => 'false'));
echo $this->Html->css('fullcalendar', null, array('inline' => false));
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.0/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js"></script>
<script src="http://code.google.com/p/xman/source/browse/trunk/themes/xmantuan/fullCalendar/fullcalendar/fullcalendar.min.js"></script>
<script src="http://code.google.com/p/hushnote/source/browse/appengine/lib/jquery.qtip-1.0.0-rc3.min.js"></script>



<div class="Calendar index">
	<div id="calendar"></div>
</div>
<div class="actions">
	<ul>
	    <li><?php echo $this->Html->link(__('Nuevo Evento', true), array('controller' => 'events', 'action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('Gestionar eventos', true), array('controller' => 'events')); ?></li>
		<li><?php echo $this->Html->link(__('Gestionar tipos eventos', true), array('controller' => 'event_types')); ?></li>
	</ul>
</div>
