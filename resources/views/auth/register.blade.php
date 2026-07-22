{{-- resources/views/auth/register.blade.php --}}
@extends('layouts.app')

@section('title', 'Créer un nouveau compte')

@section('navbar')
    <span>Vous êtes déjà inscrit ?</span>
    {{-- <a href="{{ route('login') }}">→ Se connecter</a> --}}
@endsection

@section('content')
    <div class="register-container">
        <h1 class="register-title">Créer un nouveau compte</h1>
        
        <form method="POST" action="{{ route('register.store') }}" class="register-form">
            @csrf
            
            <div class="form-row">
                <div class="form-group">
                    <label for="firstname">Prénom</label>
                    <input type="text" id="firstname" name="firstname" value="{{ old('firstname') }}" required>
                    @error('firstname')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="lastname">Nom</label>
                    <input type="text" id="lastname" name="lastname" value="{{ old('lastname') }}" required>
                    @error('lastname')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required>
                @error('email')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
            
            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input type="password" id="password" name="password" required>
                @error('password')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
            
            <div class="form-group">
                <label for="password_confirmation">Confirmer le mot de passe</label>
                <input type="password" id="password_confirmation" name="password_confirmation" required>
            </div>
            
            <button type="submit" class="btn-pill register-btn">S'inscrire</button>
        </form>
    </div>
@endsection

@push('styles')
<style>
    .register-container {
        max-width: 480px;
        margin: 0 auto;
        padding: 20px 0;
    }
    
    .register-title {
        font-size: 24px;
        font-weight: 600;
        margin: 0 0 30px 0;
        text-align: center;
        letter-spacing: -0.5px;
    }
    
    .register-form {
        display: flex;
        flex-direction: column;
        gap: 20px;
    }
    
    .form-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
    }
    
    .form-group {
        display: flex;
        flex-direction: column;
        gap: 4px;
    }
    
    .form-group label {
        font-size: 14px;
        font-weight: 500;
        color: #111;
    }
    
    .form-group input {
        padding: 10px 14px;
        border: 1px solid #111;
        border-radius: 4px;
        font-size: 14px;
        background: #fff;
        transition: border-color 0.2s;
    }
    
    .form-group input:focus {
        outline: none;
        border-color: #555;
    }
    
    .form-group input::placeholder {
        color: #aaa;
    }
    
    .error {
        font-size: 12px;
        color: #e74c3c;
        margin-top: 2px;
    }
    
    .register-btn {
        width: 100%;
        padding: 12px;
        font-size: 16px;
        font-weight: 500;
        margin-top: 10px;
        border-radius: 4px;
        background: #111;
        color: #fff;
        border: none;
        cursor: pointer;
        transition: background 0.2s;
    }
    
    .register-btn:hover {
        background: #333;
    }
    
    @media (max-width: 600px) {
        .register-container {
            padding: 10px 0;
        }
        
        .form-row {
            grid-template-columns: 1fr;
            gap: 20px;
        }
    }
</style>
@endpush