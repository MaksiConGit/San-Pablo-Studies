var contenidos = document.getElementsByClassName("contenido_mostrado");
const opciones = document.getElementsByClassName("opciones_laterales");


for (let i = 0; i < opciones.length; i++) {

  // Borrar esta línea al final de la branch
    contenidos[4].style.display = "block";
    contenidos[i].style.display = "none";

    opciones[i].addEventListener("click", function () {

      // Oculta todos los elementos con la clase "contenido_mostrado"
      
      for (let j = 0; j < contenidos.length; j++) {
        contenidos[j].style.display = "none";
        opciones[j].style.backgroundColor = "#202020";
      }

      opciones[i].style.backgroundColor = "black";

      contenidos[i].style.display = "block";

    });
}

// Obtener todos los elementos con la clase 'pdf-div'
const pdfDivs = document.querySelectorAll('.archivo');

// Agregar un controlador de eventos clic a cada div
pdfDivs.forEach((div) => {
    div.addEventListener('click', (event) => {
        // Obtener el nombre del archivo del atributo personalizado
        const ruta = div.getAttribute('data-ruta-archivo');
        const nombre = div.getAttribute('data-nombre-archivo');
        
        // Construir la URL o la ruta al archivo PDF (asegúrate de que la ruta sea correcta)
        const urlArchivo = ruta + nombre;
        
        // Abrir el PDF en una nueva ventana o pestaña del navegador
        window.open(urlArchivo, '_blank');
    });
});
