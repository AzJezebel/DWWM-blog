@extends('layouts.admin')

@section('title', 'Catégories — Admin')

@section('content')
    <div class="admin-panel-header">
        <h1>Catégories</h1>
        <button type="button" class="btn-pill" disabled title="À venir">+ Nouvelle catégorie</button>
    </div>

    <table class="admin-table">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Slug</th>
                <th>Articles</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($categories as $category)
                <tr>
                    <td><strong>{{ $category->name }}</strong></td>
                    <td><code style="background:#f5f5f5;padding:2px 8px;border-radius:4px;font-size:13px;">{{ $category->slug }}</code></td>
                    <td>
                        <span class="article-count">{{ $category->articles_count ?? $category->articles->count() }}</span>
                    </td>
                    <td class="actions">
                        <button type="button" class="icon-btn" title="Modifier" disabled>✎</button>
                        <button type="button" class="icon-btn" title="Supprimer" disabled>✕</button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="empty-state">Aucune catégorie.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="pagination-bar">
        @if ($categories->onFirstPage())
            <span class="btn-pill disabled">← Précédent</span>
        @else
            <a href="{{ $categories->appends(request()->query())->previousPageUrl() }}" class="btn-pill">← Précédent</a>
        @endif

        <span class="page-indicator">Page {{ $categories->currentPage() }}/{{ max($categories->lastPage(), 1) }}</span>

        @if ($categories->hasMorePages())
            <a href="{{ $categories->appends(request()->query())->nextPageUrl() }}" class="btn-pill">Suivant →</a>
        @else
            <span class="btn-pill disabled">Suivant →</span>
        @endif
    </div>
@endsection