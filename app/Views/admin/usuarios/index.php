<?= $this->extend('layouts/admin_layout') ?>

<?= $this->section('content') ?>

<div class="row mb-4">
    <div class="col d-flex justify-content-between align-items-center">
        <div>
            <h2 class="fw-bold text-dark mb-0">Gestión de Usuarios</h2>
            <p class="text-muted small">Administra los accesos, roles y perfiles del personal y clientes.</p>
        </div>
        <button type="button" class="btn btn-primary fw-bold shadow-sm" data-bs-toggle="modal" data-bs-target="#modalAgregarUsuario">
            <i class="bi bi-person-plus-fill me-1"></i> Nuevo Usuario
        </button>
    </div>
</div>

<?php if(session()->getFlashdata('success')): ?>
    <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm" role="alert">
        <i class="bi bi-check-circle-fill me-2"></i> <?= session()->getFlashdata('success') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>

<div class="card shadow-sm border-0">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="ps-4">ID</th>
                        <th>Nombre Completo</th>
                        <th>Sexo</th>
                        <th>Correo Electrónico</th>
                        <th>Rol</th>
                        <th>Plan</th>
                        <th class="text-end pe-4">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($usuarios as $u): ?>
                    <tr>
                        <td class="ps-4"><span class="text-muted small">#<?= $u['id_usuario'] ?></span></td>
                        <td>
                            <div class="fw-bold"><?= $u['nombre_usuario'] ?> <?= $u['ap_usuario'] ?> <?= $u['am_usuario'] ?></div>
                        </td>
                        <td>
                            <?php if($u['sexo_usuario'] == 1): ?>
                                <span class="badge bg-light text-primary border"><i class="bi bi-gender-male me-1"></i>Masculino</span>
                            <?php else: ?>
                                <span class="badge bg-light text-danger border"><i class="bi bi-gender-female me-1"></i>Femenino</span>
                            <?php endif; ?>
                        </td>
                        <td><?= $u['email_usuario'] ?></td>
                        <td>
                            <?php 
                                $badgeClass = ($u['id_rol'] == 745) ? 'bg-danger' : (($u['id_rol'] == 125) ? 'bg-primary' : 'bg-secondary');
                            ?>
                            <span class="badge <?= $badgeClass ?>"><?= $u['nombre_rol'] ?></span>
                        </td>
                        <td>
                            <?= $u['nombre_plan'] ?? '<span class="text-muted small"><em>Sin plan</em></span>' ?>
                        </td>
                        <td class="text-end pe-4">
                            <div class="d-flex justify-content-end align-items-center">
                                <a href="<?= base_url('/admin/usuarios/editar/'.$u['id_usuario']) ?>" class="btn btn-sm btn-outline-primary me-2" title="Editar datos completos">
                                    <i class="bi bi-pencil-square"></i>
                                </a>

                                <form action="<?= base_url('/admin/usuarios/cambiar_rol/'.$u['id_usuario']) ?>" method="POST" class="d-inline-flex">
                                    <select name="id_rol" class="form-select form-select-sm me-2" style="width: auto;">
                                        <option value="58" <?= ($u['id_rol'] == 58) ? 'selected' : '' ?>>Cliente</option>
                                        <option value="125" <?= ($u['id_rol'] == 125) ? 'selected' : '' ?>>Operador</option>
                                        <option value="745" <?= ($u['id_rol'] == 745) ? 'selected' : '' ?>>Admin</option>
                                    </select>
                                    <button type="submit" class="btn btn-sm btn-dark" onclick="return confirm('¿Seguro que quieres cambiar el permiso de este usuario?')">
                                        Actualizar
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="modalAgregarUsuario" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content border-0 shadow">
            <div class="modal-header bg-dark text-white">
                <h5 class="modal-title" id="modalLabel"><i class="bi bi-person-plus me-2"></i>Registrar Nuevo Usuario</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('/admin/usuarios/guardar') ?>" method="POST">
                <div class="modal-body p-4">
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label class="form-label small fw-bold text-uppercase text-muted">Nombre(s)</label>
                            <input type="text" name="nombre" class="form-control" placeholder="Nombre" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label small fw-bold text-uppercase text-muted">Ap. Paterno</label>
                            <input type="text" name="ap" class="form-control" placeholder="Apellido" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label small fw-bold text-uppercase text-muted">Ap. Materno</label>
                            <input type="text" name="am" class="form-control" placeholder="Apellido">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label small fw-bold text-uppercase text-muted">Sexo</label>
                            <select name="sexo" class="form-select" required>
                                <option value="" selected disabled>Seleccione...</option>
                                <option value="1">Masculino</option>
                                <option value="0">Femenino</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-bold text-uppercase text-muted">Asignar Rol</label>
                            <select name="id_rol" class="form-select" required>
                                <option value="58">Cliente</option>
                                <option value="125">Operador</option>
                                <option value="745">Administrador</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label small fw-bold text-uppercase text-muted">Correo Electrónico</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                                <input type="email" name="email" class="form-control" placeholder="ejemplo@correo.com" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-bold text-uppercase text-muted">Contraseña Temporal</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-key"></i></span>
                                <input type="password" name="password" class="form-control" placeholder="Min. 6 caracteres" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer bg-light">
                    <button type="button" class="btn btn-link text-muted text-decoration-none" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary px-4 shadow-sm">Guardar Usuario</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>