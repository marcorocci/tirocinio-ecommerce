

document.querySelectorAll("#piu").forEach(e => {
    e.addEventListener("click", function (e) {
        let numero = e.target.parentElement.children[1].value
        numero++
        e.target.parentElement.children[1].value = numero
    })
})
document.querySelectorAll("#meno").forEach(e => {
    e.addEventListener("click", function (e) {
        let numero = e.target.parentElement.children[1].value
        if (numero <= 1) return
        numero--
        e.target.parentElement.children[1].value = numero
    })
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
