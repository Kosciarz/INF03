document.querySelectorAll("blockquote").forEach(quote => {
    quote.addEventListener("click", () => {
        if (quote.id == "pierwszy") {
            document.querySelector("#pierwszy").style.display = "none";
            document.querySelector("#drugi").style.display = "block";
        } else if (quote.id == "drugi") {
            document.querySelector("#drugi").style.display = "none";
            document.querySelector("#trzeci").style.display = "block";
        } else {
            document.querySelector("#trzeci").style.display = "none";
            document.querySelector("#pierwszy").style.display = "block";
        }
    });
});