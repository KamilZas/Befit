# BeFit – Aplikacja do śledzenia treningów (Laravel)

Projekt stworzony w Laravel.  
Pozwala zarządzać:
- typami ćwiczeń,
- sesjami treningowymi,
- wykonanymi ćwiczeniami,
- statystykami z ostatnich 4 tygodni.
  
Funkcje aplikacji
Rejestracja i logowanie użytkownika.
Tworzenie i edytowanie sesji treningowych przypisanych do użytkownika.
Dodawanie, edytowanie i usuwanie wykonanych ćwiczeń.
Trzy modele:
ExerciseType
TrainingSession
PerformedExercise
Walidacja wszystkich pól (daty, liczba serii/powtórzeń, ciężar itd.).
Widok statystyk ostatnich 4 tygodni.
Użytkownik widzi tylko swoje sesje treningowe i ćwiczenia.
## Instalacja

git clone https://github.com/KamilZas/Befit/ <br />
cd projekt  <br />
composer install  <br />
npm install  <br />
npm run build  <br />
cp .env.example .env  <br />
DB_DATABASE=befit  <br />
DB_USERNAME=root  <br />
DB_PASSWORD=  <br />
php artisan key:generate  <br />
php artisan migrate --seed  <br />
php artisan serve  <br />
http://127.0.0.1:8000  <br />

