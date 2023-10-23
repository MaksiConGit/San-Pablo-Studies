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

const contenido_parciales = document.getElementsByClassName("contenido_parciales");
const parcial = document.getElementsByClassName("parcial");
const opciones_parciales = document.getElementById("opciones_parciales");
const volver_parciales = document.getElementsByClassName("volver_parciales");

for (let i = 0; i < parcial.length; i++) {

  // Borrar esta línea al final de la branch
  contenido_parciales[i].style.display = "none";

  parcial[i].addEventListener("click", function () {

    opciones_parciales.style.display = "none";

    for (let j = 0; j < contenido_parciales.length; j++) {
      contenido_parciales[j].style.display = "none";
    }

    contenido_parciales[i].style.display = "flex";

  })

  // Borrar líneas al final de la branch
  // contenido_parciales[0].style.display = "flex";
  // opciones_parciales.style.display = "none";
  
  volver_parciales[i].addEventListener("click", function (){

    opciones_parciales.style.display = "block";
    contenido_parciales[i].style.display = "none";

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