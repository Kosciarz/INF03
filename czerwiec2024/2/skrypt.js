
const wyslijWiadomosc = () => {
    const text = document.querySelector("input[type='text']").value;

    const wiadomosc = document.createElement("div");
    wiadomosc.classList.add("blok");
    wiadomosc.classList.add("jolanta");

    const zdjecie = document.createElement("img");
    zdjecie.src = "Jolka.jpg";
    const tekstWiadomosci = document.createElement("p");
    tekstWiadomosci.textContent = text;

    wiadomosc.appendChild(zdjecie);
    wiadomosc.appendChild(tekstWiadomosci);

    const chat = document.querySelector(".chat");
    chat.appendChild(wiadomosc);
    chat.scrollTop = chat.scrollHeight;
};

const odpowiedzi = [
    "Świetnie!",
    "Kto gra główną rolę?",
    "Lubisz filmy Tego reżysera?",
    "Będę 10 minut wcześniej",
    "Może kupimy sobie popcorn?",
    "Ja wolę Colę",
    "Zaproszę jeszcze Grześka",
    "Tydzień temu też byłem w kinie na Diunie",
    "Ja funduję bilety"
];

const generujOdpowiedz = () => {
    const index = Math.floor(Math.random() * 9);
    const text = odpowiedzi[index];

    const wiadomosc = document.createElement("div");
    wiadomosc.classList.add("blok");
    wiadomosc.classList.add("krzysztof");

    const zdjecie = document.createElement("img");
    zdjecie.src = "Krzysiek.jpg";
    const tekstWiadomosci = document.createElement("p");
    tekstWiadomosci.textContent = text;

    wiadomosc.appendChild(zdjecie);
    wiadomosc.appendChild(tekstWiadomosci);

    const chat = document.querySelector(".chat");
    chat.appendChild(wiadomosc);
    chat.scrollTop = chat.scrollHeight;
};