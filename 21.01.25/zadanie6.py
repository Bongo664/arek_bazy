#listy - możemy modyfikować, są mutowalne

mojalista = [1,2,3,4,5,6,'S','a','arek',True,False]
print(mojalista[4])
mojalista[0] = 25
print(mojalista)
mojalista.append('lubie programować')
print(mojalista)
print(mojalista[0:5])
print(mojalista[5:])
lista1 = [1,2,3,4,5]
lista2 = [2,3]
lista3 = lista1 + lista2
print(lista3)
print(3 in lista3)
print(len(lista3))

mojasuperlista = [zmienna for zmienna in range(10)]
print(mojasuperlista)
mojasuperlista = [zmienna for zmienna in range(20)]
print(mojasuperlista)