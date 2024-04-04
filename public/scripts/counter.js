document.querySelector("#piu").addEventListener("click", function() {
    let numero = parseInt(document.querySelector("#qtninput").value);
    numero++;
    document.querySelector("#qtninput").value = numero;
    document.querySelector("#qtninput").dispatchEvent(new Event("input"));
});

document.querySelector("#meno").addEventListener("click", function() {
    let numero = parseInt(document.querySelector("#qtninput").value);
    if (numero <= 1) return;
    numero--;
    document.querySelector("#qtninput").value = numero;
    document.querySelector("#qtninput").dispatchEvent(new Event("input"));
});


document.querySelectorAll("#qtninput").forEach(e => {
    e.addEventListener("input", ({target}) => {
        const total_Price = document.getElementById("totalPrice")
        const shipment = document.getElementById("shipment")
        const n = target.value

        
        //Mostra il prezzo totale nella pagina
        total_Price.textContent = `${(serverdata[0].total_price * n).toFixed(2)}€`;
        shipment.textContent = `${
            (Math.random() * 50).toFixed(2)
        }€`;
        var total_sum = parseFloat(total_Price.textContent.split("€")[0]) + parseFloat(shipment.textContent.split("€")[0]);
        
        document.getElementById("total").textContent = `${total_sum.toFixed(2)}€`;
    })


    const total_Price = document.getElementById("totalPrice")
    const shipment = document.getElementById("shipment")

    
    //Mostra il prezzo totale nella pagina
    total_Price.textContent = `${serverdata[0].total_price}€`;
    shipment.textContent = `${
        (Math.random() * 50).toFixed(2)
    }€`;
    var total_sum = parseFloat(total_Price.textContent.split("€")[0]) + parseFloat(shipment.textContent.split("€")[0]);
    
    document.getElementById("total").textContent = `${total_sum.toFixed(2)}€`;
})

   









