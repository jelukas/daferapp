<table>
            <tr>
                <th>Número</th>
                <th>Cliente</th>
                <th>Albarán escaneado</th>
                <th>Fecha</th>
                <th>Facturar</th>
            </tr>
            <?php if (!empty($albaranesclientes)): ?>
                <?php foreach ($albaranesclientes as $albaranescliente): ?>
                    <tr>
                        <td><?php echo $albaranescliente['Albaranescliente']['numeroalbaran'] ?></td>
                        <td><?php echo $albaranescliente['Cliente']['nombre'] ?></td>
                        <td><?php echo $albaranescliente['Albaranescliente']['albaranescaneado'] ?></td>
                        <td><?php echo $albaranescliente['Albaranescliente']['fecha'] ?></td>
                        <td><?php echo $albaranescliente['Albaranescliente']['id'] ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </table>