<h2>Iniciar Sesión</h2>

<?php	
	echo $form->create('User', array('url' => array('controller' => 'users', 'action' =>'login')));
	echo $form->input('User.username',array('label' => __('Usuario',true)));
	echo $form->input('User.password',array('label' => __('Clave',true)));
	echo $form->end('Entrar');
?>
