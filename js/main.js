var contenidos = document.getElementsByClassName("contenido_mostrado");
const opciones = document.getElementsByClassName("opciones_laterales");


for (let i = 0; i < opciones.length; i++) {

    contenidos[6].style.display = "block"
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

const contenidos_carpetas = document.getElementsByClassName("contenido_carpetas");
const archivo_materia = document.getElementsByClassName("archivo-materia");
const opciones_carpetas = document.getElementById("opciones_carpetas");
const volver = document.getElementsByClassName("volver");

for (let i = 0; i < archivo_materia.length; i++) {

  // Borrar esta línea al final de la branch
  contenidos_carpetas[i].style.display = "none";

  archivo_materia[i].addEventListener("click", function () {

    opciones_carpetas.style.display = "none";

    for (let j = 0; j < contenidos_carpetas.length; j++) {
      contenidos_carpetas[j].style.display = "none";
    }

    contenidos_carpetas[i].style.display = "flex";

  })

  // Borrar líneas al final de la branch
  // contenidos_carpetas[0].style.display = "flex";
  // opciones_carpetas.style.display = "none";
  
  volver[i].addEventListener("click", function (){

    opciones_carpetas.style.display = "block";
    contenidos_carpetas[i].style.display = "none";

  });
}

function zoom(e){
  var zoomer = e.currentTarget;
  e.offsetX ? offsetX = e.offsetX : offsetX = e.touches[0].pageX
  e.offsetY ? offsetY = e.offsetY : offsetX = e.touches[0].pageX
  x = offsetX/zoomer.offsetWidth*100
  y = offsetY/zoomer.offsetHeight*100
  zoomer.style.backgroundPosition = x + '% ' + y + '%';
}