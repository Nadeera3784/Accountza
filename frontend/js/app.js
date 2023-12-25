
$(document).ready(function(){
    if ($('#hero-parallax').length) {
        var hero_parallax = document.getElementById('hero-parallax');
        var parallaxInstance = new Parallax(hero_parallax);
    }


    new WOW().init();
    
});