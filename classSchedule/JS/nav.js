function toggleNav() {
    const sidenav = document.querySelector(".sidenav");
    const main = document.querySelector(".main");
    const burgerBtn = document.getElementById("burgerBtn");

    if (sidenav.classList.contains("show")) {
        sidenav.classList.remove("show");
        main.classList.remove("shifted");
        burgerBtn.classList.remove("hide"); // Show the burger button
    } else {
        sidenav.classList.add("show");
        main.classList.add("shifted");
        burgerBtn.classList.add("hide"); // Hide the burger button
    }
}

function closeNav() {
    const sidenav = document.querySelector(".sidenav");
    const main = document.querySelector(".main");
    const burgerBtn = document.getElementById("burgerBtn");

    sidenav.classList.remove("show");
    main.classList.remove("shifted");
    burgerBtn.classList.remove("hide"); // Show the burger button
}

function setActiveLink(element, iconName) {
    const links = document.querySelectorAll(".sidenav a");

    links.forEach(link => {
        link.classList.remove("active");
        link.querySelector("i").classList.remove("active-icon");
    });

    element.classList.add("active");
    element.querySelector("i").classList.add("active-icon");
    element.querySelector("i").classList.remove("fa-" + iconName);
}