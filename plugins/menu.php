<?php echo $this->Html->css('menu.style'); ?>

<div class="nav-container-outer">
    <ul id="nav-container" class="nav-container">
        <?php if (!empty($_SERVER['HTTP_REFERER'])): ?>
            <li><span class="divider divider-vert" ></span></li>
            <li><a class="item-primary" href="<?php echo $_SERVER['HTTP_REFERER'] ?>" target="_self">Volver</a>
            <?php endif; ?>
        </li><li><span class="divider divider-vert" ></span></li>
        <li><a class="item-primary" href="/daferapp/avisostalleres/mapa" target="_self">Avisos</a>
            <ul>                    
                <li><a href="/daferapp/avisostalleres" title="Avisos de Taller" target="_self" >Avisos de taller</a></li>
                <li><a href="/daferapp/avisostalleres/mapa" title="Mapa Avisos de Taller" target="_self" >Mapa de Avisos de Taller</a></li>
                <li><a href="/daferapp/avisosrepuestos" title="Avisos de repuestos" target="_self" >Avisos de repuestos</a></li>
                <li><a href="/daferapp/avisosrepuestos/mapa" title="Mapa Avisos de Repuestos" target="_self" >Mapa de Avisos de Repuestos</a></li>
            </ul>
        </li>
        <li><span class="divider divider-vert" ></span></li>
        <li><a class="item-primary" href="/daferapp/ordenes/mapa" target="_self">&Oacute;rdenes</a>
            <ul>
                <li><a href="/daferapp/ordenes" target="_self">Listado de &oacute;rdenes</a></li>
                <li><a href="/daferapp/ordenes/mapa" target="_self">Mapa de &oacute;rdenes</a></li>
                <li><a href="/daferapp/events/calendario" title="Calendario de Tareas" target="_self">Calendario de Tareas</a></li>
                <li><a href="/daferapp/tareas" target="_self">Listado de Tareas</a></li>
            </ul>
        </li>
        <li><span class="divider divider-vert" ></span></li>
        <li><a class="item-primary" href="#" target="_self">Compras</a>
            <ul>
                <li><a href="/daferapp/presupuestosproveedores" title="Presupuestos a proveedores" target="_self" >Presupuestos a proveedores</a></li>
                <li><a href="/daferapp/pedidosproveedores" title="Pedidos a proveedores" target="_self" >Pedidos a proveedores</a></li>
                <li><a href="/daferapp/albaranesproveedores" title="Albaranes de compra" target="_self" >Albaranes de compra</a></li>
                <li><a href="/daferapp/albaranesproveedores/facturacion" title="Facturación de Albaranes" target="_self" >Facturación de Albaranes</a></li>
                <li><a href="/daferapp/facturasproveedores" title="Facturas de compra" target="_self" >Facturas de compra</a></li>
            </ul>
        </li>
        <li><span class="divider divider-vert" ></span></li>
        <li><a class="item-primary" href="#" target="_self">Ventas</a>
            <ul>
                <li><a href="/daferapp/presupuestosclientes" title="Presupuestos a clientes" target="_self" >Presupuestos a clientes</a></li>
                <li><a href="/daferapp/pedidosclientes" title="Pedidos de clientes" target="_self" >Pedidos de clientes</a></li>
                <li><a href="/daferapp/albaranesclientes" title="Albaranes de Repuestos" target="_self" >Albaranes de Repuestos</a></li>
                <li><a href="/daferapp/albaranesclientesreparaciones" title="Albaranes de Reparación" target="_self" >Albaranes de Reparación</a></li>
                <li><a href="/daferapp/albaranesclientes/facturacion" title="Facturación de Albaranes" target="_self" >Facturación de Albaranes</a></li>
                <li><a href="/daferapp/facturas_clientes" title="Facturas de venta" target="_self" >Facturas de venta</a></li>
            </ul>
        </li>
        <li><span class="divider divider-vert" ></span></li>
        <li><a class="item-primary" href="#" target="_self">Maestros</a>
            <ul>
                <li><a href="/daferapp/almacenes" title="Almacenes" target="_self" >Almacenes</a></li>
                <li><a href="/daferapp/articulos" title="Art&iacute;culos" target="_self" >Art&iacute;culos</a></li>
                <li><a href="/daferapp/centrostrabajos" title="Centros de Trabajo" target="_self" >Centros de Trabajo</a></li>	
                <li><a href="/daferapp/clientes" title="Clientes" target="_self" >Clientes</a></li>
                <li><a href="/daferapp/comerciales" title="Comerciales" target="_self" >Comerciales</a></li>
                <li><a href="/daferapp/comerciales_proveedores" title="Comerciales Proveedores" target="_self" >Comerciales Proveedores</a></li>
                <li><a href="/daferapp/formapagos" title="Formas de Pago" target="_self" >Formas de pago</a></li>
                <li><a href="/daferapp/maquinas" title="M&aacute;quinas" target="_self" >M&aacute;quinas</a></li>
                <li><a href="/daferapp/mecanicos" title="Mec&aacute;nicos" target="_self" >Mec&aacute;nicos</a></li>
                <li><a href="/daferapp/proveedores" title="Proveedores" target="_self" >Proveedores</a></li>
                <li><a href="/daferapp/transportistas" title="Transportistas" target="_self" >Transportistas</a></li>
            </ul>
        </li>
        <li><span class="divider divider-vert" ></span></li>
        <li><a class="item-primary" href="#" target="_self">Opciones</a>
            <ul>
                <!--<li><a href="recordatorio.php?opt=add   "title="Recordatorio" target="_self" >Recordatorio</a></li>-->
                <li><a href="/daferapp/users" title="Usuarios" target="_self">Usuarios</a></li>
                <li><a href="/daferapp/roles" title="Roles" target="_self">Roles</a></li>
                <li><a href="/daferapp/restricciones" title="Restricciones" target="_self">Restricciones</a></li>
                <li><a href="/daferapp/centrosdecostes" title="Tipos de IVA" target="_self">Centros de Coste</a></li>
                <li><a href="/daferapp/tiposivas" title="Tipos de IVA" target="_self">Tipos de IVA</a></li>
                <li><a href="/daferapp/configs/edit/1" title="Configuración" target="_self" >Configuración</a></li>
            </ul>
        </li>

        <li><span class="divider divider-vert" ></span></li>
        <li><a class="item-primary" href="/daferapp/users/logout" target="_self">Cerrar Sesión</a>

        <li><span class="divider divider-vert" ></span></li>
        <li class="clear"> </li>
    </ul>
</div>
