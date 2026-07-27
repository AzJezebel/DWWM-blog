@extends('layouts.app')

@section('navbar')
    <span class="user-label">Utilisateur</span>
    <span class="avatar">{{ Auth::user() ? strtoupper(substr(Auth::user()->name, 0, 1)) : 'U' }}</span>
    
    @auth
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="logout-btn">
                Se déconnecter
            </button>
        </form>
    @else
        <a href="{{ route('login.create') }}">Se connecter</a>
        <a href="{{ route('register.create') }}">S'inscrire</a>
        <a href="{{ route('admin.toggle') }}" class="admin-sim-link">Simuler vue admin</a>
    @endauth
@endsection