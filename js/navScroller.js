document.getScroll = function() {
    if (window.pageYOffset != undefined) {
        return [pageXOffset, pageYOffset];
    } else {
        var sx, sy, d = document,
            r = d.documentElement,
            b = d.body;
        sx = r.scrollLeft || b.scrollLeft || 0;
        sy = r.scrollTop || b.scrollTop || 0;
        return [sx, sy];
    }
}


var headerHeight = document.getElementsByClassName('hero-container')[0].offsetHeight
var navbarHeight = document.getElementsByClassName('navbar')[0].offsetHeight
$(window).on('scroll',function() {
    if(document.getScroll()[1] > headerHeight - navbarHeight){
        $(".navbar").addClass("scrolled")

    }
    else{
        $(".navbar").removeClass("scrolled")

    }
});