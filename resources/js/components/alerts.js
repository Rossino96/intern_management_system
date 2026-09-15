document.addEventListener('DOMContentLoaded', () => {
    const confirmForms = document.querySelectorAll('[data-confirm]');

    confirmForms.forEach(form => {
        form.addEventListener('submit', event => {
            const message = form.dataset.confirm;

            if (!confirm(message)) {
                event.preventDefault();
            }
        });
    });
});