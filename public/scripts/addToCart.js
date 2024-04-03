const addtocart = document.querySelectorAll("#addtocart")
const data = new FormData();



    addtocart.forEach((v)=>{
        v.addEventListener("click", ({target})=>{
            const prodid = (target.parentNode.parentNode.children[0].children[1].textContent)
            data.append("prodottoId", prodid)

            $.ajax({
                url: "/cart", 
                type: 'POST',
                data: data,
                processData: false,
                contentType: false,
                success: function(response) {
                    console.log(response.message);
                    location = "/cart"
                },
                error: function (error) {
                    console.error(error);
                }
            })
        })
    })





