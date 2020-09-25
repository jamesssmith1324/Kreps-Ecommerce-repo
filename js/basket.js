
let deliveryTotal = document.getElementById('deliveryTotal')
let moreThenOneClick = 0
function changeDelivery(delOption){
    // console.log(delOption)
    if (delOption == "nextDay"){
        deliveryTotal.childNodes[1].innerText = "£4.99"
        if(moreThenOneClick < 1){
            totalPrice += 4.99
            moreThenOneClick += 1
            // console.log(totalPrice)
            // console.log(moreThenOneClick)
            document.getElementById('total').childNodes[1].innerText = '£'+totalPrice
        }
    }
    else{
        deliveryTotal.childNodes[1].innerText = "FREE"
        if(moreThenOneClick > 0){
            moreThenOneClick -= 1
            totalPrice -= 4.99
            document.getElementById('total').childNodes[1].innerText = '£'+totalPrice
        }
    }
}

let checkProducts = document.querySelector('.products')

console.log(checkProducts.children.length)

if(checkProducts.children.length == 0){
    checkProducts.innerHTML = "<h4>No Items In Basket</h4>"
}

