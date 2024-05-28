<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener la distancia de la carrera del formulario
    $distanciaCarrera = $_POST["distanciaCarrera"];

    // Realizar la solicitud al servidor Node.js utilizando cURL
    $url = 'http://localhost:3000/simular?distanciaCarrera=' . urlencode($distanciaCarrera);
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($curl);
    curl_close($curl);

    // Convertir la respuesta JSON en un array asociativo
    $data = json_decode($response, true);

    // Organizar las posiciones por horas
    $posicionesPorHora = [];
    foreach ($data['posiciones'] as $posicion) {
        $posicionesPorHora[$posicion['hora']][] = $posicion;
    }

    // Mostrar las posiciones por horas
    foreach ($posicionesPorHora as $hora => $posiciones) {
        echo '<h2>Posiciones después de ' . $hora . ' horas:</h2>';
        foreach ($posiciones as $posicion) {
            echo $posicion['nombre'] . ': ' . $posicion['posicion'] . ' km<br>';
        }
    }
}
?>
