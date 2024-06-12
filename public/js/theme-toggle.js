function setTheme() {
    let currentTheme = localStorage.getItem('theme');

    if (!currentTheme) {
        // If savedTheme is empty, set it to 'light'
        currentTheme = 'light-theme';
    }


    // Save the current theme to localStorage
    if (currentTheme === 'dark') {
        document.body.classList.add('dark-theme');
        document.body.classList.remove('light-theme');
    } else {
        document.body.classList.add('light-theme');
        document.body.classList.remove('dark-theme');
    }
}
debugger
setTheme();




const nav = document.querySelector('.mobile-nav');
const navMenuBtn = document.querySelector('.nav-menu-btn');
const navCloseBtn = document.querySelector('.nav-close-btn');


// navToggle function
const navToggleFunc = function () { nav.classList.toggle('active'); }

// navMenuBtn.addEventListener('click', navToggleFunc);
// navCloseBtn.addEventListener('click', navToggleFunc);


// theme toggle variables
const themeBtn = document.querySelectorAll('.theme-btn');


for (let i = 0; i < themeBtn.length; i++) {

    themeBtn[i].addEventListener('click', function toggle_theme() {



        document.body.classList.toggle('light-theme');
        document.body.classList.toggle('dark-theme');
        //
        // // Determine the current theme
        const currentTheme = document.body.classList.contains('dark-theme')? 'dark' : 'light';
        //
        // // Save the current theme to localStorage
        if (currentTheme === 'dark') {
            localStorage.setItem('theme', 'dark');
        } else {
            localStorage.setItem('theme', 'light');
        }

        for (let i = 0; i < themeBtn.length; i++) {

            // When the `theme-btn` is clicked,
            // it toggles classes between `light` & `dark` for all `theme-btn`.
            themeBtn[i].classList.toggle('dark');
            themeBtn[i].classList.toggle('light');
            // themeBtn[i].classList.toggle('active');
        }

    })

}

