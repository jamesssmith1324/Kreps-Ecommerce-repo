var swiper = new Swiper('.swiper-container', {
    effect: 'coverflow',
    grabCursor: true,
    loop: true,
    centeredSlides: true,
    slidesPerView: 'auto',
    coverflowEffect: {
      rotate: 30,
      stretch: 0,
      depth: 100,
      modifier: 1,
      slideShadows: true,
    },
    pagination: {
      el: '.swiper-pagination',
    },
    autoplay: {
      delay:3000,
      disableOnInteraction: true
    }
  });



function inlargeImg(image){
    console.log(image)
    const modalCon = document.querySelector(".imageModal")
    const modalImg = document.querySelector(".imageModal .modalContent")
    modalImg.src = image.src
    modalCon.style.display = "block"
}

function closeModal(){
    const modalCon = document.querySelector(".imageModal")
    modalCon.style.display = "none"
}