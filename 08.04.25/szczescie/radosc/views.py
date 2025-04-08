from django.shortcuts import render

# Create your views here.
def start(request):
    return render(request, 'start.html')

def hobby(request):
    return render(request, 'hobby.html')

def about(request):
    return render(request, 'about.html')