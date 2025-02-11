# Dokumentacja instalacji Django i Python

---

## 1. Wymagania wstępne

Aby zainstalować Django i Python, upewnij się, że masz:

- Połączenie z internetem
- Uprawnienia administratora na komputerze
- Zainstalowany menedżer pakietów `pip` (domyślnie instalowany z Pythonem od wersji 3.4)

---

## 2. Instalacja Pythona

### Na systemie Windows:

1. Pobierz instalator Pythona ze strony: [https://www.python.org/downloads/](https://www.python.org/downloads/).
2. Uruchom pobrany plik instalacyjny.
3. Zaznacz opcję **Add Python to PATH**, a następnie kliknij **Install Now**.
4. Po instalacji sprawdź wersję Pythona, otwierając wiersz polecenia i wpisując:
   ```bash
   python --version
   ```

### Na systemie macOS:

1. Otwórz terminal.
2. Sprawdź, czy Python jest już zainstalowany, wpisując:
   ```bash
   python3 --version
   ```
3. Jeśli wersja Pythona jest starsza lub nie ma go w systemie, zainstaluj go za pomocą Homebrew:
   ```bash
   brew install python
   ```

### Na systemie Linux:

1. Otwórz terminal.
2. Zainstaluj Python za pomocą menedżera pakietów:
   - Ubuntu/Debian:
     ```bash
     sudo apt update
     sudo apt install python3 python3-pip
     ```
   - Fedora:
     ```bash
     sudo dnf install python3 python3-pip
     ```
3. Sprawdź wersję Pythona:
   ```bash
   python3 --version
   ```

---

## 3. Instalacja wirtualnego środowiska (opcjonalne, ale zalecane)

Wirtualne środowisko umożliwia izolację pakietów dla projektu.

1. Zainstaluj narzędzie `venv` (jeśli nie jest zainstalowane):
   ```bash
   python3 -m pip install --upgrade pip
   ```
2. Utwórz wirtualne środowisko:
   ```bash
   python3 -m venv myenv
   ```
3. Aktywuj wirtualne środowisko:
   - Windows:
     ```bash
     myenv\Scripts\activate
     ```
   - macOS/Linux:
     ```bash
     source myenv/bin/activate
     ```
4. Aby wyjść z wirtualnego środowiska, wpisz:
   ```bash
   deactivate
   ```

---

## 4. Instalacja Django

1. Upewnij się, że wirtualne środowisko jest aktywne (jeśli używasz).
2. Zainstaluj Django za pomocą `pip`:
   ```bash
   pip install django
   ```
3. Sprawdź zainstalowaną wersję Django:
   ```bash
   python -m django --version
   ```

---

## 5. Tworzenie nowego projektu Django w Visual Studio

### Przygotowanie środowiska w Visual Studio

1. Pobierz i zainstaluj Visual Studio z obsługą Python. Pobierz instalator z [https://visualstudio.microsoft.com/pl/](https://visualstudio.microsoft.com/pl/).
2. Podczas instalacji wybierz opcję **Python development** w instalatorze komponentów.
3. Po zakończeniu instalacji uruchom Visual Studio.

### Tworzenie projektu Django

1. W Visual Studio wybierz **File > New > Project**.
2. W polu wyszukiwania wpisz "Django" i wybierz **Django Web Project**.
3. Kliknij **Next** i podaj nazwę projektu oraz lokalizację.
4. Kliknij **Create**. Visual Studio utworzy strukturę projektu Django.

### Uruchamianie projektu

1. W Visual Studio otwórz **Solution Explorer**.
2. Kliknij prawym przyciskiem myszy na plik `manage.py` i wybierz **Start with Debugging** lub użyj skrótu klawiszowego `F5`.
3. Otwórz przeglądarkę i przejdź do [http://127.0.0.1:8000/](http://127.0.0.1:8000/) aby zobaczyć działającą aplikację Django.

---

## 6. Dodatkowe kroki

- **Instalacja dodatkowych pakietów:**
  Jeśli projekt wymaga dodatkowych bibliotek, możesz je zainstalować za pomocą `pip`, np.:
  ```bash
  pip install djangorestframework
  ```

- **Tworzenie aplikacji w projekcie:**
  Aby dodać nową aplikację w projekcie, wpisz:
  ```bash
  python manage.py startapp myapp
  ```

---

## 7. Rozwiązywanie problemów

- **Błąd: "pip command not found"**
  Zainstaluj lub zaktualizuj `pip`:
  ```bash
  python -m ensurepip --upgrade
  ```

- **Błąd: "command 'django-admin' not found"**
  Upewnij się, że wirtualne środowisko jest aktywne, lub dodaj `pip` do zmiennych PATH.

---

**Gotowe! Teraz możesz zacząć pracować z Django w Visual Studio.**

