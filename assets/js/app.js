// Localstorage dark theme
if (localStorage.theme === 'dark') {
    document.documentElement.classList.add('dark');
} else {
    document.documentElement.classList.remove('dark');
}

// Switching dark theme
document.querySelector('.test').addEventListener('click', e => {
    localStorage.theme = localStorage.theme == 'dark' ? 'light' : 'dark';
    document.documentElement.classList.toggle('dark');
});

// Sidebar
document.querySelector('button#display-sidebar').addEventListener('click', e => {
    e.stopPropagation();
    document.querySelector('aside').classList.remove('hidden');
});
document.querySelector('section#content-wrapper').addEventListener('click', e => {
    e.stopPropagation();
    document.querySelector('aside').classList.add('hidden');
});