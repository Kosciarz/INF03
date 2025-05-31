const ksztalty = {
    1: "cytryna",
    2: "liść",
    3: "banan"
};

document.querySelector("#zamowienie")
    .addEventListener("click", () => {
        const numerKsztaltu = document.querySelector("#numer-ksztaltu").value;
        const ksztalt = ksztalty[numerKsztaltu] ? ksztalty[numerKsztaltu] : "inny";
        document.querySelector("#zamowienie-klienta").textContent = `Twoje zamówienie to cukierek ${ksztalt}`;

        const r = document.querySelector("#r").value;
        const g = document.querySelector("#g").value;
        const b = document.querySelector("#b").value;

        document.querySelector("#kolor").style.backgroundColor = `rgb(${r}, ${g}, ${b})`;
    });