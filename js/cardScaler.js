function getCards() {
    return document.querySelectorAll(".card-box")
}

getCards().forEach(element => {
    $(element).on({
        mouseenter: function () {
            $(element).addClass("expand")
            $(element).siblings().addClass("shrink")
        },
        mouseleave: function () {
            $(element).removeClass("expand")
            $(element).siblings().removeClass("shrink")
        }
    })
});
