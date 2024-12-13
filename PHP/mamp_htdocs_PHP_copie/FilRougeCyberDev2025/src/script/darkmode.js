const imglogo = document.querySelector('header').querySelector('div').querySelectorAll('img');
console.log(imglogo);
const logo = imglogo[1];
console.log(logo);
const darkModIcon = imglogo[0];
console.log(darkModIcon);

function DarkModToggle(){
        document.body.classList.toggle('darkMode');
        if (document.body.classList.contains('darkMode')) {
                localStorage.setItem('darkmode', 'enabled');
                logo.src='./design/darkModeLogo.png';
                darkModIcon.src='./design/light.png'
                localStorage.setItem('themeIcon', 'soleil');
        } else {
                localStorage.setItem('darkmode', 'disabled');
                logo.src = './design/logo.png';
                darkModIcon.src = './design/dark.png'
                localStorage.setItem('themeIcon', 'lune');
        }
}
function DarkModeMemory(){
        const darkModeStatus = localStorage.getItem('darkmode');
        console.log(darkModeStatus);
        const themeIcon = localStorage.getItem('themeIcon');
        console.log(themeIcon);
        if (darkModeStatus ==='enabled') {
                document.body.classList.add('darkMode');
                logo.src = './design/darkModeLogo.png';
                darkModIcon.src = './design/light.png'
        }
        if (themeIcon ==='soleil') {
                logo.src = './design/darkModeLogo.png';
                darkModIcon.src = './design/light.png';
        } else {
                logo.src = './design/logo.png';
                darkModIcon.src = './design/dark.png'
        }
}
document.addEventListener('DOMContentLoaded', DarkModeMemory);
darkModIcon.addEventListener('click', DarkModToggle);


