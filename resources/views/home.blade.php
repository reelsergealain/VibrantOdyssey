@extends('base')

@section('content')
  @auth
    <h1>La page de profil de {{ auth()->user()->name }}</h1>
    <hr>

    <form action="{{ route('updatePassword') }}" class="col-6 justify-content-center"  method="post">
        @csrf
        @method('POST')
        <x-input label="Mot de passe actuel" type="password" name="current_password"/>
        <x-input label="Entrer le nouveau mot de passe" type="password" name="password"/>
        <x-input label="Confirmer le nouveau mot de passe" type="password" name="password_confirmation"/>
            <button class="btn btn-outline-danger" type="submit">Modifier mon mot de passe</button>
    </form>
  @endauth
@endsection
