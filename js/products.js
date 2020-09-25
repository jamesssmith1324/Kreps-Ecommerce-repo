const allProducts = document.querySelector('.products');

function createProductContainer(products){
    products.forEach(product => {
        const createProduct = document.createElement('div');
        createProduct.classList.add('product','showOnScroll', product.productBrand)
        createProduct.id = product.productID
        allProducts.appendChild(createProduct)
        if(!basket){
            createProduct.onclick = function loadProduct(product){
                window.open(`productPage.php?productID=${this.id}`,'_self')
            }
        }
        createProduct.appendChild(createImgContainer(product))
        createProduct.appendChild(createInfoContainer(product))

    });
}

function createImgContainer(product){
    const createImageContainer = document.createElement('div')
    createImageContainer.classList.add('productImg')
    const createImg = document.createElement('img')
    createImg.src = product.productImg
    createImg.onmouseover = function rollover(){
        let source = this.src
        this.src = product.productImgHover
    }
    createImg.onmouseout = function rollout(){
        let source = this.src
        this.src = product.productImg
    }
    if(basket){
        createImg.onclick = function loadProduct(){
            window.open(`productPage.php?productID=${product.productID}`,'_self')
        }
    }
    createImageContainer.appendChild(createImg)
    return createImageContainer
}

function createInfoContainer(product){
    const createInfoCon = document.createElement('div');
    createInfoCon.classList.add('productInfo');
    const pName = document.createElement('h3');
    pName.innerText = product.productName
    const pPrice = document.createElement('span')
    pPrice.innerText = '£' + product.productPrice
    createInfoCon.appendChild(pName)
    createInfoCon.appendChild(pPrice)
    if(basket){
        const pSize = document.createElement('span')
        pSize.innerText = 'Size ' + product.productSize
        const amount = document.createElement('span')
        amount.innerText = 'Amount: x' + product.count
        const removeContainer = document.createElement('div')
        const remove = document.createElement('a')
        remove.innerText = 'remove'
        remove.href = `php/removeFromBasket.php?productID=${product.productID}&productSize=${product.productSize}`
        createInfoCon.appendChild(pSize)
        createInfoCon.appendChild(amount)
        removeContainer.appendChild(remove)
        createInfoCon.appendChild(removeContainer)
    }
    
    return createInfoCon
}


createProductContainer(products)


$(document).ready(function(){
    $('.refineListItem').click(function(){
        const value = $(this).attr('data-filter')
        if(value == 'All'){
            $('.product').show('1000')
        }
        else{
            $('.product').not('.'+value).hide('1000')
            $('.product').filter('.'+value).show('1000')
        }
    })
    $('.refineListItem').click(function(){
        $(this).addClass('active').siblings().removeClass('active')
    })
})