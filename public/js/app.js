document.addEventListener('DOMContentLoaded', () => {
    const menuButton = document.querySelector('[data-menu-toggle]');
    const navigation = document.querySelector('[data-primary-nav]');

    if (menuButton && navigation) {
        menuButton.addEventListener('click', () => {
            const expanded = menuButton.getAttribute('aria-expanded') === 'true';
            menuButton.setAttribute('aria-expanded', String(!expanded));
            menuButton.setAttribute('aria-label', expanded ? 'Open navigation' : 'Close navigation');
            navigation.classList.toggle('is-open', !expanded);
        });
    }

    document.querySelectorAll('[data-search-table]').forEach((section) => {
        const input = section.querySelector('[data-search-input]');
        const rows = [...section.querySelectorAll('[data-search-row]')];
        const empty = section.querySelector('[data-search-empty]');
        const count = section.querySelector('[data-search-count]');

        if (!input || !empty || !count) return;

        const noun = section.querySelector('#customer-list-title') ? 'customers' : 'users';
        const filter = () => {
            const query = input.value.trim().toLocaleLowerCase();
            let visible = 0;

            rows.forEach((row) => {
                const matches = row.textContent.toLocaleLowerCase().includes(query);
                row.hidden = !matches;
                if (matches) visible += 1;
            });

            empty.hidden = visible !== 0;
            count.textContent = `Showing ${visible} of ${rows.length} ${noun}`;
        };

        input.addEventListener('input', filter);
    });
});
