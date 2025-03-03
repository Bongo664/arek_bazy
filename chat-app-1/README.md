# Aplikacja Czatowa

To jest prosta aplikacja czatowa zbudowana przy użyciu PHP i JavaScript z jQuery do obsługi interakcji użytkownika i żądań AJAX.

## Struktura Projektu

```
chat-app
├── src
│   ├── js
│   │   ├── app.js          # Główna logika JavaScript dla aplikacji czatowej
│   │   └── jquery.min.js   # Zminifikowana biblioteka jQuery
│   ├── php
│   │   ├── chat.php        # Obsługuje pobieranie wiadomości czatowych
│   │   └── sendMessage.php  # Przetwarza przychodzące wiadomości
│   └── css
│       └── styles.css      # Style dla aplikacji czatowej
├── index.html              # Główny plik HTML dla aplikacji czatowej
└── README.md              # Dokumentacja projektu
```

## Instrukcje Instalacji

1. **Sklonuj repozytorium**:
   ```
   git clone <adres-repozytorium>
   cd chat-app
   ```

2. **Skonfiguruj bazę danych**:
   - Utwórz bazę danych i tabelę do przechowywania wiadomości czatowych.
   - Zaktualizuj dane połączenia z bazą danych w `src/php/chat.php` i `src/php/sendMessage.php`.

3. **Zainstaluj zależności**:
   - Upewnij się, że masz lokalne środowisko serwerowe (jak XAMPP, WAMP, lub MAMP) do uruchamiania skryptów PHP.

4. **Uruchom aplikację**:
   - Otwórz `index.html` w przeglądarce internetowej, aby rozpocząć korzystanie z aplikacji czatowej.

## Zasady Użytkowania

- Użytkownicy mogą wysyłać wiadomości przez interfejs czatu.
- Aplikacja będzie okresowo pobierać nowe wiadomości, aby utrzymać czat aktualny.
- Wiadomości są przechowywane w bazie danych i pobierane w razie potrzeby.

## Wkład

Zapraszamy do zgłaszania problemów lub pull requestów, jeśli masz sugestie dotyczące ulepszeń lub nowych funkcji.