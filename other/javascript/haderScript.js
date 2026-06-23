function linkCall(hrefData) {
    window.location.href = hrefData;
}
function openMenu(menuClass) {
    const navLinkElement = document.querySelector(".nav-link");

    if (menuClass === "open") {
        navLinkElement.style.display = "block";
    }

    if (menuClass === "close") {
        navLinkElement.style.display = "none";
    }
}