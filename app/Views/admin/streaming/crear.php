<?= $this->extend('layouts/admin_layout') ?>

<?= $this->section('content') ?>
<div class="card p-4 shadow-sm">
    <form action="<?= base_url('/admin/streaming/guardar') ?>" method="POST">
        <div class="row">
            <div class="col-md-6 mb-3">
                <label>Nombre de la Película/Serie</label>
                <input type="text" name="nombre" class="form-control" required>
            </div>
            <div class="col-md-6 mb-3">
                <label>Género</label>
                <select name="id_genero" class="form-select">
                    <?php foreach($generos as $g): ?>
                        <option value="<?= $g['id_genero'] ?>"><?= $g['nombre_genero'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="mb-3">
            <label>Sipnosis</label>
            <textarea name="sipnosis" class="form-control" rows="3" required></textarea>
        </div>
        <div class="row">
            <div class="col-md-4 mb-3">
                <label>Clasificación</label>
                <input type="text" name="clasificacion" class="form-control" placeholder="Ej: B15">
            </div>
            <div class="col-md-4 mb-3">
                <label>Tipo</label>
                <select name="tipo" class="form-select">
                    <option value="1">Película</option>
                    <option value="2">Serie</option>
                </select>
            </div>
            <div class="col-md-4 mb-3">
                <label>URL de Carátula</label>
                <input type="text" name="caratula" class="form-control" placeholder="https://...">
            </div>
        </div>
        <button type="submit" class="btn btn-warning fw-bold">Guardar Contenido</button>
        <a href="<?= base_url('/admin/streaming') ?>" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
<?= $this->endSection() ?>  