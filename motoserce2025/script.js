document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('registrationForm');
    const peselInput = document.getElementById('pesel');
    const adultFields = document.getElementById('adultFields');
    const ageInfo = document.getElementById('ageInfo');
    const indicator = document.getElementById('indicator');
    const fullName = document.getElementById('fullName');

    const nameRegex = /^[a-zżźćńółęąśŻŹĆĄŚĘŁÓŃ\s]+$/i;
    const digitsOnlyRegex = /^\d+$/;
    const licenseRegex = /^[A-D]$/;

    indicator.value = Math.floor(Math.random() * 10000) + 1;

    peselInput.addEventListener('input', function() {
        if (this.value.length === 11 && digitsOnlyRegex.test(this.value)) {
            const year = parseInt(this.value.substring(0, 2));
            const month = parseInt(this.value.substring(2, 4));
            const day = parseInt(this.value.substring(4, 6));

            let fullYear;
            if (month > 80) {
                fullYear = 1800 + year;
            } else if (month > 60) {
                fullYear = 2200 + year;
            } else if (month > 40) {
                fullYear = 2100 + year;
            } else if (month > 20) {
                fullYear = 2000 + year;
            } else {
                fullYear = 1900 + year;
            }

            const birthDate = new Date(fullYear, (month-1) % 20, day);
            const today = new Date();

            let age = today.getFullYear() - birthDate.getFullYear();
            const monthDiff = today.getMonth() - birthDate.getMonth();
            
            if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < birthDate.getDate())) {
                age--;
            }

            if (age >= 18) {
                ageInfo.textContent = "Osoba pełnoletnia - możliwa rejestracja";
                ageInfo.style.color = "green";
                adultFields.style.display = "block";
            } else {
                ageInfo.textContent = "Osoba niepełnoletnia - rejestracja niemożliwa";
                ageInfo.style.color = "red";
                adultFields.style.display = "none";
            }
        } else {
            ageInfo.textContent = "Nieprawidłowy format PESEL";
            ageInfo.style.color = "red";
            adultFields.style.display = "none";
        }
    });

    form.addEventListener('submit', function(e) {
        e.preventDefault();
        
        if (adultFields.style.display === "block") {
            if (fullName.value.length < 18 || !nameRegex.test(fullName.value)) {
                alert('Imię i nazwisko musi zawierać minimum 18 znaków i tylko litery!');
                return;
            }

            const engineSize = document.getElementById('engineSize').value;
            if (!digitsOnlyRegex.test(engineSize)) {
                alert('Pojemność silnika musi zawierać tylko cyfry!');
                return;
            }

            const mileage = document.getElementById('mileage').value;
            if (!digitsOnlyRegex.test(mileage)) {
                alert('Stan licznika musi zawierać tylko cyfry!');
                return;
            }

            const license = document.getElementById('license').value.toUpperCase();
            if (!licenseRegex.test(license)) {
                alert('Kategoria prawa jazdy musi być jedną z liter: A, B, C lub D!');
                return;
            }

            alert('Formularz został wysłany poprawnie!');
        }
    });
});