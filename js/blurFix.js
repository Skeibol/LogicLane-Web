
window.addEventListener('resize', function (event) {
    $(".navbar").removeClass("navbar-filter")
   
    console.log("resized")
    setTimeout(() => {  $(".navbar").addClass("navbar-filter"); }, 300);
}, true);