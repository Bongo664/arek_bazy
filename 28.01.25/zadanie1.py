def fn(a,b):
    print('to jest fn',a+b)
#fn(2,3)
#fn(4,6)
def fn(c=1,g=5):
    print('to jest default = ', c+g)
#fn(30,4)
def fn2(a,b=0,c=0):
    print('a = ',a,'b =',b,'c =',c)