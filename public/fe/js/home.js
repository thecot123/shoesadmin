// JavaScript to handle button click events and toggle product card visibility

// Get the buttons and product card containers
const menButton = document.getElementById('menButton');
const womenButton = document.getElementById('womenButton');
const menProducts = document.getElementById('menProducts');
const womenProducts = document.getElementById('womenProducts');

// Add click event listeners to the buttons
menButton.addEventListener('click', function () {
    menProducts.style.display = 'flex';
    womenProducts.style.display = 'none';
});

// Show men products by default
menProducts.style.display = 'flex';
womenProducts.style.display = 'none';

womenButton.addEventListener('click', function () {
    womenProducts.style.display = 'flex';
    menProducts.style.display = 'none';
});
const watchMoreButton = document.getElementById('watchMoreButton');
const cleanButton = document.getElementById('cleanButton');
const hiddenCards = document.querySelectorAll('.hidden');

watchMoreButton.addEventListener('click', function () {
    hiddenCards.forEach(card => {
        card.classList.remove('hidden');
    });
    watchMoreButton.style.display = 'none';
    cleanButton.style.display = 'inline-block';
});

cleanButton.addEventListener('click', function () {
    hiddenCards.forEach(card => {
        card.classList.add('hidden');
    });
    watchMoreButton.style.display = 'inline-block';
    cleanButton.style.display = 'none';
});
