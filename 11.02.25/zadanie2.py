#inicjalizer __init__(self) self oznacza że pracujey na jednej instancji klasy
#referencja do instacji
class Point:
    def __init__(self):
        self.x = 0
        self.y = 0
p1 = Point()
print(p1.x, p1.y)
class Point1:
    def __init__(self, x=0, y=0):
        self.x = x
        self.y = y
p2 = Point1()
p3 = Point1(5,6)
p4 = Point1(1,1)
p4.x = 10
p4.y = 20
print(p2.x, p2.y)
print(p3.x, p3.y)
print(p4.x, p4.y)