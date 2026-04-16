<?= $this->extend('layouts/admin_layout') ?>

<?= $this->section('content') ?>

<div class="row">
    <div class="col-md-6">
        <div class="card border-0 shadow-sm bg-info text-white mb-4">
            <div class="card-body d-flex justify-content-between align-items-center p-4">
                <div>
                    <h5 class="card-title text-uppercase mb-0">Validar Pagos</h5>
                    <p class="display-6 fw-bold mb-0">Pendientes</p>
                </div>
                <i class="bi bi-cash-stack fs-1 opacity-50"></i>
            </div>
            <div class="card-footer bg-transparent border-0 d-flex align-items-center justify-content-between">
                <a class="text-white stretched-link text-decoration-none small" href="<?= base_url('/operador/validar') ?>">Ir a Validaciones</a>
                <i class="bi bi-arrow-right-circle"></i>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card border-0 shadow-sm bg-secondary text-white mb-4">
            <div class="card-body d-flex justify-content-between align-items-center p-4">
                <div>
                    <h5 class="card-title text-uppercase mb-0">Clientes Activos</h5>
                    <p class="display-6 fw-bold mb-0">Ver Lista</p>
                </div>
                <i class="bi bi-people-fill fs-1 opacity-50"></i>
            </div>
            <div class="card-footer bg-transparent border-0 d-flex align-items-center justify-content-between">
                <a class="text-white stretched-link text-decoration-none small" href="<?= base_url('/admin/usuarios') ?>">Ver Clientes</a>
                <i class="bi bi-arrow-right-circle"></i>
            </div>
        </div>
    </div>
</div>

<div class="alert alert-light border-0 shadow-sm">
    <h4 class="alert-heading fw-bold"><i class="bi bi-info-circle me-2"></i>Área de Trabajo de Operador</h4>
    <p>Hola <strong><?= session()->get('nombre') ?? 'Marcos' ?></strong>, recuerda que tu responsabilidad principal es autorizar los accesos de los clientes una vez que confirmen su pago simulado.</p>
</div>

<?= $this->endSection() ?>