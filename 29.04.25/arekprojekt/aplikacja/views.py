from django.shortcuts import render,redirect
from .forms import PersonForm

# Create your views here.
def start(request):
    return render(request,'add_person.html', {"context": "aplikacja startowa"})

def success(request):
    return render(request,'index.html', {"context": "aplikacja sukces"})

def add_person(request):
    if request.method == "POST":
        form = PersonForm(request.POST)
        if form.is_valid():
            form.save()
            return redirect('success')
    else:
        form = PersonForm()
    return render(request, 'add_person.html', {'form': form})