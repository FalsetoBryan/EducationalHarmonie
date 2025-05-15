<?php
// Conexión a la base de datos
$conexion = mysqli_connect("localhost", "root", "", "sistema_educativo");

// Verificar la conexión
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

// Variables para mostrar
$mensaje = "";
$historial = [];

// Procesar formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_estudiante = $_POST['id_estudiante'];
    $tipo_falta = $_POST['tipo_falta'];

    // Consulta para obtener reincidencias
    $consulta = "SELECT reincidencia 
                 FROM faltas 
                 WHERE id_estudiante = '$id_estudiante' AND tipo_falta = '$tipo_falta'";
    $resultado = $conexion->query($consulta);

    if ($resultado && $resultado->num_rows > 0) {
        $total_reincidencias = 0;
        while ($row = $resultado->fetch_assoc()) {
            $total_reincidencias += $row['reincidencia'];
            $historial[] = $row;
        }
        $mensaje = "El estudiante ha reincidido <strong>$total_reincidencias</strong> veces en faltas de tipo <strong>$tipo_falta</strong>.";
    } else {
        $mensaje = "No hay reincidencias registradas para este estudiante en faltas de tipo <strong>$tipo_falta</strong>.";
    }
}

// Obtener lista de estudiantes para el formulario
$estudiantes = $conexion->query("SELECT id_estudiante, nombre FROM estudiantes");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Consulta de Reincidencias</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card shadow-lg">
                <div class="card-header text-center bg-primary text-white">
                    <h4>Consulta de Reincidencias</h4>
                </div>
                <div class="card-body">

                    <form method="POST" action="">
                        <div class="mb-3">
                            <label for="id_estudiante" class="form-label">Selecciona Estudiante:</label>
                            <select name="id_estudiante" class="form-select" required>
                                <option value="">Selecciona un estudiante</option>
                                <?php while($row = $estudiantes->fetch_assoc()) { ?>
                                    <option value="<?php echo $row['id_estudiante']; ?>">
                                        <?php echo $row['nombre']; ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="tipo_falta" class="form-label">Selecciona Tipo de Falta:</label>
                            <select name="tipo_falta" class="form-select" required>
                                <option value="">Selecciona tipo de falta</option>
                                <option value="Leve">Leve</option>
                                <option value="Grave">Grave</option>
                                <option value="Moderada">Moderada</option>
                            </select>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-success">Consultar Reincidencias</button>
                            <a href="" class="btn btn-secondary">Limpiar</a>
                        </div>
                    </form>

                    <?php if (!empty($mensaje)) { ?>
                        <div class="alert alert-info mt-4" role="alert">
                            <?php echo $mensaje; ?>
                        </div>
                    <?php } ?>

                    <?php if (!empty($historial)) { ?>
                        <h5 class="mt-4">Historial Detallado:</h5>
                        <table class="table table-bordered table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>Reincidencias</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($historial as $index => $item) { ?>
                                    <tr>
                                        <td><?php echo $index + 1; ?></td>
                                        <td><?php echo $item['reincidencia']; ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    <?php } ?>

                </div>
            </div>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
