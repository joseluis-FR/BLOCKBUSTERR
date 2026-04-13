<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="row mb-4">
    <div class="col">
        <h2 class="text-warning">Catálogo para ti</h2>
        <p class="text-secondary">Explora nuestros últimos estrenos y alquila tus favoritos.</p>
    </div>
</div>

<?php if(session()->getFlashdata('success')): ?>
    <div class="alert alert-success alert-dismissible fade show"><?= session()->getFlashdata('success') ?></div>
<?php endif; ?>

<div class="row row-cols-1 row-cols-md-3 g-4">
    <?php if(!empty($peliculas)): ?>
        <?php foreach($peliculas as $peli): ?>
        <div class="col">
            <div class="card bg-dark border-secondary h-100">
                <img src="<?= $peli['caratula_streaming'] ?>" class="card-img-top" alt="Carátula" style="height: 350px; object-fit: cover;">
                <div class="card-body">
                    <h5 class="card-title text-warning"><?= $peli['nombre_streaming'] ?></h5>
                    <p class="card-text small text-secondary"><?= $peli['sipnosis_streaming'] ?></p>
                    <div class="d-grid mt-3">
                        <a href="<?= base_url('/rentar/'.$peli['id_streaming']) ?>" class="btn btn-warning fw-bold">Rentar</a>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    <?php else: ?>
        <div class="col-12 text-center">
            <p>No hay películas disponibles en este momento.</p>
        </div>
    <?php endif; ?>
</div>

<?= $this->endSection() ?>