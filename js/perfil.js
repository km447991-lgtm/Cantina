const perfilButton = document.getElementById('perfilFoto');
const menuEditar = document.getElementById('menuEditar');
const cambiarFotoBtn = document.getElementById('cambiarFotoBtn');
const cambiarNombreBtn = document.getElementById('cambiarNombreBtn');
const inputFotoPerfil = document.getElementById('inputFotoPerfil');
const nombreUsuario = document.getElementById('nombreUsuario');
const saldoBtn = document.getElementById('saldoBtn');
const menuSaldo = document.getElementById('menuSaldo');
const recargarSaldoBtn = document.getElementById('recargarSaldoBtn');
const cerrarSaldoBtn = document.getElementById('cerrarSaldoBtn');
const saldoTexto = document.getElementById('saldoTexto');

const nombreKey = 'perfilNombreUsuario';
const fotoKey = 'perfilFotoUsuario';
const saldoKey = 'perfilSaldoUsuario';

const guardarNombre = (nuevoNombre) => {
    const nombre = nuevoNombre.trim();
    if (!nombre) return;

    nombreUsuario.textContent = nombre;
    localStorage.setItem(nombreKey, nombre);

    if (window.aplicarDatosSidebar) {
        window.aplicarDatosSidebar();
    }
};

const cargarNombreGuardado = () => {
    const nombreGuardado = localStorage.getItem(nombreKey);
    if (nombreGuardado) {
        nombreUsuario.textContent = nombreGuardado;
    }

    if (window.aplicarDatosSidebar) {
        window.aplicarDatosSidebar();
    }
};

const cargarFotoGuardada = () => {
    const fotoGuardada = localStorage.getItem(fotoKey);
    if (fotoGuardada) {
        perfilButton.style.backgroundImage = `url('${fotoGuardada}')`;
        perfilButton.style.backgroundColor = 'transparent';
    }

    if (window.aplicarFotoSidebar) {
        window.aplicarFotoSidebar();
    }
};

const cargarSaldoGuardado = () => {
    const saldoGuardado = localStorage.getItem(saldoKey);
    if (saldoGuardado) {
        saldoTexto.textContent = saldoGuardado;
    }

    if (window.aplicarDatosSidebar) {
        window.aplicarDatosSidebar();
    }
};

const guardarSaldo = (nuevoSaldo) => {
    const saldo = nuevoSaldo.trim();
    if (!saldo) return;

    saldoTexto.textContent = saldo;
    localStorage.setItem(saldoKey, saldo);

    if (window.aplicarDatosSidebar) {
        window.aplicarDatosSidebar();
    }
};

if (perfilButton && menuEditar && cambiarFotoBtn && cambiarNombreBtn && inputFotoPerfil && nombreUsuario && saldoBtn && menuSaldo && recargarSaldoBtn && cerrarSaldoBtn && saldoTexto) {
    cargarNombreGuardado();
    cargarFotoGuardada();
    cargarSaldoGuardado();

    perfilButton.addEventListener('click', () => {
        const isHidden = menuEditar.hasAttribute('hidden');
        if (isHidden) {
            menuEditar.removeAttribute('hidden');
        } else {
            menuEditar.setAttribute('hidden', 'hidden');
        }
    });

    cambiarFotoBtn.addEventListener('click', () => {
        inputFotoPerfil.click();
        menuEditar.setAttribute('hidden', 'hidden');
    });

    cambiarNombreBtn.addEventListener('click', () => {
        nombreUsuario.focus();
        const rango = document.createRange();
        rango.selectNodeContents(nombreUsuario);
        const seleccion = window.getSelection();
        seleccion.removeAllRanges();
        seleccion.addRange(rango);
        menuEditar.setAttribute('hidden', 'hidden');
    });

    nombreUsuario.addEventListener('blur', () => {
        guardarNombre(nombreUsuario.textContent);
    });

    nombreUsuario.addEventListener('keydown', (event) => {
        if (event.key === 'Enter') {
            event.preventDefault();
            nombreUsuario.blur();
        }
    });

    saldoBtn.addEventListener('click', () => {
        const isHidden = menuSaldo.hasAttribute('hidden');
        if (isHidden) {
            menuSaldo.removeAttribute('hidden');
        } else {
            menuSaldo.setAttribute('hidden', 'hidden');
        }
    });

    recargarSaldoBtn.addEventListener('click', () => {
        const montoActual = Number(saldoTexto.textContent.replace(/[^0-9.-]/g, '')) || 0;
        const nuevoMonto = Number(prompt('¿Cuánto deseas recargar?', '100'));

        if (!Number.isNaN(nuevoMonto) && nuevoMonto >= 0) {
            const total = montoActual + nuevoMonto;
            guardarSaldo(`USD ${total}`);
        }

        menuSaldo.setAttribute('hidden', 'hidden');
    });

    cerrarSaldoBtn.addEventListener('click', () => {
        menuSaldo.setAttribute('hidden', 'hidden');
    });

    inputFotoPerfil.addEventListener('change', (event) => {
        const file = event.target.files[0];
        if (!file) return;

        const reader = new FileReader();
        reader.onload = (e) => {
            const imageUrl = e.target.result;
            perfilButton.style.backgroundImage = `url('${imageUrl}')`;
            perfilButton.style.backgroundColor = 'transparent';
            localStorage.setItem(fotoKey, imageUrl);

            if (window.aplicarFotoSidebar) {
                window.aplicarFotoSidebar();
            }
        };
        reader.readAsDataURL(file);
    });

    document.addEventListener('click', (event) => {
        const clickDentroPerfil = perfilButton.contains(event.target) || menuEditar.contains(event.target);
        const clickDentroSaldo = saldoBtn.contains(event.target) || menuSaldo.contains(event.target);

        if (!clickDentroPerfil) {
            menuEditar.setAttribute('hidden', 'hidden');
        }

        if (!clickDentroSaldo) {
            menuSaldo.setAttribute('hidden', 'hidden');
        }
    });
}