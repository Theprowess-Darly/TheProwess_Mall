document.addEventListener('DOMContentLoaded', function() {
    // Get carousel elements
    const track = document.querySelector('.carousel-track');
    const slides = document.querySelectorAll('.carousel-item');
    const nextButton = document.querySelector('.carousel-next');
    const prevButton = document.querySelector('.carousel-prev');
    const dotsContainer = document.querySelector('.carousel-dots');
    
    // Initialize variables
    let currentIndex = 0;
    let autoplayInterval;
    
    // Create dot indicators
    if (slides.length > 0 && dotsContainer) {
        slides.forEach((_, index) => {
            const dot = document.createElement('button');
            dot.classList.add('carousel-dot');
            if (index === 0) dot.classList.add('active');
            dot.addEventListener('click', () => {
                goToSlide(index);
            });
            dotsContainer.appendChild(dot);
        });
    }
    
    // Update carousel position
    function updateCarousel() {
        if (!track) return;
        
        // Update slide position
        track.style.transform = `translateX(-${currentIndex * 100}%)`;
        
        // Update dots
        const dots = document.querySelectorAll('.carousel-dot');
        dots.forEach((dot, index) => {
            if (index === currentIndex) {
                dot.classList.add('active');
            } else {
                dot.classList.remove('active');
            }
        });
    }
    
    // Go to specific slide
    function goToSlide(index) {
        currentIndex = index;
        updateCarousel();
        resetAutoplay();
    }
    
    // Go to next slide
    function nextSlide() {
        if (!slides.length) return;
        currentIndex = (currentIndex + 1) % slides.length;
        updateCarousel();
        resetAutoplay();
    }
    
    // Go to previous slide
    function prevSlide() {
        if (!slides.length) return;
        currentIndex = (currentIndex - 1 + slides.length) % slides.length;
        updateCarousel();
        resetAutoplay();
    }
    
    // Reset autoplay timer
    function resetAutoplay() {
        clearInterval(autoplayInterval);
        startAutoplay();
    }
    
    // Start autoplay
    function startAutoplay() {
        autoplayInterval = setInterval(nextSlide, 5000);
    }
    
    // Add event listeners
    if (nextButton) nextButton.addEventListener('click', nextSlide);
    if (prevButton) prevButton.addEventListener('click', prevSlide);
    
    // Initialize autoplay
    startAutoplay();
    
    // Initialize carousel
    updateCarousel();
});