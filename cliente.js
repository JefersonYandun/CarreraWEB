const apiUrl = 'http://localhost:3000';

async function getCorredores() {
    const response = await fetch(`${apiUrl}/corredores`);
    const corredores = await response.json();
    const corredoresList = document.getElementById('corredoresList');
    corredoresList.innerHTML = '';
    corredores.forEach(corredor => {
        const li = document.createElement('li');
        li.textContent = `${corredor.id}: ${corredor.nombre} - Velocidad: ${corredor.velocidad || 'N/A'} km/h`;
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
        document.getElementById('nombre').value = '';
        getCorredores();
    } else {
        alert('Error al agregar corredor');
    }
}

async function updateCorredor() {
    const id = document.getElementById('idCorredorActualizar').value;
    const nombre = document.getElementById('nombreNuevo').value;
    if (!id || !nombre) {
        alert('Por favor, ingrese el ID y el nuevo nombre del corredor');
        return;
    }
    const response = await fetch(`${apiUrl}/corredores/${id}?nombre=${nombre}`, { method: 'PUT' });
    if (response.ok) {
        document.getElementById('idCorredorActualizar').value = '';
        document.getElementById('nombreNuevo').value = '';
        getCorredores();
    } else {
        alert('Error al actualizar corredor');
    }
}

async function deleteCorredor() {
    const id = document.getElementById('idCorredorEliminar').value;
    if (!id) {
        alert('Por favor, ingrese el ID del corredor');
        return;
    }
    const response = await fetch(`${apiUrl}/corredores/${id}`, { method: 'DELETE' });
    if (response.ok) {
        document.getElementById('idCorredorEliminar').value = '';
        getCorredores();
    } else {
        alert('Error al eliminar corredor');
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
    if (response.ok) {
        const resultado = await response.json();
        document.getElementById('resultado').textContent = JSON.stringify(resultado, null, 2);
    } else {
        alert('Error al simular la carrera');
    }
}
