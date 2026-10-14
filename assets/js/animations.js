document.addEventListener('DOMContentLoaded', function () {

     /* Elements appear on scroll */
    // Gets all elements with the reveal class
    const revealElements = document.querySelectorAll('.reveal');

    // Observes when elements enter the visible area
    const observer = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
            if (entry.isIntersecting) {
                // Shows the element
                entry.target.classList.add('visible');

                // Stops observing the element once the animation has played
                observer.unobserve(entry.target);
            }
        });
    }, {
        threshold: 0.2
    });

    // Starts observing each element
    revealElements.forEach(function (element) {
        observer.observe(element);
    });


    /* Hero title animation */
    const heroTitleText = document.querySelector('.hero-title_text');
    const heroTitleAccent = document.querySelector('.hero-title_accent');
    const heroParagraph = document.querySelector('.hero-content > p');

    if (heroTitleText && heroTitleAccent) {
        const firstText = heroTitleText.textContent.trim();
        const secondText = heroTitleAccent.textContent.trim();
        const fullText = firstText + ' ' + secondText;
        const firstPartLength = firstText.length + 1;

        let currentLength = 0;

        // Updates the currently visible part of the title
        function updateTitle() {
            const visibleText = fullText.slice(0, currentLength);

            heroTitleText.textContent =
                visibleText.slice(0, firstPartLength);

            heroTitleAccent.textContent =
                visibleText.slice(firstPartLength);
        }

        // Writes the title character by character
        function writeTitle() {
            if (currentLength < fullText.length) {
                currentLength++;
                updateTitle();

                setTimeout(writeTitle, 130);
            } else {
                // Shows the paragraph once the title is fully written
                if (heroParagraph) {
                    heroParagraph.classList.add('is-visible');
                }

                // Waits before starting to delete the title
                setTimeout(deleteTitle, 2000);
            }
        }

        // Deletes the title character by character
        function deleteTitle() {
            if (currentLength > 0) {
                currentLength--;
                updateTitle();

                setTimeout(deleteTitle, 70);
            } else {
                // Waits before starting the writing animation again
                setTimeout(writeTitle, 700);
            }
        }

        // Clears the title before starting the animation
        heroTitleText.textContent = '';
        heroTitleAccent.textContent = '';

        // Starts after the blue line animation
        setTimeout(writeTitle, 800);
    }

});