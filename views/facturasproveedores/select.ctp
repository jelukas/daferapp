<?php

echo $this->Form->input('Devolucionesproveedore.facturasproveedore_id', array(
                        'label' => 'Factura de proveedor',
                        'div' => null,
                        'empty' => '--- Seleccione Factura ---')
                );
echo $ajax->observeField('DevolucionesproveedoreFacturasproveedoreId', array(
                        'frequency' => '1',
                        'update' => 'AlbaranesproveedoreSelectDiv',
                        'url' => array(
                            'controller' => 'Albaranesproveedores',
                            'action' => 'select'
                        ))
                );

?>