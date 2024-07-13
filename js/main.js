/* Navigation Bar fUNCTION */
function myMenuFunction(){
    var menuBtn = document.getElementById("myNavMenu");

    if(menuBtn.className === "nav-menu"){
        menuBtn.className += "";
    } else {
        menuBtn.className = "nav-menu";

    }
}


/* Add Shadow on Navigation Bar */
window.onscroll = function(){headerShadow()};

function headerShadow(){
    const navHeader = document.getElementById("header");
    
    if(document.body.scrollTop > 50 || document.documentElement.scrollTop > 50 ){

        navHeader.style.boxShadow = "0 1px 6px rgb(0, 0, 0, 0.1)";
        navHeader.style.height = "70px";
        navHeader.style.lineHeight = "70px";
    } else {
        
        navHeader.style.boxShadow = "none";
        navHeader.style.height = "90px";
        navHeader.style.lineHeight = "90px";

    }
}



document.addEventListener('DOMContentLoaded', function() {
    // Typing Effect
    var typingEffect = new Typed(".typedText", {
        strings: [""],
        loop: true,
        typeSpeed: 100,
        backSpeed: 80,
        backDelay: 2000
    });

    // Scroll Reveal animation
    ScrollReveal().reveal('.featured-text-card', {});

    // Home
    ScrollReveal().reveal('.section', { interval: 200 });

    // Project Box
    ScrollReveal().reveal('.project-box', { interval: 200 });
});


/* Headings */


/* Scroll Reveal left right */

