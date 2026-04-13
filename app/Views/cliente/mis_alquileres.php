<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="row mb-4">
    <div class="col d-flex justify-content-between align-items-center">
        <h2 class="text-warning">Mis Películas Rentadas</h2>
        <a href="<?= base_url('/cliente/dashboard') ?>" class="btn btn-outline-warning btn-sm">Volver al Catálogo</a>
    </div>
</div>

<div class="table-responsive">
    <table class="table table-dark table-hover border-secondary">
        <thead>
            <tr>
                <th>Película</th>
                <th>Fecha Renta</th>
                <th>Vence el</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            <?php if(!empty($alquileres)): ?>
                <?php foreach($alquileres as $alquiler): ?>
                <tr>
                    <td>
                        <img src="<?= base_url('uploads/'.$alquiler['caratula_streaming']) ?>" width="50" class="me-2 rounded">
                        <?= $alquiler['nombre_streaming'] ?>
                    </td>
                    <td><?= $alquiler['fecha_inicio_alquiler'] ?></td>
                    <td class="text-info fw-bold"><?= $alquiler['fecha_fin_alquiler'] ?></td>
                    <td>
                        <?php if($alquiler['estatus_alquiler'] == -1): ?>
                            <span class="badge bg-success">Activa</span>
                        <?php else: ?>
                            <span class="badge bg-secondary">Finalizada</span>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4" class="text-center p-4 text-secondary">Aún no tienes rentas registradas.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?= $this->endSection() ?>