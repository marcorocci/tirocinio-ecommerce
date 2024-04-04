const handleMore = (target) => {
    const inputTag = target.parentNode.children[1]
    const [moneyToAdd] = target.parentNode.parentNode.children[1].children[0].textContent.split('€')
    let numero = parseInt(inputTag.value)
    numero++
    inputTag.value = numero
    const totPrice = document.getElementById("totalPrice")
    totPrice.textContent = (parseFloat(totPrice.textContent) + parseFloat(moneyToAdd)).toFixed(2)
    finalPrice.textContent = (parseFloat(totPrice.textContent) + parseFloat(shipment.textContent)).toFixed(2)
}
const handleLess = (target) => {
    const inputTag = target.parentNode.children[1]
    const [moneyToSubtract] = target.parentNode.parentNode.children[1].children[0].textContent.split('€')
    let numero = parseInt(inputTag.value)
    if (numero <= 1) return
    numero--
    inputTag.value = numero
    const totPrice = document.getElementById("totalPrice")
    totPrice.textContent = (parseFloat(totPrice.textContent) - parseFloat(moneyToSubtract)).toFixed(2)
    finalPrice.textContent = (parseFloat(totPrice.textContent) + parseFloat(shipment.textContent)).toFixed(2)
}


const totalPrice = document.getElementById("totalPrice")
const shipment = document.getElementById("shipment")
const finalPrice = document.getElementById("total")

shipment.textContent = (Math.random() * 50).toFixed(2)
totalPrice.textContent = parseFloat(serverdata[0].total_price)
finalPrice.textContent = (parseFloat(serverdata[0].total_price) + parseFloat(shipment.textContent)).toFixed(2)






   









