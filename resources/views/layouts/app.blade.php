<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion Transport</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        /* Styles personnalisés pour la barre de navigation */
        .navbar-dark-custom {
            background-color: #2c3e50; /* Bleu foncé plus moderne */
        }
        .navbar-dark-custom .navbar-brand {
            color: #ecf0f1; /* Couleur plus claire pour la marque */
            font-weight: bold;
            font-size: 1.5rem;
            transition: color 0.3s ease; /* Transition douce pour la couleur */
        }
        .navbar-dark-custom .navbar-brand:hover {
            color: #3498db; /* Couleur d'accentuation au survol */
        }
        .navbar-dark-custom .nav-link {
            color: #bdc3c7; /* Gris plus clair pour les liens */
            transition: color 0.3s ease, border-bottom 0.3s ease; /* Transitions douces */
            padding-bottom: 0.5rem; /* Espace pour la bordure inférieure */
            border-bottom: 2px solid transparent; /* Bordure transparente pour une transition fluide */
        }
        .navbar-dark-custom .nav-link:hover,
        .navbar-dark-custom .nav-link.active {
            color: #3498db; /* Couleur d'accentuation au survol/actif */
            border-bottom: 2px solid #3498db; /* Effet de soulignement */
        }
        .navbar-dark-custom .navbar-toggler {
            border-color: rgba(255,255,255,.1); /* Bordure plus claire pour le bouton de bascule */
        }
        .navbar-dark-custom .navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba%28255, 255, 255, 0.5%29' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark-custom">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Hardy's Transport</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto"> {{-- ms-auto pousse les liens vers la droite --}}
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('vehicules.index') }}">Véhicules</a> {{-- Ajout de la classe active pour l'exemple --}}
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('chauffeurs.index') }}">Chauffeurs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('trajets.index') }}">Trajets</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('passagers.index') }}">Passagers</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('reservations.index') }}">Réservations</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>