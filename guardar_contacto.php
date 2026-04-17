
<?php
require_once 'inc/conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = trim($_POST['nombre']);
    $correo = trim($_POST['correo']);
    $asunto = trim($_POST['asunto']);
    $comentario = trim($_POST['comentario']);

    if (!empty($nombre) && !empty($correo) && !empty($asunto) && !empty($comentario)) {
        try {
            $stmt = $pdo->prepare("INSERT INTO contacto (nombre, correo, asunto, comentario) VALUES (?, ?, ?, ?)");
            $stmt->execute([$nombre, $correo, $asunto, $comentario]);
            echo "<script>alert('Comentario enviado con éxito.'); window.location.href = 'contacto.php';</script>";
        } catch (PDOException $e) {
            echo "Error al guardar los datos: " . $e->getMessage();
        }
    } else {
        echo "<script>alert('Todos los campos son obligatorios.'); window.location.href = 'contacto.php';</script>";
    }
} else {
    echo "Acceso no autorizado.";
}
?>
