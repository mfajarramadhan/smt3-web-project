// Start Script Galery Slider
var responsiveSlider = function () {
  var slider = document.getElementById("slider");
  var sliderWidth = slider.offsetWidth;
  var slideList = document.getElementById("slideWrap");
  var count = 1;
  var items = slideList.querySelectorAll("li").length;
  var prev = document.getElementById("prev");
  var next = document.getElementById("next");

  window.addEventListener("resize", function () {
    sliderWidth = slider.offsetWidth;
  });

  var prevSlide = function () {
    if (count > 1) {
      count = count - 2;
      slideList.style.left = "-" + count * sliderWidth + "px";
      count++;
    } else if ((count = 1)) {
      count = items - 1;
      slideList.style.left = "-" + count * sliderWidth + "px";
      count++;
    }
  };

  var nextSlide = function () {
    if (count < items) {
      slideList.style.left = "-" + count * sliderWidth + "px";
      count++;
    } else if ((count = items)) {
      slideList.style.left = "0px";
      count = 1;
    }
  };

  next.addEventListener("click", function () {
    nextSlide();
  });

  prev.addEventListener("click", function () {
    prevSlide();
  });

  setInterval(function () {
    nextSlide();
  }, 2000);
};

window.onload = function () {
  responsiveSlider();
};

// End Script Galery Slider

let feat = document.querySelector(".feat-btn");
let show = document.querySelector("nav ul .feat-show");
let icon = document.querySelector("nav ul .first");
feat.addEventListener("click", function () {
  show.classList.toggle("show");
  icon.classList.toggle("rotate");
});

let serv = document.querySelector(".serv-btn");
let show2 = document.querySelector("nav ul .serv-show");
let icon2 = document.querySelector("nav ul .second");
serv.addEventListener("click", function () {
  show2.classList.toggle("show");
  icon2.classList.toggle("rotate");
});






