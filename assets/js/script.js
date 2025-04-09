document.addEventListener("DOMContentLoaded", () => {
    const toggleBtn = document.getElementById("darkModeToggle");
    const icon = document.getElementById("themeIcon");
    const body = document.body;

    // Funktion zum Icon-Wechsel
    function updateIcon(isDark) {
        if (icon) {
            icon.textContent = isDark ? "☀️" : "🌙";
        }
    }

    // Dark Mode aktivieren
    function enableDarkMode() {
        body.classList.add("dark");
        localStorage.setItem("darkMode", "enabled");
        updateIcon(true);
    }

    // Dark Mode deaktivieren
    function disableDarkMode() {
        body.classList.remove("dark");
        localStorage.setItem("darkMode", "disabled");
        updateIcon(false);
    }

    // Prüfen ob Dark Mode gespeichert ist
    if (localStorage.getItem("darkMode") === "enabled") {
        enableDarkMode();
    }

    // Klick-Event
    if (toggleBtn) {
        toggleBtn.addEventListener("click", () => {
            if (body.classList.contains("dark")) {
                disableDarkMode();
            } else {
                enableDarkMode();
            }
        });
    }
});
