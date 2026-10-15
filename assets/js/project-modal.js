document.addEventListener('DOMContentLoaded', function () {

    document.addEventListener('click', function (event) {

        // Opens the project modal.
        const openButton = event.target.closest('.project-discover');

        if (openButton) {
            const projectCard = openButton.closest('.project-card');
            const modal = projectCard.querySelector('.project-modal');

            if (modal) {
                modal.showModal();
            }
        }

        // Closes the project modal.
        const closeButton = event.target.closest('.project-modal_close');

        if (closeButton) {
            const modal = closeButton.closest('.project-modal');

            if (modal) {
                modal.close();
            }
        }
    });
});