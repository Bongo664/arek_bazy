#napisz app na bazie funkcji:
#wyznacz pole trójkąta z herona
#przekaż listę argumentów nieskończoną: wyznacz sumę, średnią, min i max
import math

def pole_trojkata(a, b, c):
    s = (a + b + c) / 2
    pole = math.sqrt(s * (s - a) * (s - b) * (s - c))
    return pole
def przetworz_liczby(*args):
    suma = sum(args)
    srednia = suma / len(args)
    minimum = min(args)
    maksimum = max(args)
    print(suma)
    print(srednia)
    print(minimum)
    print(maksimum)
a = 2
b = 3
c = 4
pole_trojkata_result = pole_trojkata(a, b, c)
print(f"Pole trójkąta o bokach {a}, {b}, {c} wynosi: {pole_trojkata_result}")

wynik_liczb = przetworz_liczby(1, 2, 3, 4, 5)
