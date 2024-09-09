const themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
const themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');
const themeToggleBtn = document.getElementById('theme-toggle');

const isDarkMode = () => localStorage.getItem('color-theme') === 'dark' || (!localStorage.getItem('color-theme') && window.matchMedia('(prefers-color-scheme: dark)').matches);

const setDarkMode = () => {
    if (themeToggleLightIcon) {
        themeToggleLightIcon.classList.remove('hidden');
    }
    if(themeToggleDarkIcon){
        themeToggleDarkIcon.classList.add('hidden');
    }
    document.documentElement.classList.add('dark');
    localStorage.setItem('color-theme', 'dark');
};

const setLightMode = () => {
    themeToggleDarkIcon.classList.remove('hidden');
    themeToggleLightIcon.classList.add('hidden');
    document.documentElement.classList.remove('dark');
    localStorage.setItem('color-theme', 'light');
};

if (isDarkMode()) {
    setDarkMode();
} else {
    setLightMode();
}
if(themeToggleBtn){
    themeToggleBtn.addEventListener('click', () => {
        if (isDarkMode()) {
            setLightMode();
        } else {
            setDarkMode();
        }
    });
}
