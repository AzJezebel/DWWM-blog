@extends('layouts.admin')

@section('title', 'Nouvelle catégorie — Admin')

@section('content')
    <div class="admin-panel-header">
        <h1>Nouvelle catégorie</h1>
        <div class="header-actions">
            <a href="{{ route('categories.index') }}" class="btn-pill btn-pill-outline">← Retour aux catégories</a>
        </div>
    </div>

    <div class="category-detail-container">
        <form action="{{ route('categories.store') }}" method="POST" class="category-form">
            @csrf

            <div class="form-group">
                <label for="name">Nom de la catégorie</label>
                <input
                    type="text"
                    id="name"
                    name="name"
                    class="form-control @error('name') is-invalid @enderror"
                    value="{{ old('name') }}"
                    required
                    placeholder="Ex: Développement Web"
                    autofocus
                >
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <small class="form-text text-muted">Le slug sera généré automatiquement à partir du nom.</small>
            </div>

            <div class="edit-actions">
                <button type="submit" class="btn-pill submit-btn">Créer la catégorie</button>
                <a href="{{ route('categories.index') }}" class="cancel-btn">Annuler</a>
            </div>
        </form>
    </div>
@endsection

@push('styles')
    @include('admin._form-styles') 
@endpush