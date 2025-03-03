#dekoratory - zmieniają zachowanie funkcji, dekorator to inna funkcja
#po co? aby zrobić różne warianty funkcji
def my_decorator(fn):
    def wrapper():
        print("początek odliczania")
        fn()
        print("koniec odliczania")
    return wrapper


def get_5_values():
    for v in range(1,5):
        print(v)
get_5_values()
get_5_values_decorated = my_decorator(get_5_values)