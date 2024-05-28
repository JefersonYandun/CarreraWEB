<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simulación de Carrera</title>
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
        <h2>Simular Carrera</h2>
        <input type="number" id="numeroCorredores" placeholder="Número de Corredores">
        <input type="number" id="distanciaCarrera" placeholder="Distancia de Carrera (km)">
        <button onclick="simularCarrera()">Simular</button>
        <pre id="resultado"></pre>
    </div>

    <script src="client.js"></script>
</body>
</html>
