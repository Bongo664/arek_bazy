class Widget:
    def __init__(self,label):
        self.label = label
class Button(Widget):
    pass
w = Widget('my widget')
print(w.label)
przycisk = Button('my button')
print(przycisk.label)