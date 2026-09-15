export function initCarousels() {
    document.querySelectorAll("[data-carousel-track]").forEach((track) => {
        const cards = [...track.querySelectorAll("[data-carousel-card]")];
        const root = track.closest("[data-carousel]") || document;
        const prev = root.querySelector("[data-carousel-prev]");
        const next = root.querySelector("[data-carousel-next]");
        if (!cards.length || !prev || !next) return;
        let index = 0;
        const perView = () =>
            window.innerWidth < 640 ? 1 : window.innerWidth < 1024 ? 2 : 3;
        const render = () => {
            const visible = perView();
            const max = Math.max(0, cards.length - visible);
            index = Math.min(index, max);
            const gap = 18;
            const width = cards[0].getBoundingClientRect().width;
            track.style.transform = `translateX(-${index * (width + gap)}px)`;
            cards.forEach((card, i) =>
                card.classList.toggle(
                    "is-side",
                    i < index || i >= index + visible,
                ),
            );
            const disabled = cards.length <= visible;
            prev.disabled = disabled;
            next.disabled = disabled;
            prev.style.opacity = disabled ? ".35" : "1";
            next.style.opacity = disabled ? ".35" : "1";
        };
        prev.addEventListener("click", () => {
            index = Math.max(0, index - 1);
            render();
        });
        next.addEventListener("click", () => {
            index = Math.min(Math.max(0, cards.length - perView()), index + 1);
            render();
        });
        window.addEventListener("resize", render);
        render();
    });
}
