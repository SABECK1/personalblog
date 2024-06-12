const nav = document.querySelector('.mobile-nav');
const navMenuBtn = document.querySelector('.nav-menu-btn');
const navCloseBtn = document.querySelector('.nav-close-btn');


// navToggle function
const navToggleFunc = function () { nav.classList.toggle('active'); }

// navMenuBtn.addEventListener('click', navToggleFunc);
// navCloseBtn.addEventListener('click', navToggleFunc);

debugger

// theme toggle variables
const themeBtn = document.querySelectorAll('.theme-btn');


for (let i = 0; i < themeBtn.length; i++) {

    themeBtn[i].addEventListener('click', function toggle_theme() {

        // toggle `light-theme` & `dark-theme` class from `body`
        // when clicked `theme-btn`
        document.body.classList.toggle('light-theme');
        document.body.classList.toggle('dark-theme');

        // Determine the current theme
        const currentTheme = document.body.classList.contains('dark-theme')? 'dark' : 'light';

        // Save the current theme to localStorage
        if (currentTheme!== 'dark') {
            localStorage.setItem('theme', 'dark');
        } else {
            localStorage.setItem('theme', 'light');
        }

        for (let i = 0; i < themeBtn.length; i++) {

            // When the `theme-btn` is clicked,
            // it toggles classes between `light` & `dark` for all `theme-btn`.
            themeBtn[i].classList.toggle('light');
            themeBtn[i].classList.toggle('dark');

        }

    })

}

// function toggleTheme() {
//     if (localStorage.getItem('theme') != 'dark') {
//         localStorage.setItem('theme', 'dark');
//     } else {
//         localStorage.setItem('theme', 'light');
//     }
//     setTheme();
// }
