<div class="avisostalleres">
    <h2><?php __('Aviso de Taller Nº ' . $avisostallere['Avisostallere']['numero']); ?>
        <?php echo $this->Html->link(__('Editar', true), array('action' => 'edit', $avisostallere['Avisostallere']['id']), array('class' => 'button_link')); ?>
        <?php echo $this->Html->link(__('Listar Avisos de Taller', true), array('action' => 'index'), array('class' => 'button_link')); ?>
        <?php echo $this->Html->link(__('Nuevo Aviso de Taller', true), array('action' => 'add'), array('class' => 'button_link')); ?>
        <?php echo $this->Html->link(__('Eliminar', true), array('action' => 'delete', $avisostallere['Avisostallere']['id']), array('class' => 'button_link'), sprintf(__('¿Desea borrar el Aviso de Repuestos Nº %s?', true), $avisostallere['Avisostallere']['numero'])); ?>
    </h2>
    <table class="view">
        <tr>
            <td>
                <span>Fecha:</span>
                <?php echo $avisostallere['Avisostallere']['fechaaviso'] ?>
            </td>
            <td>
                <span>Estado:</span>
                <?php echo $avisostallere['Estadosavisostallere']['estado'] ?>
            </td>
            <td>
                <span>Fecha de Aceptación:</span>
                <?php echo $avisostallere['Avisostallere']['fechaaceptacion'] ?>
            </td>
        </tr>
        <tr>
            <td>
                <span>Cliente:</span>
                <?php echo $this->Html->link($avisostallere['Cliente']['nombre'], array('controller' => 'clientes', 'action' => 'view', $avisostallere['Cliente']['id'])); ?>
            </td>
            <td>
                <span>Centro de Trabajo:</span>
                <?php echo $this->Html->link($avisostallere['Centrostrabajo']['centrotrabajo'], array('controller' => 'centrostrabajos', 'action' => 'view', $avisostallere['Centrostrabajo']['id'])); ?>
            </td>
            <td>
                <p>
                    <span>Máquina:</span>
                    <?php echo $this->Html->link($avisostallere['Maquina']['nombre'], array('controller' => 'maquinas', 'action' => 'view', $avisostallere['Maquina']['id'])); ?>
                </p>
                <p>
                    <span>Horas:</span>
                    <?php echo $avisostallere['Avisostallere']['horas_maquina']; ?>
                </p>
                <p>  
                    <span>Nº de Serie Máquina:</span>
                    <?php echo $avisostallere['Maquina']['serie_maquina']; ?>
                </p>
                <p>  
                    <span>Nº de Serie Motor:</span>
                    <?php echo $avisostallere['Maquina']['serie_motor'] ?>
                </p>
                <p>  
                    <span>Nº de Serie Transmisión:</span>
                    <?php $avisostallere['Maquina']['serie_transmision']; ?>
                </p>
            </td>
        </tr>
        <tr>
            <td>
                <span>Aviso:</span>
                <?php echo!empty($avisostallere['Avisostallere']['avisotelefonico']) ? 'Aviso Telefónico' : ''; ?>
                <?php echo!empty($avisostallere['Avisostallere']['avisoemail']) ? 'Aviso por Email' : ''; ?>
            </td>
            <td>
                <span>Solicita Presupuesto:</span>
                <?php echo!empty($avisostallere['Avisostallere']['solicitaresupuesto']) ? 'Sí' : 'No'; ?>
            </td>
            <td>
                <span>Urgente:</span>
                <?php echo!empty($avisostallere['Avisostallere']['marcarurgente']) ? 'Sí' : 'No'; ?>
            </td>
        </tr>

        <tr>
            <td>
                <span>Pendiente de Confirmar:</span>
                <?php echo!empty($avisostallere['Avisostallere']['pendienteconfirmar']) ? 'Sí' : 'No'; ?>
            </td>
            <td>
                <span>Confirmado por:</span>
                <?php echo $avisostallere['Avisostallere']['confirmadopor']; ?>
            </td>
            <td>
                <span>Enviar a:</span>
                <?php echo $avisostallere['Avisostallere']['enviara']; ?>
            </td>
        </tr>
        <tr>
            <td colspan="3">
                <span>Observaciones:</span>
                <?php echo $avisostallere['Avisostallere']['observaciones']; ?>
            </td>
        </tr>
        <tr>
            <td colspan="3">
                <span>Descripción:</span>
                <?php echo $avisostallere['Avisostallere']['descripcion']; ?>
            </td>
        </tr>
        <tr>
            <td colspan="3">
                <span>Documento Adjunto:</span>
                <?php echo $this->Html->link(__($avisostallere['Avisostallere']['documento'], true), '/files/avisostallere/' . $avisostallere['Avisostallere']['documento']); ?>
            </td>
        </tr>
    </table>    
</div>
<div style="display: block; margin: 10px 0;">
    <?php echo $this->Html->link(__('Nuevo Presupueso a Cliente', true), array('controller' => 'presupuestosclientes', 'action' => 'add', 'avisostallere', $avisostallere['Avisostallere']['id']), array('class' => 'button_link')); ?>
    <?php echo $this->Html->link(__('Nuevo Presupuesto de Proveedor', true), array('controller' => 'presupuestosproveedores', 'action' => 'add', -1, $avisostallere['Avisostallere']['id'], -1), array('class' => 'button_link')); ?>
    <?php if ($numOrdenes == 0): ?>
        <?php echo '<h3>Órdenes de Taller</h3>'; ?>
        <?php echo $this->Html->link(__('Generar Orden de taller', true), array('controller' => 'ordenes', 'action' => 'add', $avisostallere['Avisostallere']['id']), array('class' => 'button_link')); ?>
    <?php endif; ?>
</div>
<hr/>
<div class="datagrid">
    <table>
        <caption>Documentos Relacionados</caption>
        <thead>
            <tr><th>Tipo Documento</th><th>Número</th><th>Fecha</th><th>Cliente / Proveedor</th><th>Ver</th></tr>
        </thead>
        <tfoot>
            <tr><td colspan="5"></td></tr>
        </tfoot>
        <tbody>
            <?php
            $i = 0;
            foreach ($avisostallere['Ordene'] as $ordene):
                $class = null;
                $i++;
                if ($i % 2 == 0)
                    $class = ' class="alt"';
                ?>
                <tr <?php echo $class ?>>
                    <td>Orden</td>
                    <td><?php echo $ordene['numero'] ?></td>
                    <td><?php echo !empty($ordene['fecha'])? $this->Time->format('d-m-Y',$ordene['fecha']) : '' ?></td>
                    <td><?php echo $avisostallere['Cliente']['nombre'] ?></td>
                    <td><?php echo $this->Html->link('Ver',array('controller'=>'ordenes','action'=>'view',$ordene['id']),array('class'=>'button_brownie')) ?></td>
                </tr>
            <?php endforeach; ?>
            <?php
            foreach ($avisostallere['Presupuestoscliente'] as $presupuestoscliente):
                $class = null;
                $i++;
                if ($i % 2 == 0)
                    $class = ' class="alt"';
                ?>
                <tr <?php echo $class ?>>
                    <td>Presupuesto a Cliente</td>
                    <td><?php echo $presupuestoscliente['numero'] ?></td>
                    <td><?php echo !empty($presupuestoscliente['fecha'])? $this->Time->format('d-m-Y',$presupuestoscliente['fecha']) : '' ?></td>
                    <td><?php echo $presupuestoscliente['Cliente']['nombre'] ?></td>
                    <td><?php echo $this->Html->link('Ver',array('controller'=>'presupuestosclientes','action'=>'view',$presupuestoscliente['id']),array('class'=>'button_brownie')) ?></td>
                </tr>
            <?php endforeach; ?>
            <?php
            foreach ($avisostallere['Presupuestosproveedore'] as $presupuestosproveedore):
                $class = null;
                $i++;
                if ($i % 2 == 0)
                    $class = ' class="alt"';
                ?>
                <tr <?php echo $class ?>>
                    <td>Presupuesto a Proveedor</td>
                    <td><?php echo $presupuestosproveedore['numero'] ?></td>
                    <td><?php echo !empty($presupuestosproveedore['fecha'])? $this->Time->format('d-m-Y',$presupuestosproveedore['fecha']) : '' ?></td>
                    <td><?php echo $presupuestosproveedore['Proveedore']['nombre'] ?></td>
                    <td><?php echo $this->Html->link('Ver',array('controller'=>'presupuestosproveedores','action'=>'view',$presupuestosproveedore['id']),array('class'=>'button_brownie')) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>