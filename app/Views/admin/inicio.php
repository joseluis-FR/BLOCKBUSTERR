<?= $this->extend('layouts/admin_layout') ?>

<?= $this->section('content') ?>

<div class="row">
    <div class="col-md-4">
        <div class="card bg-primary text-white mb-4">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <h5 class="card-title">Películas</h5>
                    <p class="display-6">12</p> </div>
                <i class="bi bi-film fs-1 opacity-50"></i>
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between small">
                <a class="text-white stretched-link" href="<?= base_url('/admin/streaming') ?>">Ver Catálogo</a>
                <i class="bi bi-chevron-right"></i>
            </div>
        </div>
    </div>
    
    <div class="col-md-4">
        <div class="card bg-success text-white mb-4">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <h5 class="card-title">Usuarios</h5>
                    <p class="display-6">45</p>
                </div>
                <i class="bi bi-people fs-1 opacity-50"></i>
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between small">
                <a class="text-white stretched-link" href="#">Gestionar Usuarios</a>
                <i class="bi bi-chevron-right"></i>
            </div>
        </div>
    </div>
</div>

<div class="alert alert-info border-0 shadow-sm">
    <h4 class="alert-heading">¡Bienvenido al Centro de Control!</h4>
    <p>Desde aquí puedes gestionar todo el ecosistema de Blockbuster. Usa el menú lateral para navegar entre los módulos.</p>
</div>

<?= $this->endSection() ?>