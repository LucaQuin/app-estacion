// let ofertas = document.querySelector(".ofertas");

fetch('https://mattprofe.com.ar/proyectos/app-estacion/datos.php?mode=list-stations')
.then(response => {
     return response.json()
    })
.then(cate => {

console.log(cate);


})