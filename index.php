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
        .btn {
            display: inline-block;
            padding: 0.9rem 1.8rem;
            font-size: 16px;
            font-weight: 700;
            color: white;
            border: 3px solid rgb(252, 70, 100);
            cursor: pointer;
            position: relative;
            background-color: transparent;
            text-decoration: none;
            overflow: hidden;
            z-index: 1;
            font-family: inherit;
        }
        .btn::before {
            content: "";
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgb(252, 70, 100);
            transform: translateX(-100%);
            transition: all .3s;
            z-index: -1;
        }
        .btn:hover::before {
            transform: translateX(0);
        }
    </style>
</head>
<body>
    <nav>
        <ul>
            <li><a href="#listarCorredores" class="btn" onclick="showSection('listarCorredores')">Listar Corredores</a></li>
            <li><a href="#agregarCorredor" class="btn" onclick="showSection('agregarCorredor')">Agregar Corredor</a></li>
            <li><a href="#actualizarCorredor" class="btn" onclick="showSection('actualizarCorredor')">Actualizar Corredor</a></li>
            <li><a href="#eliminarCorredor" class="btn" onclick="showSection('eliminarCorredor')">Eliminar Corredor</a></li>
            <li><a href="#simularCarrera" class="btn" onclick="showSection('simularCarrera')">Simular Carrera</a></li>
            <li><a href="#historialCarrera" class="btn" onclick="showSection('historialCarrera')">Historial de Carrera</a></li>
        </ul>
    </nav>
    <div class="content">
        <h1>Simulación de Carrera</h1>
        <div id="listarCorredores" class="section">
            <h2>Corredores</h2>
            <ul id="corredoresList"></ul>
            <button class="btn" onclick="getCorredores()">Listar Corredores</button>
        </div>
        <div id="agregarCorredor" class="section">
            <h2>Agregar Corredor</h2>
            <input type="text" id="nombre" placeholder="Nombre">
            <button class="btn" onclick="addCorredor()">Agregar</button>
        </div>
        <div id="actualizarCorredor" class="section">
            <h2>Actualizar Corredor</h2>
            <input type="number" id="idCorredorActualizar" placeholder="ID del Corredor">
            <input type="text" id="nombreNuevo" placeholder="Nuevo Nombre">
            <button class="btn" onclick="updateCorredor()">Actualizar</button>
        </div>
        <div id="eliminarCorredor" class="section">
            <h2>Eliminar Corredor</h2>
            <input type="number" id="idCorredorEliminar" placeholder="ID del Corredor">
            <button class="btn" onclick="deleteCorredor()">Eliminar</button>
        </div>
        <div id="simularCarrera" class="section">
            <h2>Simular Carrera</h2>
            <input type="number" id="numeroCorredores" placeholder="Número de Corredores">
            <input type="number" id="distanciaCarrera" placeholder="Distancia de Carrera (km)">
            <button class="btn" onclick="simularCarrera()">Simular</button>
            <pre id="resultado"></pre>
        </div>
        <div id="historialCarrera" class="section">
            <h2>Historial de Carrera</h2>
            <button class="btn" onclick="getHistorial()">Obtener Historial</button>
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
