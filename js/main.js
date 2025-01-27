
const mobileMenu = document.getElementById('mobile_menu');
const closeBtn = document.getElementById('close_menu');
const mobileBar = document.getElementById('mobile_bar');
mobileBar.addEventListener('click', function (e) {
    e.preventDefault();
    mobileMenu.classList.add('show');
    document.body.classList.add("noscroll");

})
closeBtn.addEventListener('click', function (e) {
    e.preventDefault();
    mobileMenu.classList.remove('show');
    document.body.classList.remove("noscroll");

})
if (typeof osm === "function") {
    osm();
}

// Select the header element
var header = document.querySelector('header.header-area');

// Function to add or remove the sticky class based on scroll position
function toggleStickyClass() {
  if (window.scrollY > 120) {
    header.classList.add('sticky');
  } else {
    if (window.scrollY < 40) {
    header.classList.remove('sticky');
    }
  }
}

// Listen for scroll events on the window
window.addEventListener('scroll', toggleStickyClass);
document.addEventListener('DOMContentLoaded',toggleStickyClass);