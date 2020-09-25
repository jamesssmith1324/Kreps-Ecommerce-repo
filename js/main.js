// let getSlideshow = document.getElementById('slideshow')
// let getSlideHeight = document.querySelector('.slide .imageHolder img')
// getSlideshow.style.height = `${$(getSlideHeight).height()}`

// $(window).resize(function() {
//   let getSlideshow = document.getElementById('slideshow')
//   let getSlideHeight = document.querySelector('.slide .imageHolder img')
//   getSlideshow.style.height = `${$(getSlideHeight).height()}`
// })



$(document).ready(function(){
  $('.slideshow').slick({
    autoplay: true,
    autoplaySpeed: 5000,
  });
});



let scroll = window.requestAnimationFrame
let elementsToShow = document.querySelectorAll(".showOnScroll")


function loop() {
  Array.prototype.forEach.call(elementsToShow, function(element){
    if (isElementInViewport(element)) {
      element.classList.add('isVisible');
    } 
    // else {
    //   element.classList.remove('isVisible');
    // }
  });

  scroll(loop);
}

loop()

function isElementInViewport(el) {
  var rect = el.getBoundingClientRect();
  return (
    (rect.top <= 0
      && rect.bottom >= 0)
    ||
    (rect.bottom >= (window.innerHeight || document.documentElement.clientHeight) &&
      rect.top <= (window.innerHeight || document.documentElement.clientHeight))
    ||
    (rect.top >= 0 &&
      rect.bottom <= (window.innerHeight || document.documentElement.clientHeight))
  );
}