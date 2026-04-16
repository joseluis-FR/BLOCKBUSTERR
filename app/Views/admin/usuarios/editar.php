<?= $this->extend('layouts/admin_layout') ?>

<?= $this->section('content') ?>

<div class="row mb-4">
    <div class="col">
        <h2 class="fw-bold text-dark"><i class="bi bi-pencil-square me-2"></i>Editar Usuario: <?= $u['nombre_usuario'] ?></h2>
        <p class="text-muted small">Actualiza los datos personales o el nivel de acceso.</p>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card shadow-sm border-0">
            <div class="card-body p-4">
                <form action="<?= base_url('/admin/usuarios/actualizar/'.$u['id_usuario']) ?>" method="POST">
                    
                    <h5 class="text-primary mb-3 border-bottom pb-2">Datos Personales</h5>
                    <div class="row g-3 mb-4">
                        <div class="col-md-4">
                            <label class="form-label small fw-bold">Nombre(s)</label>
                            <input type="text" name="nombre" class="form-control" value="<?= $u['nombre_usuario'] ?>" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label small fw-bold">Ap. Paterno</label>
                            <input type="text" name="ap" class="form-control" value="<?= $u['ap_usuario'] ?>" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label small fw-bold">Ap. Materno</label>
                            <input type="text" name="am" class="form-control" value="<?= $u['am_usuario'] ?>">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-bold">Sexo</label>
                            <select name="sexo" class="form-select">
                                <option value="1" <?= ($u['sexo_usuario'] == 1) ? 'selected' : '' ?>>Masculino</option>
                                <option value="0" <?= ($u['sexo_usuario'] == 0) ? 'selected' : '' ?>>Femenino</option>
                            </select>
                        </div>
                    </div>

                    <h5 class="text-primary mb-3 border-bottom pb-2">Acceso y Seguridad</h5>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label small fw-bold">Correo Electrónico</label>
                            <input type="email" name="email" class="form-control" value="<?= $u['email_usuario'] ?>" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-bold">Rol Actual</label>
                            <select name="id_rol" class="form-select">
                                <option value="58" <?= ($u['id_rol'] == 58) ? 'selected' : '' ?>>Cliente</option>
                                <option value="125" <?= ($u['id_rol'] == 125) ? 'selected' : '' ?>>Operador</option>
                                <option value="745" <?= ($u['id_rol'] == 745) ? 'selected' : '' ?>>Administrador</option>
                            </select>
                        </div>
                        <div class="col-md-12">
                            <label class="form-label small fw-bold text-danger">Cambiar Contraseña (Solo si es necesario)</label>
                            <input type="password" name="password" class="form-control" placeholder="Escribe la nueva contraseña o deja en blanco para mantener la actual">
                        </div>
                    </div>

                    <div class="mt-5 d-flex justify-content-between border-top pt-4">
                        <a href="<?= base_url('/admin/usuarios') ?>" class="btn btn-light border">
                            <i class="bi bi-arrow-left me-1"></i> Regresar
                        </a>
                        <button type="submit" class="btn btn-primary px-5 fw-bold shadow-sm">
                            <i class="bi bi-save me-1"></i> Guardar Cambios
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>