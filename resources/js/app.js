import './components/carousel.js';
import './components/alerts.js';
import './components/stagiaires-filters.js';

document.addEventListener('DOMContentLoaded', () => {
    const toggle = document.querySelector('[data-nav-toggle]');
    const menu = document.querySelector('[data-mobile-menu]');
    if (toggle && menu) toggle.addEventListener('click', () => menu.classList.toggle('open'));
    initAlerts();
    initCarousels();
});
