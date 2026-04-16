<?= $this->extend('layouts/admin_layout') ?>

<?= $this->section('content') ?>

<div class="card shadow-sm border-0">
    <div class="card-header bg-white py-3">
        <h5 class="mb-0 text-primary fw-bold">Formulario de Registro</h5>
    </div>
    <div class="card-body">
        <form action="<?= base_url('/admin/usuarios/guardar') ?>" method="POST">
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label class="form-label fw-bold">Nombre(s)</label>
                    <input type="text" name="nombre" class="form-control" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label fw-bold">Apellido Paterno</label>
                    <input type="text" name="ap_paterno" class="form-control" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label fw-bold">Apellido Materno</label>
                    <input type="text" name="ap_materno" class="form-control">
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Correo Electrónico</label>
                    <input type="email" name="email" class="form-control" placeholder="ejemplo@blockbuster.com" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Contraseña</label>
                    <input type="password" name="password" class="form-control" required>
                </div>

                <div class="col-md-4 mb-3">
                    <label class="form-label fw-bold">Género (Sexo)</label>
                    <select name="sexo" class="form-select" required>
                        <option value="1">Masculino</option>
                        <option value="0">Femenino</option>
                    </select>
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label fw-bold">Asignar Rol</label>
                    <select name="id_rol" class="form-select" required>
                        <?php foreach($roles as $r): ?>
                            <option value="<?= $r['id_rol'] ?>"><?= $r['nombre_rol'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label fw-bold">Asignar Plan</label>
                    <select name="id_plan" class="form-select">
                        <option value="">Sin plan (Solo registro)</option>
                        <?php foreach($planes as $p): ?>
                            <option value="<?= $p['id_plan'] ?>"><?= $p['nombre_plan'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <div class="text-end mt-4">
                <a href="<?= base_url('/admin/usuarios') ?>" class="btn btn-secondary me-2">Cancelar</a>
                <button type="submit" class="btn btn-primary px-4 fw-bold">Crear Usuario</button>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection() ?>