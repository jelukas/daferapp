<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
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
        echo $scripts_for_layout;
        echo $javascript->link(array('prototype'));
        echo $this->Javascript->link('jquery-1.6.2.min');
        echo $this->Javascript->link('jquery-ui-1.8.16.custom.min');
        echo $this->Javascript->link('dafer-script');
        echo $javascript->link('jquery.form.js');
        ?>
    </head>
    <body>
        <div id="container">
            <div id="header">
                <div id="header">
                    <h1><?php echo date("d/m/Y"); ?>&nbsp&nbsp</h1>
                </div>
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
    </body>
</html>
