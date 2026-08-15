document.addEventListener('DOMContentLoaded', () => {
    const overlay = document.getElementById('sugerencias-overlay');
    const page = document.getElementById('pagina-principal');
    const openTrigger = document.querySelector('.open-sugerencias');
    const closeBtn = document.querySelector('.cerrar-sugerencias');
    const sidebar = document.querySelector('.sidebar');

    if (!overlay || !page || !openTrigger) {
        return;
    }

    const openModal = () => {
        if (sidebar) {
            sidebar.classList.remove('show-sidebar');
        }
        overlay.classList.add('active');
        overlay.setAttribute('aria-hidden', 'false');
        page.classList.add('blurred');
    };

    const closeModal = () => {
        overlay.classList.remove('active');
        overlay.setAttribute('aria-hidden', 'true');
        page.classList.remove('blurred');
    };

    openTrigger.addEventListener('click', (event) => {
        event.preventDefault();
        openModal();
    });

    if (closeBtn) {
        closeBtn.addEventListener('click', closeModal);
    }

    overlay.addEventListener('click', (event) => {
        if (event.target === overlay) {
            closeModal();
        }
    });

    document.addEventListener('keydown', (event) => {
        if (event.key === 'Escape' && overlay.classList.contains('active')) {
            closeModal();
        }
    });
});
