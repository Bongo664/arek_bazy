# dekorujemy za pomocą @my_decorator
def my_decorator(fn):
    def wrapper():
        print("początek odliczania")
        fn()
        print("koniec odliczania")
    return wrapper

@my_decorator
def get_5_values():
    for v in range(1,5):
        print(v)
get_5_values()
#utwórz kalkulator, dodawanie, odejmowanie, mnożenie, dzielenie, potęgowanie, pierwiastkowanie stosując z osobna klasy oraz dodaj klasę wynik która po uruchomieniu wyznaczy wyniki operacji z metod wychodzących z powyżysz klas