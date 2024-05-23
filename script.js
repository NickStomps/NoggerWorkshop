// script.js

// Example of JS functionality to handle search button click
document.querySelector('.search-bar button').addEventListener('click', function() {
    let query = document.querySelector('.search-bar input').value;
    alert('Search query: ' + query);
});

// Example of adding functionality to product cards (if needed)
document.querySelectorAll('.card').forEach(card => {
    card.addEventListener('click', function() {
        alert('Card clicked: ' + this.querySelector('.card-title').innerText);
    });
});
