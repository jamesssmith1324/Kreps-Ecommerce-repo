const refineCheckbox = document.querySelectorAll('.refineVariable')
// console.log(refineCheckbox[1].children)
for (let i = 0; i < refineCheckbox.length; i++) {
    let url = window.location.href
    if(url.includes(`&${refineCheckbox[i].id}`) == true){
        refineCheckbox[i].children[0].checked = true
    }
}