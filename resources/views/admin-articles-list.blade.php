<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Articles — Admin</title>
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

        .status-dot {
            display: inline-block;
            width: 8px;
            height: 8px;
            border-radius: 50%;
            margin-right: 6px;
            background: #ccc;
        }

        .status-dot.status-published { background: #2ecc71; }
        .status-dot.status-draft { background: #ccc; }

        .actions { display: flex; gap: 12px; }

        .icon-btn {
            border: none;
            background: none;
            cursor: not-allowed;
            font-size: 15px;
            opacity: 0.6;
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
            <span class="admin-label">Admin</span>
            <span class="avatar">A</span>
            <a href="{{ route('admin.toggle') }}">Se déconnecter</a>
        </nav>
    </header>

    <main class="page">
        <div class="admin-panel-header">
            <h1>Articles</h1>
            <button type="button" class="btn-pill" disabled title="À venir">+ Nouvel article</button>
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
                    <tr>
                        <td>{{ $article->title }}</td>
                        <td>{{ $article->category->name }}</td>
                        <td>
                            <span class="status-dot status-{{ $article->status }}"></span>
                            {{ $article->status === 'published' ? 'Publié' : 'Brouillon' }}
                        </td>
                        <td>{{ $article->created_at->format('d/m/Y') }}</td>
                        <td class="actions">
                            <button type="button" class="icon-btn" title="Modifier" disabled>✎</button>
                            <button type="button" class="icon-btn" title="Supprimer" disabled>✕</button>
                            <button type="button" class="icon-btn" title="Publier" disabled>➤</button>
                        </td>
                    </tr>
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
    </main>
</body>
</html>
