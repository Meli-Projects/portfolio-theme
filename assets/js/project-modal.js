document.addEventListener('DOMContentLoaded', function () {

    const projectCards = document.querySelectorAll('.project-card');

    projectCards.forEach(function (card) {
        const openButton = card.querySelector('.project-discover');
        const modal = card.querySelector('.project-modal');
        const closeButton = card.querySelector('.project-modal_close');

        if (!openButton || !modal || !closeButton) {
            return;
        }
        // Opens the project modal.
        openButton.addEventListener('click', function () {
            modal.showModal();
        });
        // Closes the project modal with the close button.
        closeButton.addEventListener('click', function () {
            modal.close();
        });

    });

});