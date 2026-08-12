const sidebar = document.querySelector('.sidebar');
const openBtn = document.querySelector('.sidebar-toggle');

sidebar.style.display = '';

openBtn.addEventListener('click', (e) => {
  e.stopPropagation();
  sidebar.classList.toggle('show-sidebar');
});

document.addEventListener('click', (e) => {
  if (sidebar && !sidebar.contains(e.target) && !openBtn.contains(e.target)) {
    sidebar.classList.remove('show-sidebar');
  }
});
const equisInput = document.getElementById("equis-input");
const inputBuscador = document.getElementById("input-buscador");

inputBuscador.addEventListener("keyup",()=>{
    if( inputBuscador.value.length>0){
        equisInput.style.display="block";
    }
    else{
        equisInput.style.display="none";
    }
});
equisInput.addEventListener("click",()=>{
        inputBuscador.value = "";
        equisInput.style.display="none";
})
function agregarProducto() {
  const contenedor = document.getElementById('productos');
  const nuevoProducto = document.createElement('div');
  nuevoProducto.className = 'producto';
  contenedor.appendChild(nuevoProducto);
}