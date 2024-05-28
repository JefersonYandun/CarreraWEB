const apiUrl = 'http://localhost:3000';

async function getCorredores() {
    const response = await fetch(`${apiUrl}/corredores`);
    const corredores = await response.json();
    const corredoresList = document.getElementById('corredoresList');
    corredoresList.innerHTML = '';
    corredores.forEach(corredor => {
        const li = document.createElement('li');
        li.textContent = `${corredor.id}: ${corredor.nombre} - Velocidad: ${corredor.velocidad} km/h`;
        corredoresList.appendChild(li);
    });
}

async function addCorredor() {
    const nombre = document.getElementById('nombre').value;
    if (!nombre) {
        alert('Por favor, ingrese un nombre');
        return;
    }
    const response = await fetch(`${apiUrl}/corredores?nombre=${nombre}`, { method: 'POST' });
    if (response.ok) {
        getCorredores();
    } else {
        alert('Error al agregar corredor');
    }
}

async function simularCarrera() {
    const numeroCorredores = document.getElementById('numeroCorredores').value;
    const distanciaCarrera = document.getElementById('distanciaCarrera').value;
    if (!numeroCorredores || !distanciaCarrera) {
        alert('Por favor, ingrese el número de corredores y la distancia de carrera');
        return;
    }
    const response = await fetch(`${apiUrl}/simular?numeroCorredores=${numeroCorredores}&distanciaCarrera=${distanciaCarrera}`, { method: 'POST' });
    const resultado = await response.json();
    document.getElementById('resultado').textContent = JSON.stringify(resultado, null, 2);
}
