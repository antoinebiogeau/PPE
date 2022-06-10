document.addEventListener("DOMContentLoaded", () => {
    console.log("DOM loaded");
    let img, home, onclick;
    img = document.querySelector("header #toggle");
    home = document.querySelector("header img");
    modale = document.querySelector(".parent-modale");
    //aller a index.html
    home.addEventListener("click", () => {
        window.location.href = "index.php";
    });
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
        document.modale.classList.toggle("light");
    });
    console.log(navigator.userAgent);

    let el, modal, closed, open_modal, closed_all;

    el = document.querySelectorAll(".grid-picture-large li");
    modal = document.querySelector(".parent-modale");
    closed = document.querySelector(".modale button");
    closed_all = document.querySelector(".modale img");

    /* property elements */

    open_modal = function () {
        console.log(this.dataset);
        /* les variables */
        let id = this.dataset.id;
        let image = this.dataset.image;
        let title = this.dataset.title;
        let desc = this.dataset.description;
        let dates = this.dataset.dates;
        modal.classList.add("modale-active"); /* ajouter la classe active */
        /* sélectionner les sélecteurs html*/
        document.querySelector(".modale img").setAttribute("src", image);
        document.querySelector(".modale .desc h3").innerText = title;
        document.querySelector(".modale .desc p").innerHTML = `<strong>Déscription : </strong>${desc}`;
        document.querySelector(".modale .desc time").innerText = `Annee ${dates}`;
        document.querySelector(".modale .desc time").setAttribute("datetime", dates);
        let btn = document.querySelector("main .grid-picture-large");
		btn.addEventListener("click", (e) => {
			e.preventDefault();
			let stateObj = { id: "100" };
			window.history.pushState(stateObj, "PPE", "/PPE/index.php?id_event=" + id);
	});
    };

    for (rows of el) {
        rows.addEventListener("click", open_modal);
        console.log(rows);
    }
    closed.addEventListener("click", () => {
        modal.classList.remove("modale-active");
    });
    closed_all.addEventListener("click", () => {
        modal.classList.remove("modale-active");
    });
});