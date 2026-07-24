@extends('layouts.app')

@section('title', 'Articles')

@section('navbar')
    <a href="{{ route('login.create') }}">Se connecter</a>
    <a href="{{ route('register.create') }}">S'inscrire</a>
    <a href="{{ route('admin.toggle') }}" class="admin-sim-link">Simuler vue admin</a>
@endsection

@section('content')
    <section class="filters-bar">
        <span class="filters-label">Filtres :</span>

        <form method="GET" action="{{ route('articles.index') }}" id="filters-form" class="filters-form">
            <select name="category" onchange="document.getElementById('filters-form').submit()">
                <option value="">Toutes les catégories</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->slug }}" @selected(request('category') == $category->id)>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>

            <select name="tag" onchange="document.getElementById('filters-form').submit()">
                <option value="">Tous les tags</option>
                @foreach ($tags as $tag)
                    <option value="{{ $tag }}" @selected(request('tag') === $tag)>{{ $tag }}</option>
                @endforeach
            </select>
        </form>
    </section>

    <div class="articles-list">
        @forelse ($articles as $article)
            <x-article-card :article="$article"/>
        @empty
            <p class="empty-state">Aucun article ne correspond à ces filtres.</p>
        @endforelse
    </div>

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