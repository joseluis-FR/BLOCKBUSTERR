<?= $this->extend('layouts/admin_layout') ?>

<?= $this->section('content') ?>

<div class="row mb-4">
    <div class="col d-flex justify-content-between align-items-center">
        <h2 class="text-dark">Listado de Catálogo</h2>
        <a href="<?= base_url('/admin/streaming/crear') ?>" class="btn btn-primary fw-bold">
            <i class="bi bi-plus-circle me-1"></i> Agregar Nuevo
        </a>
    </div>
</div>

<div class="card shadow-sm">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Portada</th>
                        <th>Título</th>
                        <th>Clasificación</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($peliculas as $peli): ?>
                    <tr>
                        <td><?= $peli['id_streaming'] ?></td>
                        <td>
                            <img src="<?= base_url('uploads/'.$peli['caratula_streaming']) ?>" width="50" class="rounded shadow-sm">
                        </td>
                        <td>
                            <div class="fw-bold"><?= $peli['nombre_streaming'] ?></div>
                            <small class="text-muted text-truncate d-block" style="max-width: 250px;">
                                <?= $peli['sipnosis_streaming'] ?>
                            </small>
                        </td>
                        <td><span class="badge bg-secondary"><?= $peli['clasificacion_streaming'] ?></span></td>
                        <td>
                            <div class="btn-group">
                                <a href="#" class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil"></i></a>
                                <a href="#" class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></a>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection() ?>