let contenedorDiv = document.getElementById("contenedor");
let verificar = document.getElementById("verificar");
let jugador = document.getElementById("decisionJugador");
let arrayNombres = [];
let arrayComprobar = [];

fetch("https://jsonplaceholder.typicode.com/users")
.then(response => response.json())
.then(data => traerData(data))
.catch(error => console.log(error));

const traerData = (data) => {
    data.forEach(nombres => {
            arrayComprobar.push(nombres.name);

            let buttons = document.createElement("button");
            buttons.type = "submit";
            buttons.value = nombres.name;
            buttons.innerHTML = nombres.name;
            contenedorDiv.append(buttons);  
            
            buttons.addEventListener("click",()=>{
                let botonesClic = buttons.cloneNode(true);
                jugador.append(botonesClic);
                arrayNombres.push(buttons.value);
            })
    });
    arrayComprobar.sort();
    console.log(arrayComprobar);
} 

function comparar(){
    if(arrayNombres.toString() == arrayComprobar.toString()){
        verificar.innerHTML = 'Los nombres fueron ordenados alfabeticamente ¡Felicidades!';            
    } else {
        verificar.innerHTML = 'Los nombres no fueron ordenados alfabeticamente ¡Intentalo de nuevo que vos podes!';
    }
    console.log(arrayNombres);
}
