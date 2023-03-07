// Get the button that toggles dark mode
const darkToggle = document.querySelector('#dark-toggle');
// Get the <body> element
const body = document.querySelector('body');

// Function to toggle dark mode
function toggleDarkMode() {
    // Toggle the "dark-mode" class on the <body> element
    body.classList.toggle('active');

    // Store the current mode in local storage
    localStorage.setItem('mode', body.classList.contains('active') ? 'dark' : 'light');
}

// Add a click event listener to the dark mode toggle button
darkToggle.addEventListener('click', toggleDarkMode);

// On page load, check if the user has a mode preference saved in local storage
const mode = localStorage.getItem('mode');
if (mode === 'dark') {
    body.classList.add('active');
} else {
    body.classList.remove('active');
}