
<?php
require_once 'inc/conexion.php';

$query = $pdo->query("SELECT * FROM autores ORDER BY apellido ASC");
$autores = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Autores</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
   
<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container">
        <a class="navbar-brand" href="index.php">Librería</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="index.php">Inicio</a></li>
                <li class="nav-item"><a class="nav-link" href="autores.php">Autores</a></li>
                <li class="nav-item"><a class="nav-link" href="contacto.php">Contacto</a></li>
            </ul>
        </div>
    </div>
</nav>


<div class="container mt-5">
    <h2 class="mb-4">Autores Registrados</h2>

    <?php if (count($autores) > 0): ?>
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            <?php foreach ($autores as $autor): ?>
                <div class="col">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title"><?= htmlspecialchars(trim($autor['nombre']) . ' ' . trim($autor['apellido'])) ?></h5>
                            <p class="card-text"><strong>Teléfono:</strong> <?= htmlspecialchars($autor['telefono']) ?></p>
                            <p class="card-text"><strong>Ciudad:</strong> <?= htmlspecialchars($autor['ciudad']) ?></p>
                            <p class="card-text"><strong>Estado:</strong> <?= htmlspecialchars($autor['estado']) ?></p>
                            <p class="card-text"><strong>País:</strong> <?= htmlspecialchars($autor['pais']) ?></p>
                            <p class="card-text"><strong>Código Postal:</strong> <?= htmlspecialchars($autor['cod_postal']) ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <p class="alert alert-warning">No hay autores disponibles en este momento.</p>
    <?php endif; ?>
</div>

</body>
</html>
