// Obtiene los elementos del formulario y de los paneles para poder manejarlos desde JavaScript.
const botonAbrir = document.getElementById("boton-abrir-panel");
const botonCancelar = document.getElementById("boton-cancelar-panel");
const fondoPanel = document.getElementById("fondo-panel");
const formulario = document.getElementById("formulario-producto");
const entradaImagen = document.getElementById("imagen-producto");
const vistaPrevia = document.getElementById("vista-previa");
const textoImagen = document.getElementById("texto-imagen");
const mensajePanel = document.getElementById("mensaje-panel");
const listaProductos = document.getElementById("lista-productos");
const fondoDetalle = document.getElementById("fondo-detalle");
const botonEliminarProducto = document.getElementById("boton-eliminar-producto");

function abrirPanel() {
    fondoPanel.hidden = false;
    document.getElementById("nombre-producto").focus();
}

function cerrarPanel() {
    fondoPanel.hidden = true;
    formulario.reset();
    vistaPrevia.hidden = true;
    vistaPrevia.removeAttribute("src");
    textoImagen.hidden = false;
    mensajePanel.textContent = "";
}

botonAbrir.addEventListener("click", abrirPanel);
botonCancelar.addEventListener("click", cerrarPanel);

function cerrarDetalle() {
    fondoDetalle.hidden = true;
    tarjetaSeleccionada = null;
}

fondoPanel.addEventListener("click", (evento) => {
    if (evento.target === fondoPanel) cerrarPanel();
});

fondoDetalle.addEventListener("click", (evento) => {
    if (evento.target === fondoDetalle) cerrarDetalle();
});

entradaImagen.addEventListener("change", () => {
    const archivo = entradaImagen.files[0];
    if (!archivo) return;

    vistaPrevia.src = URL.createObjectURL(archivo);
    vistaPrevia.hidden = false;
    textoImagen.hidden = true;
    mensajePanel.textContent = "";
});

function leerImagenComoDataURL(archivo) {
    return new Promise((resolve, reject) => {
        const lector = new FileReader();
        lector.onload = () => resolve(lector.result);
        lector.onerror = () => reject(new Error);
        lector.readAsDataURL(archivo);
    });
}

function abrirDetalle(producto, tarjeta) {
    tarjetaSeleccionada = tarjeta;
    const imagenDetalle = document.getElementById("imagen-detalle");

    imagenDetalle.hidden = !producto.imagen;
    if (producto.imagen) {
        imagenDetalle.src = producto.imagen;
        imagenDetalle.alt = producto.nombre;
    } else {
        imagenDetalle.removeAttribute("src");
        imagenDetalle.alt = "";
    }
    document.getElementById("nombre-detalle").textContent = producto.nombre;
    document.getElementById("categoria-detalle").textContent = producto.categoria;
    document.getElementById("descripcion-detalle").textContent = producto.descripcion;
    document.getElementById("precio-detalle").textContent =
        `$${producto.precio.toFixed(2)}`;
    document.getElementById("stock-detalle").textContent =
        `Stock: ${producto.stock}`;
    fondoDetalle.hidden = false;
}

function crearTarjeta(producto) {
    const tarjeta = document.createElement("button");
    tarjeta.className = "tarjeta-producto";
    tarjeta.type = "button";

    const nombre = document.createElement("h2");
    nombre.textContent = producto.nombre;

    const precio = document.createElement("p");
    precio.textContent = `$${producto.precio.toFixed(2)}`;

    const stock = document.createElement("p");
    stock.textContent = `Stock: ${producto.stock}`;

    if (producto.imagen) {
        const imagen = document.createElement("img");
        imagen.src = producto.imagen;
        imagen.alt = "";
        tarjeta.append(imagen);
    }
    tarjeta.append(nombre, precio, stock);
    tarjeta.addEventListener("click", () => abrirDetalle(producto, tarjeta));
    listaProductos.append(tarjeta);
}

botonEliminarProducto.addEventListener("click", () => {
    tarjetaSeleccionada?.remove();
    cerrarDetalle();
});

formulario.addEventListener("submit", async (evento) => {
    evento.preventDefault();

    try {
        const archivo = entradaImagen.files[0];
        // Recoge los valores; la imagen queda vacia si el usuario no selecciono una.
        const producto = {
            nombre: formulario.elements.nombre.value.trim(),
            precio: Number(formulario.elements.precio.value),
            stock: Number(formulario.elements.stock.value),
            categoria: formulario.elements.categoria.value,
            descripcion: formulario.elements.descripcion.value.trim(),
            imagen: archivo ? await leerImagenComoDataURL(archivo) : ""
        };

        crearTarjeta(producto);
        cerrarPanel();
    } catch {
        // Informa si ocurre un error al leer la imagen o crear el producto.
        mensajePanel.textContent =
            "No se pudo añadir el producto. Prueba con una imagen más pequeña.";
    }
});