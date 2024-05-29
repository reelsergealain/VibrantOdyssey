@extends('base')
@section('content')
    <div class="col-8 mx-auto">
        <h2 class="lead ml-0">Formulaire de connexion sur le site </h2>
        <hr>
        <form method="POST">
            @csrf
            <x-input name="email" type="email" label="Addresse email" />
            <x-input name="password" type="password" label="Mot de passe" />
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" name="remember" id="remember">
                <label class="form-check-label" for="remember">Se souvenir de moi</label>
            </div>
            <button type="submit" class="btn btn-warning me-2">S'inscriscrire <i data-feather="log-in"></i></button>
        </form>
    </div>
@endsection
