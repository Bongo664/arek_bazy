document.addEventListener('DOMContentLoaded', function() {
    const formularz = document.getElementById('registrationForm');
    const polePesel = document.getElementById('pesel');
    const polaPelnoletni = document.getElementById('adultFields');
    const informacjaWiek = document.getElementById('ageInfo');
    const wskaznik = document.getElementById('indicator');
    const pelneImie = document.getElementById('fullName');

    const wzorzecNazwy = /^[a-zżźćńółęąśŻŹĆĄŚĘŁÓŃ\s]+$/i;
    const tylkoCyfry = /^\d+$/;
    const wzorzecPrawaJazdy = /^[A-D]$/;

    wskaznik.value = Math.floor(Math.random() * 10000) + 1;

    polePesel.addEventListener('input', function() {
        if (this.value.length === 11 && tylkoCyfry.test(this.value)) {
            const rok = parseInt(this.value.substring(0, 2));
            const miesiac = parseInt(this.value.substring(2, 4));
            const dzien = parseInt(this.value.substring(4, 6));

            let pelnyRok;
            if (miesiac > 80) {
                pelnyRok = 1800 + rok;
            } else if (miesiac > 60) {
                pelnyRok = 2200 + rok;
            } else if (miesiac > 40) {
                pelnyRok = 2100 + rok;
            } else if (miesiac > 20) {
                pelnyRok = 2000 + rok;
            } else {
                pelnyRok = 1900 + rok;
            }

            const dataUrodzenia = new Date(pelnyRok, (miesiac-1) % 20, dzien);
            const dzisiaj = new Date();

            let wiek = dzisiaj.getFullYear() - dataUrodzenia.getFullYear();
            const roznicaMiesiecy = dzisiaj.getMonth() - dataUrodzenia.getMonth();
            
            if (roznicaMiesiecy < 0 || (roznicaMiesiecy === 0 && dzisiaj.getDate() < dataUrodzenia.getDate())) {
                wiek--;
            }

            if (wiek >= 18) {
                informacjaWiek.textContent = "Osoba pełnoletnia - możliwa rejestracja";
                informacjaWiek.style.color = "green";
                polaPelnoletni.style.display = "block";
            } else {
                informacjaWiek.textContent = "Osoba niepełnoletnia - rejestracja niemożliwa";
                informacjaWiek.style.color = "red";
                polaPelnoletni.style.display = "none";
            }
        } else {
            informacjaWiek.textContent = "Nieprawidłowy format PESEL";
            informacjaWiek.style.color = "red";
            polaPelnoletni.style.display = "none";
        }
    });

    formularz.addEventListener('submit', function(e) {
        e.preventDefault();
        
        if (polaPelnoletni.style.display === "block") {
            if (pelneImie.value.length < 18 || !wzorzecNazwy.test(pelneImie.value)) {
                alert('Imię i nazwisko musi zawierać minimum 18 znaków i tylko litery!');
                return;
            }

            const pojemnoscSilnika = document.getElementById('engineSize').value;
            if (!tylkoCyfry.test(pojemnoscSilnika)) {
                alert('Pojemność silnika musi zawierać tylko cyfry!');
                return;
            }

            const przebieg = document.getElementById('mileage').value;
            if (!tylkoCyfry.test(przebieg)) {
                alert('Stan licznika musi zawierać tylko cyfry!');
                return;
            }

            const prawoJazdy = document.getElementById('license').value.toUpperCase();
            if (!wzorzecPrawaJazdy.test(prawoJazdy)) {
                alert('Kategoria prawa jazdy musi być jedną z liter: A, B, C lub D!');
                return;
            }

            alert('Formularz został wysłany poprawnie!');
        }
    });
});