<?= $this->extend('layouts/admin_layout') ?>

<?= $this->section('content') ?>

<div class="row">
    <div class="col-md-4">
        <div class="card shadow-sm mb-4">
            <div class="card-header bg-dark text-white">Nuevo Género</div>
            <div class="card-body">
                <form action="<?= base_url('/admin/generos/guardar') ?>" method="POST">
                    <div class="mb-3">
                        <label class="form-label">Nombre del Género</label>
                        <input type="text" name="nombre_genero" class="form-control" placeholder="Ej: Ciencia Ficción" required>
                    </div>
                    <button type="submit" class="btn btn-warning w-100 fw-bold">Guardar</button>
                </form>
            </div>
        </div>
    </div>

    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-body">
                <table class="table table-hover align-middle">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre del Género</th>
                            <th class="text-end">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($generos as $g): ?>
                        <tr>
                            <td><?= $g['id_genero'] ?></td>
                            <td><?= $g['nombre_genero'] ?></td>
                            <td class="text-end">
                                <a href="<?= base_url('/admin/generos/eliminar/'.$g['id_genero']) ?>" 
                                   class="btn btn-sm btn-outline-danger" 
                                   onclick="return confirm('¿Eliminar este género?')">
                                    <i class="bi bi-trash"></i>
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>