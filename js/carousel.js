import projects from "../js/data.json" assert{type: "json"}

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
function setText(){
    $(".carousel--header").text(projects[projectIndex].title)
    $(".carousel--text").text(projects[projectIndex].content)
}
function switchText(reverse=false){
    if(reverse){
        projectIndex-=1;
        if (projectIndex<0){    
            projectIndex = numProjects - 1;
        }
    }
    else{
        projectIndex+=1;
        if(projectIndex==numProjects){
            projectIndex = 0;
        }
    }
    $(".carousel--header").text(projects[projectIndex].title)
    $(".carousel--text").text(projects[projectIndex].content)
}

function setImages(){
    for(var i = 0; i<projects.length; i++){
        $("."+classes[i]).children()[0].src = projects[i].image
    }
}

var numProjects = projects.length;
var projectIndex = 0;
var classes = ["carousel--pos0",
    "carousel--pos1",
    "carousel--pos2",
    "carousel--pos3",
    "carousel--pos4"]


setText();
setImages();

$(".switch-down").click(function () {
    switchText();
    var slides = getSlides();
    shiftClasses(slides,classes);
    classes = shiftList(classes);
})


$(".switch-up").click(function () {
    switchText(true);
    var slides = getSlides();
    shiftClasses(slides,classes,true);
    classes = shiftList(classes,true);
})

