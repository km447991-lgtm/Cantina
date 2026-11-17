const sidebar = document.querySelector('.sidebar');
const openBtn = document.querySelector('.sidebar-toggle');
const sidebarBackdrop = document.querySelector('.sidebar-backdrop');
const equisInput = document.getElementById('equis-input');
const inputBuscador = document.getElementById('input-buscador');

function cerrarMenu() {
    sidebar?.classList.remove('show-sidebar');
    sidebarBackdrop?.classList.remove('show-backdrop');
}

if (sidebar && openBtn) {
    openBtn.addEventListener('click', (evento) => {
        evento.stopPropagation();
        const isOpen = sidebar.classList.toggle('show-sidebar');
        sidebarBackdrop?.classList.toggle('show-backdrop', isOpen);
    });

    document.addEventListener('click', (evento) => {
        const clickedSuggestions = evento.target.closest('#hide-button');

        if (
            (!sidebar.contains(evento.target) && !openBtn.contains(evento.target)) ||
            clickedSuggestions
        ) {
            cerrarMenu();
        }
    });
}

sidebarBackdrop?.addEventListener('click', cerrarMenu);

if (inputBuscador && equisInput) {
    inputBuscador.addEventListener('keyup', () => {
        equisInput.style.display = inputBuscador.value.length > 0 ? 'block' : 'none';
    });

    equisInput.addEventListener('click', () => {
        inputBuscador.value = '';
        equisInput.style.display = 'none';
    });
}

const mostrarBotton = document.getElementById('mostrar-Botton');

mostrarBotton.addEventListener('click', () => {
    let formularioSugerencia = document.getElementById('formulario-Sugerencia');
    let currentDisplay = formularioSugerencia.style.display;

    if (currentDisplay === 'none') {
        formularioSugerencia.style.display = 'none';
    } else {
        formularioSugerencia.style.display = 'block';
    }
});
