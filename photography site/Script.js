document.addEventListener('DOMContentLoaded', function () {
    const navbar = document.querySelector('.navbar');
    const navLinks = document.querySelectorAll('.nav-link');

    document.addEventListener('mousemove', function (e) {
        if (e.clientY < 100) { 
            navbar.classList.add('visible');
        } else {
            navbar.classList.remove('visible');
        }
    });

    navLinks.forEach(link => {
        link.addEventListener('click', function () {
            navLinks.forEach(nav => nav.classList.remove('active'));
            this.classList.add('active');
        });
    });
});
let slideIndex = 0;
const totalSlides = document.getElementsByClassName("mySlides").length;


function showSlides() {
    let slides = document.getElementsByClassName("mySlides");
    
    for (let i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    
    slideIndex++;
    if (slideIndex > slides.length) {
        slideIndex = 1;
    }
    
    slides[slideIndex - 1].style.display = "block";
    setTimeout(showSlides, 4000); 
}

document.addEventListener("DOMContentLoaded", function() {
    showSlides();
});

