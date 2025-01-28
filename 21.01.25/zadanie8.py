#dictionary - słowni - jest mutowalny
slownik1 = {'a':1,'b':2,'c':3}
slownik1['a'] = 20
print(slownik1)

opcje = {
    'env':'production',
    'db':'mysql',
    'version':1.0,
    'show_error':True
}
'''
print(opcje['version'])
del opcje['db']
print(opcje)
'''
for key in opcje:
    print(opcje[key])