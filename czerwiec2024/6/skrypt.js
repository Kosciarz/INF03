document.querySelector("#przycisk1")
    .addEventListener("click", (e) => {
        e.preventDefault();
        document.querySelector("#pierwszy-blok").style.visibility = "hidden";
        document.querySelector("#drugi-blok").style.visibility = "visible";
    });

document.querySelector("#przycisk2")
    .addEventListener("click", (e) => {
        e.preventDefault();
        document.querySelector("#drugi-blok").style.visibility = "hidden";
        document.querySelector("#trzeci-blok").style.visibility = "visible";
    });

document.querySelector("#przycisk3")
    .addEventListener("click", (e) => {
        e.preventDefault();
        const haslo = document.querySelector("#haslo").value;
        const powtorzoneHaslo = document.querySelector("#powtorz-haslo").value;

        if (haslo != powtorzoneHaslo) {
            alert("Podane hasła różnią się");
        } else {
            const imie = document.querySelector("#imie").value;
            const nazwisko = document.querySelector("#nazwisko").value;
            console.log(`Witaj ${imie} ${nazwisko}`);
        }
    });
