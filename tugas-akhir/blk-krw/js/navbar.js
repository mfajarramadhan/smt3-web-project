// Navbar
// Toggle
const navbarNav = document.querySelector('.navbar-nav');

document.querySelector('#hamburger-menu').onclick = () => {
    navbarNav.classList.toggle('active');
    event.preventDefault();
};

// Tutup Sidebar
const hamburgerMenu = document.querySelector('#hamburger-menu');

document.addEventListener('click', function (e) {
    if (!hamburgerMenu.contains(e.target) && !navbarNav.contains(e.target)) {
        navbarNav.classList.remove('active');
    }
});