const hideButton = document.getElementById('hide-button');
const closeButton = document.getElementById('close-button');
const hideform = document.getElementById('hide-form');
const fondoSugerencias = document.getElementById('fondo-sugerencias');

hideButton.addEventListener('click', () => {
    const currentDisplay = window.getComputedStyle(hideform).display;

    if (currentDisplay === 'none') {
        hideform.style.display = 'flex';
        fondoSugerencias.style.display = 'block';
    } else {
        hideform.style.display = 'none';
        fondoSugerencias.style.display = 'none';
    }
});

closeButton.addEventListener('click', () => {
    hideform.style.display = 'none';
    fondoSugerencias.style.display = 'none';
});

document.addEventListener('click', (event) => {
    const estaVisible = window.getComputedStyle(hideform).display !== 'none';

    if (
        estaVisible &&
        !hideform.contains(event.target) &&
        !hideButton.contains(event.target)
    ) {
        hideform.style.display = 'none';
        fondoSugerencias.style.display = 'none';
    }
});
