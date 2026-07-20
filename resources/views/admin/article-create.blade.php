@extends('layouts.admin')

@section('title', 'Nouvel article — Admin')

@section('content')
    <div class="admin-panel-header">
        <h1>Nouvel article</h1>
        <div class="header-actions">
            <a href="{{ route('articles.index') }}" class="btn-pill btn-pill-outline">← Retour aux articles</a>
        </div>
    </div>

    <div class="article-detail-container">
        <form action="{{ route('admin.article-store') }}" method="POST" class="article-form">
            @csrf

            <div class="form-group">
                <label for="title">Titre</label>
                <input
                    type="text"
                    id="title"
                    name="title"
                    class="form-control @error('title') is-invalid @enderror"
                    value="{{ old('title') }}"
                    required
                >
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="category_id">Catégorie</label>
                <select
                    id="category_id"
                    name="category_id"
                    class="form-control @error('category_id') is-invalid @enderror"
                    required
                >
                    <option value="">-- Choisir une catégorie --</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" @selected(old('category_id') == $category->id)>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                @error('category_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="content">Contenu</label>
                <textarea
                    id="content"
                    name="content"
                    rows="12"
                    class="form-control @error('content') is-invalid @enderror"
                    required
                >{{ old('content') }}</textarea>
                @error('content')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>Statut</label>
                <div class="status-radio-group">
                    <label class="status-radio">
                        <input type="radio" name="status" value="DRAFT" {{ old('status', 'DRAFT') == 'DRAFT' ? 'checked' : '' }}>
                        Brouillon
                    </label>
                    <label class="status-radio">
                        <input type="radio" name="status" value="PUBLISHED" {{ old('status') == 'PUBLISHED' ? 'checked' : '' }}>
                        Publié
                    </label>
                </div>
                @error('status')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="edit-actions">
                <button type="submit" class="btn-pill submit-btn">Créer l'article</button>
                <a href="{{ route('articles.index') }}" class="cancel-btn">Annuler</a>
            </div>
        </form>
    </div>
@endsection

@push('styles')
    @include('admin._form-styles')
@endpush