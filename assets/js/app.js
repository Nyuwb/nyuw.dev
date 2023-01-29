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