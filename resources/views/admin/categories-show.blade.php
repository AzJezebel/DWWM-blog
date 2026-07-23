@extends('layouts.admin')

@section('title', $category->name . ' — Admin')

@section('content')
    <div class="admin-panel-header">
        <h1>{{ $category->name }}</h1>
        <div class="header-actions">
            <a href="{{ route('categories.index') }}" class="btn-pill btn-pill-outline">← Retour aux catégories</a>
            <a href="{{ route('categories.edit', $category->id) }}" class="btn-pill">Modifier</a>
        </div>
    </div>

    <div class="category-detail-container">
        <div class="category-info">
            <div class="info-group">
                <label>Nom</label>
                <div class="info-value">{{ $category->name }}</div>
            </div>

            <div class="info-group">
                <label>Slug</label>
                <div class="info-value"><code>{{ $category->slug }}</code></div>
            </div>

            <div class="info-group">
                <label>Articles</label>
                <div class="info-value">{{ $category->articles->count() }} article(s)</div>
            </div>

            <div class="info-group">
                <label>Date de création</label>
                <div class="info-value">{{ $category->created_at->format('d/m/Y à H:i') }}</div>
            </div>

            <div class="info-group">
                <label>Dernière modification</label>
                <div class="info-value">{{ $category->updated_at->format('d/m/Y à H:i') }}</div>
            </div>
        </div>

        @if($category->articles->count() > 0)
            <div class="articles-section">
                <h3>Articles dans cette catégorie</h3>
                <ul class="articles-list">
                    @foreach($category->articles as $article)
                        <li>
                            <a href="{{ route('articles.show', $article->id) }}">{{ $article->title }}</a>
                            <span class="badge {{ $article->status === 'PUBLISHED' ? 'badge-success' : 'badge-warning' }}">
                                {{ $article->status }}
                            </span>
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
@endsection

@push('styles')
    <style>
        .category-detail-container {
            max-width: 800px;
            margin: 0 auto;
            background: white;
            border-radius: 12px;
            padding: 30px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }

        .category-info {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 24px;
        }

        .info-group {
            margin-bottom: 16px;
        }

        .info-group label {
            display: block;
            font-size: 13px;
            font-weight: 600;
            color: #6b7280;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 4px;
        }

        .info-group .info-value {
            font-size: 18px;
            font-weight: 500;
            color: #1f2937;
            padding: 8px 0;
        }

        .info-group .info-value code {
            background: #f3f4f6;
            padding: 4px 12px;
            border-radius: 4px;
            font-size: 16px;
        }

        .articles-section {
            margin-top: 32px;
            padding-top: 24px;
            border-top: 1px solid #e5e7eb;
        }

        .articles-section h3 {
            font-size: 18px;
            font-weight: 600;
            color: #1f2937;
            margin-bottom: 16px;
        }

        .articles-list {
            list-style: none;
            padding: 0;
        }

        .articles-list li {
            padding: 12px 0;
            border-bottom: 1px solid #f3f4f6;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .articles-list li:last-child {
            border-bottom: none;
        }

        .articles-list a {
            color: #3b82f6;
            text-decoration: none;
            font-weight: 500;
        }

        .articles-list a:hover {
            text-decoration: underline;
        }

        .badge {
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }

        .badge-success {
            background: #dcfce7;
            color: #166534;
        }

        .badge-warning {
            background: #fef3c7;
            color: #92400e;
        }
    </style>
@endpush