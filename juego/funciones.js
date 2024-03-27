let contenedorDiv = document.getElementById("contenedor");
let verificar = document.getElementById("verificar");
let jugador = document.getElementById("decisionJugador");
let arrayNombres = [];
let arrayComprobar = [];
let nombresDesordenados = [];

fetch("https://jsonplaceholder.typicode.com/users")
.then(response => response.json())
.then(data => traerData(data))
.catch(error => console.log(error));

const traerData = (data) => {
    data.forEach(nombres => {
        if(!(nombresDesordenados.includes(nombres.name))){
            nombresDesordenados.push(nombres.name);
            nombresDesordenados.sort(() => Math.random() - 0.5);
        }
    })
    data.forEach((nombres,i) => {
            arrayComprobar.push(nombres.name);

            let buttons = document.createElement("button");
                buttons.type = "submit";
                buttons.value = nombresDesordenados[i];
                buttons.innerHTML = nombresDesordenados[i];
                contenedorDiv.append(buttons);  
                
                buttons.addEventListener("click",()=>{
                    let botonesClic = buttons.cloneNode(true);
                    jugador.append(botonesClic);
                    arrayNombres.push(buttons.value);
                })
    });
    arrayComprobar.sort();
} 

function comparar(){
    if(arrayNombres.toString() == arrayComprobar.toString()){
        verificar.innerHTML = 'Los nombres fueron ordenados alfabeticamente ¡Felicidades!';            
    } else {
        verificar.innerHTML = 'Los nombres no fueron ordenados alfabeticamente ¡Intentalo de nuevo que vos podes!';
    }
}
