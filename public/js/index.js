const sidebar = document.querySelector('.sidebar');
const openBtn = document.querySelector('.sidebar-toggle');
const sidebarBackdrop = document.querySelector('.sidebar-backdrop');
const equisInput = document.getElementById("equis-input");
const inputBuscador = document.getElementById("input-buscador");

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
    if (!sidebar.contains(evento.target) && !openBtn.contains(evento.target)) {
      cerrarMenu();
    }
  });
}

sidebarBackdrop?.addEventListener('click', cerrarMenu);

if (inputBuscador && equisInput) {
  inputBuscador.addEventListener("keyup", () => {
    equisInput.style.display = inputBuscador.value.length > 0 ? "block" : "none";
  });

  equisInput.addEventListener("click", () => {
    inputBuscador.value = "";
    equisInput.style.display = "none";
  });
}