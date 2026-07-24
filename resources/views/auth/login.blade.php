{{-- resources/views/auth/login.blade.php --}}
@extends('layouts.app')

@section('title', 'Se connecter')

@section('navbar')
    <span>Pas encore de compte ?</span>
    <a href="{{ route('register.create') }}">→ S'inscrire</a>
@endsection

@section('content')
    <div class="login-container">
        <h1 class="login-title">Se connecter</h1>
        
        <form method="POST" action="{{ route('login.store') }}" class="login-form">
            @csrf
            
            <div class="form-group">
                <label for="email">Email</label>
                <input 
                    type="email" 
                    id="email" 
                    name="email" 
                    value="{{ old('email') }}" 
                    placeholder="janesepa@email.com"
                    required 
                    autofocus
                >
                @error('email')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
            
            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input 
                    type="password" 
                    id="password" 
                    name="password" 
                    placeholder="********"
                    required
                >
                @error('password')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
            
            <div class="form-options">
                <label class="remember-me">
                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                    <span>Se souvenir de moi</span>
                </label>
                <a href="#" class="forgot-link">Mot de passe oublié ?</a>
            </div>
            
            <button type="submit" class="btn-pill login-btn">Se connecter</button>
        </form>
        
        <div class="register-link">
            <span>Pas encore de compte ?</span>
            <a href="{{ route('register.create') }}">S'inscrire</a>
        </div>
    </div>
@endsection

@push('styles')
<style>
    .login-container {
        max-width: 480px;
        margin: 0 auto;
        padding: 20px 0;
    }
    
    .login-title {
        font-size: 24px;
        font-weight: 600;
        margin: 0 0 30px 0;
        text-align: center;
        letter-spacing: -0.5px;
    }
    
    .login-form {
        display: flex;
        flex-direction: column;
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
    
    .form-options {
        display: flex;
        justify-content: space-between;
        align-items: center;
        font-size: 14px;
        margin-top: -5px;
    }
    
    .remember-me {
        display: flex;
        align-items: center;
        gap: 8px;
        cursor: pointer;
        color: #555;
    }
    
    .remember-me input[type="checkbox"] {
        width: 16px;
        height: 16px;
        cursor: pointer;
        accent-color: #111;
    }
    
    .forgot-link {
        color: #555;
        text-decoration: none;
        transition: color 0.2s;
        font-size: 14px;
    }
    
    .forgot-link:hover {
        color: #111;
        text-decoration: underline;
    }
    
    .login-btn {
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
    
    .login-btn:hover {
        background: #333;
    }
    
    .register-link {
        text-align: center;
        margin-top: 24px;
        font-size: 14px;
        color: #555;
        border-top: 1px solid #e5e5e5;
        padding-top: 24px;
    }
    
    .register-link a {
        color: #111;
        text-decoration: none;
        font-weight: 500;
        transition: color 0.2s;
        margin-left: 4px;
    }
    
    .register-link a:hover {
        text-decoration: underline;
    }
    
    @media (max-width: 600px) {
        .login-container {
            padding: 10px 0;
        }
        
        .form-options {
            flex-direction: column;
            gap: 12px;
            align-items: flex-start;
        }
    }
</style>
@endpush