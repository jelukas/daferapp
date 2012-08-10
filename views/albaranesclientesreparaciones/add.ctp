<div class="albaranesclientesreparaciones">
    <?php echo $this->Form->create('Albaranesclientesreparacione', array('type' => 'file')); ?>
    <fieldset>
        <legend>
            <?php __('Nuevo Albarán de Reparación'); ?>
            <?php echo $this->Html->link(__('Listar Albaranes de Reparación', true), array('action' => 'index'), array('class' => 'button_link')); ?>
        </legend>
        <table class="view edit">
            <tr>
                <td colspan="6"></td>
                <td><span>Estado</span></td>
                <td><?php echo $this->Form->input('estadosalbaranesclientesreparacione_id', array('label' => false));?></td>
            </tr>
            <tr>
                <td><span><?php __('Número'); ?></span></td>
                <td><?php echo $this->Form->input('numero', array('value' => $numero, 'label' => false)); ?></td>
                <td><span><?php __('Fecha'); ?></span></td>
                <td><?php echo $this->Form->input('fecha', array('label' => false)); ?></td>
                <td><span><?php __('Almacén de los Materiales'); ?></span></td>
                <td><?php echo $this->Form->input('almacene_id', array('label' => false)); ?></td>
                <td><span><?php __('Comercial'); ?></span></td>
                <td><?php echo $this->Form->input('comerciale_id', array('label' => false)); ?></td>
            </tr>
            <tr>
                <td colspan="2">
                    <?php echo $this->Autocomplete->replace_select('Cliente', null, true, null); ?>
                </td>
                <?php
                echo $ajax->observeField('AlbaranesclientesreparacioneClienteId', array(
                    'frequency' => '1',
                    'update' => 'CentrostrabajoSelectDiv',
                    'url' => array(
                        'controller' => 'centrostrabajos',
                        'action' => 'selectAlbaranesclientesreparaciones'
                        ))
                );
                ?>
                <td>
                    <?php
                    echo $this->Form->input('centrostrabajo_id', array(
                        'label' => 'Centro de Trabajo',
                        'div' => array(
                            'id' => 'CentrostrabajoSelectDiv'
                        ),
                        'empty' => '--- Seleccione un centro de trabajo ---'));
                    echo $ajax->observeField('AvisostallereCentrostrabajoId', array(
                        'frequency' => '1',
                        'update' => 'MaquinaSelectDiv',
                        'url' => array(
                            'controller' => 'maquinas',
                            'action' => 'selectAvisostalleres'
                            ))
                    );
                    ?>
                </td>
                <td>
                    <?php
                    echo $this->Form->input('maquina_id', array(
                        'label' => 'Máquina',
                        'empty' => '--- Seleccione una máquina ---',
                        'div' => array(
                            'id' => 'MaquinaSelectDiv'
                        )
                    ));
                    ?>
                </td>
            </tr>
            <tr>
                <td><h4><?php __('Nº Orden'); ?></h4></td>
                <td>
                    <input type="text" readonly="true" value="" id="OrdeneNumero" />
                    <?php echo $this->Form->input('ordene_id', array('type' => 'hidden', 'label' => false,'readonly'=>true)); ?>
                    <?php echo $this->Html->link('Selecionar',array('controller'=>'ordenes','action'=>'index'), array('onClick'=>"window.open(this.href, this.target, 'width=300,height=400'); return false;")); ?>
                </td>
                <td colspan="3"><span><?php __('Número Aceptación Aportado por el Cliente') ?></span></td>
                <td><?php echo $this->Form->input('numero_aceptacion_aportado', array('label' => false)) ?></td>
            </tr>
            <tr>
                <td><span><?php __('Albarán de Reparación Escaneado'); ?></span></td>
                <td colspan="5"><?php echo $this->Form->input('file', array('type' => 'file')); ?></td>
            </tr>
            <tr>
                <td><span><?php __('Observaciones'); ?></span></td>
                <td colspan="5"><?php echo $this->Form->input('observaciones', array('label' => false)); ?></td>
            </tr>
            <tr>
                <td><span><?php __('Centro de Coste') ?></span></td>
                <td><?php echo $this->Form->input('centrosdecoste_id', array('label' => false)); ?></td>
                <td><span><?php __('Tipo de IVA') ?></span></td>
                <td><?php echo $this->Form->input('tiposiva_id', array('label' => false)); ?></td>
                <td><span><?php __('Facturable'); ?></span></td>
                <td><?php echo $this->Form->input('facturable', array('label' => false)); ?></td>
                <td><span><?php __('Es devolución') ?></span></td>
                <td><?php echo $this->Form->input('es_devolucion', array('label' => false)); ?></td>
            </tr>
        </table>
    </fieldset>
    <?php echo $this->Form->end(__('Guardar', true)); ?>
</div>