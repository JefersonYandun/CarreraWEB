<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simulación de Carrera</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            background-color: #f0f0f0;
        }
        nav {
            width: 100%;
            background-color: #333;
            padding: 10px 0;
        }
        nav ul {
            list-style: none;
            display: flex;
            justify-content: center;
            margin: 0;
            padding: 0;
        }
        nav ul li {
            margin: 0 15px;
        }
        nav ul li a {
            color: white;
            text-decoration: none;
            font-size: 1.2em;
        }
        nav ul li a:hover {
            text-decoration: underline;
        }
        .content {
            width: 80%;
            max-width: 800px;
            background-color: white;
            padding: 20px;
            margin-top: 20px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h1, h2 {
            color: #333;
        }
        input, button {
            margin: 5px 0;
            padding: 10px;
            font-size: 1em;
        }
        #corredoresList, #historialList {
            list-style-type: none;
            padding: 0;
        }
        #corredoresList li, #historialList li {
            padding: 5px 0;
        }
        .section {
            display: none;
        }
    </style>
</head>
<body>
    <nav>
        <ul>
            <li><a href="#listarCorredores" onclick="showSection('listarCorredores')">Listar Corredores</a></li>
            <li><a href="#agregarCorredor" onclick="showSection('agregarCorredor')">Agregar Corredor</a></li>
            <li><a href="#actualizarCorredor" onclick="showSection('actualizarCorredor')">Actualizar Corredor</a></li>
            <li><a href="#eliminarCorredor" onclick="showSection('eliminarCorredor')">Eliminar Corredor</a></li>
            <li><a href="#simularCarrera" onclick="showSection('simularCarrera')">Simular Carrera</a></li>
            <li><a href="#historialCarrera" onclick="showSection('historialCarrera')">Historial de Carrera</a></li>
        </ul>
    </nav>
    <div class="content">
        <h1>Simulación de Carrera</h1>
        <div id="listarCorredores" class="section">
            <h2>Corredores</h2>
            <ul id="corredoresList"></ul>
            <button onclick="getCorredores()">Listar Corredores</button>
        </div>
        <div id="agregarCorredor" class="section">
            <h2>Agregar Corredor</h2>
            <input type="text" id="nombre" placeholder="Nombre">
            <button onclick="addCorredor()">Agregar</button>
        </div>
        <div id="actualizarCorredor" class="section">
            <h2>Actualizar Corredor</h2>
            <input type="number" id="idCorredorActualizar" placeholder="ID del Corredor">
            <input type="text" id="nombreNuevo" placeholder="Nuevo Nombre">
            <button onclick="updateCorredor()">Actualizar</button>
        </div>
        <div id="eliminarCorredor" class="section">
            <h2>Eliminar Corredor</h2>
            <input type="number" id="idCorredorEliminar" placeholder="ID del Corredor">
            <button onclick="deleteCorredor()">Eliminar</button>
        </div>
        <div id="simularCarrera" class="section">
            <h2>Simular Carrera</h2>
            <input type="number" id="numeroCorredores" placeholder="Número de Corredores">
            <input type="number" id="distanciaCarrera" placeholder="Distancia de Carrera (km)">
            <button onclick="simularCarrera()">Simular</button>
            <pre id="resultado"></pre>
        </div>
        <div id="historialCarrera" class="section">
            <h2>Historial de Carrera</h2>
            <button onclick="getHistorial()">Obtener Historial</button>
            <ul id="historialList"></ul>
        </div>
    </div>

    <script src="cliente.js"></script>
    <script>
        function showSection(sectionId) {
            const sections = document.querySelectorAll('.section');
            sections.forEach(section => {
                section.style.display = section.id === sectionId ? 'block' : 'none';
            });
        }

        document.addEventListener('DOMContentLoaded', () => {
            // Show the first section by default
            showSection('listarCorredores');
        });
    </script>
</body>
</html>
