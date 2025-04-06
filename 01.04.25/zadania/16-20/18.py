import math

n = int(input("Podaj n: "))
k = int(input("Podaj k: "))
if k > n:
    print("C(n, k) = 0 (k nie może być większe od n)")
else:
    print("C(n, k):", math.comb(n, k))