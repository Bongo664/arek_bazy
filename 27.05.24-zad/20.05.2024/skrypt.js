console.log("Test ładowania skryptu")

function oblicz(){
    let paliwo = parseFloat(document.getElementById("paliwo").value)
    let dystans = parseFloat(document.getElementById("dystans").value)
    let cena = parseFloat(document.getElementById("cena").value)

    let content =(`
    Paliwo: ${paliwo} [litry]<br>
    dystans: ${dystans} [kilometry]<br>
    cena: ${cena} [zł]<br>
    `)

    let wynik = paliwo * cena * dystans / 100

    let wynikcalc = document.getElementById("wynikcalc")
    wynikcalc.innerHTML = content + "wynik = " + wynik + " zł"
}