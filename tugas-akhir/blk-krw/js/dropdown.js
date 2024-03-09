let feat = document.querySelector('.feat-btn');
let show = document.querySelector('nav ul .feat-show');
let icon = document.querySelector('nav ul .first');
feat.addEventListener('click', function () {
    show.classList.toggle('show');
    icon.classList.toggle('rotate');
});

let serv = document.querySelector('.serv-btn');
let show2 = document.querySelector('nav ul .serv-show');
let icon2 = document.querySelector('nav ul .second');
serv.addEventListener('click', function () {
    show2.classList.toggle('show');
    icon2.classList.toggle('rotate');
});