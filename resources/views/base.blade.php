<!doctype html>
<html lang="fr">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Le blog de moderne</title>
    <!-- Feather-Icons -->
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<header class="p-3 text-bg-dark">
    <div class="container">

        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor"
                    class="bi bi-badge-vo text-warning" viewBox="0 0 16 16">
                    <path
                        d="M4.508 11h1.429l1.99-5.999H6.61L5.277 9.708H5.22L3.875 5.001H2.5zM13.5 8.39v-.77c0-1.696-.962-2.733-2.566-2.733S8.363 5.916 8.363 7.621v.769c0 1.691.967 2.724 2.57 2.724 1.605 0 2.567-1.033 2.567-2.724m-1.204-.778v.782c0 1.156-.571 1.732-1.362 1.732-.796 0-1.363-.576-1.363-1.732v-.782c0-1.156.567-1.736 1.363-1.736.79 0 1.362.58 1.362 1.736" />
                    <path
                        d="M14 3a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1zM2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2z" />
                </svg>
            </a>
            </button>
            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><a href="#" class="nav-link px-2 text-secondary">Accueil</a></li>
                <li><a href="#" class="nav-link px-2 text-white">Fonctionnalités</a></li>
                <li><a href="#" class="nav-link px-2 text-white">Tarification</a></li>
                <li><a href="#" class="nav-link px-2 text-white">FAQ</a></li>
                <li><a href="#" class="nav-link px-2 text-white">À Propos</a></li>
            </ul>

            <form method="get" class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search">
                <input name="search" type="search" value="{{ request()->search }}"
                    class="form-control form-control-dark text-bg-white" placeholder="Search..." aria-label="Search">
            </form>

            @guest
                <div class="text-end">
                    <a href="{{ route('register') }}" class="btn btn-outline-light me-2">Créer un compte <i
                            data-feather="log-in"></i></a>
                    <a href="{{ route('login') }}" type="button" class="btn btn-warning">Connexion</a>
                </div>
            @endguest
            @auth
                <div class="text-end">
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        @method('POST')
                        <button href="{{ route('logout') }}" type="submit" class="btn btn-warning">Deconection</button>
                    </form>
                </div>
            @endauth
        </div>
    </div>
</header>

<body>

    {{-- #La liste des artiles est affiché ici --}}
    <div class="container mt-5 vstack gap-3">
        <div class="container">
            {{-- @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif --}}
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <p>{{ session('success') }}</p>
                </div>
            @endif

            <script>
                var alertList = document.querySelectorAll(".alert");
                alertList.forEach(function(alert) {
                    new bootstrap.Alert(alert);
                });
            </script>

            @yield('content')
        </div>
    </div>
</body>

<script>
    feather.replace();
</script>

<script>
    function myFunction() {
        var element = document.body;
        element.dataset.bsTheme =
            element.dataset.bsTheme == "light" ? "dark" : "light";
    }

    function stepFunction(event) {
        debugger;
        var element = document.getElementsByClassName("collapse");
        for (var i = 0; i < element.length; i++) {
            if (element[i] !== event.target.ariaControls) {
                element[i].classList.remove("show");
            }
        }
    }
</script>
{{-- <input
        class="form-check-input d-none  p-2 form-check form-switch"
        type="checkbox"
        role="switch"
        id="flexSwitchCheckChecked"
        checked
        onclick="myFunction()"
      />
      <label class="btn btn-secondary btn-sm mb-5 p-3" for="flexSwitchCheckChecked"> <i data-feather="sun"></i></label> --}}


{{-- <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top -fixed-bottom bg-light">
        <p id="footer-date" class="col-md-4 mb-0 text-muted"> </p>

        <script>
            // Récupérer l'élément p par son ID
            var footerDate = document.getElementById("footer-date");

            // Récupérer la date actuelle
            var currentDate = new Date();

            // Extraire l'année actuelle
            var currentYear = currentDate.getFullYear();

            // Mettre à jour le texte de l'élément p avec l'année actuelle
            footerDate.textContent = "© " + currentYear + " Company, Inc by REEL SERGE ALAIN";
        </script>


      <a href="/" class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
        <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
      </a>

      <ul class="nav col-md-4 justify-content-end">
        <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Accueil</a></li>
        <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Fonctionnalités</a></li>
        <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Tarifs</a></li>
        <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">FAQ</a></li>
        <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">À propos</a></li>
    </ul>

    </footer> --}}

</html>
