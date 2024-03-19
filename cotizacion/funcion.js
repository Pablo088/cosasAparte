let dolarOficial = document.getElementById("dolarOficial");
let dolarBlue = document.getElementById("dolarBlue");
let dolarCrypto = document.getElementById("dolarCrypto");

let oficial = document.getElementById("oficial");
let blue = document.getElementById("blue");
let crypto = document.getElementById("crypto");

let checks = document.querySelectorAll(".check");

let conversion = document.getElementById("conversion");

let montoPesos = document.getElementById("montoPesos");

    fetch("https://dolarapi.com/v1/dolares")
    .then(response => response.json())
    .then(data => mostrarData(data))
    .catch(error => console.log(error));


    const mostrarData = (data) => {
        
        data.forEach(dolar => {
            console.log(dolar);

            switch (dolar.nombre){
               case "Oficial": 
                    oficial.innerHTML =`Dolar Oficial - Valor: ${dolar.compra}`;
                    dolarOficial.value = dolar.compra;
                    break;

                case "Blue": 
                    blue.innerHTML = `Dolar Blue - Valor: ${dolar.compra}`;
                    dolarBlue.value = dolar.compra;
                    break;

                case "Cripto": 
                    crypto.innerHTML = `Dolar Crypto - Valor: ${dolar.compra}`;
                    dolarCrypto = dolar.compra;
                    break;
            }
        });
    } 
          
    function convertir(){
        checks.forEach(check => {
            if(check.checked == true){
                let operacion = montoPesos.value / check.value;
                conversion.innerHTML = ` = ${operacion} (${check.name})`;
            }
        });
    }