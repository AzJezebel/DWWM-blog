<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Mon Site')</title>
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

        .btn-pill-outline {
            background: transparent;
            color: #111;
            border: 1px solid #111;
        }

        .btn-pill-outline:hover {
            background: #f5f5f5;
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

        .empty-state {
            padding: 40px 0;
            text-align: center;
            color: #555;
        }

        /* Admin panel shared */
        .admin-panel-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 20px;
            flex-wrap: wrap;
            gap: 12px;
        }

        .admin-panel-header h1 { font-size: 22px; margin: 0; }

        .header-actions {
            display: flex;
            gap: 10px;
            align-items: center;
        }

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

        .icon-btn:not(.disabled) {
            cursor: pointer;
            opacity: 0.8;
        }

        .icon-btn:not(.disabled):hover {
            opacity: 1;
        }

        .article-count {
            display: inline-block;
            background: #f0f0f0;
            padding: 2px 10px;
            border-radius: 12px;
            font-size: 12px;
            font-weight: 500;
        }

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
    </style>
</head>
<body>
    <header class="topbar">
        <a href="{{ route('articles.index') }}" class="logo-box" aria-label="Accueil"></a>

        <nav class="topnav">
            @yield('navbar')
        </nav>
    </header>

    <main class="page">
        @yield('content')
    </main>
</body>
</html>