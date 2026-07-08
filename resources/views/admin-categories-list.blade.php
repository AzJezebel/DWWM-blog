<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Catégories — Admin</title>
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

        .admin-label { font-weight: 600; }

        .avatar {
            width: 26px;
            height: 26px;
            border-radius: 50%;
            background: #111;
            color: #fff;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
        }

        /* Page */
        .page {
            max-width: 960px;
            margin: 0 auto;
            padding: 32px;
        }

        /* Admin panel */
        .admin-panel-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .admin-panel-header h1 { font-size: 22px; margin: 0; }

        .admin-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 14px;
        }

        .admin-table th {
            text-align: left;
            border-bottom: 1px solid #000;
            padding: 10px 8px;
            font-weight: 600;
        }

        .admin-table td {
            border-bottom: 1px solid #ddd;
            padding: 12px 8px;
        }

        .article-count {
            display: inline-block;
            background: #f0f0f0;
            padding: 2px 10px;
            border-radius: 12px;
            font-size: 12px;
            font-weight: 500;
        }

        .actions { display: flex; gap: 12px; }

        .icon-btn {
            border: none;
            background: none;
            cursor: not-allowed;
            font-size: 15px;
            opacity: 0.6;
            transition: opacity 0.2s;
        }

        .icon-btn:not(.disabled) {
            cursor: pointer;
            opacity: 0.8;
        }

        .icon-btn:not(.disabled):hover {
            opacity: 1;
        }

        .empty-state {
            padding: 40px 0;
            text-align: center;
            color: #555;
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
            text-decoration: none;
        }

        .btn-pill.disabled {
            background: #ccc;
            color: #fff;
            cursor: not-allowed;
            pointer-events: none;
        }

        .btn-pill-secondary {
            background: transparent;
            color: #111;
            border: 1px solid #111;
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
            <span class="admin-label">Admin</span>
            <span class="avatar">A</span>
            <a href="{{ route('admin.toggle') }}">Se déconnecter</a>
        </nav>
    </header>

    <main class="page">
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
    </main>
</body>
</html>