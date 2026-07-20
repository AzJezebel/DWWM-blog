@extends('layouts.admin')

@section('title', 'Articles — Admin')

@section('content')
    <div class="admin-panel-header">
        <h1>Articles</h1>
        <div class="header-actions">
            <a href="{{ route('categories.index') }}" class="btn-pill btn-pill-outline">Gérer les catégories</a>
            {{-- <button type="button" class="btn-pill" disabled title="À venir">+ Nouvel article</button> --}}
            <a href="{{ route('admin.article-create') }}" class="btn-pill">+ Nouvel article</a>
        </div>
    </div>

    <table class="admin-table">
        <thead>
            <tr>
                <th>Titre</th>
                <th>Catégorie</th>
                <th>Statut</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($articles as $article)            
                <x-article-row :article="$article"/>
            @empty
                <tr>
                    <td colspan="5" class="empty-state">Aucun article.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="pagination-bar">
        @if ($articles->onFirstPage())
            <span class="btn-pill disabled">← Précédent</span>
        @else
            <a href="{{ $articles->appends(request()->query())->previousPageUrl() }}" class="btn-pill">← Précédent</a>
        @endif

        <span class="page-indicator">Page {{ $articles->currentPage() }}/{{ max($articles->lastPage(), 1) }}</span>

        @if ($articles->hasMorePages())
            <a href="{{ $articles->appends(request()->query())->nextPageUrl() }}" class="btn-pill">Suivant →</a>
        @else
            <span class="btn-pill disabled">Suivant →</span>
        @endif
    </div>
@endsection