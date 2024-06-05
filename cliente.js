// Definición de la URL base para las solicitudes al servidor
const apiUrl = 'http://localhost:3000';

// Función para obtener la lista de corredores desde el servidor y mostrarla en el área designada
async function getCorredores() {
    const response = await fetch(`${apiUrl}/corredores`);
    const corredores = await response.json();
    const corredoresList = document.getElementById('corredoresList');
    corredoresList.innerHTML = '';
    corredores.forEach(corredor => {
        const li = document.createElement('li');
        // Crear elemento de lista con el ID, nombre y velocidad del corredor
        li.textContent = `${corredor.id}: ${corredor.nombre} - Velocidad: ${corredor.velocidad || 'N/A'} km/h`;
        corredoresList.appendChild(li);
    });
}

// Función para agregar un nuevo corredor al servidor
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

// Función para actualizar el nombre de un corredor existente en el servidor
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

// Función para eliminar un corredor existente en el servidor
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

// Función para simular una carrera con el número de corredores y la distancia proporcionados
async function simularCarrera() {
    const numeroCorredores = document.getElementById('numeroCorredores').value;
    const distanciaCarrera = document.getElementById('distanciaCarrera').value;
    if (!numeroCorredores || !distanciaCarrera) {
        alert('Por favor, ingrese el número de corredores y la distancia de carrera');
        return;
    }
    const response = await fetch(`${apiUrl}/simular?numeroCorredores=${numeroCorredores}&distanciaCarrera=${distanciaCarrera}`, { method: 'POST' });
    if (response.ok) {
        // Mostrar el resultado de la simulación en el área designada y obtener el historial de la carrera
        const resultado = await response.json();
        document.getElementById('resultado').textContent = JSON.stringify(resultado, null, 2);
        await getHistorial();
    } else {
        alert('Error al simular la carrera');
    }
}

// Función para obtener y mostrar el historial de la carrera desde el servidor
async function getHistorial() {
    const response = await fetch(`${apiUrl}/historial`);
    const historial = await response.json();
    const historialList = document.getElementById('historialList');
    historialList.innerHTML = '';
    historial.forEach(entry => {
        const li = document.createElement('li');
        // Crear elemento de lista con la hora y las posiciones de los corredores en esa hora
        li.textContent = `Hora ${entry.horas}: ${entry.posiciones.map(pos => `${pos.nombre}: ${pos.posicion.toFixed(2)} km`).join(', ')}`;
        historialList.appendChild(li);
    });
}
