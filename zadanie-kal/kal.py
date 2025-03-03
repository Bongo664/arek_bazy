import math

class Dodawanie:
    def __init__(self, a, b):
        self.a = a
        self.b = b
    
    def oblicz(self):
        return self.a + self.b

class Odejmowanie:
    def __init__(self, a, b):
        self.a = a
        self.b = b
    
    def oblicz(self):
        return self.a - self.b

class Mnozenie:
    def __init__(self, a, b):
        self.a = a
        self.b = b
    
    def oblicz(self):
        return self.a * self.b

class Dzielenie:
    def __init__(self, a, b):
        self.a = a
        self.b = b
    
    def oblicz(self):
        if self.b != 0:
            return self.a / self.b
        return "Nie można dzielić przez zero!"

class Potegowanie:
    def __init__(self, a, b):
        self.a = a
        self.b = b
    
    def oblicz(self):
        return self.a ** self.b

class Pierwiastkowanie:
    def __init__(self, a):
        self.a = a
    
    def oblicz(self):
        if self.a >= 0:
            return math.sqrt(self.a)
        return "Nie można pierwiastkować liczby ujemnej!"

class Wynik:
    def __init__(self, a, b):
        self.a = a
        self.b = b
    
    def pokaz_wyniki(self):
        dodaj = Dodawanie(self.a, self.b)
        odejmij = Odejmowanie(self.a, self.b)
        pomnoz = Mnozenie(self.a, self.b)
        podziel = Dzielenie(self.a, self.b)
        potega = Potegowanie(self.a, self.b)
        pierwiastek = Pierwiastkowanie(self.a)
        
        print(f"Wynik dodawania: {dodaj.oblicz()}")
        print(f"Wynik odejmowania: {odejmij.oblicz()}")
        print(f"Wynik mnożenia: {pomnoz.oblicz()}")
        print(f"Wynik dzielenia: {podziel.oblicz()}")
        print(f"Wynik potęgowania: {potega.oblicz()}")
        print(f"Pierwiastek z pierwszej liczby: {pierwiastek.oblicz()}")

a = float(input("Podaj pierwszą liczbę: "))
b = float(input("Podaj drugą liczbę: "))
    
wynik = Wynik(a, b)
wynik.pokaz_wyniki()