document.querySelector("#poprzednie-zdjecie")
    .addEventListener("click", () => {
        const aktywneZdjecie = document.querySelector("#aktywne-zdjecie");
        const nazwaZdjecia = aktywneZdjecie.src.split("/").pop();
        const numerZdjecia = parseInt(nazwaZdjecia.substr(0, 1));

        let nowyNumer = numerZdjecia - 1;
        if (nowyNumer == 0) {
            nowyNumer = 7;
        }
        aktywneZdjecie.src = `${nowyNumer}.jpg`;
    });

document.querySelector("#nastepne-zdjecie")
    .addEventListener("click", () => {
        const aktywneZdjecie = document.querySelector("#aktywne-zdjecie");
        const nazwaZdjecia = aktywneZdjecie.src.split("/").pop();
        const numerZdjecia = parseInt(nazwaZdjecia.substr(0, 1));

        const nowyNumer = (numerZdjecia % 7) + 1;
        aktywneZdjecie.src = `${nowyNumer}.jpg`;
    });