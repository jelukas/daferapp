<!DOCTYPE html>
<html lang="es-ES">
    <head>
        <meta http-equiv="cache-control" content="no-store, no-cache, must-revalidate" />
        <meta http-equiv="Pragma" content="no-store, no-cache" />
        <meta http-equiv="Expires" content="0" />
        <?php echo $this->Html->charset(); ?>
        <title>
            <?php __('DAFER Gestión 1.0'); ?>
            <?php echo $title_for_layout; ?>
        </title>
        <?php
        echo $this->Html->meta('icon');
        echo $this->Html->css('cake.generic');
        echo $this->Html->css('menu_style');
        echo $this->Html->css('jquery-ui-1.8.16.custom');
        echo $this->Html->css('new_style');
        echo $this->Html->css('chosen');
        echo $this->Html->css('select2');
        echo $scripts_for_layout;
        echo $javascript->link(array('prototype'));
        echo $this->Javascript->link('jquery-1.6.2.min');
        echo $this->Javascript->link('jquery-ui-1.8.16.custom.min');
        echo $this->Javascript->link('dafer-script');
        echo $this->Javascript->link('chosen.jquery');
        echo $this->Javascript->link('select2.min');
        echo $javascript->link('jquery.form.js');
        ?>
    </head>
    <body>
        <div id="container">
            <div id="header">
                <?php echo $this->Html->image('logo_dafer.png', array('url' => array('controller' => 'pages', 'action' => 'index'))); ?>
            </div>
            <?php require_once '../plugins/menu.php'; ?>
            <div id="content">

                <?php echo $this->Session->flash(); ?>

                <?php echo $content_for_layout; ?>

            </div>
            <div id="footer">
                <?php echo 'Desarrollo Fundación GUADALUX' ?>
            </div>
        </div>
        <div id="dialog-modal" title="Dafer">
        </div>
        <div id="loading_background">
            <div id="loading_animation"></div>
        </div>
    </body>
</html>
