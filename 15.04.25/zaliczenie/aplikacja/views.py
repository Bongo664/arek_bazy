from django.shortcuts import render

# Create your views here.
def start(request):
    return render(request, 'start.html')
def about(request):
    context = {'about','pszczyna','akradiusz waliczek, samochodówka'}
    return render(request, 'about.html',context)