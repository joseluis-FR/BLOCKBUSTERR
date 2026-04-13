<?php foreach($pagos as $p): ?>
<tr>
    <td><strong><?= $p['nombre_usuario'] ?></strong></td>
    <td><span class="badge bg-info text-dark"><?= $p['nombre_plan'] ?></span></td>
    <td class="text-success fw-bold">$<?= number_format($p['monto_pago'], 2) ?></td>
    <td>
        <small class="text-muted d-block">Fecha: <?= $p['fecha_registro_pago'] ?></small>
        <small class="text-muted">Tarjeta: **** <?= substr($p['tarjeta_pago'], -4) ?></small>
    </td>
    <td class="text-center">
        <a href="<?= base_url('/operador/aprobar/'.$p['id_pago']) ?>" class="btn btn-sm btn-success fw-bold">
            Autorizar
        </a>
    </td>
</tr>
<?php endforeach; ?>