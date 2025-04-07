import random

n = int(input("Podaj liczbę rzutów: "))
wybor = input("Wybierz 'moneta' lub 'kostka': ").strip().lower()

if wybor == "moneta":
    wyniki = [random.choice(["orzeł", "reszka"]) for _ in range(n)]
    orly = wyniki.count("orzeł")
    print("Prawdopodobieństwo orła:", orly / n)
elif wybor == "kostka":
    oczekiwana = int(input("Podaj oczekiwaną liczbę oczek (1-6): "))
    wyniki = [random.randint(1, 6) for _ in range(n)]
    trafienia = wyniki.count(oczekiwana)
    print(f"Prawdopodobieństwo {oczekiwana} oczek:", trafienia / n)
else:
    print("Nieprawidłowy wybór.")