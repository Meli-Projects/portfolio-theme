document.addEventListener('DOMContentLoaded', function () {

    const projectCards = document.querySelectorAll('.project-card');

    projectCards.forEach(function (card) {

        const openButton = card.querySelector('.project-discover');
        const modal = card.querySelector('.project-modal');
        const closeButton = card.querySelector('.project-modal_close');

        if (!openButton || !modal || !closeButton) {
            return;
        }

        openButton.addEventListener('click', function () {
            modal.showModal();
        });

        closeButton.addEventListener('click', function () {
            modal.close();
        });

    });

});