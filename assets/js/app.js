// Constants
const themeSelect = document.querySelector('select[name=change-theme]');

/**
 * Changes current theme to the choosen one
 *
 * @param {string} theme 
 */
function changeTheme(theme)
{
    // Parameter and select value
    localStorage.theme = theme;
    themeSelect.value = theme;
    themeSelect.parentElement.querySelector('span.inner-text').innerHTML = themeSelect.options[themeSelect.selectedIndex].text;
    // Applying style
    if (theme == 'system' && window.matchMedia('(prefers-color-scheme: dark)').matches || theme == 'dark') {
        applyTheme('dark');
    } else {
        applyTheme('light');
    }
}

/**
 * Apply the theme
 * 
 * @param {string} color 
 */
function applyTheme(color)
{
    if (color == 'dark') {
        document.documentElement.classList.add('dark');
        themeSelect.parentElement.querySelector('.fa-sun').parentElement.classList.add('hidden');
        themeSelect.parentElement.querySelector('.fa-moon').parentElement.classList.remove('hidden');
    } else {
        document.documentElement.classList.remove('dark');
        themeSelect.parentElement.querySelector('.fa-sun').parentElement.classList.remove('hidden');
        themeSelect.parentElement.querySelector('.fa-moon').parentElement.classList.add('hidden');
    }
}

/**
 * Changes current language to the choosen one
 * 
 * @param {string} language 
 */
function changeLanguage(language)
{
    let url = new URL(window.location.href);
    window.location.replace(url.pathname.replace(/\/(fr|en)\//, '/' + language + '/'));
}

// Settings - Open/Close
document.querySelector('button#open-settings').addEventListener('click', e => {
    document.querySelector('div#settings-wrapper').classList.remove('hidden');
});
document.querySelector('button#close-settings').addEventListener('click', e => {
    document.querySelector('div#settings-wrapper').classList.add('hidden');
});

// Settings - Change theme
document.querySelector('select[name=change-theme]').addEventListener('change', e => {
    changeTheme(e.target.value);
});
changeTheme(('theme' in localStorage) ? localStorage.theme : 'system');

// Settings - Change language
document.querySelector('select[name=change-language]').addEventListener('change', e => {
    changeLanguage(e.target.value);
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