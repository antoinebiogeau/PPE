document.addEventListener("DOMContentLoaded", () => {
    console.log("DOM loaded");
    let img;
    img = document.querySelector("header #toggle");
    //dark mode
    img.addEventListener("click", () => {
        if (img.innerHTML === `<img src="./assets/sun_weather_icon_152003.png" alt="" id="theme">`) {
            img.innerHTML = `<img src="./assets/night-01_icon-icons.com_65776.png" alt="" id="theme">`;
            img.classList.add("rota");
            img.classList.remove("rota2");
        } else {
            img.innerHTML = `<img src="./assets/sun_weather_icon_152003.png" alt="" id="theme">`;
            img.classList.remove("rota");
            img.classList.add("rota2");
        }
        document.body.classList.toggle("light");
    });
});