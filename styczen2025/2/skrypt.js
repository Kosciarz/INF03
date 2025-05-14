const wynik = document.getElementById("wyniki");

const rodzajPanelu = {
  laminowany: 12,
  winylowy: 14,
  podlogowa: 18,
};

document.getElementById("oblicz").addEventListener("click", () => {
  const szerokosc = document.getElementById("szerokosc").value;
  const dlugosc = document.getElementById("dlugosc").value;

  let kosztMontazu = 0;

  const typPanelu = document.querySelector("input[type='radio']:checked").id;

  if (szerokosc && dlugosc) {
    const polePowierzchni = parseInt(szerokosc) * parseInt(dlugosc);

    for (typ in rodzajPanelu) {
      if (typ == typPanelu) {
        kosztMontazu = polePowierzchni * rodzajPanelu[typ];
        wynik.textContent = `Pole powierzchni pomieszczenia: ${String(
          polePowierzchni
        )}, koszt montażu ${String(kosztMontazu)}`;
        break;
      }
    }
  } else {
    wynik.textContent = "Wprowadź poprawne dane.";
  }
});
