<!DOCTYPE html>
<html>
<head>
    <title><?= $titulo ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="alert alert-info">
            <h1>🎧 Panel de Operador</h1>
            <p>Bienvenido, <strong><?= $nombre ?></strong>. Tu tarea es validar pagos y clientes.</p>
            <hr>
            <a href="<?= base_url('/salir') ?>" class="btn btn-danger">Cerrar Sesión</a>
        </div>
    </div>
</body>
</html>