let slideIndex = 0;
    const slides = document.querySelectorAll('.slide');
    const totalSlides = slides.length;

    function showSlides() {
        slideIndex++;
        if (slideIndex >= totalSlides) {
            slideIndex = 0;
        }
        document.querySelector('.slides').style.transform = `translateX(-${slideIndex * 100}%)`;
    }

    setInterval(showSlides, 3000);