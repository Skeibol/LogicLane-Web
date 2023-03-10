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
    if(document.getScroll()[1] > headerHeight - navbarHeight - 110){
        $(".navbar").addClass("scrolled")

    }
    else{
        $(".navbar").removeClass("scrolled")

    }
});

const navLinks = document.querySelectorAll('.nav-item')
const menuToggle = document.getElementById('navbarNav')
const bsCollapse = new bootstrap.Collapse(menuToggle, {toggle:false})
if ($('.navbar-toggler').attr('aria-expanded') === "true") {
        navLinks.forEach((l) => {
            l.addEventListener('click', () => { bsCollapse.toggle() })
        })
    }

$(document).click(function (event) {
    var clickover = $(event.target);
    var $navbar = $(".navbar-collapse");               
    var _opened = $navbar.hasClass("show");
    if (_opened === true && !clickover.hasClass("navbar-toggler")) {      
        $navbar.collapse('hide');
    }
});
