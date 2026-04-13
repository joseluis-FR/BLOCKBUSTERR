<?= $this->extend('layouts/admin_layout') ?>

<?= $this->section('content') ?>

<div class="row">
    <div class="col-md-4">
        <div class="card shadow-sm border-0 mb-4">
            <div class="card-header bg-dark text-white fw-bold">
                <i class="bi bi-plus-circle me-2"></i>Nuevo Plan
            </div>
            <div class="card-body">
                <form action="<?= base_url('/admin/planes/guardar') ?>" method="POST">
                    
                    <div class="mb-3">
                        <label class="form-label fw-bold">Nombre del Plan</label>
                        <input type="text" name="nombre_plan" class="form-control" placeholder="Ej: Plan Bronce" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Tipo y Duración</label>
                        <input type="text" name="tipo_plan" class="form-control" placeholder="Ej: Básico (1 mes)" required>
                        <div class="form-text text-muted">Sigue el formato: Nombre (Duración)</div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Límite Rentas</label>
                            <input type="number" name="cantidad_limite_plan" class="form-control" placeholder="Ej: 5" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Precio ($)</label>
                            <input type="number" step="0.01" name="precio_plan" class="form-control" placeholder="0.00" required>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-warning w-100 fw-bold">Guardar Plan</button>
                </form>
            </div>
        </div>
    </div>

    <div class="col-md-8">
        <div class="card shadow-sm border-0">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>Nombre</th>
                                <th>Tipo (Duración)</th>
                                <th>Límite</th>
                                <th>Precio</th>
                                <th>Estado</th>
                                <th class="text-end">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($planes as $p): ?>
                            <tr>
                                <td><span class="fw-bold"><?= $p['nombre_plan'] ?></span></td>
                                <td><span class="badge bg-info text-dark"><?= $p['tipo_plan'] ?></span></td>
                                <td><?= $p['cantidad_limite_plan'] ?> películas</td>
                                <td class="text-success fw-bold">$<?= number_format($p['precio_plan'], 2) ?></td>
                                <td>
                                    <?php if($p['estatus_plan'] == 1): ?>
                                        <span class="badge bg-success">Activo</span>
                                    <?php else: ?>
                                        <span class="badge bg-danger">Inactivo</span>
                                    <?php endif; ?>
                                </td>
                                <td class="text-end">
                                    <a href="<?= base_url('/admin/planes/eliminar/'.$p['id_plan']) ?>" 
                                       class="btn btn-sm btn-outline-danger" 
                                       onclick="return confirm('¿Estás seguro de eliminar este plan?')">
                                        <i class="bi bi-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php endforeach; ?>

                            <?php if(empty($planes)): ?>
                            <tr>
                                <td colspan="6" class="text-center py-4 text-muted">No hay planes configurados todavía.</td>
                            </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>