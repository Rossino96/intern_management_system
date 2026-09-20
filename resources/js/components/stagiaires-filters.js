document.addEventListener('DOMContentLoaded', () => {
    const searchToggle = document.querySelector('#search-toggle');
    const filterToggle = document.querySelector('#filter-toggle');

    const searchPanel = document.querySelector('#search-panel');
    const filterPanel = document.querySelector('#filter-panel');

    if (!searchToggle || !filterToggle || !searchPanel || !filterPanel) {
        return;
    }

    searchToggle.addEventListener('click', () => {
        searchPanel.classList.toggle('open');

        // Ferme le panneau des filtres
        filterPanel.classList.remove('open');
    });

    filterToggle.addEventListener('click', () => {
        filterPanel.classList.toggle('open');

        // Ferme le panneau de recherche
        searchPanel.classList.remove('open');
    });
});