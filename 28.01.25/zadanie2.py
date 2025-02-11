def fn(a,*args):
    print(a,args)
    for el in args:
        print(el)
#fn(2,3,4,5,6,7,8,3,True,'difusuifh')
def fn2(a,*args,**dict_args):
    print(a)
    print(args)
    print(dict_args)
fn2(3,"asdad",'adas','sfdff',1,2,3,4,True,user='admin',version=1.0,db='sql')