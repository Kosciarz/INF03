document.querySelector("#zastosuj-filtr")
    .addEventListener("click", () => {
        const obraz = document.querySelector("#obraz-pszczola");

        document.querySelectorAll(".filtr").forEach(filtr => {
            if (filtr.checked) {
                if (filtr.id == "blur") {
                    const wartoscBlur = Math.floor(4 + Math.random() * (8 - 4 + 1));
                    obraz.style.filter = `blur(${wartoscBlur}px)`;
                } else if (filtr.id == "sepia") {
                    obraz.style.filter = "sepia(100%)";
                } else {
                    obraz.style.filter = "invert(100%)";
                }
            }
        })
    });

document.querySelector("#kolorowy")
    .addEventListener("click", () => {
        document.querySelector("#obraz-pomarancz").style.filter = "grayscale(0%)";
    });

document.querySelector("#czarno-bialy")
    .addEventListener("click", () => {
        document.querySelector("#obraz-pomarancz").style.filter = "grayscale(100%)";
    });

document.querySelector("#zastosuj-suwak1")
    .addEventListener("click", () => {
        const przezroczystosc = document.querySelector("#suwak1").value;
        document.querySelector("#obraz-owoce").style.filter = `opacity(${przezroczystosc}%)`;
    });

document.querySelector("#zastosuj-suwak2")
    .addEventListener("click", () => {
        const jasnosc = document.querySelector("#suwak2").value;
        document.querySelector("#obraz-zolw").style.filter = `brightness(${jasnosc}%)`;
    });