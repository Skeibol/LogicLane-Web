let sliderWrap = document.querySelector(".slider-wrap");
let slider = document.querySelector(".slider");
let clonesWidth;
let sliderWidth;
let clones = [];
let scrollPos = 1;
let sliderHover = false;
let req;
let items = [...document.querySelectorAll(".slider-item")];
let images = [...document.querySelectorAll(".img-div")];

images.forEach((image, idx) => {
  image.style.backgroundImage = `url(./images/${idx + 1}.png)`;
});

items.forEach((item) => {
  let clone = item.cloneNode(true);
  clone.classList.add("clone");
  slider.appendChild(clone);
  clones.push(clone);
});

sliderWrap.addEventListener("mouseover", () => {
  sliderHover = true;
});

sliderWrap.addEventListener("mouseleave", () => {
  sliderHover = false;
});

function getClonesWidth() {
  let width = 0;
  clones.forEach((clone) => {
    width += clone.offsetWidth;
  });
  return width;
}

function scrollUpdate() {
  if (window.innerWidth > 760) {
    sliderWrap.style.overflow = "hidden";
    if (!sliderHover) {
      scrollPos -= 1.5;
    }

    if (clonesWidth + scrollPos >= sliderWidth) {

      scrollPos = 1;
    } else if (scrollPos <= 0) {

      scrollPos = sliderWidth - clonesWidth - 1;
    }
    slider.style.transform = `translateX(${-scrollPos}px)`;

    req = requestAnimationFrame(scrollUpdate);
  } else {
    sliderWrap.style.overflow = "scroll";
  }
}

window.addEventListener("resize", onLoad);

function onLoad() {
  cancelAnimationFrame(req);
  calaculateDimensions();
  scrollPos = 1;
  scrollUpdate();
}

function calaculateDimensions() {
  sliderWidth = slider.getBoundingClientRect().width;
  clonesWidth = getClonesWidth();
}

onLoad();
