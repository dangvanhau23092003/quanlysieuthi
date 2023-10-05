
    let slideIndex = 0;
showSlides();

function showSlides() {
  let i;
  let slider = document.getElementsByClassName("header__slider");
  //ẨN ẢNH
  for (i = 0; i < slider.length; i++) {
  slider[i].style.display = "none";  
  }
  slideIndex++;
  //HIỆN ẢNH
  if (slideIndex > slider.length) {slideIndex = 1}    
  slider[slideIndex-1].style.display = "block";  

  setTimeout(showSlides, 3000); // thời gian đổi ảnh
}
