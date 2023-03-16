import projectsJSON from "../js/data.json" assert { type: "json" };

function getSlides() {
  return $(".carousel--slide");
}

function setText() {
  $(".carousel--header").text(projects[projectIndex].title);
  $(".carousel--text").text(projects[projectIndex].content);
  $(".carousel--button").attr("href", projects[projectIndex].url);
}
function switchText(reverse = false) {
  $(".carousel--header").text(projects[projectIndex].title);
  $(".carousel--text").text(projects[projectIndex].content);
  $(".carousel--button").attr("href", projects[projectIndex].url)
}

function switchTextMobile(reverse = false) {
  $(".carousel-mobile--title").text(projects[projectIndex].title);
  $(".carousel-mobile--description").text(projects[projectIndex].content);
  $(".carousel--button").attr("href", projects[projectIndex].url) // CAROUSEL--BUTTON-MOBILE?
}

function setImages() {
  for (var i = 0; i < projects.length; i++) {
    $("." + classes[i]).children()[0].src = projects[i].image;
  }

  $(".carousel-mobile--image").css(
    "background-image",
    `url(${projects[projectIndex].image})`
  );
}

function incrementIndex(backwards = false, printIndex = false) {
  if (backwards) {
    projectIndex -= 1;
  } else {
    projectIndex += 1;
  }
  if (projectIndex > numProjects - 1) {
    projectIndex = 0;
  }
  if (projectIndex < 0) {
    projectIndex = numProjects - 1;
  }
  if (printIndex) {
    console.log(projectIndex);
  }
}

function switchImageMobile(backwards = false) {
  $(".carousel-mobile--image").css(
    "background-image",
    `url(${projects[projectIndex].image})`
  );
}

function shiftList(list, reverse = false) {
  var listCopy = [...list];

  if (!reverse) {
    for (var i = list.length - 1; i >= 0; i--) {
      if (i == 0) {
        list[i] = listCopy[list.length - 1];
        continue;
      }
      list[i] = listCopy[i - 1];
    }
    return list;
  }

  for (var i = 0; i < list.length; i++) {
    if (i == list.length - 1) {
      list[i] = listCopy[0];
      continue;
    }
    list[i] = listCopy[i + 1];
  }
  return list;
}

function shiftClasses(slides, classes, reverse = false) {
  if (!reverse) {
    for (var i = slides.length - 1; i >= 0; i--) {
      if (i == 0) {
        $(slides[i]).removeClass(classes[i]);
        $(slides[i]).addClass(classes[slides.length - 1]);
        continue;
      }
      $(slides[i]).removeClass(classes[i]);
      $(slides[i]).addClass(classes[i - 1]);
    }
  } else {
    for (var i = 0; i < slides.length; i++) {
      if (i == getSlides().length - 1) {
        $(slides[i]).removeClass(classes[i]);
        $(slides[i]).addClass(classes[0]);
        continue;
      }
      $(slides[i]).removeClass(classes[i]);
      $(slides[i]).addClass(classes[i + 1]);
    }
  }
}

function cacheImages() {
  var cache = [];
  for (let i = 0; i < numProjects; i++) {
    let cachedImg = new Image();
    cachedImg.src = projects[i].image;
    cache.push(cachedImg);
  }
}

const projects = projectsJSON;
var numProjects = projects.length;
var projectIndex = 2;
var classes = [
  "carousel--pos0",
  "carousel--pos1",
  "carousel--pos2",
  "carousel--pos3",
  "carousel--pos4",
];

cacheImages();
setText();
setImages();
switchTextMobile();
$(".switch-down").click(function () {
  if (!$(this).hasClass('waitingForTimeout')) {
    // do whatever when it's active.
    incrementIndex();
    switchText();
    var slides = getSlides();
    shiftClasses(slides, classes);
    classes = shiftList(classes);
    $(this).addClass("waitingForTimeout")
    setTimeout(() => { $(".switch-down").removeClass("waitingForTimeout") }, "700")
  }
});

$(".switch-up").click(function () {
  if (!$(this).hasClass('waitingForTimeout')) {
    incrementIndex(true);
    switchText(true);
    var slides = getSlides();
    shiftClasses(slides, classes, true);
    classes = shiftList(classes, true);
    $(this).addClass("waitingForTimeout")
    setTimeout(() => { $(".switch-up").removeClass("waitingForTimeout") }, "700")
  }
});

$(".carousel-mobile--arrow.left").click(function () {
  incrementIndex(true);
  switchTextMobile();
  switchImageMobile();
});

$(".carousel-mobile--arrow.right").click(function () {
  incrementIndex();
  switchTextMobile();
  switchImageMobile();
});
