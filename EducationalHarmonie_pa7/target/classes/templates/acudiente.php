<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Acudiente - Educational Harmonie</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #C6DFF3;
            color: #143C5F;
            font-family: Arial, sans-serif;
        }
        .header-bar {
            background-color: #143C5F;
            color: white;
            padding: 15px 30px;
            font-size: 24px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .logout-btn {
            color: white;
            text-decoration: none;
            font-size: 16px;
        }
        .logout-btn:hover {
            text-decoration: underline;
        }
        .sidebar {
            background-color: white;
            width: 280px;
            padding: 20px;
            border-right: 2px solid #B2CDE6;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            box-shadow: 2px 0 5px rgba(0,0,0,0.1);
            margin-top: 70px;
        }
        .logo-container {
            text-align: center;
            margin-bottom: 20px;
        }
        .logo-container img {
            max-width: 60%;
            height: auto;
        }
        .menu-item {
            font-size: 16px;
            color: #143C5F;
            padding: 15px;
            border: 1px solid #B2CDE6;
            background-color: #E8F1F8;
            border-radius: 5px;
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 15px;
            text-decoration: none;
            color: inherit;
            transition: background-color 0.2s;
            cursor: pointer;
        }
        .menu-item:hover {
            background-color: #D4E4F2;
        }
        .menu-icon {
            font-size: 20px;
            color: #143C5F;
        }
        .content-area {
            margin-left: 300px;
            padding: 30px;
        }
        .filter-container {
            margin-bottom: 20px;
        }
        .watermark {
            position: absolute;
            top: 60%;
            left: 60%;
            transform: translate(-50%, -50%);
            opacity: 0.1;
            pointer-events: none;
            z-index: -1;
        }
        .watermark img {
            max-width: 80%;
            height: auto;
        }
    </style>
</head>
<body>

<!-- Encabezado -->
<div class="header-bar">
    <div><strong>PANEL DE ACUDIENTE</strong></div>
    <div><a href="logout.php" class="logout-btn"><i class="fas fa-sign-out-alt"></i> CERRAR SESIÓN</a></div>
</div>

<!-- Marca de agua -->
<div class="watermark">
    <img src="../static/img/logo.JPG.jpg" alt="Logo de Educational Harmonie">
</div>

<!-- Sidebar -->
<div class="sidebar">
    <div class="logo-container">
        <img src="../static/img/logo.JPG.jpg" alt="Logo">
    </div>

    <div class="menu-item" onclick="mostrarVista('quejas')">
        <i class="fas fa-file-alt menu-icon"></i>
        <span>Crear Queja</span>
    </div>
    <div class="menu-item" onclick="mostrarVista('historial')">
        <i class="fas fa-history menu-icon"></i>
        <span>Historial de Quejas</span>
    </div>
    <div class="menu-item" onclick="mostrarVista('notificaciones')">
        <i class="fas fa-bell menu-icon"></i>
        <span>Notificaciones</span>
    </div>
    <div class="menu-item" onclick="mostrarVista('calificar')">
        <i class="fas fa-star menu-icon"></i>
        <span>Calificar el Sistema</span>
    </div>
</div>

<!-- Contenido dinámico -->
<div class="content-area">
    <div id="quejas" style="display: none;">
        <h2>Formulario de Quejas</h2>
        <p><i>Contenido del formulario aquí o redirige a formulario.php</i></p>
    </div>

    <div id="historial" style="display: none;">
        <h2>Historial de Quejas</h2>
        <div class="filter-container">
            <input type="text" class="form-control" placeholder="Buscar por asunto o fecha" onkeyup="filtrarQuejas(this.value)">
        </div>
        <table class="table">
            <thead>
            <tr>
                <th>Fecha</th>
                <th>Asunto</th>
                <th>Estado</th>
            </tr>
            </thead>
            <tbody id="tablaQuejas">
                <tr>
                    <td>2024-10-25</td>
                    <td>Comportamiento inadecuado en la clase</td>
                    <td>Resuelta</td>
                </tr>
                <tr>
                    <td>2024-10-30</td>
                    <td>Queja por calificación</td>
                    <td>En proceso</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div id="notificaciones" style="display: none;">
        <h2>Notificaciones</h2>
        <p><i>Aquí se mostrarán las notificaciones importantes para el acudiente.</i></p>
    </div>

    <div id="calificar" style="display: none;">
        <h2>Calificar el Sistema</h2>
        <form>
            <div class="mb-3">
                <label for="calificacion" class="form-label">Calificación (1-5)</label>
                <input type="number" class="form-control" id="calificacion" min="1" max="5" required>
            </div>
            <div class="mb-3">
                <label for="comentario" class="form-label">Comentario</label>
                <textarea class="form-control" id="comentario" rows="3" placeholder="Deja tu opinión"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Enviar Calificación</button>
        </form>
    </div>
</div>

<script>
    function mostrarVista(vistaId) {
        const secciones = ['quejas', 'historial', 'notificaciones', 'calificar'];
        secciones.forEach(id => {
            document.getElementById(id).style.display = 'none';
        });
        document.getElementById(vistaId).style.display = 'block';
    }

    function filtrarQuejas(valor) {
        const texto = valor.toLowerCase();
        const filas = document.querySelectorAll("#tablaQuejas tr");
        filas.forEach(fila => {
            const contenido = fila.textContent.toLowerCase();
            fila.style.display = contenido.includes(texto) ? '' : 'none';
        });
    }
</script>

</body>
</html>
