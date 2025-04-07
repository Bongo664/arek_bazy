def wyznacznik_2x2(a, b, c, d):
    return a * d - b * c

a11, a12 = 2, 1
a21, a22 = 1, -1

b1, b2 = 5, 1
det_A = wyznacznik_2x2(a11, a12, a21, a22)

if det_A != 0:
    print("Układ ma jedno rozwiązanie.")
else:
    print("Układ nie ma rozwiązań lub ma nieskończenie wiele rozwiązań.")