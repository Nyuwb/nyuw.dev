// Localstorage dark theme
if (localStorage.theme === 'dark') {
    document.documentElement.classList.add('dark');
    document.querySelector('button#change-theme i').classList.add('fa-sun');
} else {
    document.documentElement.classList.remove('dark');
    document.querySelector('button#change-theme i').classList.add('fa-moon');
}

// Switching dark theme
document.querySelector('button#change-theme').addEventListener('click', e => {
    localStorage.theme = localStorage.theme == 'dark' ? 'light' : 'dark';
    document.documentElement.classList.toggle('dark');
    e.currentTarget.querySelector('i').classList.toggle('fa-sun');
    e.currentTarget.querySelector('i').classList.toggle('fa-moon');
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