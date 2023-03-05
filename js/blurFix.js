
window.onload = function () {
    $(".navbar").css("backdrop-filter", "blur(6px)")
};

window.addEventListener('resize', function (event) {
    $(".navbar").css("backdrop-filter", "")
    setTimeout(() => { $(".navbar").css("backdrop-filter", "blur(6px)"); }, 100);
}, true);