const indeksy = ["pierwszy", "drugi", "trzeci"];
const cytaty = indeksy.map(indeks => document.getElementById(indeks));

cytaty.forEach((cytat, indeks) => {
    cytat.addEventListener("click", () => {
        cytat.style.display = "none";
        cytaty[(indeks + 1) % cytaty.length].style.display = "block";
    });
});


// document.querySelectorAll(".cytat").forEach(quote => {
//     quote.addEventListener("click", () => {
//         if (quote.id == "pierwszy") {
//             document.querySelector("#pierwszy").style.display = "none";
//             document.querySelector("#drugi").style.display = "block";
//         } else if (quote.id == "drugi") {
//             document.querySelector("#drugi").style.display = "none";
//             document.querySelector("#trzeci").style.display = "block";
//         } else {
//             document.querySelector("#trzeci").style.display = "none";
//             document.querySelector("#pierwszy").style.display = "block";
//         }
//     });
// });