const handleMore = (target) => {
    const inputTag = target.parentNode.children[1]
    const [moneyToAdd] = target.parentNode.parentNode.children[1].children[0].textContent.split('€')
    let numero = parseInt(inputTag.value)
    numero++
    inputTag.value = numero
    const totPrice = document.getElementById("totalPrice")
    totPrice.textContent = (parseFloat(totPrice.textContent) + parseFloat(moneyToAdd)).toFixed(2)
    finalPrice.textContent = (parseFloat(totPrice.textContent) + parseFloat(shipment.textContent)).toFixed(2)
    ivatot.textContent = ((parseFloat(totalPrice.textContent)*22)/100).toFixed(2)
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
    ivatot.textContent = ((parseFloat(totalPrice.textContent)*22)/100).toFixed(2)
}


const totalPrice = document.getElementById("totalPrice")
const shipment = document.getElementById("shipment")
const finalPrice = document.getElementById("total")
const ivatot = document.getElementById("ivatot")

shipment.textContent = (Math.random() * 50).toFixed(2)
totalPrice.textContent = parseFloat(serverdata[0].total_price)
finalPrice.textContent = (parseFloat(serverdata[0].total_price) + parseFloat(shipment.textContent)).toFixed(2)
ivatot.textContent = ((parseFloat(totalPrice.textContent)*22)/100).toFixed(2)




const handlePromoCode = async (event) => {
    event.preventDefault()
    const formData = new FormData(event.target)

    const response = await fetch('/promo', {
        method: 'POST',
        body: formData,
    })

    if (response.ok) {
        const data = await response.json()
        const inputElement = document.getElementsByName('promoCode')[0]
        const isEmptyData = Object.keys(data).length === 0

        if (!isEmptyData) {
            const currentDate = new Date()
            const startDate = new Date(data[0].dataInizio)
            const endDate = new Date(data[0].dataFine)

            if (currentDate >= startDate && currentDate <= endDate) {
                inputElement.classList.add('is-valid')
                inputElement.classList.remove('is-invalid')
                sessionStorage.setItem('promoCode', formData.get('promoCode'))
                finalPrice.textContent = (parseFloat(finalPrice.textContent) - (parseFloat(finalPrice.textContent) / 10)).toFixed(2)
            } else {
                inputElement.classList.add('is-invalid')
                inputElement.classList.remove('is-valid')
                sessionStorage.removeItem('promoCode')
                formData.append('remove', 1)
                const promoCodeRemovalResponse = await fetch('/promo', {
                    method: 'POST',
                    body: formData,
                })
            }
        } else {
            if (sessionStorage.getItem('promoCode'))
                sessionStorage.removeItem('promoCode')
            inputElement.classList.add('is-invalid')
            inputElement.classList.remove('is-valid')
        }
    } else {
        console.error('Error:', response.status, response.statusText)
    }
}






   









