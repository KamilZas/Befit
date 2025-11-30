
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BeFit – Panel treningowy</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #1f2937, #111827);
            min-height: 100vh;
            color: white;
            display: flex;
            align-items: center;
        }
        .card {
            background: rgba(255, 255, 255, 0.08);
            border: 1px solid rgba(255,255,255,0.2);
            backdrop-filter: blur(8px);
        }
        .btn-primary {
            background-color: #3b82f6;
            border: none;
        }
        .btn-primary:hover {
            background-color: #2563eb;
        }
    </style>
</head>

<body>

<div class="container text-center py-5">

    <h1 class="display-4 fw-bold mb-4">BeFit</h1>
    <p class="lead mb-5">Twój osobisty panel do śledzenia treningów, sesji oraz statystyk.</p>

    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card p-4 mb-4">
                <h4 class="mb-3">Zacznij treningi już teraz!</h4>

                @auth
                    <a href="{{ route('training-session.index') }}" class="btn btn-primary w-100 mb-2">
                        👉 Przejdź do swoich sesji treningowych
                    </a>

                    <a href="{{ route('statistics.index') }}" class="btn btn-outline-light w-100">
                        📊 Zobacz swoje statystyki
                    </a>
                @else
                    <a href="/login" class="btn btn-primary w-100 mb-2">
                        🔐 Zaloguj się
                    </a>

                    <a href="/register" class="btn btn-outline-light w-100">
                        ✍️ Utwórz konto
                    </a>
                @endauth
            </div>

            <a href="{{ route('exercise-types.index') }}" class="text-light">
                📚 Zobacz listę typów ćwiczeń
            </a>
        </div>
    </div>
</div>

</body>
</html>
