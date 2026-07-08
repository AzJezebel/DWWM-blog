<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Articles</title>
    <style>
        * { box-sizing: border-box; }

        body {
            margin: 0;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Helvetica, Arial, sans-serif;
            color: #111;
            background: #fff;
        }

        a { color: inherit; text-decoration: none; }

        /* Topbar */
        .topbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 20px 32px;
            border-bottom: 1px solid #000;
        }

        .logo-box {
            width: 34px;
            height: 34px;
            border: 1px solid #000;
            background:
                linear-gradient(to top right, transparent 48%, #000 49%, #000 51%, transparent 52%),
                linear-gradient(to top left, transparent 48%, #000 49%, #000 51%, transparent 52%);
        }

        .topnav {
            display: flex;
            align-items: center;
            gap: 20px;
            font-size: 14px;
        }

        .topnav a { text-decoration: underline; }

        .admin-sim-link {
            text-decoration: none;
            border: 1px solid #000;
            border-radius: 20px;
            padding: 6px 14px;
        }

        /* Page */
        .page {
            max-width: 960px;
            margin: 0 auto;
            padding: 32px;
        }

        /* Filters */
        .filters-bar {
            display: flex;
            align-items: center;
            gap: 16px;
            padding-bottom: 24px;
            border-bottom: 1px solid #000;
            margin-bottom: 24px;
        }

        .filters-label { font-size: 14px; }

        .filters-form { display: flex; gap: 16px; }

        .filters-form select {
            padding: 10px 14px;
            border: 1px solid #000;
            background: #fff;
            font-size: 14px;
            min-width: 180px;
        }

        /* Article list */
        .article-card {
            border: 1px solid #000;
            border-top: none;
            padding: 16px 20px;
        }

        .article-card:first-child { border-top: 1px solid #000; }

        .article-card-top {
            display: flex;
            justify-content: space-between;
            align-items: baseline;
            margin-bottom: 8px;
        }

        .tags { display: flex; gap: 8px; font-size: 12px; }

        .tag::before { content: "[ "; }
        .tag::after { content: " ]"; }

        .article-date { font-size: 13px; color: #333; }

        .article-title { margin: 4px 0 8px; font-size: 18px; }

        .article-excerpt { margin: 0 0 8px; font-size: 14px; line-height: 1.5; color: #222; }

        .read-link { font-size: 14px; text-decoration: underline; display: inline-block; }

        .empty-state {
            padding: 40px 0;
            text-align: center;
            color: #555;
            border: 1px solid #000;
            border-top: none;
        }

        /* Buttons */
        .btn-pill {
            display: inline-block;
            background: #111;
            color: #fff;
            border: none;
            border-radius: 20px;
            padding: 10px 20px;
            font-size: 14px;
            cursor: pointer;
        }

        .btn-pill.disabled {
            background: #ccc;
            color: #fff;
            cursor: not-allowed;
            pointer-events: none;
        }

        /* Pagination */
        .pagination-bar {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 20px;
            margin-top: 28px;
        }

        .page-indicator { font-size: 14px; }
    </style>
</head>
<body>
    <header class="topbar">
        <a href="{{ route('articles.index') }}" class="logo-box" aria-label="Accueil"></a>

        <nav class="topnav">
            <a href="#">Se connecter</a>
            <a href="#">S'inscrire</a>
            <a href="{{ route('admin.toggle') }}" class="admin-sim-link">Simuler vue admin</a>
        </nav>
    </header>

    <main class="page">
        <section class="filters-bar">
            <span class="filters-label">Filtres :</span>

            <form method="GET" action="{{ route('articles.index') }}" id="filters-form" class="filters-form">
                <select name="category" onchange="document.getElementById('filters-form').submit()">
                    <option value="">Toutes les catégories</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" @selected(request('category') == $category->id)>
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
                <article class="article-card">
                    <div class="article-card-top">
                        <div class="tags">
                            <span class="tag">{{ $article->category->name }}</span>
                        </div>
                        <time class="article-date">{{ $article->created_at->translatedFormat('d M. Y') }}</time>
                    </div>

                    <h2 class="article-title">{{ $article->title }}</h2>
                    <p class="article-excerpt">{{ Str::limit($article->content, 160) }}</p>

                    <a href="#" class="read-link">Lire →</a>
                </article>
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
    </main>
</body>
</html>
