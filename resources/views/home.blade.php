@extends('base')

@section('content')
  @auth
    <h1>La page de profil de {{ auth()->user()->name }}</h1>
  @endauth
@endsection
