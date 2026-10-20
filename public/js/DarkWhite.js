let tocar = document.getElementById('tocar');
let iconoModo = document.getElementById('icono-modo');
let textoModo = document.getElementById('texto-modo');

const modoGuardado = localStorage.getItem('modoOscuro');
if (modoGuardado === 'true') {
    document.body.classList.add('dark');
    tocar.checked = true; 
    iconoModo.src = "Assets/modo-nocturno.png";
    textoModo.textContent = "Modo oscuro";
} else {
    document.body.classList.remove('dark');
    tocar.checked = false;
    iconoModo.src = "Assets/modo-diurno.png";
    textoModo.textContent = "Modo claro";
}

tocar.addEventListener('change', (event) => {
    let checked = event.target.checked;
    document.body.classList.toggle('dark', checked);

    localStorage.setItem('modoOscuro', checked);

    if (checked) {
        iconoModo.src = "Assets/modo-nocturno.png";
        textoModo.textContent = "Modo oscuro";
    } else {
        iconoModo.src = "Assets/modo-diurno.png";
        textoModo.textContent = "Modo claro";
    }
});
