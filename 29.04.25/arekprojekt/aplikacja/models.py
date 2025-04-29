from django.db import models

# Create your models here.
class Person(models.Model):
    imie = models.CharField(max_length=50)
    nazwisko = models.CharField(max_length=50)

    def __str__(self):
        return f"{self.imie} {self.nazwisko}"