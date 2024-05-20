console.log("test ładowania skryptu");

function oblicz(){

    let paliwo = parseFloat(document.getElementById("paliwo").value);
    let dystans = parseFloat(document.getElementById("dystans").value);
    let cena = parseFloat(document.getElementById("cena").value);

    let content = 
    `Paliwo: ${paliwo} [litry] <br>
    Dystans: ${dystans} [km] <br>
    Cena: ${cena} [zł] <br>`

    let wynik = paliwo * dystans * cena / 100;

    let wynikCalc = document.getElementById("wynikCalc");
    wynikCalc.innerHTML = content + "Wynik = " + wynik + "zł";
}
