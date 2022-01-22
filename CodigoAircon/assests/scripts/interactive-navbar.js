$(document).ready(function(){
    function setNavbar(){
        if(window.innerWidth > 822){
            $(".navbar-options").css("display","flex");
        }
        else if (window.innerWidth < 822) {
            $(".navbar-options").css("display","none");
        }
    }

    $("#toggle-button").click(function(){
        $(".navbar-options").slideToggle("fast");
    });

    window.addEventListener("resize", setNavbar);
});