// script.js

// Example of JS functionality to handle search button click
document.querySelector('.search-bar button').addEventListener('click', function() {
    let query = document.querySelector('.search-bar input').value;
    alert('Search query: ' + query);
});

// Example of adding functionality to product cards (if needed)
document.querySelectorAll('.card').forEach(card => {
    card.addEventListener('click', function() {
        let cardTitle = this.querySelector('.card-title').innerText;
        // Hier vervang je de alert door een omleiding naar een andere pagina
        // window.location.href = 'detailbuypage?cardTitle=' + cardTitle;
        window.location.href = 'detailbuypage.html';
    });
});

let slideIndex = 1;
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
  showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
}