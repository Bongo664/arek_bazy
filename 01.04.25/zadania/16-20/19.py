a1 = int(input("Podaj pierwszy wyraz (a1): "))
r = int(input("Podaj różnicę (r): "))
n = int(input("Podaj liczbę wyrazów (n): "))

ciag = [a1 + i * r for i in range(n)]
print("Ciąg arytmetyczny:", ciag)