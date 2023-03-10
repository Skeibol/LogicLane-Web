images = [
  "images/samples/sample1.jpg",
  "images/samples/NN.jpg",
  "images/samples/sample2.jpg",
  "images/samples/sample3.jpg",
  "images/samples/sample4.jpg",
];
var index = 0;
function switchImageMobile(backwards = false) {
  console.log("helo");
  $(".carousel-mobile--image").css("background-image", `url(${images[index]})`);
  index += 1;
  if (index > images.length - 1) {
    index = 0;
  }
  if (index < 0) {
    index = images.length;
  }
}
