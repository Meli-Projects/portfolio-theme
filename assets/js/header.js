document.addEventListener('DOMContentLoaded', function () {
    // Retrieves the mobile menu elements.
    const menuToggle = document.querySelector('.menu-toggle');
    const navigation = document.querySelector('.main-navigation');

    if (!menuToggle || !navigation) {
        return;
    }
    // Opens and closes the mobile navigation.
    menuToggle.addEventListener('click', function () {
        const isOpen = navigation.classList.toggle('open');

        menuToggle.setAttribute('aria-expanded', isOpen);
        menuToggle.setAttribute(
            'aria-label',
            isOpen ? 'Fermer le menu' : 'Ouvrir le menu'
        );
    });
});