@extends('base')
@section('content')
    <div class="col-8 mx-auto">
        <h2 class="lead ml-0">Formulaire d'inscription sur le site </h2>
        <hr>
        <form method="POST">
            @csrf
            <x-input name="name" type="text" label="Nom et prénom" />
            <x-input name="email" type="email" label="Addresse email" />
            <x-input name="password" type="password" label="Mot de passe" />
            <x-input name="password_confirmation" type="password" label="Mot de passe de confirmation"  />
           
            <button type="submit" class="btn btn-warning me-2">S'inscriscrire <i data-feather="log-in"></i></button>
        </form>
    </div>
@endsection
