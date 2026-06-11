document.addEventListener('DOMContentLoaded', () => {

    document.querySelectorAll('.gallery-slider').forEach(slider => {

        const slides = slider.querySelectorAll('.slide');
        const next = slider.querySelector('.slide-next');
        const prev = slider.querySelector('.slide-prev');

        if (slides.length === 0 || !next || !prev) {
            return;
        }

        let current = 0;

        function showSlide(index) {

            slides.forEach(slide => {
                slide.classList.remove('active');
            });

            slides[index].classList.add('active');
        }

        next.addEventListener('click', () => {

            current++;

            if (current >= slides.length) {
                current = 0;
            }

            showSlide(current);
        });

        prev.addEventListener('click', () => {

            current--;

            if (current < 0) {
                current = slides.length - 1;
            }

            showSlide(current);
        });

    });

});