const modeButton = document.getElementById("modeButton");
const page = document.querySelector('html');

if (isDarkMode()) {
    turnOnDarkMode();
}

modeButton.addEventListener('click', function() {
    if (isDarkMode()) {
        trunOffDarkMode();
    } else {
        turnOnDarkMode();
    }
});

function isDarkMode() {
    return localStorage.getItem("darkMode") == 'true'
}

function turnOnDarkMode() {
    localStorage.setItem("darkMode", "true");
    page.classList.add("dark");
    modeButton.innerHTML='<i class="fa-solid fa-lightbulb"></i>'
}

function trunOffDarkMode() {
    localStorage.setItem("darkMode", "false");
    page.classList.remove("dark");
    modeButton.innerHTML="<i class='fa-solid fa-moon'></i>"
}