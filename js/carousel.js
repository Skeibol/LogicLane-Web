function getSlides() {
    return $(".carousel--slide");
}

function shiftList(list,reverse=false) {
    var listCopy = [...list];

    if (reverse){
        for (var i = list.length - 1; i >= 0; i--) {
            if (i == 0) {
                list[i] = listCopy[list.length - 1];
                continue
            }
            list[i] = listCopy[i - 1];
        }
        return list;
    }

    for (var i = 0; i < list.length; i++) {
        if (i == list.length - 1) {
            list[i] = listCopy[0];
            continue
        }
        list[i] = listCopy[i + 1];
    }
    return list;
}

function shiftClasses(slides,classes,reverse=false){
    if(reverse){
        for (var i = slides.length - 1; i >= 0; i--) {
            if (i == 0) {
                $(slides[i]).removeClass(classes[i])
                $(slides[i]).addClass(classes[slides.length - 1])
                continue;
            }
            $(slides[i]).removeClass(classes[i])
            $(slides[i]).addClass(classes[i - 1])
        }
    }
    else{
        for (var i = 0; i < slides.length; i++) {
            if (i == getSlides().length - 1) {
                $(slides[i]).removeClass(classes[i])
                $(slides[i]).addClass(classes[0])
                continue;
            }
            $(slides[i]).removeClass(classes[i])
            $(slides[i]).addClass(classes[i + 1])
        }
    }
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
    shiftClasses(slides,classes);
    classes = shiftList(classes);
})


$(".switch-up").click(function () {
    //$(".carousel--text").text(texts[textIndex])
    //textIndex += 1;
    //if (textIndex == texts.length) {
    //    textIndex = 0;
    //}
    var slides = getSlides();
    shiftClasses(slides,classes,true);
    classes = shiftList(classes,true);
})

