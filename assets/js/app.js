/**
 * Switch current theme to the choosen one
 *
 * @param {string} theme 
 */
function switchTheme(theme)
{  
    // Parameter and select value
    localStorage.theme = theme;
    document.querySelector('select[name=change-theme]').value = theme;
    // Style
    switch (theme) {
        case 'system':
            if (window.matchMedia('(prefers-color-scheme: dark)').matches) {
                document.documentElement.classList.add('dark');
            } else {
                document.documentElement.classList.remove('dark');
            }
            break;
        case 'dark':
            document.documentElement.classList.add('dark');
            break;
        case 'light':
            document.documentElement.classList.remove('dark');
            break;
    }
}

// Default theme check
switchTheme(('theme' in localStorage) ? localStorage.theme : 'system');

// Switch theme setting
document.querySelector('select[name=change-theme]').addEventListener('change', e => {
    switchTheme(e.target.value);
});

// Sidebar
document.querySelector('button#display-sidebar').addEventListener('click', e => {
    e.stopPropagation();
    document.querySelector('aside').classList.remove('hidden');
    document.querySelector('section#content-wrapper > div#content').classList.add('blur-sm');
});
document.querySelector('section#content-wrapper').addEventListener('click', e => {
    e.stopPropagation();
    document.querySelector('aside').classList.add('hidden');
    document.querySelector('section#content-wrapper > div#content').classList.remove('blur-sm');
});