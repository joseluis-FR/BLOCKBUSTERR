<?= $this->extend('layouts/admin_layout') ?>

<?= $this->section('content') ?>

<div class="d-flex justify-content-end mb-4">
    <a href="<?= base_url('/admin/usuarios/crear') ?>" class="btn btn-warning fw-bold shadow-sm">
        <i class="bi bi-person-plus-fill me-2"></i> Nuevo Usuario
    </a>
</div>
<div class="card shadow-sm border-0">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Rol Actual</th>
                        <th>Plan</th>
                        <th class="text-end">Cambiar Rol</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($usuarios as $u): ?>
                    <tr>
                        <td>
                            <div class="fw-bold"><?= $u['nombre_usuario'] ?></div>
                            <small class="text-muted">ID: #<?= $u['id_usuario'] ?></small>
                        </td>
                        <td><?= $u['email_usuario'] ?></td>
                        <td>
                            <?php 
                                $clase = ($u['id_rol'] == 745) ? 'bg-danger' : (($u['id_rol'] == 125) ? 'bg-primary' : 'bg-secondary');
                            ?>
                            <span class="badge <?= $clase ?>"><?= $u['nombre_rol'] ?></span>
                        </td>
                        <td><?= $u['nombre_plan'] ?? '<span class="text-muted">Sin plan</span>' ?></td>
                        <td class="text-end">
                            <form action="<?= base_url('/admin/usuarios/cambiar_rol/'.$u['id_usuario']) ?>" method="POST" class="d-inline-flex">
                                <select name="id_rol" class="form-select form-select-sm me-2" style="width: auto;">
                                    <option value="58" <?= ($u['id_rol'] == 58) ? 'selected' : '' ?>>Cliente</option>
                                    <option value="125" <?= ($u['id_rol'] == 125) ? 'selected' : '' ?>>Operador</option>
                                    <option value="745" <?= ($u['id_rol'] == 745) ? 'selected' : '' ?>>Admin</option>
                                </select>
                                <button type="submit" class="btn btn-sm btn-dark">Actualizar</button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection() ?>