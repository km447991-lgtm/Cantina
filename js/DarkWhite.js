let tocar = document.getElementById('tocar');
let iconoModo = document.getElementById('icono-modo');
let textoModo = document.getElementById('texto-modo');

tocar.addEventListener('change', (event) => {
    let checked = event.target.checked;
    document.body.classList.toggle('dark');

    if (checked) {
        iconoModo.src = "Assets/modo-nocturno.png";
        textoModo.textContent = "Oscuro";
    } else {
        iconoModo.src = "Assets/modo-diurno.png";
        textoModo.textContent = "Claro";
    }
});