

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


