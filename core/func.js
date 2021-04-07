// Función para refrescar la web
function rf_lt(){
    window.location.replace("/");
}
setTimeout(rf_lt,1500);

// Funcion para mostrar la edición de perfil en tiempo real
function settprev() {
    document.getElementById("pr-picture").src = document.getElementById("picture-s").value;
    document.getElementById("pr-banner").src = document.getElementById("banner-s").value;
    document.getElementById("pr-bio").value = document.getElementById("bio-s").value;
  }

// Recibe la orden del botón prev-btn, para ejecutar la función settprev
  document.getElementById("prev-btn").addEventListener('click', settprev);

// Función para agrandar automáticamente un textarea
  function auto_grow(element) {
    element.style.height = "5px";
    element.style.height = (element.scrollHeight)+"px";
  }