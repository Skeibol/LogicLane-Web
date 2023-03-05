function getSlides() {
    return $(".carousel--slide");
}

function shiftList(list) {
    var listCopy = [...list];
    for (var i = 0; i < list.length; i++) {
        if (i == list.length - 1) {
            list[i] = listCopy[0];
            continue
        }
        list[i] = listCopy[i + 1];
    }
    return list;
}



var classes = ["carousel--pos0",
    "carousel--pos1",
    "carousel--pos2",
    "carousel--pos3",
    "carousel--pos4"]
var textIndex = 0;
var texts = ["Praesent blandit neque dui, sed elementum ligula pretium at. Sed ultrices, libero non dignissim tincidunt, sapien ante commodo orci, nec semper magna neque sit amet nunc. Pellentesque quis nibh eget ante facilisis dictum. Fusce id quam justo. Aliquam interdum faucibus fermentum. Proin et eleifend elit.", "2. Ines beba", "3. ines mrklica", "4. intropo", "5. beba radi html"]
//$(".carousel--text").text(texts[textIndex])
//textIndex += 1;
$(".switch-down").click(function () {
    //$(".carousel--text").text(texts[textIndex])
    //textIndex += 1;
    //if (textIndex == texts.length) {
    //    textIndex = 0;
    //}
    var slides = getSlides();
    for (var i = 0; i < slides.length; i++) {
        if (i == getSlides().length - 1) {
            $(slides[i]).removeClass(classes[i])
            $(slides[i]).addClass(classes[0])
            continue;
        }
        $(slides[i]).removeClass(classes[i])
        $(slides[i]).addClass(classes[i + 1])
    }
    classes = shiftList(classes);
})

