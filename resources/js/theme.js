import "flowbite/plugin";

//icons
const sunIcon = document.querySelector(".sun");
const moonIcons = document.querySelector(".moon");

//theme vars
const userTheme = localStorage.getItem("theme");
const systemTheme = window.matchMedia("(prefers-color-scheme: dark)").matches;

//icon toggle
const iconToggle = () => {
    moonIcons.classList.toggle("display-none");
    sunIcon.classList.toggle("display-none");
}

//initial theme check
const themeCheck = () => {
    if (userTheme === "dark" || (!userTheme && systemTheme)) {
        document.documentElement.classList.add("dark");
        moonIcons.classList.add("display-none");
        return;
    }
    sunIcon.classList.add("display-none")
}

//manual theme switch
const themeSwitch = () => {
    if (document.documentElement.classList.contains("dark")){
        document.documentElement.classList.remove("dark");
        localStorage.setItem("theme","light");
        iconToggle();
        return;
    }
    document.documentElement.classList.add("dark");
    localStorage.setItem("theme","dark");
    iconToggle();
}

sunIcon.addEventListener("click",() => {
    themeSwitch();
})
moonIcons.addEventListener("click",() => {
    themeSwitch();
})

themeCheck();
