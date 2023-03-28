function removeFAQClasses() {
  var acc = document.getElementsByClassName("FAQ--section");

  for (i = 0; i < acc.length; i++) {
    panel = acc[i].nextElementSibling;
    panel.classList.remove("FAQ--active");
    acc[i].classList.remove("FAQ--active");
    acc[i].children[0].classList.remove("rotate-right");
    panel.style.maxHeight = null;
  }
}

function addFAQClass(clickedContainer) {
  panel = clickedContainer.nextElementSibling;
  panel.classList.add("FAQ--active");
  clickedContainer.children[0].classList.add("rotate-right");
  clickedContainer.classList.add("FAQ--active");
  panel.style.maxHeight = panel.scrollHeight + "px";
}

var acc = document.getElementsByClassName("FAQ--section");
var i;
for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function () {
    var panel = this.nextElementSibling;

    if (panel.classList.contains("FAQ--active")) {
      panel.classList.remove("FAQ--active");
      this.classList.remove("FAQ--active");
      this.children[0].classList.remove("rotate-right");
      panel.style.maxHeight = null;
      console.log("before");
      removeFAQClasses();
      return;
    }

    addFAQClass(this);
    //this.addEventListener("click", (event) => {
    //});
  });
}
