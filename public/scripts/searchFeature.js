const searchBar = document.getElementById('searchbar')
const products = document.querySelectorAll('.custom')

const categories = document.querySelectorAll('#category')

searchBar.addEventListener('input', (el) => {
    const searchTerm = el.target.value.toLowerCase()
    products.forEach(e => {
        const child = e.children[0].children[0].textContent.toLowerCase()
        e.style.display = (!child.startsWith(searchTerm)) ? 'none' : 'flex'
    });
});

categories.forEach(e => {
    e.addEventListener('click', (el) => {
        const cat = el.target.textContent
        products.forEach(e => {
            const child = e.children[2].children[2].textContent
            
            e.style.display = (cat === 'Tutto') ? 'flex' : (!child.includes(cat)) ? 'none' : 'flex'
        })
    })
})

