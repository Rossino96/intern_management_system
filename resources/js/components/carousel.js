document.addEventListener('DOMContentLoaded', () => {
    const carousels = document.querySelectorAll('.carousel-shell');

    carousels.forEach((carousel) => {
        const track = carousel.querySelector('[data-carousel-track]');
        const cards = Array.from(
            carousel.querySelectorAll('[data-carousel-card]')
        );

        const previousButton = carousel.querySelector('[data-carousel-prev]');
        const nextButton = carousel.querySelector('[data-carousel-next]');

        if (!track || !cards.length || !previousButton || !nextButton) {
            return;
        }

        let currentIndex = 0;

        const updateCarousel = () => {
            const totalCards = cards.length;

            /*
             * Détermine la carte centrale.
             */
            cards.forEach((card, index) => {
                card.classList.toggle(
                    'active',
                    index === currentIndex
                );
            });

            /*
             * Calcule le déplacement horizontal.
             */
            const cardWidth = 100 / 3;

            const offset =
                (currentIndex * cardWidth) -
                cardWidth;

            track.style.transform =
                `translateX(-${offset}%)`;

            /*
             * Désactive les boutons aux extrémités.
             */
            previousButton.disabled = currentIndex === 0;

            nextButton.disabled =
                currentIndex === totalCards - 1;
        };

        /*
         * Carte suivante
         */
        nextButton.addEventListener('click', () => {
            if (currentIndex < cards.length - 1) {
                currentIndex++;
                updateCarousel();
            }
        });

        /*
         * Carte précédente
         */
        previousButton.addEventListener('click', () => {
            if (currentIndex > 0) {
                currentIndex--;
                updateCarousel();
            }
        });

        /*
         * État initial
         */
        updateCarousel();
    });
});