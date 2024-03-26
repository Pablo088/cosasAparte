let contenedorDiv = document.getElementById("contenedor");
let jugador = document.getElementById("decisionJugador");
let verificar = document.getElementById("verificar");
let arrayNombres = [];

fetch("https://jsonplaceholder.typicode.com/users")
.then(response => response.json())
.then(data => traerData(data))
.catch(error => console.log(error));

const traerData = (data) => {
    data.forEach(nombres => {
            console.log(nombres.name);
            
            let buttons = document.createElement("button");
            buttons.type = "submit";
            buttons.onclick = pasar();
            buttons.value = nombres.name;
            buttons.innerHTML = `${nombres.name}`;
            contenedorDiv.appendChild(buttons);

            function pasar(){
                jugador.appendChild(buttons);
                arrayNombres = buttons.value;
                let arrayComprobar = [arrayNombres];
                arrayComprobar.sort();
            }
          
            
            buttons.addEventListener("click",pasar);
           
    });
}