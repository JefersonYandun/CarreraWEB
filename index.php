<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simulación de Carrera</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        h1, h2 {
            color: #333;
        }
        input, button {
            margin: 5px 0;
            padding: 10px;
            font-size: 1em;
        }
        #corredoresList {
            list-style-type: none;
            padding: 0;
        }
        #corredoresList li {
            padding: 5px 0;
        }
    </style>
</head>
<body>
    <h1>Simulación de Carrera</h1>
    <div>
        <h2>Corredores</h2>
        <ul id="corredoresList"></ul>
        <button onclick="getCorredores()">Listar Corredores</button>
    </div>
    <div>
        <h2>Agregar Corredor</h2>
        <input type="text" id="nombre" placeholder="Nombre">
        <button onclick="addCorredor()">Agregar</button>
    </div>
    <div>
        <h2>Actualizar Corredor</h2>
        <input type="number" id="idCorredorActualizar" placeholder="ID del Corredor">
        <input type="text" id="nombreNuevo" placeholder="Nuevo Nombre">
        <button onclick="updateCorredor()">Actualizar</button>
    </div>
    <div>
        <h2>Eliminar Corredor</h2>
        <input type="number" id="idCorredorEliminar" placeholder="ID del Corredor">
        <button onclick="deleteCorredor()">Eliminar</button>
    </div>
    <div>
        <h2>Simular Carrera</h2>
        <input type="number" id="numeroCorredores" placeholder="Número de Corredores">
        <input type="number" id="distanciaCarrera" placeholder="Distancia de Carrera (km)">
        <button onclick="simularCarrera()">Simular</button>
        <pre id="resultado"></pre>
    </div>

    <script src="cliente.js"></script>
</body>
</html>
