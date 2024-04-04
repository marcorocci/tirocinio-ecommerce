const removeFromCart = document.querySelectorAll("#removeFromCart")
const data = new FormData();

const handleRemove = (target) => {
    const prodid = (target.parentNode.parentNode.parentNode.children[0].children[0].textContent)
    data.append("idCarrello", prodid)
    $.ajax({
        url: "/cart", 
        type: 'POST',
        data: data,
        processData: false,
        contentType: false,
        success: function(response) {
            console.log(response.message);
            location.reload();
        },
        error: function (error) {
            console.error(error);
        }
    })
}







