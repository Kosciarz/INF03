const blokiZakladek = {
    klient: "pierwszy",
    adres: "drugi",
    kontakt: "trzeci"
};

document.querySelectorAll(".przycisk-zakladki").forEach(przycisk => {
    przycisk.addEventListener("click", () => {
        const zakladki = document.querySelectorAll(".zakladka");
        for (const zakladka of zakladki) {
            zakladka.style.display = "none";
        }
        
        const nazwaZakladki = przycisk.id;
        document.getElementById(blokiZakladek[nazwaZakladki]).style.display = "block";
    });
});

let szerokosc = 4;
document.querySelectorAll("input").forEach(kontrolka => {
    kontrolka.addEventListener("focusout", () => {
        szerokosc += 12;
        if (szerokosc > 100) {
            szerokosc = 100;
        }
        document.querySelector("#blok-paska-postepu").style.width = `${szerokosc}%`;
    });
});

document.querySelector("#zatwierdz")
    .addEventListener("click", () => {
        let wartosci = "";
        document.querySelectorAll("input").forEach(kontrolka => {
            wartosci += kontrolka.value + ", ";
        })
        console.log(wartosci);
    });