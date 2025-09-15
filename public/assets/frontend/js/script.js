
let mainMenu = document.querySelector(".main-menu");
let openBtn = document.querySelector(".open-btn");
let openBtnFooter = document.querySelector(".open-btn-footer");
let closeBtn = document.querySelector(".close-btn");
let bodyOverlay = document.querySelector(".body-overlay");


if(openBtnFooter){
   [openBtn, closeBtn, openBtnFooter].forEach((btn)=>{

      btn.addEventListener("click", ()=>{
        mainMenu.classList.toggle("open");
        bodyOverlay.classList.toggle("show");
      })
    }) 
}else{
    
    [openBtn, closeBtn].forEach((btn)=>{

      btn.addEventListener("click", ()=>{
        mainMenu.classList.toggle("open");
        bodyOverlay.classList.toggle("show");
      })
    })
    
}


// popup

$(window).on('load',function(){
  setTimeout(function() {
    $("#onloadPopup").modal('show');
  }, 1000);
});	





$('.hero-wrapper').slick({
    infinite: true,
    dots:true,
    arrows:false,
    autoplay:true
});