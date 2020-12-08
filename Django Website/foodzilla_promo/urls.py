from django.urls import path
from foodzilla_promo import views

urlpatterns = [
    path('', views.index, name='hello_world'),
]
