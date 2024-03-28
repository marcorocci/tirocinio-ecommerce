const searchBar = document.getElementById('searchbar');
const products = document.querySelectorAll('.custom');



searchBar.addEventListener('input', (el) => {
    const searchTerm = el.target.value.toLowerCase()
    products.forEach(e => {
        const child = e.children[0].children[0].textContent.toLowerCase()
        e.style.display = (!child.startsWith(searchTerm)) ? 'none' : 'flex'
    });
});


