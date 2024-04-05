const products = document.querySelectorAll('.custom')
const prodPrices = document.querySelectorAll('.acquisto > h4')
const productsContainer = document.querySelector('.list-group')

const handleSearch = ({value}) => {
    const searchTerm = value.toLowerCase().replace(/\s/g, '')
    products.forEach(product => {
        const productName = product.children[0].children[0].textContent.toLowerCase().replace(/\s/g, '')
        product.style.display = productName.startsWith(searchTerm) ? 'grid' : 'none'
    })
}

const handleCategory = ({ textContent }) => {
    const selectedCategory = textContent.toLowerCase()
    products.forEach(product => {
        const productCategory = product.children[2].children[2].textContent.toLowerCase()
        product.style.display = (selectedCategory === 'tutto' || productCategory.includes(selectedCategory)) ? 'grid' : 'none'
    })
}

const handlePrice = ({ textContent }) => {
    const [min, max] = textContent.replace(/[\s€]/g, '').split('-').map(Number)
    prodPrices.forEach(product => {
        const productPrice = Number(product.textContent.split('€')[0])
        product.parentElement.parentElement.style.display = (productPrice < min || productPrice > max) ? 'none' : 'grid'
    })
}

const sortProducts = (products, direction) => {
    return Array.from(products).sort((a, b) => {
        const priceA = Number(a.children[2].children[0].textContent.replace(/[\s€]/g, ''))
        const priceB = Number(b.children[2].children[0].textContent.replace(/[\s€]/g, ''))
        return direction === 'In ordine crescente' ? priceA - priceB : priceB - priceA
    })
}

const updateProductDisplay = (productsContainer, sortedProducts) => {
    products.forEach(product => productsContainer.removeChild(product))
    sortedProducts.forEach(product => productsContainer.appendChild(product))
}

const handleSort = ({ textContent }) => {
    const direction = textContent
    if (direction === 'In ordine crescente' || direction === 'In ordine decrescente') {
        const sortedProducts = sortProducts(products, direction)
        updateProductDisplay(productsContainer, sortedProducts)
    } else if (direction === 'Tutto') {
        products.forEach(product => product.style.display = 'grid')
    }
}




