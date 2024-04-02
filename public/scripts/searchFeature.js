const searchBar = document.getElementById('searchbar')
const products = document.querySelectorAll('.custom')

const categories = document.querySelectorAll('#category')
const prices = document.querySelectorAll('#price')

const prodPrices = document.querySelectorAll('.acquisto > h4')
const sorting = document.querySelectorAll('#sorting')

const productsContainer = document.querySelector('.list-group')

searchBar.addEventListener('input', ({ target }) => {
    const searchTerm = target.value.toLowerCase().replace(/\s/g, '')
    products.forEach(product => {
        const productName = product.children[0].children[0].textContent.toLowerCase().replace(/\s/g, '')
        product.style.display = productName.startsWith(searchTerm) ? 'grid' : 'none'
    })
})


categories.forEach(category => {
    category.addEventListener('click', ({ target }) => {
        const selectedCategory = target.textContent.toLowerCase()
        products.forEach(product => {
            const productCategory = product.children[2].children[2].textContent.toLowerCase()
            product.style.display = (selectedCategory === 'tutto' || productCategory.includes(selectedCategory)) ? 'grid' : 'none'
        })
    })
})

prices.forEach(price => {
    price.addEventListener('click', ({ target }) => {
        const [min, max] = target.textContent.replace(/[\s€]/g, '').split('-').map(Number)
        prodPrices.forEach(product => {
            const productPrice = Number(product.textContent.split('€')[0])
            product.parentElement.parentElement.style.display = (productPrice < min || productPrice > max) ? 'none' : 'grid'
        })
    })
})

function sortProducts(products, direction) {
    return Array.from(products).sort((a, b) => {
        const priceA = Number(a.children[2].children[0].textContent.replace(/[\s€]/g, ''))
        const priceB = Number(b.children[2].children[0].textContent.replace(/[\s€]/g, ''))
        return direction === 'In ordine crescente' ? priceA - priceB : priceB - priceA
    })
}

function updateProductDisplay(productsContainer, sortedProducts) {
    products.forEach(product => {
        productsContainer.removeChild(product)
    })
    sortedProducts.forEach(product => {
        productsContainer.appendChild(product)
    })
}


sorting.forEach(sort => {
    sort.addEventListener('click', ({ target }) => {
        const direction = target.textContent
        if (direction === 'In ordine crescente' || direction === 'In ordine decrescente') {
            const sortedProducts = sortProducts(products, direction)
            updateProductDisplay(productsContainer, sortedProducts)
        } else if (direction === 'Tutto') {
            products.forEach(product => {
                product.style.display = 'grid';
            });
        }
    })
})




