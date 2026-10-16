document.addEventListener('DOMContentLoaded', function () {

    const siteTypeFilter = document.querySelector('#type-site');
    const originFilter = document.querySelector('#origine');
    const projectsList = document.querySelector('.projects-list');
    const loadMoreButton = document.querySelector('.load-more-projects');


    /* ---- AJAX project loading ---- */
function loadProjects(page = 1, isAppend = false) {

    const data = {
        action: 'load_more_projects',
        nonce: portfolioData.nonce,
        page: page,
        type_site: siteTypeFilter?.dataset.value || '',
        origine: originFilter?.dataset.value || ''
    };

    fetch(portfolioData.ajaxUrl, {
        method: 'POST',
        body: new URLSearchParams(data)
    })
        .then((response) => response.json())
        .then((result) => {

            if (!result.success) {
                return;
            }

            const html = result.data.html;
            const maxPages = parseInt(result.data.max_pages);

            if (isAppend) {
                projectsList.insertAdjacentHTML('beforeend', html);
            } else {
                projectsList.innerHTML = html;
            }

            if (loadMoreButton) {
                loadMoreButton.dataset.page = page;
                loadMoreButton.dataset.maxPages = maxPages;

                if (page >= maxPages) {
                    loadMoreButton.style.display = 'none';
                } else {
                    loadMoreButton.style.display = '';
                }
            }
        });
}

    /* ---- Load more button ---- */
    if (loadMoreButton) {
        loadMoreButton.addEventListener('click', function () {

            const currentPage = parseInt(loadMoreButton.dataset.page);
            const nextPage = currentPage + 1;

            loadProjects(nextPage, true);
        });
    }

    /* ---- Custom filters ---- */
    const customSelects = document.querySelectorAll('.custom-select');

    customSelects.forEach((customSelect) => {
        const select = customSelect.querySelector('.select');
        const selectText = customSelect.querySelector('.select-text');
        const options = customSelect.querySelectorAll('.options-list li');

        if (select) {
            select.addEventListener('click', (event) => {
                event.stopPropagation();
                customSelect.classList.toggle('open');
            });
        }

        options.forEach((option) => {
            option.addEventListener('click', () => {

                options.forEach((item) => {
                    item.classList.remove('selected');
                });

                if (option.dataset.value === '') {
                    selectText.textContent =
                        customSelect.dataset.placeholder;
                } else {
                    selectText.textContent =
                        option.textContent;
                    option.classList.add('selected');
                }

                customSelect.dataset.value = option.dataset.value;

                loadProjects();

                customSelect.classList.remove('open');
            });
        });
    });


    /* ---- Closes filters when clicking outside ---- */
    document.addEventListener('click', () => {
        customSelects.forEach((customSelect) => {
            customSelect.classList.remove('open');
        });
    });

});