from django.urls import path
from . import views
urlpatterns = [
    path('', views.start, name="home"),
    path('success/', views.start, name="success"),
    path('dodaj/', views.add_person, name="dodaj"),

]
