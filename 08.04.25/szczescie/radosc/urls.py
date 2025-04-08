from django.urls import path
from . import views
urlpatterns = [
    path('', views.start, name='start'),
    path('about/',views.about, name='about'),
    path('hobby/',views.hobby, name='hobby'),
]
