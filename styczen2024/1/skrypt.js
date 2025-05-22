document.querySelector("#submit")
    .addEventListener("click", (e) => {
        e.preventDefault();

        const komunikat = document.createElement("p");

        if (!document.querySelector("#regulamin").checked) {
            komunikat.textContent = "Musisz zapoznać się z regulaminem";
            komunikat.style.color = "red";
        }
        else {
            const imie = document.querySelector("#imie").value;
            const nazwisko = document.querySelector("#nazwisko").value;
            const zgloszenie = document.querySelector("#zgloszenie").value;

            komunikat.innerHTML = `${imie.toUpperCase()} ${nazwisko.toUpperCase()}<br>Treść Twojej sprawy: ${zgloszenie}`;
            komunikat.style.color = "navy";
        }

        document.querySelector("#blok-glowny")
            .appendChild(komunikat);
    });