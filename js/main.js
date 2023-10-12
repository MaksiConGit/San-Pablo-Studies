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