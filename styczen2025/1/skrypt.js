document.querySelector("#oblicz")
    .addEventListener("click", () => {
        let kursReact = document.querySelector("#react").checked;
        let kursJavaScript = document.querySelector("#javascript").checked;
        let iloscRat = document.querySelector("#raty").value;
        let miasto = document.querySelector("#miasto").value;
        
        let calkowitaKwota = 0;

        if (kursReact)
            calkowitaKwota += 5000;
    
        if (kursJavaScript)
            calkowitaKwota += 3000;

        let kosztJednejRaty = calkowitaKwota / iloscRat;

        let wynik = document.querySelector("#wynik");
        wynik.textContent = `Kurs odbędzie się w ${miasto}. Koszt całkowity: ${calkowitaKwota} zł. Płacisz ${iloscRat} rat po ${kosztJednejRaty} zł`;
    });