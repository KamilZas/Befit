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

git clone https://github.com/KamilZas/Befit/
cd projekt
composer install
npm install
npm run build
cp .env.example .env
DB_DATABASE=befit
DB_USERNAME=root
DB_PASSWORD=
php artisan key:generate
php artisan migrate --seed
php artisan serve
http://127.0.0.1:8000

