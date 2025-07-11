// Show or hide the button based on scroll position
window.onscroll = function() {
    const marketing_firm_button = document.querySelector('.scroll-top-button');
    if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
        marketing_firm_button.style.display = "block"; // Show button
    } else {
        marketing_firm_button.style.display = "none"; // Hide button
    }
};

// Scroll to the top of the page when the button is clicked
document.querySelector('.scroll-top-button a').onclick = function(event) {
    event.preventDefault(); // Prevent default link behavior
    window.scrollTo({top: 0, behavior: 'smooth'}); // Smooth scroll to top
};