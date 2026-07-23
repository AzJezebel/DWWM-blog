@extends('layouts.admin')

@section('title', 'Modifier — ' . $category->name)

@section('content')
    <div class="admin-panel-header">
        <h1>Modifier la catégorie</h1>
        <div class="header-actions">
            <a href="{{ route('categories.index') }}" class="btn-pill btn-pill-outline">← Retour aux catégories</a>
        </div>
    </div>

    <div class="category-detail-container">
        <form action="{{ route('categories.update', $category->id) }}" method="POST" class="category-form">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Nom de la catégorie</label>
                <input
                    type="text"
                    id="name"
                    name="name"
                    class="form-control @error('name') is-invalid @enderror"
                    value="{{ old('name', $category->name) }}"
                    required
                    placeholder="Ex: Développement Web"
                    autofocus
                >
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <small class="form-text text-muted">Le slug sera généré automatiquement à partir du nom.</small>
            </div>

            <div class="form-group">
                <label>Statistiques</label>
                <div style="background: #f9fafb; padding: 16px; border-radius: 8px; display: flex; gap: 24px; flex-wrap: wrap;">
                    <div>
                        <span style="color: #6b7280; font-size: 13px;">Articles</span>
                        <div style="font-size: 24px; font-weight: 700; color: #1f2937;">{{ $category->articles->count() }}</div>
                    </div>
                    <div>
                        <span style="color: #6b7280; font-size: 13px;">Slug actuel</span>
                        <div style="font-size: 14px; font-weight: 500; color: #1f2937; font-family: monospace;">{{ $category->slug }}</div>
                    </div>
                    <div>
                        <span style="color: #6b7280; font-size: 13px;">Date de création</span>
                        <div style="font-size: 14px; font-weight: 500; color: #1f2937;">{{ $category->created_at->format('d/m/Y à H:i') }}</div>
                    </div>
                </div>
            </div>

            <div class="edit-actions">
                <button type="submit" class="btn-pill submit-btn">Modifier la catégorie</button>
                <a href="{{ route('categories.index') }}" class="cancel-btn">Annuler</a>
            </div>
        </form>
    </div>
@endsection

@push('styles')
    @include('admin._form-styles')
@endpush